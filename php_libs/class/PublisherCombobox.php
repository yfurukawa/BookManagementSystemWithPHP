<?php

require_once('repository/PublisherQuery.php');

class PublisherCombobox {
    public function createPublisherCombobox() {
        $publisherQuery = new PublisherQuery();
        $publishers = $publisherQuery->publisherListup();
        $contents = '<select name="publishers">';

        foreach($publishers as $publisher) {
            $contents = $contents.'<option value="'.$publisher['publisherId'].'">'.$publisher['publisherName'].'</option>';
        }
        $contents = $contents.'</select>';

        return $contents;
    }
}