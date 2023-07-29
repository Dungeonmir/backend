<?php

class User
{


	public function getUsers()
	{
		return Request::GETrequest('users/');
	}
	public function getUser(int $id)
	{
		return Request::GETrequest('users/' . $id);
	}

}