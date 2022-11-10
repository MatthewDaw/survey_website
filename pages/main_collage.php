<div id="head">
    Add at least 5 photos and spend at least eight minutes working on the collage. Time left before you can leave this page: <span id="demo">8m 00s</span>
</div>

<div id='parent'>
    <div class='child'>

        <div class="toolbar">
    Current Tool: 
        <select id="toolchooser">
            <option>Move</option>
            <option>Resize</option>
            <option>Rotate</option>
            <option>Bring to Front</option>
            <option>Delete</option>
        </select><br/>
        Drag in any image from your computer to add it to the collage 
    </div>

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
    $("#button_container").css({"justify-content":"space-between"})
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

#head{
    width: 100%;
    height: 70px;
    display:flex;
    justify-content: center;
    overflow: scroll;
    z-index: 9999;
    border-style: solid;
    padding: 5px;
    background-color: white;
    padding-left: 20px;
    z-index: 900000;
}

#parent{
    width: 100%;
    height: 95%;
    display: flex;
    flex-direction: row;
    background-color:white;
}

.child{
    width: 50%;
    height: 100%;
    border-style: solid;
    overflow: scroll;
    flex-direction:column;
    display: flex;
    justify-content: space-start;
}

#right_child{
    background-color:white;
}

.toolbar
{
    height: 160px;
    width: 100%;
    text-align: center;
    position: relative;
    z-index: 900000;
    padding-top: 20px;
    align-content: center;
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
}

#collage_manipulator_container
{
    height: 90%;
    width: 100%;
    text-align: center;
    text-align: left;
    overflow: scroll;
}

.active_moving_image{
    position: absolute;
    height: 200px;
}

#search_input_box{
    width: 80%;
    margin: auto;
    margin-bottom: 5px;
}

#footer_container{
    border-top: solid;
}

</style>
