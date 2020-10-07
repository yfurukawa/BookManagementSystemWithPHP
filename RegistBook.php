<?php

  /**
   * 書籍情報を登録する
   */

  require_once('/var/www/php_libs/class/repository/BookCommand.php');
  require_once('/var/www/php_libs/class/repository/PublisherCommand.php');
  require_once('/var/www/php_libs/class/repository/PublisherQuery.php');
  require_once('/var/www/php_libs/class/repository/AuthorCommand.php');
  require_once('/var/www/php_libs/class/Isbn.php');
  require_once('/var/www/php_libs/class/Publisher.php');
  require_once('BookInformation.php');

  if(array_key_exists('publisher', $_POST)) {
    $publisherId = $_POST['publisher'];
  }
  elseif(array_key_exists('publisherName', $_POST)) {
    $publisherName = $_POST['publisherName'];
  }
  else {
    $publisherName = "T.B.D.";
  }

  $isbn = new Isbn($_POST['isbn']);
  $publisher = new Publisher($isbn, $publisherName);

  // 出版社がDBにない場合、新規登録してIDを取得する
  if(!$publisher->isExistPublisherCode()) {
    $publisherId = $publisher->registPublisher();
  }
    
  if($publisherId == NULL) {
    $publisherCommand = new PublisherCommand();
    $publisherCommand->registPublisher($isbn->publisherCode(), $publisherName);

    // 新規登録した出版社のIDが登録時に必要になるためIDを取得しなおす
    
    $publisherId = $publisherQuery->getPublisherIdWithName($publisherName);
  }

  // タグは、複数のタグがまとまっているので、分割して登録する
  // タグのIDとISBN番号をマップに登録する

  // 書籍情報を登録する
  $bookInformation = new BookInformation($isbn->toIsbn13(), $_POST['title'], $_POST['authors'], $_POST['description'], $publisherId, $_POST['thumbnail'], $_POST['roomId'], $_POST['tags']);
  $bookCommand = new BookCommand();
  $bookCommand->resisterBook($bookInformation);
