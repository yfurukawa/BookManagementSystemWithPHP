<?php

  /**
   * 書籍情報を登録する
   */

  require_once('/var/www/php_libs/class/repository/BookCommand.php');
  require_once('/var/www/php_libs/class/repository/PublisherCommand.php');
  require_once('/var/www/php_libs/class/repository/PublisherQuery.php');
  require_once('/var/www/php_libs/class/repository/AuthorCommand.php');
  require_once('/var/www/php_libs/class/Isbn.php');
  require_once('BookInformation.php');

  $publisherId = $_POST['publisher'];
  $publisherName = $_POST['publisherName'];
  $tags = $_POST['tags'];
 
  // 出版社がDBにない場合、新規登録してIDを取得する
  if($publisherId == NULL) {
    $publisherCommand = new PublisherCommand();
    $publisherCommand->resisterPublisher($_POST['isbn'], $publisherName);

    $publisherQuery = new PublisherQuery();
    $publisherId = $publisherQuery->getPublisherIdWithName($publisherName);
  }

  // タグは、複数のタグがまとまっているので、分割して登録する
  // タグのIDとISBN番号をマップに登録する

  // 書籍情報を登録する
  $isbn = new Isbn($_POST['isbn']);

  $bookInformation = new BookInformation($isbn->toIsbn13(), $_POST['title'], $_POST['description'], $publisherId, $_POST['thumbnail'], $_POST['roomId']);
  $bookCommand = new BookCommand();
  $bookCommand->resisterBook($bookInformation);

  // 著者を登録する
  $authorCommand = new AuthorCommand();
  $authorCommand->resisterAuthor($_POST['isbn'], explode(',', $_POST['authors']));