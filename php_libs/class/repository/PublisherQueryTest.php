<?php

require_once('PublisherQuery.php');

$query = new PublisherQuery();

if($query->isExistByIsbnCode('8399')) {
    print("true\n");
}
else {
    print("false\n");
}
