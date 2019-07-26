<?php
define('WEBROOT', str_replace("web/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("web/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'vendor/autoload.php');

$application = new Application();
$application->run();

?>