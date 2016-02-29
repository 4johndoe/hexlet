<?php 

// session is request - response
$app->get('/', function () {
	session_start();
	return response(print_r($_SESSION, true));
});

$app->get('/session/new', function ($meta, $params) {
	session_start();
	$_SESSION = $params;
	return response()->redirect('/');
});

$app->get('/session/destroy', function ($meta, $params) {
	session_start();
	session_destroy();
	return response()->redirect('/');
});

$app->run();
// $_SESSION = $param;
Реализуйте аутентификацию на сайте на основе nickname.

Session.php
Реализуйте класс Session в соответствии с интерфейсом SessionInterface;

index.php
Реализуйте следующие обработчики:

Форма для входа: get -> /session/new
Обработка формы: post -> /session.
Выход: delete -> /session.
Если обработка успешна, то делаем перенаправление на /.
########
$app->get('/session/new', function ($meta, $params, $attributes, $cookies, $session) {
    return response(render('session/new'));
});

$app->post('/session', function ($meta, $params, $attributes, $cookies, $session) {
    $session->start();
    $session->set('nickname', $params['nickname']);
    return response()->redirect('/');
});

$app->delete('/session', function ($meta, $params, $attribute, $cookies, $session) {
    $session->start();
    $session->destroy();
    return response()->redirect('/');
});