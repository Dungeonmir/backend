<?php
class RequestJSON
{
	private static $apiURL = "https://jsonplaceholder.typicode.com/";

	const POST = "POST";
	const GET = "GET";
	const PATCH = "PATCH";
	const DELETE = "DELETE";
	private static function curlRequest(string $HTTPmethod, string $endpoint, $data = null)
	{



		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, self::$apiURL . $endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));

		switch ($HTTPmethod) {

			case self::GET:
				break;

			case self::POST:

				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case self::PATCH:
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;

			case self::DELETE:
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
				break;

			default:
				break;
		}
		$response = curl_exec($curl);

		$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ($code > 299) {
			throw new JsonException("Internal server error", 500);
		}
		return $response;
	}

	public static function printJSON($json)
	{
		echo '<pre><code>';
		print_r($json);
		echo '</code></pre>';
	}

	public function getPosts(int $userId = null)
	{
		if (is_null($userId)) {
			// Получение всех постов
			return self::curlRequest(self::GET, 'posts/');
		}
		if (is_int($userId)) {
			// Получение постов определенного пользователя
			return self::curlRequest(self::GET, 'users/' . $userId . '/posts/');
		}

		throw new JsonException("Bad request", 400);

	}

	public function post(string $action, int $postId = null, int $userId = null, string $title = null, $body = null)
	{
		switch ($action) {
			case 'get':
				return $this->getPost($postId);
			case 'add':
				return $this->addPost($userId, $title, $body);
			case 'change':
				return $this->changePost($postId, $userId, $title, $body);
			case 'delete':
				return $this->deletePost($postId);
			default:
				return null;
		}

	}
	public function getPost(int $postId)
	{
		return self::curlRequest(self::GET, 'posts/' . $postId);
	}
	public function addPost(int $userId = null, string $title = null, $body = null)
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
		return self::curlRequest(
			self::POST,
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
		return self::curlRequest(self::PATCH, 'posts/' . $postId, json_encode($data));
	}
	public function deletePost($postId)
	{
		if (self::curlRequest(self::DELETE, 'posts/' . $postId)) {
			return true;
		}
	}

	public function getTodos(int $userId = null)
	{
		if (is_null($userId)) {
			// Получение всех заданий
			return self::curlRequest(self::GET, 'todos/');
		}
		if (is_int($userId)) {
			// Получение заданий определенного пользователя
			return self::curlRequest(self::GET, 'users/' . $userId . '/todos');
		}
		throw new JsonException("Bad request", 400);
	}
	public function getTodo(int $todoId)
	{
		return self::curlRequest(self::GET, 'todos/' . $todoId);
	}
	public function getUsers()
	{
		return self::curlRequest(self::GET, 'users/');
	}
	public function getUser(int $id)
	{
		return self::curlRequest(self::GET, 'users/' . $id);
	}
}