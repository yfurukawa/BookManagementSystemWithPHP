<?php

    // デバッグ表示
    define("_DEBUG_MODE", false);

    // デプロイ先設定
    // 関連ファイルのデプロイ先ディレクトリ
    define("_PHP_LIBS_DIR", _ROOT_DIR."../../php_libs/");

    // クラスファイル
    define("_CLASS_DIR", _PHP_LIBS_DIR."class/");

    // 環境変数
    define("_SCRIPT_NAME", $_SERVER['SCRIPT_NAME']);

    require_once(_CLASS_DIR.'PublisherListController.php');
    require_once(_CLASS_DIR.'LocationListController.php');
    require_once(_CLASS_DIR.'repository/LocationQuery.php');
    require_once(_CLASS_DIR.'BookListController.php');
    require_once(_CLASS_DIR.'repository/DbConnector.php');
    require_once(_CLASS_DIR.'repository/BookQuery.php');
    require_once(_CLASS_DIR.'repository/DbConnector.php');
    require_once(_CLASS_DIR.'repository/PublisherQuery.php');
