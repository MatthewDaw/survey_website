<?php
error_reporting(E_ERROR | E_PARSE);

$link = mysqli_connect("mysql.gb.stackcp.com:59618", "main_user-4caa", "asdf134dsg", "survey_website-353030369582");

// $link = mysqli_connect("sdb-54.hosting.stackcp.net", "main_user-4caa", "asdf134dsg", "survey_website-353030369582");

if ($_GET['action'] == "verify_id") {
    $json_string = $_POST['given_mtuk_id'];
    $query = "SELECT * FROM mturk_ids WHERE mturk_ids = '". mysqli_real_escape_string($link, $json_string)."'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0){
        echo 1;
    } else {
        echo 0;
    }   
}

if ($_GET['action'] == "get_next_page") {
    
    $input = file_get_contents('php://input');
    $object = json_decode($input);

    if ($object->current_page == 1){
        include("pages/page1.php");
    }

    elseif ($object->current_page == 2){
        include("pages/page2.php");
    }

    elseif ($object->current_page == 3){
        include("pages/page3.php");
    }

    elseif ($object->current_page == 4){
        include("pages/page4.php");
    }

    elseif ($object->current_page == 5){
        include("pages/main_collage.php");
    }

    elseif ($object->current_page == 6){
        include("pages/page7.php");
    }

    elseif ($object->current_page == 7){
        include("pages/page10.php");
    }

    elseif ($object->current_page == 8){
        include("pages/page11.php");
    }

    elseif ($object->current_page == 9){
        include("pages/survey_end_page.php");
        
    }
    elseif ($object->current_page == 10){
        include("pages/page13.php");
        
        // $resulting_array = json_decode($object->survey_results, true);
        // include("pages/page13.php");
        // $query = "DELETE from user_responses WHERE `mturkID`= '". mysqli_real_escape_string($link, $object->mturk_id)."'";
        // $result = mysqli_query($link, $query);
        // $query = "INSERT INTO user_responses (`mturkID`, `userResponses`) VALUES ('". mysqli_real_escape_string($link, $object->mturk_id)."', '". mysqli_real_escape_string($link, $object->survey_results)."')";
        // $result = mysqli_query($link, $query);        
    }
    else{
        $_SESSION['current_page_number'] = '1';
        include("pages/page1.php");
    }
}

?>