<?php
require_once('autoload.php');

echo '
<style>
	.post{
	background-color: lightgray;
	padding: 15px;
	text-align: left;
	max-width: 300px;
	}
	.posts{
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
	}
	h1{
		color: #111; font-family: "Helvetica Neue", sans-serif; font-size: 60px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; 
	}
	.invisible{
	opacity: 0;
	}
	.invisible:hover{
	    opacity: 1;
	}
</style>
<H1>Посты</H1>';

echo '<a href="./addPost.php">Добавить пост</a>';
echo '<a href="./changePost.php">Изменить пост</a>';
echo '<a href="./deletePost.php">Удалить пост</a>';
echo '<a href="./posts.php">Все посты</a>';
echo '<a href="./post.php">Определенный пост</a>';

echo '</br>';
echo '<a href="./todo.php">Определенное задание</a>';
echo '<a href="./todos.php">Все задания</a>';

echo '</br>';
echo '<a href="./user.php">Определенный пользователь</a>';
echo '<a href="./users.php">Все пользователи</a>';

$post = new Post();
$json = $post->getPosts();
$posts = json_decode($json);

$user = new User();
$json = $user->getUser(1);
$users = json_decode($json);

echo '<div class="posts">';

foreach ($posts as $post) {

	echo '<div class="post">';
	echo '<p class="invisible">postId = ' . htmlspecialchars($post->id) . '</p>';
	echo '<h3>' . htmlspecialchars($post->title) . '</h3>';
	echo '<p>' . htmlspecialchars($post->body) . '</p>';
	echo '</div>';
}

echo '</div>';