<?php
include './classes/ErrorHandler.class.php';
class Request
{
	private static $apiURL = "https://jsonplaceholder.typicode.com/";

	const POST = "POST";
	const GET = "GET";
	const PATCH = "PATCH";
	const DELETE = "DELETE";

	private static function curlRequest($method, $endpoint, $data = null)
	{

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, self::$apiURL . $endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));

		switch ($method) {

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
			$response = ErrorHandler::JSONResponse(500, "The requst wasn't succesful.");
		}
		return $response;
	}
	public static function GETrequest($endpoint)
	{
		$response = self::curlRequest(self::GET, $endpoint);
		if (!$response) {
			return ErrorHandler::JSONResponse(404, 'Resource not found');
		}
		return $response;

	}
	public static function POSTrequest($endpoint, $data)
	{

		$response = self::curlRequest(self::POST, $endpoint, $data);
		return $response;
	}
	public static function PATCHrequest($endpoint, $data)
	{
		$response = self::curlRequest(self::PATCH, $endpoint, $data);
		return $response;
	}
	public static function DELETErequest($endpoint)
	{
		return self::curlRequest(self::DELETE, $endpoint);
	}
}