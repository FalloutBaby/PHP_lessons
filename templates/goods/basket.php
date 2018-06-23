<?php include 'header.php'; ?>
<hr><ul class='menu'>
	<?php foreach ($goods as $good) : ?>
        <li class='menu_list'>
            <form action="basket" class="basket_item" method="post" enctype="multipart/form-data">
            	<a href='show?id=<?= $good['goods_id'] ?>' class='item_prev_link' target='blank'><img class='basket_img' src='<?= "../" . $good['img_adress'] ?>'></a>
            	<span><?= $good['title'] ?></span>
            	<span class="price"><?= $good['price'] ?> P.</span>
            	<span class="num_of_items"><?= $good['num_of_goods'] ?> шт.</span>
				<input  class='menu_list_link centered' name="<?= $good['goods_id'] ?>" type="submit" value="Убрать из корзины">
				
			</form>
        </li>
    <?php endforeach;
	?>
   </ul>
<a href='./' class='navigation_link'>Добавить товары</a>