<?php

/*
    incomplete
    1) login system
    3) bootstrap , jquery
    4) namespaces
    5) set up db

*/
session_start();

//require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/App/Core/app.php';
require_once __DIR__ . '/App/Core/Model/Controller.php';
require_once __DIR__ . '/App/Core/Model/Db.php';
require_once __DIR__ . '/App/Core/Model/Utils.php';

$x = new \App();

$u =  $x->getUrl();
$x->render();

