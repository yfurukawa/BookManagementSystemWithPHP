<?php

class BookInformationSearcherWithGoogle {

  function searchInformation ($isbnNumber) {
    $result = "";

    $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:";
    $url = $url.$isbnNumber;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    $result = json_decode($response, true);

    curl_close($ch);
    return $result;
  }
}


