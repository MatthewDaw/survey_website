<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<script src="pages/html2canvas.min.js" defer></script>

<div id="collage_header" >
    <span style="text-align:center;" >Add at least 5 photos and spend at least eight minutes working on the collage. Time left before you can leave this page: <span id="demo">8m 00s</span></span>
    <button type="button" id="view_collage_toggle" class="btn btn-secondary">View And Name Collage</button>
</div>

<div id="collage_container">
    <div id='parent'>
        <div class='child'>
            <div id="collage_manipulator_container" ondrop="drop(event)" ondragover="allowDrop(event)">
                <?php
                include("collage_manipulator.php")
                ?>
            </div>
        </div>

        <div class="child" id="right_child">

            <div class="toolbar">
                <div class="custom_form_input">
                <input type="text" id="search_input_box" class="form-control custom_input" placeholder="Search Key Word" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button id="search_for_images" class="btn btn-outline-secondary custom_form_button" type="button">Search</button>
        </div>
            </div>
            <div class="editor_container">
                <?php
                include("collage_image_picker.php")
                ?>
            </div>
        </div>
    </div>
</div>

<div id="collage_reviewer">
    <?php
    include("collage_review.php")
    ?>
</div>

<script>
    
populate_collage()

$( "#myModal" ).on('shown', function(){
    alert("I want this to appear after the modal has opened!");
});

// Set the date we're counting down to
var countDownDate = new Date(new Date().getTime()+(3*1000));

$("#button_container").css({"justify-content":"center"})
$("#next_button").hide()

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = " " + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    $("#button_container").css({"justify-content":"space-between"})
    $("#next_button").show()
    document.getElementById("demo").innerHTML = "0m 0s";
  }
}, 1000);
</script>

</html>

<input type="hidden" id="toggle_show_value" val="1"></input>

<script>

$("#view_collage_toggle").click(function() {
    curent_viewing_page = $("#toggle_show_value").val()
    if (curent_viewing_page == 0){
        $("#view_collage_toggle").html("Edit Collage")
        $("#toggle_show_value").val("1")
        $("#collage_container").hide()
        $("#collage_reviewer").show()
        populate_collage()
    } else {
        $("#view_collage_toggle").html("View And Name Collage")
        $("#toggle_show_value").val("0")
        $("#collage_container").show()
        $("#collage_reviewer").hide()
    }
})

$( document ).ready(function() {
    $("#collage_container").show()
    $("#collage_reviewer").hide()
    $("#toggle_show_value").val("0");
})

function collect_input(){
    if (Object.keys(collage_data).length > 4){

        var collage_name = $("#collage_name").val();

        var collage_description = $.trim($("#collage_description").val());

        if (collage_name.length === 0){
            alert("Please give collage a name")
        } else if (collage_description.length < 300){
            alert("Collage Description Must Have At Least 300 Characters")
        } else {
            collage_data['collage_name'] = collage_name
            collage_data['collage_description'] = collage_description
            return collage_data
        }
        return false
    } else {
        alert("You need to add at least 5 images to collage.")
        return false
    }
}

</script>



<style>
#collage_reviewer{
    overflow:scroll;
}

#name_collage_section{
    display:flex;
    flex-direction:row;
}

body{
    margin:0;
    padding:0;
}

#collage_header{
    position: absolute;
    width: 100%;
    height: 100px;
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items:center;
    border-style: solid;
    padding: 5px;
    background-color: white;
    padding-left: 20px;
    z-index: 900001;
    padding-top:40px;
    aligh-items:center;
}

#parent{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: row;
    background-color:white;
}

.child{
    width: 50%;
    border-style: solid;
    flex-direction:column;
    display: flex;
    justify-content: space-start;
}

#right_child{
    background-color:white;
    z-index: 900000;
    border-bottom:solid;
    background-color:white;
    margin-top:95px;
}

#navbar{
    position:absolute;
    right:0;
    top:0;
    z-index: 99000000;
    height: 30px;
}

.toolbar
{
    /* display:block; */
    display: flex;
    align-items: center;
    justify-content: center;
    height: 120px !important;
    width: 100%;
    z-index: 900000;
    border-bottom:solid;
    background-color:white;
}

.editor_container
{
    height: 90%;
    width: 100%;
    text-align: center;
    position: relative;
    background-color:white;
    overflow: scroll;
}

#collage_manipulator_container
{
    height: 90%;
    width: 100%;
    text-align: center;
    text-align: left;
}

.active_moving_image{
    position: absolute;
    height: 200px;
}

#search_input_box{
    width: 400px;
    margin: auto;
    margin-bottom: 5px;
}

.custom_form_input{
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
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

#toggle_collage{
    width: 500px;
}

</style>

<script>

</script>
