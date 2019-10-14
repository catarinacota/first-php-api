<?php

require '../vendor/autoload.php';
 
use db\Database as Database;
use model\Article as Article;

try {
    // connect to the PostgreSQL database
    $pdo = Database::get()->connect();
    
	$article = new Article($pdo);

    // get all articles
    $result = $article->all();

    //check if any articles
    if(!empty($result)) {
    	$articles_arr = [];

    	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    		extract($row);

    		$article_item = array(
    			'id' => $id,
    			'title' => $title,
    			'body' => $body,
    			'author_id' => $author_id
    		);

    		array_push($articles_arr, $article_item);
    	}

    	response(200,NULL,$articles_arr);

    } else {
    	response(200,'No articles found',[]);
    }    

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