<?php
// GoogleでISBN13の番号をキーに書籍情報を検索する
// 必要な情報のすべてが検索できる訳ではない

require_once('/var/www/php_libs/class/repository/BookInformationSearcherWithGoogle.php');
require_once('/var/www/php_libs/class/repository/BookQuery.php');
require_once('/var/www/php_libs/class/RoomCombobox.php');
require_once('/var/www/php_libs/class/Isbn.php');
require_once('/var/www/php_libs/class/Publisher.php');

$isbn = new Isbn($_POST['isbn']);
$isbn13 = $isbn->toIsbn13();

if($isbn->isExistBook()) {
    echo "既に登録済みです";
    exit;
}



$searcher = new BookInformationSearcherWithGoogle();
$results = $searcher->searchInformation($isbn13);

if(array_key_exists('publisher', $results["items"][0]["volumeInfo"])) {
    $publisher = new Publisher($isbn, $results["items"][0]["volumeInfo"]["publisher"]);
}
else {
    $publisher = new Publisher($isbn, NULL);
}

$publisherCombobox = $publisher->makePublisherCombobox();

$contents = '<table><tr><th>タイトル : </th><td><input type="text" name="title" value="';
$contents .= $results["items"][0]["volumeInfo"]["title"];
$contents .= '"></td></tr>';
$contents .= '<tr><th>説明 : </th><td><input type="textarea" name="description" value="';
$contents .= $results["items"][0]["volumeInfo"]["description"];
$contents .= '"></td></tr>';
$contents .= '<tr><th>出版社 : </th><td>';
$contents .= $publisherCombobox;
$contents .= '</td></tr>';
$contents .= '<tr><th>著者 : </th><td><input type="text" name="authors" id="authors" value="';
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

function makeAuthorList($authors) {
    return join(",", $authors);
}
