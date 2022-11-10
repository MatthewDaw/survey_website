<?php
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<div id="navbar">Your Imagination About Food</div>

<div id="main_page_content">
</div>

<div id="footer_container">

    <div id="button_container">
        <button type="button" class="btn btn-primary navigation_button" id="previous_button">Previous</button>
        <button type="button" class="btn btn-primary  navigation_button" id="next_button">Continue</button>
    </div>
  <progress id="progress_bar" value="0" max="100"> 100% </progress>
</div>

<script>

var current_page_number = sessionStorage.getItem("current_page_number");

if (typeof current_page_number == 'undefined'){
    current_page_number = 1
} else {
    current_page_number = parseInt(current_page_number)
}
current_page_number = 1

var page_dictionary = sessionStorage.getItem("page_dictionary");

if (typeof page_dictionary == 'undefined' || page_dictionary == null){
    page_dictionary = {}
} else {
    page_dictionary = JSON.parse(page_dictionary);
}

page_dictionary = {}

var max_page = 10

function prepare_page(){
    // alert(current_page_number)
    sessionStorage.setItem("current_page_number", current_page_number);
    page_data = JSON.stringify(page_dictionary);
    if (current_page_number == max_page){
        mturk_id = page_dictionary[max_page-1]["mturk_id"]
        page_data = JSON.stringify(page_dictionary);
    } else {
        mturk_id = null;
        page_data = null;
    }
    $.ajax({
            type: "POST",
            url: "backend.php?action=get_next_page",
            data: "current_page=" + current_page_number + "&survey_results="+page_data + "&mturk_id="+mturk_id,
            success: function(result) {
                $("#main_page_content").html(result);
                if ( typeof start_up_procedure == 'function' ) {
                    start_up_procedure()
                }
                }
            })
        $("#progress_bar").val(100*((current_page_number-1)/(max_page-1)))
        if (current_page_number == 1){
            $("#button_container").css({"justify-content":"center"})
            $("#previous_button").hide()
            $("#next_button").show()
        } else if(current_page_number == max_page){
            $("#button_container").css({"justify-content":"center"})
            $("#previous_button").hide()
            $("#next_button").hide()
        } else {
            $("#button_container").css({"justify-content":"space-between"})
            $("#previous_button").show()
            $("#next_button").show()
        }
    }
prepare_page()

$("#next_button").click(function() {
        results = collect_input();
        if (results != false){
            sessionStorage.setItem(current_page_number, JSON.stringify(results));
            page_dictionary[current_page_number] = results
            // alert(current_page_number)
            current_page_number = parseInt(current_page_number) + 1
            prepare_page()
        } else if(current_page_number != 5) {
            alert("Please fill out all fields")
        }
})

$("#previous_button").click(function() {
        // page_dictionary[current_page] = collect_input();
        current_page_number = parseInt(current_page_number) - 1
        prepare_page()
})

</script>

<style>

#main_index_container{
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-content: space-between;
  margin: 0; height: 100%; overflow: hidden;
}

#navbar{
    width: 100%;
    height: 30px;
    background-color: rgb(66,66,66);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

#main_page_content{
  width: 100%;
  height: 90%;
}

#footer_container{
  width: 100%;
  height: 100px;
  float: bottom;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 99999999999;
  bottom: 0px;
  background-color: white;
  padding-top:15px;
  position: absolute;
}


#progress_bar{
    margin: 20px;
    width: 900px;
}

html, body {
    margin: 0; height: 100%; overflow: hidden
}

#button_container{
    width: 50%;
    display: flex;
    flex-direction: row;
    justify-content: center;
}

.navigation_button{
    width: 48%;
}

</style>
