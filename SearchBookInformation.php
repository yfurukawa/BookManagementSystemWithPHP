<?php
// GoogleでISBN13の番号をキーに書籍情報を検索する
// 必要な情報のすべてが検索できる訳ではない

require_once('/var/www/php_libs/class/repository/BookInformationSearcherWithGoogle.php');
require_once('/var/www/php_libs/class/repository/BookQuery.php');
require_once('/var/www/php_libs/class/repository/PublisherQuery.php');
require_once('/var/www/php_libs/class/repository/PublisherCommand.php');
require_once('/var/www/php_libs/class/PublisherCombobox.php');
require_once('/var/www/php_libs/class/RoomCombobox.php');
require_once('/var/www/php_libs/class/Isbn.php');

$isbn = new Isbn($_POST['isbn']);
$isbn13 = $isbn->toIsbn13();

if($isbn->isExistBook()) {
    echo "既に登録済みです";
    exit;
}

$searcher = new BookInformationSearcherWithGoogle();
$results = $searcher->searchInformation($isbn13);
$publisherCombobox = makePublisherCombobox($isbn13, $results["items"][0]["volumeInfo"]["publisher"]);

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

function makePublisherCombobox($isbn13, $publisherName) {
    $combobox = new PublisherCombobox();

    // Googleで検索できず、DBにも登録されていない場合には
    // 新規登録するためにテキストボックスを表示する
    if(isPublisherNameNull($publisherName) && !isExistPublisherCode($isbn13)) {
        return '<input type="text" name="publisherName">';
    }
    elseif(isPublisherNameNull($publisherName) && isExistPublisherCode($isbn13)) {
        $query = new PublisherQuery();
        $combobox->createPublisherComboboxWithSelected($query->getPublisherNameWithCode($isbn13));
    }

    if(!isExistPublisherName($publisherName)) {
        resisterPublisherWhenPublisherIsNotExist($isbn13, $publisherName);
    }
    return $combobox->createPublisherComboboxWithSelected($publisherName);
}

function isExistPublisherName($publisherName) {
    $query = new PublisherQuery();
    return $query->isExistByName($publisherName);
}

function isExistPublisherCode($isbn13) {
    $query = new PublisherQuery();
    return $query->isExistByIsbnCode($isbn13);
}

function resisterPublisherWhenPublisherIsNotExist($isbn13, $publisherName) {
    $command = new PublisherCommand();
    $command->resisterPublisher($isbn13, $publisherName);
}

function makeAuthorList($authors) {
    return join(",", $authors);
}

function isPublisherNameNull($publisherName) {
    return $publisherName == "";
}
