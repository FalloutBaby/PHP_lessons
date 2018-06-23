<?php 
if(!empty($_SESSION['user'])) {  ?>
    <h1 class="welcome_title">Добро пожаловать, <?= $user['user_name'] ?>.</h1>
	<form action="account" class="change_user_name" method="post" enctype="multipart/form-data">
	<p class="account_text">Здесь вы можете редактировать свои данные</p>
	<input class='edit_input' type='text' name='user' placeholder='<?= $user['user'] ?>'>
	<input class='edit_input' type='text' name='user_name' placeholder='<?= $user['user_name'] ?>'>
	<input  class='menu_list_link centered' name="submit" type="submit" value="Сменить">
	<br>
	<a href='../account/logout' class='navigation_link centered'>Выйти из аккаунта</a>
</form>
<?php } else {
    echo "<p class='account_text'>Вы не авторизованы!</p>";
    echo "<a href='../account/login'  class='menu_list_link auth_link centered'>Авторизуйтесь</a><p class='account_text'>или</p><a href='../account/register'  class='menu_list_link auth_link centered'>зарегистрируйтесь</a>";
}
  ?>
<a href='../goods' class='navigation_link'>В магазин</a>
