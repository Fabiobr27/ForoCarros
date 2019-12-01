<?php
// Fabio Benitez Ramirez
require_once "libs/Sesion.php";

session_start();


$ses = Sesion::getInstance();

$ses->close();

$ses->redirect("index.php");




$_SESSION[] = [];

session_destroy();


header("Location: index.php");
