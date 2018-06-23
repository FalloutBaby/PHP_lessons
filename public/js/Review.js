// Класс, описывающий отзыв

function Review(id_comment, id_user, text) {
    this.id = id_comment;
    this.id_user = id_user;
    this.text = text;
	this.approvedStatus = null;
}

Review.prototype.render = function (jQuerySelector) {
	var $reviewContainer = $('<div />', {class: 'review'});
	var $idUser = $('<h5 />', {text: this.id_user});
	var $text = $('<p />', {text: this.text});
	
	var $submitBtn = $('<button />', {
		class: 'submitReview',
		'data-id': this.id,
		text: 'Одобрить отзыв'
	});
	
	var $deleteBtn = $('<button />', {
		class: 'deleteReview',
		'data-id': this.id,
		text: 'Удалить отзыв'
	});
	
	//Создаем структуру
    $idUser.appendTo($reviewContainer);
    $text.appendTo($reviewContainer);
    $submitBtn.appendTo($reviewContainer);
    $deleteBtn.appendTo($reviewContainer);

    jQuerySelector.append($reviewContainer);
};