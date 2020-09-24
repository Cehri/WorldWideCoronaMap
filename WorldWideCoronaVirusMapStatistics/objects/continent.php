<?php
class Continent{

    // database connection and table name
    private $conn;
    private $table_name = "continent";

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }
}
?>