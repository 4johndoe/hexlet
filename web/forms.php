<?php 

$opt = (
	PDO::ATTR_ERRMODE => PDO::ERRORMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	);

$pdo = new PDO('sqlite:db.sqlite', null, null, $opt);
$repository = new UserRepository($pdo);
$app = new Application();

$newUser = [
	'email' => '',
	'first_name' => ''
	];

$app->get('/users', function () use ($repository) {
	$users = $repository->all();
	return response(render('users/index', ['users' => $users]));
});

$app->get('/users/new', function ($meta, $params, $attributes) use ($newUser) {
	return response(render('/users/new', ['errors' => [], 'user' => $newUser]));
});

$app->post('/users', function ($meta, $params, $attributes) use ($repository) {
	$user = $params['user'];
	$errors = [];

	if (!$user['email']) {
		$errors['email'] = "Email can't be blank";
	} else if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Email is not valid";
	}

	if (empty($errors)) {
		$repository->insert($user);
		return response()->redirect('/users');
	} else {
		return response(render('users/new', ['user' => $user, 'errors' => $errors]))
			->withStatus(422); //unprocessible entity
	}
});

$app->run();
################ TASK
// Кроме get и post в http определено множество других глаголов. Например, для удаления — DELETE, а для частичного обновления — PATCH. Их поддерживают все распространенные веб-сервера, но, к сожалению, формы в html умеют делать отправку только get или post.

// Фреймворки нашли выход из этой ситуации: при генерации форм (а их обычно не руками выводят) добавляют специальное hidden поле с именем _method и со значением, которое определяет глагол, например, delete. Дальше фреймворк внутри себя проверяет, если текущий метод POST и существует значение для _method то используем его как имя глагола. Таким образом у нас начинают работать такие конструкции:

// $app->delete('/users/:id', function ($meta, $params, $attributes) {
//     // тут удаляем пользователя
//     return response()->redirect('/');
// });
// Application.php
// Реализуйте логику определения $method на основе значения ключа _method из $_POST
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method'])) {
//             $method = strtoupper($_POST['_method']);
//         } else {
//             $method = $_SERVER['REQUEST_METHOD'];
//         }
// index.php
// Реализуйте следующие обработчики:

// Форма создания машины: get -> /cars/new
// Создание машины: post -> /cars
// Удаление машины: delete -> /cars/:id

// views/cars/new.phtml
// Реализуйте форму для создания машины
// <form action="/cars" method="post">
//       		<div>
//       			<b>Model</b>
//       			<input type="text" name="car[model]">
//       			<?php if (isset($errors['model'])) : ?>
//       				<div style="color: red"><?= $errors['model'] ?></div>
//       			<?php endif ?>
//       		</div>
      
//       		<br>
      
//       		<div>
//       			Year
//       			<input type="number" name="car[year]" >
//       		</div>
      		
//       		<br>
      
//       		<div>
//       			<input type="submit">
//       		</div>
//       	</form>