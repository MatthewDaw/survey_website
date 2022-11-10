<?php
error_reporting(E_ERROR | E_PARSE);

if ($_GET['action'] == "get_next_page") {
    if ($_POST['current_page'] == 1){
        include("pages/page1.php");
    }

    if ($_POST['current_page'] == 2){
        include("pages/page2.php");
    }

    if ($_POST['current_page'] == 3){
        include("pages/page3.php");
    }

    if ($_POST['current_page'] == 4){
        include("pages/page5.php");
    }

    if ($_POST['current_page'] == 5){
        include("pages/main_collage.php");
    }

    if ($_POST['current_page'] == 6){
        include("pages/page7.php");
    }

    if ($_POST['current_page'] == 7){
        include("pages/page10.php");
    }

    if ($_POST['current_page'] == 8){
        include("pages/page11.php");
    }

    if ($_POST['current_page'] == 9){
        include("pages/page12.php");
        
    }

    if ($_POST['current_page'] == 10){
        $link = mysqli_connect("localhost", "root", "", "survey_website");
        $query = "INSERT INTO user_responses (`mturkID`, `userResponses`) VALUES ('". mysqli_real_escape_string($link, $_POST["mturk_id"])."', '". mysqli_real_escape_string($link, $_POST["survey_results"])."')";
        $result = mysqli_query($link, $query);
    }
}


?>

