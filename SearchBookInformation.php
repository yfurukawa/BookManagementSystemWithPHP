<?php

require_once('/var/www/php_libs/class/repository/BookInformationSearcherWithGoogle.php');
require_once('/var/www/php_libs/class/repository/BookQuery.php');
require_once('/var/www/php_libs/class/repository/PublisherQuery.php');
require_once('/var/www/php_libs/class/repository/PublisherCommand.php');
require_once('/var/www/php_libs/class/PublisherCombobox.php');
require_once('/var/www/php_libs/class/RoomCombobox.php');

$isbn = $_POST['isbn'];

if(isExistBook($isbn)) {
    echo "既に登録済みです";
    exit;
}

$searcher = new BookInformationSearcherWithGoogle();
$results = $searcher->searchInformation($isbn);
$publisherCombobox = makePublisherCombobox($isbn, $results["items"][0]["volumeInfo"]["publisher"]);

$contents = '<table><tr><th>タイトル : </th><td><input type="text" name="title" value="';
$contents .= $results["items"][0]["volumeInfo"]["title"];
$contents .= '"></td></tr>';
$contents .= '<tr><th>説明 : </th><td><input type="textarea" name="description" value="';
$contents .= $results["items"][0]["volumeInfo"]["description"];
$contents .= '"></td></tr>';
$contents .= '<tr><th>出版社 : </th><td>';
$contents .= $publisherCombobox;
$contents .= '</td></tr>';
$contents .= '<tr><th>著者 : </th><td><input type="text" name="thumbnail" id="thumbnail" value="';
$contents .= makeAuthorList($results["items"][0]["volumeInfo"]["authors"]);
$contents .= '"></td></tr>';
$contents .= '<tr><th>サムネイル：</th><td><input type="text" name="thumbnail" id="thumbnail" value="';
$contents .= $results["items"][0]["volumeInfo"]["imageLinks"]["thumbnail"];
$contents .= '"></td></tr>';
$contents .= '</td></tr><tr><th>保管場所</th><td>';
$contents .=(new RoomCombobox())->createRoomCombobox();
$contents .= '</td></tr><tr><th>タグ</th><td><input type="text" name="tags"></td></tr>';
$contents .= "</table>";

echo $contents;

function isExistBook($isbn) {
    $query = new BookQuery();
    return $query->isExist($isbn);
}

function makePublisherCombobox($isbn, $publisherName) {
    $combobox = new PublisherCombobox();

    if(isPublisherNameNull($publisherName) && !isExistPublisherCode($isbn)) {
        return '<input type="text" name="publisher" value="">';
    }
    elseif(isPublisherNameNull($publisherName) && isExistPublisherCode($isbn)) {
        $query = new PublisherQuery();
        $combobox->createPublisherComboboxWithSelected($query->getPublisherNameWithCode());
    }

    if(!isExistPublisherName($publisherName)) {
        resisterPublisherWhenPublisherIsNotExist($isbn, $publisherName);
    }
    return $combobox->createPublisherComboboxWithSelected($publisherName);
}

function isExistPublisherName($publisherName) {
    $query = new PublisherQuery();
    return $query->isExistByName($publisherName);
}

function isExistPublisherCode($isbn) {
    $query = new PublisherQuery();
    return $query->isExistByCode($isbn);
}

function resisterPublisherWhenPublisherIsNotExist($isbn, $publisherName) {
    $command = new PublisherCommand();
    $command->resisterPublisher($isbn, $publisherName);
}

function makeAuthorList($authors) {
    return join(",", $authors);
}

function isPublisherNameNull($publisherName) {
    return $publisherName == "";
}