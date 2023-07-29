<?php
include './classes/Request.class.php';
class Post
{

	public function getPosts($userId = null)
	{
		if (is_null($userId)) {
			// Получение всех постов
			return Request::GETrequest('posts/');
		}
		// Получение постов пользователя
		return Request::GETrequest('users/' . $userId . '/posts/');
	}
	public function getPost($id)
	{
		return Request::GETrequest('posts/' . $id);
	}
	public function addPost($userId = null, $title = null, $body = null)
	{
		$data = [];
		if ($userId !== null) {
			$data['userId'] = $userId;
		}

		if ($title !== null) {
			$data['title'] = $title;
		}
		if ($body !== null) {
			$data['body'] = $body;
		}
		return Request::POSTrequest(
			'posts/',
			json_encode($data)
		);
	}

	public function changePost($postId, $userId = null, $title = null, $body = null)
	{
		$data = [];
		if ($userId !== null) {
			$data['userId'] = $userId;
		}

		if ($title !== null) {
			$data['title'] = $title;
		}
		if ($body !== null) {
			$data['body'] = $body;
		}
		return Request::PATCHrequest('posts/' . $postId, json_encode($data));
	}
	public function deletePost($postId)
	{
		return Request::DELETErequest('posts/' . $postId);
	}

}