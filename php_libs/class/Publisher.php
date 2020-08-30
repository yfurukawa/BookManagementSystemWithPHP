<?php

require_once('repository/PublisherQuery.php');
require_once('repository/PublisherCommand.php');
require_once('PublisherCombobox.php');

class Publisher {
    private $isbn = NULL; // Isbnオブジェクト
    private $searchedPublisherName = NULL;

    function __construct($isbn, $publisherName) {
        $this->isbn = $isbn;
        $this->searchedPublisherName = $publisherName;
    }

    /** 出版社のコンボボックスを生成する
     * @param なし
     * @return コンボボックスのhtmlコード
     */
    public function makePublisherCombobox() {
        $combobox = new PublisherCombobox();
    
        // Googleで検索できず、DBにも登録されていない場合には
        // 新規登録するためにテキストボックスを表示する
        if($this->isPublisherNameNull() && !$this->isExistPublisherCode()) {
            return '<input type="text" name="publisherName">';
        }
        elseif($this->isPublisherNameNull() && $this->isExistPublisherCode()) {
            $query = new PublisherQuery();
            $combobox->createPublisherComboboxWithSelected($query->getPublisherNameWithCode($this->isbn->publisherCode()));
        }
    /*
        if(!$this->isExistPublisherName()) {
            $this->registPublisher($this->searchedPublisherName, $this->searchedPublisherName);
        }
        */
        return $combobox->createPublisherComboboxWithSelected($this->searchedPublisherName);
    }

    /** DB内に検索された出版社名が存在しているか確認する
     * @param なし
     * @return 結果（存在する：true、存在しない：false）
     */
    public function isExistPublisherName() {
        $query = new PublisherQuery();
        return $query->isExistByName($this->searchedPublisherName);
    }
    
    /** DB内に出版社コードが存在しているか確認する
     * @param なし
     * @return 結果（存在する：true、存在しない：false）
     */
    public function isExistPublisherCode() {
        $query = new PublisherQuery();
        return $query->isExistByIsbnCode($this->isbn->publisherCode());
    }
    
    /** 出版社名が渡されているか確認する
     * @param なし
     * @return 結果（渡されている：true、渡されていない：false）
     */
    public function isPublisherNameNull() {
        return is_null($this->searchedPublisherName);
    }
    
    /** DB内に出版社名が無い場合、新規登録する
     * @param なし
     * @return 登録した出版社のID
     */
    public function registPublisher() {
        $command = new PublisherCommand();
        $command->registPublisher($this->isbn->publisherCode(), $this->searchedPublisherName);

        $query = new PublisherQuery();
        return $query->getPublisherIdWithName($this->searchedPublisherName);
    }

}