<?php
  class Database{
    private $host = "127.0.0.1";
    private $database_name = "rubrica";
    private $username = "root";
    private $password = "";
    public $conn;
    public function getConnection(){
      $this->conn=NULL;
      try{
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
        $this->conn->exec("set names utf8");
      }catch(PDOException $exception){
        echo ("Nessun collegamento al database:" . $exception->getMessage());
      }
      return $this->conn;
    }

  }
?>
