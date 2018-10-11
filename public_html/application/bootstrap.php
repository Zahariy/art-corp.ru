<?php
require_once 'core/route.php';
require_once 'core/registry.php';
require_once 'core/application.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/exceptions.php';

//подумать над целесообразностью включания этих файлов здесь
require_once 'core/DB.php';

Route::start(); // запускаем маршрутизатор
?>