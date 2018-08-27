<?php

require '../Autoloading/Autoloader.php';
\Autoloading\Autoloader::register();

use Controlleur\Routeur\Routeur;

$siteWeb = new Routeur();
$siteWeb->start();




