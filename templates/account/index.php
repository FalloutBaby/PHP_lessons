<?php

include_once "../engine/app.php";
if(!empty($_SESSION['user'])) {
    echo "<p class='account_text'>Добро пожаловать, " . $_SESSION['user'] ."!</p>";
    echo "<a class='menu_list_link centered' href='../goods'>В магазин</a>
	<br><a class='menu_list_link centered' href='account/logout'>Выход</a>";
} else {
    echo "<p class='account_text'>Вы не авторизованы!</p>";
    echo "<a class='menu_list_link centered' href='account/login'>Авторизуйтесь</a><p class='account_text'>или</p><a class='menu_list_link centered' href='account/register'>зарегистрируйтесь</a>";
}

?>