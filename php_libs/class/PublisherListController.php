<?php

require_once('/var/www/php_libs/class/repository/PublisherQuery.php');

class PublisherListController {
    private $publishers = array();
    private $publisherQuery;
    private $pubs = NULL;
    
    public function listPublisher() {
        $publisherQuery = new PublisherQuery();
        $publishers = $publisherQuery->publisherListup();

        if(count($publishers) < 1) {
            print ("表示する情報がありません。<br>");
        }
        else {
            foreach($publishers as $publisher) {
                $pubs = $pubs."<tr><td>".$publisher['publisherName']."</td></tr>";
            }
        }

        $contents = '<table border="2"><tbody><tr><th>出版社</th></tr>';
        $contents = $contents.$pubs;
        $contents = $contents."</tbody></table>";
        print $contents;
    }
}

