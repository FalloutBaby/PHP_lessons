<?php

function render($template, $params = []) {
    extract($params);
    if(file_exists(TEMPLATE_DIR . $template )) {
        ob_start();
        include TEMPLATE_DIR . $template;
        $content = ob_get_clean();
		return $content;
    } else {
        echo "Page not found &#58;&#40;";
    }
}
function getCategory($value, $goodCategory) {
	if ($value == $goodCategory) {
		return "value='$value' selected";
	} else {
		return "value='$value'";
	}
}
function antiInj($inputedString) {
	$connection = get_connection();
	$newString = mysqli_real_escape_string($connection, htmlspecialchars(strip_tags($inputedString)));
	return $newString;
}

function addSuffix($val, $suffix1, $suffix2, $suffix3) {
	if ($val > 20) {
		$val %= 10;
	}
	if ($val == 0 || ($val >= 5 && $val <= 20)) {
		return $suffix1;
	} else if ($val >=2 && $val <= 4) {
		return $suffix2;
	} else {
		return $suffix3;
	}
}

?>