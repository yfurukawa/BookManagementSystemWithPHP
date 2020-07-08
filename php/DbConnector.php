class DbConnector {
  private $connection = "";

  public function connectDb() {
    $connection = new mysqli("localhost", "yoshi", "Je2wadfuru", "BookManage");

    if ($connection->connect_error) {
        die('Connect Error: ('.$connection->connect_errno.')'.$connection->connect_error);
    }
    print "Success";
    return $connection;
  }
  public function close() {
    $connection->close();
  }
    
}
    
