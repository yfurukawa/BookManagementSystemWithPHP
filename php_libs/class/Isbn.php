<?php

class Isbn {
    private $isbn = "";
    private $groupCode = "";
    private $publisherCode = "";
    private $issueCode = "";
    private $checkdigit = "";

    /**
     * コンストラクタ
     * @param $isbn 接頭コードなしのISBN13
     */
    function __construct($isbn) {
        $this->isbn = '978-'.$isbn;
    }

    /** Webページから渡されるISBN番号は、接頭記号が含まれていないのと
     *  -（ハイフン）で各パートが区切られているので、パースする
     *  -（ハイフン）なしのISBN番号を作る
     * @param $isbn ISBN13番号
     * @return なし
    */
    function parseIsbn($isbn) {
        list($groupCode, $publisherCode, $issueCode, $checkdigit) = explode('-', $this->isbn);
    }
}