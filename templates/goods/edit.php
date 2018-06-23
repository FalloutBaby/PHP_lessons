<?php include 'header.php'; ?>
   <?php if(!empty($good)) : ?>
    
    <form action='edit?id=<?= $good['goods_id'] ?>' enctype='multipart/form-data' method='post'>
			<img class='uploaded_img' src='../<?= $good['img_adress'] ?>'>
   	<select class='edit_select' name='category_id'>
		<option <?= getCategory(4, $good['category_id']) ?>>Маска</option>
		<option <?= getCategory(2, $good['category_id']) ?>>Гидрокостюм</option>
		<option <?= getCategory(3, $good['category_id']) ?>>Горнолыжные ботинки</option>
		<option <?= getCategory(1, $good['category_id']) ?>>Вейкборд</option>
	</select>
            <input class='edit_input' type='text' name='title' value='<?= $good['title'] ?>' required>
            <textarea class='edit_short_desc' name='description_short' placeholder='Краткое описание товара' required><?= $good['description_short'] ?></textarea>
            <textarea class='edit_long_desc' name='description_long' placeholder='Подробное описание товара'><?= $good['description_long'] ?></textarea>
			<input class='edit_input' type='number' name='price' value='<?= $good['price'] ?>' placeholder='Цена' required>
    		<input class='edit_input upload_file' type='file' name='file_name'>
            <input class='edit_input menu_list_link' type='submit'>
			<span class='accepted'><?= $done ?></span>
        </form>
		<a href='../goods' class='navigation_link'>Вернуться назад</a>
<?php  else : ?>
    <b>Товар не найден!</b>
	<a href='../goods' class='navigation_link'>Вернуться назад</a>
<?php  endif  ?>