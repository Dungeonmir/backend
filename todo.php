<?php
require_once('./autoload.php');
header("Content-type: application/json; charset=utf-8");
$todo = new Todo;
$data = $todo->getTodo(5);

echo $data;