<form enctype="multipart/form-data" action="/users" method="post">
	<div>
		Name
		<input type="text" name="user[name]">
	</div>
	<br>
	<div>
		Ava
		<input type="file" name="user[avatar]">
		<?php if (isset($errors['avatar'])) : ?>
			<div style="color: red"><?= $errors['avatar'] ?></div>
		<?php endif ?>
	</div>
	<br>
	<div><input type="submit"></div>
</form>
################
В форме создания новой машины есть два поля для загрузки файлов.

<input class="file" type="file" name="car[pictures][]">
<input class="file" type="file" name="car[pictures][]">
После загрузки на сервер (обработчик POST /cars) происходит проверка на ошибки и готовится массив, содержащий список загруженных файлов:

  $pictures = [
    ['name' => basename($tmpFileName)],
    ...
  ];
При этом сами файлы должны быть перемещены в папку:

$newName = 'images' . DIRECTORY_SEPARATOR . basename($tmpFileName);
index.php
Допишите логику загрузки файлов в соответствующем обработчике.
#################
<?php 

$app->post('/users', function ($meta, $params, $attributes) use ($repository) {
	$user = $params['user'];
	$errors = [];

	if (array_key_exists('user', $_FILES)) {
		error_log(print_r($_FILES, true));
		$key = 'avatar';
		$errorCode = $_FILES['user']['error'][$key];
		if ($errorCode !== UPLOAD_ERR_NO_FILE) {
			if ($errorCode !== UPLOAD_ERR_OK) {
				$errors['avatar'] = codeToMessage($errorCode);
			} else {
				$tmpName = $_FILES['user']['tmp_name'][$key];
				$name = $_FILES['user']['name'][$key];
				$newName = 'images' . DIRECTORY_SEPARATOR . $name;
				if (!move_uploaded_file($tmpName, $newName)) {
					$errors['avatar'] = "Fuckup does";
				} else {
					$user['avatar'] = $name;
				}
			}
		}
	}
	error_log(print_r($_FILES, true));
	if (empty($errors)) {
		$repository->insert($user);
		return response()->redirect('/');
	} else {
		return response(render('users/new', ['user' => $user, 'errors' => $errors]))
			->withStatus(422);
	}
});
$$$$$$$$$$$$$$$$$$$$$$
if (array_key_exists('car', $_FILES)) {
        $key = 'pictures';
        $files = $_FILES['car'];
        foreach ($files['error'][$key] as $errorCode) {
            if ($errorCode !== UPLOAD_ERR_OK && $errorCode !== UPLOAD_ERR_NO_FILE) {
                $errors[$key] = 'Something was wrong';
            }
        }

        if (!array_key_exists($key, $errors)) {
            foreach ($files['tmp_name'][$key] as $index => $tmpName) {
                if ($files['error'][$key][$index] === UPLOAD_ERR_NO_FILE) {
                    continue;
                }
                $newName = 'images' . DIRECTORY_SEPARATOR . basename($tmpName);
                if (move_uploaded_file($tmpName, $newName)) {
                    $pictures[] = ['name' => basename($tmpName)];
                } else {
                    $errors[$key] = 'Something was wrong';
                }
            }
        }
    }