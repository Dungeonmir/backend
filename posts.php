<?php
require_once('./autoload.php');
header("Content-type: application/json; charset=utf-8");
$post = new Post;
$data = $post->getPosts();

echo $data;