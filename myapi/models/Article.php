<?php

namespace model;

class Article {

	//db
    private $pdo;
    private $table = 'articles';

    //article properties
    public $id;
    public $title;
    public $body;
    public $author_id;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
 
    public function all() {
    	$query = 'SELECT id, title, body, author_id FROM ' . $this->table;

    	$stmt = $this->pdo->prepare($query);

    	$stmt->execute();

    	return $stmt;

    }

    public function show() {
        $query = 'SELECT id, title, body, author_id FROM ' . $this->table . ' WHERE id = ?';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        return $stmt;
    }

    //Create article
    public function create() {
        $query = 'INSERT INTO articles(title, body, author_id) VALUES (:title, :body, :author_id)';

        $stmt = $this->pdo->prepare($query);

        //clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));

        //bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author_id', $this->author_id);

        //execute query
        $stmt->execute();
        
        return $this->pdo->lastInsertId('articles_id_seq');
    }

    public function update() {
        
    }

    public function delete_article() {
        
    }
}