<?php
function account_index() {
	$title = 'Аккаунт';
	$content = render('account/index.php');
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function account_login() {
	$title = 'Вход в личный кабинет';
    if(!empty($_POST['user']) && !empty($_POST['password'])) {
        $user = getAssocResultOne("SELECT * FROM users where user ='{$_POST['user']}'");
        if(!empty($user) && $user['password'] == md5($_POST['password']) ) {
            $_SESSION['user'] = $user['user'];
            $_SESSION['user_name'] = $user['user_name'];
			$_SESSION['user_id'] = $user['user_id'];
            header('Location: personal');
        } else {
            echo "Неверный логин или пароль";
        }
    }
    $content = render('account/login.php');
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function account_register() {
	$title = 'Регистрация';
    if(!empty($_POST['user']) && !empty($_POST['password'])) {
        executeQuery("INSERT INTO users (user, password) VALUES ('{$_POST['user']}' , md5('{$_POST['password']}'))");
        header('Location: login.php');
    }
    $content = render('account/register.php');
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function account_logout() {
    unset($_SESSION['user']);
    header('Location: ../goods');
}

function account_personal() {
	$title = 'Личный кабинет';
    $user['user'] = $_SESSION['user'];
	$user['user_name'] = $_SESSION['user_name'];
	
	if(!empty($_POST['user']) && !empty($_POST['user_name'])) {
		var_dump($_POST['user']);
		var_dump($_POST['user_name']);
        executeQuery("UPDATE users SET `user_name` = '" . antiInj($_POST['user_name']) . "' WHERE `user_id` = '" . $_SESSION['user_id'] . "'");
        executeQuery("UPDATE users SET `user` = '" . antiInj($_POST['user']) . "' WHERE `user_id` = '" . $_SESSION['user_id'] . "'");
        $_SESSION['user'] = antiInj($_POST['user']);
        $_SESSION['user_name'] = antiInj($_POST['user_name']);
	} else if (!empty($_POST['user'])) {
        executeQuery("UPDATE users SET `user` = '" . antiInj($_POST['user']) . "' WHERE `user_id` = '" . $_SESSION['user_id'] . "'");
        $_SESSION['user'] = antiInj($_POST['user']);
	} else if (!empty($_POST['user_name'])) {
        executeQuery("UPDATE users SET `user_name` = '" . antiInj($_POST['user_name']) . "' WHERE `user_id` = '" . $_SESSION['user_id'] . "'");
        $_SESSION['user_name'] = antiInj($_POST['user_name']);
	}
	
	$user = $_SESSION;
    $content = render('account/personal.php', ['user' => $user]);
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

?>