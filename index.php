<?php

if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.') || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.') || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.') || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 5.')) {
    echo "WTF!!! I don't understand this browser?";
    exit;
}

require './core/engine/PhpConsole.php';
PhpConsole::start();

require './core/engine/MainController.php';
require './core/engine/MainModel.php';
require './core/engine/MainView.php';

require './core/engine/Database.php';
require './core/engine/Session.php';
require './core/engine/Hash.php';
require './core/engine/CustomFunction.php';
require './core/engine/ExceptionHandler.php';
require './core/engine/Mail.php';
require './core/engine/Logger.php';
require './core/engine/Plugin.php';

require './config.php';
require './core/engine/Bootstrap.php';

Bootstrap::setHome("main");
Bootstrap::run();

?>
