<?php

class BookInformation {
    private $isbn;
    private $title;
    private $description;
    private $authors;
    private $publisherId;
    private $thumbnail;
    private $roomId;

    function __construct($isbn, $title, $description, $authors, $publisherId, $thumbnail, $roomId) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->description = $description;
        $this->authors = $authors;
        $this->publisherId = $publisherId;
        $this->thumbnail = $thumbnail;
        $this->roomId = $roomId;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getAuthors() {
        return $this->authors;
    }

    function getPublisherId() {
        return $this->publisherId;
    }

    function getThumbnail() {
        return $this->thumbnail;
    }

    function getRoomId() {
        return $this->roomId;
    }
}