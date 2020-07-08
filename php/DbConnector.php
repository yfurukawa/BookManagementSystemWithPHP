<?php

class DbConnector {
  private $connection = "";

  public function connectDb() {
    $connection = new mysqli("localhost", "yoshi", "Je2wadfuru", "BookManage");

    if ($connection->connect_error) {
        die('Connect Error: ('.$connection->connect_errno.')'.$connection->connect_error);
    }
    else {
      $connection->set_charset("utf-8");
    }

    return $connection;
  }
    
}
    
?>