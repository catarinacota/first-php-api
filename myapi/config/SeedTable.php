<?php 

namespace db;

class SeedTable {
    private $pdo;
 
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function seedAuthorsTable() {
        $sql = 'INSERT INTO authors(first_name,last_name,company) VALUES(:first_name,:last_name,:company)';
        $stmt = $this->pdo->prepare($sql);
       
        $authors = [
            ['first_name' => 'John', 'last_name' => 'Smith', 'company' => 'A'],
            ['first_name' => 'Harry', 'last_name' => 'Potter', 'company' => 'B']
        ];

        foreach ($authors as $author) {
            $stmt->bindValue(':first_name', $author['first_name']);
            $stmt->bindValue(':last_name', $author['last_name']);
            $stmt->bindValue(':company', $author['company']);
            $stmt->execute();
        }

        return $this; 
    }

    public function seedArticlesTable() {
        $sql = 'INSERT INTO articles(title,body,author_id) VALUES(:title,:body,:author_id)';
        $stmt = $this->pdo->prepare($sql);
       
        $articles = [
            ['title' => 'New title 1', 'body' => 'body text article 1', 'author_id' => 1],
            ['title' => 'New title 2', 'body' => 'body text article 2', 'author_id' => 2]
        ];

        foreach ($articles as $article) {
            $stmt->bindValue(':title', $article['title']);
            $stmt->bindValue(':body', $article['body']);
            $stmt->bindValue(':author_id', $article['author_id']);
            $stmt->execute();
        }

        return $this; 
    }
}