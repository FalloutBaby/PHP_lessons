<?php include 'header.php'; ?>
<?php if(!empty($good)) : ?>
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/Review.js"></script>
    <script src="../js/List.js"></script>
    <script>
        $(document).ready(function () {
            //Создаем модуль
            var list = new List('list');
            list.render($('#list_wrapper'));
			
			$('#list').ready(function() {
			
            	// Добавляем обработчики на кнопки
				$('.deleteReview').on('click', function () {
                	var idReview = parseInt($(this).attr('data-id'));
                	list.delete(idReview);
					this.parentElement.remove();
            	});
			
				$('.submitReview').on('click', function () {
                	var idReview = parseInt($(this).attr('data-id'));
					$.get({
						url: '../json/sucess.json',
						dataType: 'json',
						context: this,
						data: '{" id_comment" : ' + idReview + '}',
						success: function (data) {
							this.parentElement.innerHTML += 'Отзыв одобрен';
						},
						error: function (data) {
							this.parentElement.innerHTML += 'Ошибка';
		   				}
					});
            	});
			});
			
			$('#add').on('click', function () {
				var item_id = <?= $good['goods_id'] ?>;
				var name = $('#id_user').val();
				var review = $('#text').val();
				var post_id = <?= $good['goods_id'] ?> + $('#id_user').val();
				post_review(item_id, post_id, name, review);
            });
			
			function post_review(item_id, post_id, name, review) {
				$.post({
				url: 'get-reviews.php',
				dataType: 'json',
				data: {
					params: {
						'action': 'post_review',
						'item': item_id,
						'post_id': post_id,
						'name': name,
						'review': review,
					}
				},
				success: function (data) {
		    		if (data.success === true) {
						alert('Успешно');
					} else {
						alert('Не удалось');
					}
				}
	    		});
			};
        });
    </script>
	<img src='../<?= $good['img_adress'] ?>' height='300' style='float: left; padding: 20'>
	<h1><?= $good['title'] ?></h1>
	<h3>Цена:</h3>
	<p><?= $good['price'] ?> P.</p>
	<h3>Краткое описание</h3>
	<p><?= $good['description_short'] ?></p>
	<h3>Подробное описание</h3>
	<p><?= $good['description_long'] ?></p>
	<form action="show?id=<?= $good['goods_id'] ?>" method="post" enctype="multipart/form-data" name="count">
		<input class='menu_list_link' name="submit" type="submit" value="Добавить в корзину">
	</form>
	<a href='../goods' class='navigation_link'>Вернуться назад</a>
	
	<div id="list_wrapper"></div>
	<div id="reviews"></div>
	<form id="addForm" name="addForm"> <!-- method="post" -->
	<label for="#id_user">Ваше имя<input type="text" name="id_user" id="id_user"></label>
	<label for="#text">Отзыв<textarea name="text" id="text"></textarea></label>
	<button id="add">Отправить отзыв</button>
	
<?php  else : ?>
    <span>Товар не найден!</span>
    <a href='../goods' class='navigation_link'>Вернуться назад</a>
<?php  endif  ?>