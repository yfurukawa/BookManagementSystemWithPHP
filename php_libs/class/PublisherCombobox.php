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

    public function createPublisherComboboxWithSelected($publisherName) {
        $publisherQuery = new PublisherQuery();
        $publishers = $publisherQuery->publisherListup();
        $contents = '<select name="publishers">';

        foreach($publishers as $publisher) {
            if($this->isSelectedPublisher($publisher['publisherName'], $publisherName)) {
                $contents = $contents.'<option value="'.$publisher['publisherId'].'" selected = "selected" >'.$publisher['publisherName'].'</option>';
            }
            else {
                $contents = $contents.'<option value="'.$publisher['publisherId'].'">'.$publisher['publisherName'].'</option>';
            }
        }
        $contents = $contents.'</select>';

        return $contents;
    }

    private function isSelectedPublisher($publisher, $selectedPublisher) {
        return $publisher == $selectedPublisher;
    }
}