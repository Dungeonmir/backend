<?php
require_once('./autoload.php');
header("Content-type: application/json; charset=utf-8");
$user = new User;
$data = $user->getUser(5);

echo $data;