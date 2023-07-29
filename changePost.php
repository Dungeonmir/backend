<?php
require_once('./autoload.php');
header("Content-type: application/json; charset=utf-8");
$post = new Post;
$data = $post->changePost(5, 2, null, 'This post is about something, this is post`s body');

echo $data;