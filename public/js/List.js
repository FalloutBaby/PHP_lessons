function List(idList) {
    this.id = idList;
    this.listReviews = [];
    this.getReviews();
}

List.prototype.render = function (root) {
    var $listDiv = $('<div />', {
        id: this.id,
        html: '<h2>Все отзывы</h2>'
    });

    var $listReviewsDiv = $('<div />', {id: this.id + '_reviews'});

    $listReviewsDiv.appendTo($listDiv);
    $listDiv.appendTo(root);
};


List.prototype.getReviews = function () {
    var appendId = '#' + this.id + '_reviews';
	
	$.post({
		url: 'reviews.php',
		dataType: 'json',
		data: {
			params: {
			'id': appendId,
			}
		},
		
	/* $.post({
        url: '../json/list.json', /* 'http://javascript/lesson5/json/list.json', */
        dataType: 'json',
        context: this,
        success: function (data) {
			for (var oneComment in data.comments) {
				var review = new Review(data.comments[oneComment].id_comment, data.comments[oneComment].id_user, data.comments[oneComment].text);
            	review.render($('#reviews'));
			}

            for (var itemKey in data.comments) {
                this.listReviews.push(data.comments[itemKey]);
            }
        },
		error: function (data) {
			console.log('json ERROR');
		}
    }); */
	
};

List.prototype.add = function (id_user, text) {
	$.post({
		url: 'json/add.json',
		context: this,
		dataType: 'json',
		success: function (data) {
			data: '{"result": "1", "userMessage" : "Ваш отзыв был передан на модерацию"}'
		},
		error: function (data) {
			data: '{"result": 0, "error_message": "Сообщение об ошибке"}'
		   }
	}); // Не доделано
	
	var id_comment = this.listReviews.length + 1;
    var review = new Review('12' + id_comment, id_user, text);
	review.render($('#reviews'));
	this.listReviews.push(review);
};

//Удаление
List.prototype.delete = function (idReview) {
	for (var eachReview in this.listReviews) {
		var itemKey = this.listReviews[eachReview];
		if (itemKey['id_comment'] == idReview) {
			delete this.listReviews[eachReview];
			delete $('[data-id="' + idReview + '"]');
		}
	}
};