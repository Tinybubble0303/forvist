DROP TABLE IF EXISTS `users`;
CREATE TABLE users (
  user_id BIGINT(20) NOT NULL AUTO_INCREMENT,
  account VARCHAR(120) NOT NULL COMMENT '账号',
  `password` VARCHAR(255) NOT NULL COMMENT '密码',
  nick_name VARCHAR(120) NOT NULL DEFAULT '' COMMENT '用户姓名',
  organization_code VARCHAR(60) NOT NULL DEFAULT '' COMMENT '所属机构组织，公司',
  `status` TINYINT(3) NOT NULL DEFAULT 1 COMMENT '账号状态，0-停用，1-启用',
  last_login INT(11) COMMENT '上次登录时间，时间戳格式',
  insert_time INT(11) NOT NULL COMMENT '插入时间，时间戳格式',
  update_time INT(11) NOT NULL COMMENT '更新时间，时间戳格式',
  PRIMARY KEY (user_id),
  UNIQUE KEY (account)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT '用户表';
INSERT INTO users (account,`password`,nick_name,organization_code,insert_time,update_time) VALUES ('yufang','$2y$10$.wUsQIkBzLuKXAOmpL6vbuRF7wEgV84Vx.EkRbTEi5pYgUj/LlpCu','Yu', 'firelang',1532938234,1532938234);


