<?php include 'header.php'; ?>
<?php if(!empty($good)) : ?>
	<form action='delete?id=<?= $good['goods_id'] ?>' method='post'>
  	<span>Вы уверены, что хотите удалить <?= $good['title'] ?> из списка товаров?</span>
            <input type='submit' class='delete' name='delete' value='Удалить'>
			<span class='accepted'><?= $done ?></span>
	<a href='../goods' class='navigation_link'>Вернуться назад</a>
        </form>
<?php  else : ?>
    <b>Товар не найден!</b>
	<a href='../goods' class='navigation_link'>Вернуться назад</a>
<?php  endif  ?>