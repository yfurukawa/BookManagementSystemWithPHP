require_once("php/dbConnector.php");

class LocationList() {
    public listLocation() {
        $dbConnector = new dbConnector();
        $connection = $dbConnector->connectDb();

        print "<table border="1">";
            print "<tr>";
                print "<th>保存場所</th>";
             print "</tr>";
        print "</table>";
    }
}
