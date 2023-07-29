<?php
require_once('./autoload.php');
header("Content-type: application/json; charset=utf-8");
$post = new Post;
$data = $post->addPost(4, 'Title of the post', 'This post is about something, this is post`s body');

echo $data;