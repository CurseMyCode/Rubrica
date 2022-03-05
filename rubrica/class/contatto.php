<?php
  class Utente{
    private $conn;
    private $db_table="utente";
    public $id;
    public $nome;
    public $cognome;
    public $telefono;
    public function __construct($db)
    {
      $this->conn=$db;
    }
    public function getUtenti(){
      $sqlQuery = "SELECT id, nome, cognome FROM ".$this->db_table."";
      $stmt = $this->conn->prepare($sqlQuery);
      $stmt -> execute();
      $contatti = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $contatti;
    }
    public function createUtente($varNome, $varCognome, $varTelefono){
      $sqlQuery = "INSERT INTO ".$this->db_table." SET nome= :nome, cognome= :cognome, telefono= :telefono";
      $stmt=$this->conn->prepare($sqlQuery);
      $this->nome=htmlspecialchars(strip_tags($varNome));
      $this->cognome=htmlspecialchars(strip_tags($varCognome));
      $this->telefono=htmlspecialchars(strip_tags($varTelefono));
      $stmt->bindParam(":nome", $this->nome);
      $stmt->bindParam(":cognome", $this->cognome);
      $stmt->bindParam(":telefono", $this->telefono);
      if($stmt->execute()){
        return TRUE;
      }
      return FALSE;
    }
    public function updateUtente($varId, $varNome, $varCognome, $varTelefono){
        $sqlQuery ="UPDATE ".$this->db_table." SET nome= :nome, cognome= :cognome, telefono= :telefono WHERE id=$varId";
        $stmt=$this->conn->prepare($sqlQuery);
        $this->nome=htmlspecialchars(strip_tags($varNome));
        $this->cognome=htmlspecialchars(strip_tags($varCognome));
        $this->telefono=htmlspecialchars(strip_tags($varTelefono));
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cognome", $this->cognome);
        $stmt->bindParam(":telefono", $this->telefono);
        if($stmt->execute()){
          return TRUE;
        }
        return FALSE;
    }
    public function deleteUtente($id){
      $sqlQuery = "DELETE FROM ".$this->db_table." WHERE id=$id";
      $stmt=$this->conn->prepare($sqlQuery);
      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }
    public function getUtente($id){
      $sqlQuery = "SELECT nome, cognome, telefono FROM ".$this->db_table." WHERE id=$id";
      $stmt = $this->conn->prepare($sqlQuery);
      $stmt -> execute();
      $contatti = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $contatti;
    }
  }
