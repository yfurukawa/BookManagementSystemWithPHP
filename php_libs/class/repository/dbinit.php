<?php

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

