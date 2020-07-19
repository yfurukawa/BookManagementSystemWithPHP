<?php

require_once('/var/www/php_libs/class/repository/LocationQuery.php');

class LocationListController {
    private $locations = array();
    private $locationQuery;
    private $pubs = NULL;

    public function listLocation() {
        $locationQuery = new LocationQuery();
        $locations = $locationQuery->locationListup();

        if (count($locations) < 1) {
            print ("表示する情報がありません。<br>");
        }
        else {
            foreach($locations as $location) {
                $pubs = $pubs."<tr><td>".$location['roomName']."</td></tr>";
            }
            $contents = '<table border="2"><tbody><tr><th>保管場所</th></tr>';
            $contents = $contents.$pubs;
            $contents = $contents."</tbody></table>";
            print $contents;
        }
    }
}

