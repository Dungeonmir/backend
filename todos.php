<?php
require_once('./autoload.php');
header("Content-type: application/json; charset=utf-8");
$todo = new Todo;
$data = $todo->getTodos();

echo $data;