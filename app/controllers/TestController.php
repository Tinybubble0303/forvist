<?php
use Phalcon\Cache\Backend\Redis;
use Phalcon\Cache\Frontend\Data as FrontData;

class TestController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->disable();
        echo 'Test Controller';
    }

    public function cacheAction()
    {
        $this->view->disable();

        //cached data 20 seconds.
        $frontCache = new FrontData([
            'lifetime'  => 20,
        ]);

        $cache = new Redis($frontCache, [
            'host'      => 'localhost',
            'port'      => 6379
        ]);

        $cacheKey = 'testRedis';
        $content = $cache->get($cacheKey);
        if (is_null($content)) {
            $content = range(1, 10);

            echo "Prepare to cache content:" . implode('', $content) . "<br>";
            $cache->save($cacheKey, $content);
        }
        var_dump($content);

    }

}

