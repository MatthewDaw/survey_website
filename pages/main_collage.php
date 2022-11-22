<head>
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"
                integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
                crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>


<div id="collage_header" >
    Add at least 5 photos and spend at least eight minutes working on the collage. Time left before you can leave this page: <span id="demo">8m 00s</span>
</div>

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


<script>
// Set the date we're counting down to
var countDownDate = new Date(new Date().getTime()+(30*1000));

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
    // $("#button_container").css({"justify-content":"space-between"})
    $("#next_button").show()
    document.getElementById("demo").innerHTML = "0m 0s";
  }
}, 1000);
</script>

</html>

<script>

function collect_input(){
    if (Object.keys(collage_data).length > 4){
        return collage_data
    } else {
        alert("You need to add at least 5 images to collage.")
        return false
    }
}

</script>

<style>
body{
    margin:0;
    padding:0;
}

#collage_header{
    position: absolute;
    width: 100%;
    height: 70px;
    display:flex;
    justify-content: center;
    border-style: solid;
    padding: 5px;
    background-color: white;
    padding-left: 20px;
    z-index: 900001;
    padding-top:40px;
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
    margin-top:65px;
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
    /* text-align: center;
    position: relative;
    padding-top: 20px;
    align-content: center; */
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

/* #footer_container{
    position: absolute;
    display: flex;
    border-top: solid;
    z-index: 6;
    height: 100%;
} */

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
  border-top:solid;
}


</style>

<script>

// $("#right")

</script>
