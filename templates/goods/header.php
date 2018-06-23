<?= session(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<div class="basket">
		<?= $_SESSION['user_name'] ?><br>
		<a href="../account/personal" class="basket_link">Личный кабинет</a>
		В корзине <?= $_SESSION['num_of_goods'] . " " . addSuffix($_SESSION['num_of_goods'], 'товаров', 'товара', 'товар') ?><br>На сумму: <?= $_SESSION['basketSum'] ?> P.<br>
		<a href="../goods/basket"class="basket_link">Посмотреть</a>
	</div>
	<ul class="menu">
		<li class="menu_list"><a href="../goods" class="menu_list_link">Все товары</a></li>
		<li class="menu_list"><a href="../goods?type=masks" class="menu_list_link">Маски</a></li>
		<li class="menu_list"><a href="../goods?type=hydrosuits" class="menu_list_link">Гидрокостюмы</a></li>
		<li class="menu_list"><a href="../goods?type=mountboots" class="menu_list_link">Горнолыжные ботинки</a></li>
		<li class="menu_list"><a href="../goods?type=wakeboards" class="menu_list_link">Вейкборды</a></li>
	</ul>
	<div class="clearfix"></div>