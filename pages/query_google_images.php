<?php

// error_reporting(E_ERROR | E_PARSE);

// // $cow = "sdfsd"

// // if isset($cow){

if ($_GET['action'] == "getImages" or true){


  $search_query = urlencode($_POST['search_query']);

//   // $search_query = "cow";

  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/ImageSearchAPI?q=".$search_query."&pageNumber=".$_POST['page_number']."&pageSize=280&autoCorrect=true",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 30,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
      "X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com",
      "X-RapidAPI-Key: 4fb78200b7msh1e775a0ff69c959p122641jsn3fbebac91513"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }

}

?>

