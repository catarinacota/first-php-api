<?php
 
namespace db;

class CreateTable {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
 
    //create tables 
    public function createTables() {
        $sqlList = ['CREATE TABLE IF NOT EXISTS authors (
                        id serial PRIMARY KEY,
                        first_name character varying(255) NOT NULL,
                        last_name character varying(255) NOT NULL,
                        company character varying(255) NOT NULL UNIQUE 
                     );',
                    'CREATE TABLE IF NOT EXISTS articles (
                        id serial PRIMARY KEY,
                        author_id INTEGER NOT NULL,
                        title character varying(255) NOT NULL,
                        body character varying(255) NOT NULL,
                        FOREIGN KEY (author_id) REFERENCES authors(id)
                    );'];
 
        foreach ($sqlList as $sql) {
            $this->pdo->exec($sql);
        }
        
        return $this;
    }
}