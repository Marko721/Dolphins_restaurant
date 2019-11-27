<?php

require_once("new_config.php");




class Database {

    public $connection;

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    function __construct() {

        $this->open_db_connection();

    }

    public function open_db_connection() {

        $this->servername = "localhost";
        $this->username   = "root";
        $this->password   = "";
        $this->dbname     = "restoran";
        $this->charset    = "utf8mb4";

        try {

            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;

        } catch (PDOException $e) {
            
            echo "Connection failed: ". $e->getMessage();

        }


        // $this->connection = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // if($this->connection->connect_error) {
        //     die("Database connection failed" . $this->connection->connect_error);
        // }

    }

    public function query($sql) {

        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;

    }

    public function confirm_query($result) {

        if(!$result) {
            die("Query failed " . $this->connection->error);
        }

    }

	public function escape_string($string) {
		return htmlentities($string);

	}

    public function the_insert_id() {

        return $this->connection->lastInsertId();
        
    }



}


$database = new Database();
































?>