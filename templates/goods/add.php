<?php include 'header.php'; ?>
<form action="add" method="post" enctype="multipart/form-data">
	<select class='upload_select' name="category_id">
		<option value="4">Маска</option>
		<option value="2">Гидрокостюм</option>
		<option value="3">Горнолыжные ботинки</option>
		<option value="1">Вейкборд</option>
	</select>
    <input class='upload_input' type="text" name="title" required>
	<textarea class='upload_short_desc' name="description_short" placeholder="Краткое описание товара" required></textarea>
	<textarea class='upload_long_desc' name="description_long" placeholder="Подробное описание товара"></textarea>
    <input class='upload_input' type="number" name="price" placeholder="Цена" required>
    <input class='upload_input upload_file' type='file' name='file_name'>
    <input class='upload_input menu_list_link' type="submit">
	<span class='accepted'><?= $done ?></span>
</form>
	<a href='../goods' class='navigation_link'>Вернуться назад</a>