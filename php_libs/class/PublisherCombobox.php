<?php

require_once('repository/PublisherQuery.php');

class PublisherCombobox {
    private $publisherQuery;
    private $publishers;
    private $contents;

    function __construct() {
        $this->publisherQuery = new PublisherQuery();
        $this->publishers = $this->publisherQuery->publisherListup();
        $this->contents = '<select name="publisher">';
    }

    public function createPublisherCombobox() {
        foreach($this->publishers as $publisher) {
            $this->contents = $this->contents.'<option value="'.$publisher['publisherId'].'">'.$publisher['publisherName'].'</option>';
        }
        $this->contents = $this->contents.'</select>';
        return $this->contents;
    }

    public function createPublisherComboboxWithSelected($publisherName) {
        foreach($this->publishers as $publisher) {
            if($this->isSelectedPublisher($publisher['publisherName'], $publisherName)) {
                $this->contents = $this->contents.'<option value="'.$publisher['publisherId'].'" selected = "selected" >'.$publisher['publisherName'].'</option>';
            }
            else {
                $this->contents = $this->contents.'<option value="'.$publisher['publisherId'].'">'.$publisher['publisherName'].'</option>';
            }
        }
        $this->contents = $this->contents.'</select>';
        return $this->contents;
    }

    private function isSelectedPublisher($publisher, $selectedPublisher) {
        return $publisher == $selectedPublisher;
    }
}