<?php

function goods_add() {
	$title = 'Магазин | Добавление';
    if(!empty($_POST)) {
        include_once "../engine/app.php";
		if (!empty($_FILES['file_name'])) {
			$file_info = $_FILES['file_name'];
			if ($file_info['name'] != '') {
				if (getimagesize ($file_info['tmp_name']) == true) {
					move_uploaded_file($file_info['tmp_name'], ROOT_DIR . 'public/img/' . md5($file_info['name']) . substr($file_info['name'], -4));
					$imgAdress = 'img/' . md5($file_info['name']) . substr($file_info['name'], -4);
				} else {
					echo '<span style="color: red">Wrong format!</span>';
				}
			} else {
				$imgAdress = NULL;
			}
		}
        executeQuery("INSERT INTO goods (category_id, title, description_short, description_long, price, img_adress) VALUES (  '" . antiInj($_POST['category_id']) . "', '" . antiInj($_POST['title']) . "' , '" . antiInj($_POST['description_short']) . "', '" . antiInj($_POST['description_long']) . "', '" . antiInj((int)($_POST['price'])) . "', '{$imgAdress}')");
		$done = "Выполнено";
    }
    $content = render('goods/add.php', ['done' => $done]);
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function goods_edit() {
	$title = 'Магазин | Редактирование';
    $id = $_GET['id'];
    if(empty($id)) {
        echo "<b>Товар не найден!</b>";
        exit();
    }
    if(!empty($_POST)) {
		if (!empty($_FILES['file_name'])) {
		$file_info = $_FILES['file_name'];
		if ($file_info['name'] != '') {
			if (getimagesize ($file_info['tmp_name']) == true) {
					move_uploaded_file($file_info['tmp_name'], ROOT_DIR . 'public/img/' . md5($file_info['name']) . substr($file_info['name'], -4));
					$imgAdress = 'img/' . md5($file_info['name']) . substr($file_info['name'], -4);
				} else {
					echo '<span style="color: red">Wrong format!</span>';
				} 
			} else {
				$goods = mysqli_query($connection, "SELECT * FROM goods WHERE `goods_id` = " . $id);
				if( $good = mysqli_fetch_assoc($goods)) {
					$imgAdress = $good['img_adress'];
				}
			}
		}
        executeQuery("UPDATE goods SET category_id =  '" . antiInj($_POST['category_id']) . "' , title = '" . antiInj($_POST['title']) . "' , description_short = '" . antiInj($_POST['description_short']) . "' , description_long = '" . antiInj($_POST['description_long']) . "' , price = '" . antiInj((int)($_POST['price'])) . "', img_adress = '" . $imgAdress . "' WHERE goods_id = " . $id);
		$done = "Выполнено";
    	header('Location: ../goods');
    }
    $good = getAssocResultOne( "SELECT * FROM goods WHERE `goods_id` = " . $id);
    $content = render("goods/edit.php", ['good' => $good]);
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function goods_index() {
	$title = 'Магазин';
    $type = $_GET['type'];
    if(!empty($type)) {
        $goods = getAssocResult("SELECT * FROM goods INNER JOIN goods_categories ON category_id = goods_categories.id WHERE `category_title` LIKE '" . $type . "'");
    } else {
        $goods = getAssocResult("SELECT * FROM goods");
    }
    $content = render('goods/index.php', ['goods' => $goods]);
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function goods_show() {
	$title = 'Магазин | Товар';
    $id = $_GET['id'];
	if(!empty($_POST)) {
		$goodNotFound = 0;
		if (!empty($_SESSION['goods'])) {
			foreach($_SESSION['goods'] as $key => $goodId) {
				if (($goodId['goods_id'] == $id) && ($goodId['num_of_goods'] > 0)) {
					$_SESSION['goods'][$key]['num_of_goods'] = $goodId['num_of_goods'] + 1;
					$done = "Товар добавлен в вашу корзину";
					$goodNotFound = 1;
				}
			}
		}
		if ($goodNotFound == 0) {
			$goodsById = getGoodsResult("SELECT `goods_id`, `price` FROM goods WHERE `goods_id` = " . $id);
			$goodsById['num_of_goods'] = 1;
			$_SESSION['goods'][] = $goodsById;
			$done = "Товар добавлен в вашу корзину";
		}
    }
    $good = getAssocResultOne("SELECT * FROM goods WHERE `goods_id` = " . $id);
    $content = render("goods/show.php", ['good' => $good]);
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function goods_delete() {
	$title = 'Магазин | Удаление';
    $id = $_GET['id'];
    if(empty($id)) {
        echo "<b>Товар не найден!</b>
		<a href='index' class='navigation_link'>Вернуться назад</a>";
        exit();
    }
    if(!empty($_POST)) {
        executeQuery("DELETE FROM goods WHERE `goods_id` = " . $id);
		$done = "Выполнено";
    	header('Location: ../goods');
    }
	$good = getAssocResultOne("SELECT * FROM goods WHERE `goods_id` = " . $id);
    $content = render("goods/delete.php", ['good' => $good]);
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function goods_basket() {
	$title = 'Магазин | Корзина';
	
	if(!empty($_SESSION['goods'])) {
		$goodsArray = $_SESSION['goods'];
		foreach($goodsArray as $key => $good) {
			$good_id = $good['goods_id'];
			$goods[] = getGoodsResult("SELECT * FROM goods WHERE `goods_id` = '" . $good_id . "'");
			$goods[$key]['num_of_goods'] = $good['num_of_goods'];
		}
	} else {
		$goods = [];
	}
	if(!empty($_POST)) {
		remove_from_basket();
	}
    $content = render('goods/basket.php', ['goods' => $goods]);
	echo render('layout.php', ['content' => $content, 'title' => $title]);
}

function remove_from_basket() {
	$id = key($_POST);
	foreach($_SESSION['goods'] as $key => $goodId) {
		if (($goodId['goods_id'] == $id) && ($goodId['num_of_goods'] > 1)) {
			$_SESSION['goods'][$key]['num_of_goods'] = $goodId['num_of_goods'] - 1;
			$goodNotFound = 1;
		} else if (($goodId['goods_id'] == $id) && ($goodId['num_of_goods'] = 1)) {
			unset($_SESSION['goods'][$key]);
		}
	}
}


//$_SESSION['goods'] = [];

function session() {
	if (!empty($_SESSION['goods'])) {
		foreach ($_SESSION['goods'] as $good) {
			$numOfGoods += $good['num_of_goods'];
		}
	} else {
		$numOfGoods = 0;
	}
	if (!empty($_SESSION['goods'])) {
		foreach ($_SESSION['goods'] as $good) {
			$price += $good['price'] * $good['num_of_goods'];
		}
	} else {
		$price = 0;
	}
	$_SESSION['basketSum'] = $price;
	$_SESSION['num_of_goods'] = $numOfGoods;
}

?>