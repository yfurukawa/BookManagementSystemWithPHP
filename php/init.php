<?php

    // デバッグ表示
    define("_DEBUG_MODE", false);

    // データベース接続用設定
    // データベース接続ユーザ名
    define("_DB_USER", "yoshi");

    // データベース接続パスワード
    define("_DB_PASSWORD", "Je2wadfuru");

    // データベースホスト名
    define("_DB_HOST", "localhost");

    // データベース名
    define("_DB_NAME", "BookManage");

    // データベースの種類
    define("_DB_TYPE", "mysql");

    // データソースネーム（DSN）
    define("_DSN", _DB_TYPE.":host="._DB_HOST."; dbname="._DB_NAME.";charset=utf8");

    // デプロイ先設定
    // 関連ファイルのデプロイ先ディレクトリ
    define("_PHP_LIBS_DIR", _ROOT_DIR."../../php_libs/");

    // クラスファイル
    define("_CLASS_DIR", _PHP_LIBS_DIR."class/");

    // 環境変数
    define("_SCRIPT_NAME", $_SERVER['SCRIPT_NAME']);

    require_once(_CLASS_DIR.'PublisherListController.php');
    require_once(_CLASS_DIR.'PublisherList.php');
    require_once(_CLASS_DIR.'DbConnector.php');