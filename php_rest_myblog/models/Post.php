<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 1/31/2019
 * Time: 11:39 AM
 */

//namespace REST;
//procedure of writing a model, a model corresponds to a specific database table and has only methods that CRUD on that database table
/*
 * 1 - define as private and protected respectively the database parameters i.e. the connection and table name
 * 2 - define as public the variables that will represent the table's columns
 * 3 - define as public the variables that will represent the foreign keys to that table to be fetched from other tables
 * 4 - define the constructor and have it receive the db connection to be instantiated to its argument
 * 5 - define the method you will invoke in the api file
 *      1 - make the query
 *      2 - prepare the query, this returns a statement
 *      3 - if required, bind parameters to the statement using any way you feel confortable with
 *      4 - execute the statement of the query
 *      5 - count rows and check if they are not empty, queries executed return rows remember that
 *      6 - fetch the rows using any FETCH method you want
 *      7 - return the results or return false
 *
 * Note, these steps are not exhaustive and some of them might even be eliminated depending on what you want
 * however steps, 1,2,4,5(1,2,4,5,7) are mandatory for every model
 */

class Post
{
    //database parameters
    private $conn;
    private $table = 'posts';

    //table params
    public $id;
    public $title;
    public $body;
    public $author;
    public $category_id;
    public $created_at;

    //foreign column from another table of categories, to be used to get the category name
    public $category_name;

    //constructor receives the db connection and sets it
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //read method

    public function read(){

        //make query
        $query = "SELECT 
                      p.category_id,
                      p.title,
                      p.body,
                      p.id,
                      p.author,
                      p.created_at,
                      c.name as category_name
 
          FROM $this->table p INNER JOIN categories c ON p.category_id = c.id 
          ORDER BY p.created_at DESC";

        //prepare the statement
        $stmt = $this->conn->prepare($query);
        //execute it
        $stmt->execute();
        //count rows
        $rows = $stmt->rowCount();
        //check for rows
        if($rows > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }
        else{
            return false;
        }



    }

    public function getSingle(){
        $query = "SELECT
                        p.id,
                        c.name as category_name,
                        p.title,
                        p.body,
                        p.author,
                        p.created_at,
                        p.category_id
                        
            FROM $this->table p 
            INNER JOIN categories c ON p.category_id = c.id
            WHERE p.id = :post_id";
        //prepare the query
        $stmt = $this->conn->prepare($query);
        //bind params
        $stmt->bindParam(":post_id", $this->post_id);
        //execute the query
        $stmt->execute();

        $rows = $stmt->rowCount();

        if($rows > 0){

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;



        }
        else{
            return false;
        }

    }
    public  function insert(){
        $query = "INSERT INTO $this->table (category_id, title, body, author) VALUES (:category_id, :title, :body, :author)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":body", $this->body);
        $stmt->bindParam(":author", $this->author);

        if($stmt->execute()){
            return true;
        }

       else{
            return false;
       }

    }

    public  function update(){

        $query = "UPDATE $this->table set category_id=:category_id, title=:title, body=:body, author=:author where id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":body", $this->body);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }

        else{
            return false;
        }

    }
    public function deletePost(){
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }

        else{
            return false;
        }
    }










}