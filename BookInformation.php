<?php

class BookInformation {
    private $isbn;
    private $title;
    private $author;
    private $description;
    private $publisherId;
    private $thumbnail;
    private $roomId;
    private $tags;

    function __construct($isbn, $title, $author, $description, $publisherId, $thumbnail, $roomId, $tags) {
        $this->isbn        = $isbn;
        $this->title       = $title;
        $this->author      = $author;
        $this->description = $description;
        $this->publisherId = $publisherId;
        $this->thumbnail   = $thumbnail;
        $this->roomId      = $roomId;
        $this->tags        = $tags;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getTitle() {
        return $this->title;
    }

    function getAuthor() {
        return $this->author;
    }

    function getDescription() {
        return $this->description;
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

    function getTags() {
        return $this->tags;
    }
}