<?php

require '../vendor/autoload.php';

header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: application/json');
 
use db\Database as Database;
use model\Article as Article;

try {
    // connect to the PostgreSQL database
    $pdo = Database::get()->connect();
    
	$article = new Article($pdo);

	//Get raw posted data

	$data = json_decode(file_get_contents("php://input"));
	printf($data);
	$article->title = $data->title;
	$article->body = $data->body;
	$article->author_id = $data->author_id;

	// if($article->create()) {
	// 	echo json_encode(array('message' => 'Article created'));
	// } else {
	// 	echo json_encode(array('message' => 'Article not created'));
	// }

} catch (\PDOException $e) {
    echo $e->getMessage();
}


function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	
	$json_response = json_encode($response);
	echo $json_response;
}