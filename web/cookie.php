<?php 

$app->get('/', function () {
	return response(render('index', ['cookies' => print_r($_COOKIE, true)]));
});

$app->get('/cookie', function () {
	setcookie('name', uniqid());
	setcookie('name1', uniqid(), time() + 10000);
	setcookie('name2', uniqid(), 0, '/about');				//	none
	setcookie('name3', uniqid(), 0, '', 'www.localhost');	//	none
	setcookie('name4', uniqid(), 0, '', '', false, true);
	return response()->redirect('/');
});
Корзина товаров это стандартный механизм для магазинов в интернете. Один из способов ее организации это хранение в куках массива со списком добавленных туда товаров.

Пример установки куки:

$app->post('/', function ($meta, $params, $attributes, $cookies) {
     $cart = ...
    return response()->redirect('/')->withCookie('cart', json_encode($cart));
});
Application.php
Реализуйте логику отправки cookies
index.php
Реализуйте следующие обработчики:

Вывод списка товаров из корзины: get -> /cart.
Добавление товара в корзину: post -> /cart. Каждое добавление одного и того же товара, увеличивает количество единиц на одну. После добавления должен происходить редирект /cart.
Удаление товара из корзины: delete -> /cart. Товар удаляется полностью, независимо от количества единиц в корзине. После удаления должен происходить редирект /cart.
// Закрыть
$app->get('/cart', function ($meta, $params, $attributes, $cookies) use ($goods) {
    $cart = array_key_exists('cart', $cookies) ? $cookies['cart'] : [];
    return response(render('cart', ['goods' => json_decode($cart, true)]));
});

$app->post('/cart', function ($meta, $params, $attributes, $cookies) use ($goods) {
    $cart = array_key_exists('cart', $cookies) ? json_decode($cookies['cart'], true) : [];
    $good = $params['good'];
    if (array_key_exists($good, $cart)) {
        $cart[$good]++;
    } else {
        $cart[$good] = 1;
    }
    return response()->redirect('/cart')->withCookie('cart', json_encode($cart));
});

$app->delete('/cart', function ($meta, $params, $attributes, $cookies) use ($goods) {
    $cart = array_key_exists('cart', $cookies) ? json_decode($cookies['cart'], true) : [];
    $good = $params['good'];
    unset($cart[$good]);
    return response()->redirect('/cart')->withCookie('cart', json_encode($cart));
});