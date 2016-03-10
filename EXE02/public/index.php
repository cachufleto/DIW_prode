<?php
/**
 * User: stagiaire
 * Date: 17/02/2016
 * Time: 12:07
 * Index
 */
/*
PSR-4
Php Standard Requide
pour le autolaoder
spl_autoload_register

Composer
*/

/*
require '../src/Controller/Formation.php';
require '../src/Service/Log/FileLogger.php';
*/

require '../vendor/autoload.php';

/*
$app = new Site\Application;
$app->run();
*/
(new Site\Application('dev'))->run();
