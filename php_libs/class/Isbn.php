<?php

require_once('/var/www/php_libs/class/repository/BookQuery.php');

class Isbn {
    private $isbn13 = "";
    private $prefix = "";
    private $groupCode = "";
    private $publisherCode = "";
    private $issueCode = "";
    private $checkdigit = "";

    /**
     * コンストラクタ
     * @param $isbn 接頭コードなしのISBN13
     */
    function __construct($isbn) {
        $this->isbn13 = '978-'.$isbn;
        $this->parseIsbn();
    }

    /** Webページから渡されるISBN番号は、接頭記号が含まれていないのと
     *  -（ハイフン）で各パートが区切られているので、パースする
     *  -（ハイフン）なしのISBN番号を作る
     * @param $isbn ISBN13番号
     * @return なし
    */
    function parseIsbn() {
        list($this->prefix, $this->groupCode, $this->publisherCode, $this->issueCode, $this->checkdigit) = explode('-', $this->isbn13);
    }

    /** ISBN13を返す
     * @param なし
     * @return ISBN13
     */
    public function toIsbn13() {
        return $this->prefix.$this->groupCode.$this->publisherCode.$this->issueCode.$this->checkdigit;
    }

    /** 書籍の登録有無を確認する
     * @param なし
     * @return 問い合わせ結果（登録済み：true、未登録：false）
     */
    function isExistBook() {
        $query = new BookQuery();
        return $query->isExist($this->isbn13);
    }
}