<?php

class DbConnector {
    private $connection = "";
  
    public function connectDb() {
      try {
        $connection = new PDO(_DSN, _DB_USER, _DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $connection;
      }
      catch (PDOException $Exception) {
        die ('エラー：'.$Exception->getMessage());
      }
    }  
  }
 