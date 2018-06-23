<?php

function display_reviews() {
    $good_id = $_GET['id'];
    if(!empty($type)) {
        $reviews = getAssocResult("SELECT * FROM reviews INNER JOIN goods ON id_good = goods.goods_id WHERE `id_good` LIKE '" . $good_id . "'");
    } else {
        continue;
    }
	return $reviews;
}

?>