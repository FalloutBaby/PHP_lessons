<?php

session_start();

define(DOCUMENT_ROOT, $_SERVER['DOCUMENT_ROOT'] . '/');
define(ROOT_DIR, DOCUMENT_ROOT . '../');
define(ENGINE_DIR, ROOT_DIR . 'engine/');
define(CONFIG_DIR, ROOT_DIR . 'config/');
define(TEMPLATE_DIR, ROOT_DIR . 'templates/');
define(PUBLIC_DIR, ROOT_DIR . 'public/');
define(MODULES_DIR, ROOT_DIR . 'modules/');
define(UPLOAD_DIR, PUBLIC_DIR . 'img/');

require_once ENGINE_DIR . "functions.php";
require_once ENGINE_DIR . "db.php";
