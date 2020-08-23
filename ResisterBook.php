<?php
  
  require_once('/var/www/php_libs/class/repository/BookCommand.php');
  require_once('/var/www/php_libs/class/repository/PublisherCommand.php');
  require_once('/var/www/php_libs/class/repository/PublisherQuery.php');
  require_once('BookInformation.php');

  $authors = $_POST['authors'];
  $publisherId = $_POST['publisher'];
  $publisherName = $_POST['publisherName'];
  $tags = $_POST['tags'];
 
  // 出版社がDBにない場合、新規登録してIDを取得する必要がある
  if($publisherId == NULL) {
    $publisherCommand = new PublisherCommand();
    $publisherCommand->resisterPublisher($_POST['isbn'], $publisherName);

    $publisherQuery = new PublisherQuery();
    $publisherId = $publisherQuery->getPublisherIdWithName($publisherName);
  }

  // タグは、複数のタグがまとまっているので、分割して登録する
  // タグのIDとISBN番号をマップに登録する

  // 書籍情報を登録する
  $bookInformation = new BookInformation($_POST['isbn'], $_POST['title'], $_POST['description'], $publisherId, $_POST['thumbnail'], $_POST['roomId']);
  $bookCommand = new BookCommand();
  $bookCommand->resisterBook($bookInformation);

  // 著者を登録する
