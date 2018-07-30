$(function() {
	$('#doLogin').on('click', function(e) {
		e.preventDefault();
		var account = $.trim($('#account').val()),
			password = $.trim($('#password').val());
		$.post('/session/start', {account: account, password: password}, function(resp) {
			if (resp.code) {
				location.href = '/';
			}
		}, 'json');
	});
	
	
})
