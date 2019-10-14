<?php

require '../vendor/autoload.php';
 
use db\Database as Database;
use db\CreateTable as CreateTable;
use db\SeedTable as SeedTable;

try {
    // connect to the PostgreSQL database
    $pdo = Database::get()->connect();
    
    // 
    $tableCreator = new CreateTable($pdo);
    $tableCreator->createTables();

    $tableSeeder = new SeedTable($pdo);
    $tableSeeder->seedAuthorsTable();
    $tableSeeder->seedArticlesTable();

    echo 'Tables created and populated!';                 

} catch (\PDOException $e) {
    echo $e->getMessage();
}