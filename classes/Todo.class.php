<?php
class Todo
{

	public function getTodos($userId = null)
	{
		$response = null;
		if (is_null($userId)) {
			// Получение всех заданий
			$response = Request::GETrequest('todos/');
		} else {
			// Получение заданий определенного пользователя
			$response = Request::GETrequest('users/' . $userId . '/todos');
		}
		return $response;
	}
	public function getTodo($id)
	{
		return Request::GETrequest('todos/' . $id);
	}

}