<?php
require_once "class/config.php";
require_once "class/category.class.php";
$obj = new Category();
$obj->id = $_GET['id'];
$obj->remove();
?>