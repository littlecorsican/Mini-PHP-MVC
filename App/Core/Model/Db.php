<?php

//namespace Framework\App\Core\Model;

class Db {

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            //Throw PDOException;
          }
    }

    public function executeSql($sql) {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt;
    }

    public function preparedStatement($sql,$values) {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($values);
      return $stmt;
    }
    
}





