<?php

include_once "../engine/app.php";


if (! isset ($_POST['params']) || ! is_array ($_POST['params'])) {
    echo json_encode([
	'success' => false,
	'msg' => 'Переданы невалидные параметры',
    ]);
    exit;
}

$params = $_POST['params'];

switch ($params['action']) {
    case 'post_review':
	echo json_encode([
	    'success' => post_review($params['item'], $params['post_id'], $params['name'], $params['review']),
	]);
	exit;
    default:
	return false;
}

?>