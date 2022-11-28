<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<div id="page_container">
    <div id="sub_container">
        <h2>Thank you for taking the survey! Please fill your ID in the box below to begin the survey</h2>
        <input type="text" class="form-control" id="mturkID" placeholder="Your Profile / Mturk ID" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <h4>Are you ready to submit your answers?</h4>
        <div id="switch_row">
            <label class="switch" id="switch_button">
                <input type="checkbox" id="check_switch_value">
                <span class="slider round"></span>
              </label>
              <div style="margin-left:15px">I am ready ready to submit my survey responses</div>
        </div>
</div>

<input type="hidden" val="0" id="secret_ajax_response_status">

<input type="hidden" val="0" id="secret_ajax_response">

<style>

#switch_row {
    display: flex;
    flex-direction: row;
}

#page_container{
    width: 100%;
    height: 100%;
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
    gap: 20px;
}

#sub_container{
    width: 45%;
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    align-content: center;
    gap: 20px;
    text-align: center;
}
</style>


<style>



.switch {
  position: relative;
  display: inline-block;
  width: 45px;
  height: 26px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .3s;
  transition: .3s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.slidercontainer {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.container-not-moving {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}


/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  width: 120px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 10%;
  display: inline-block;
  transition: background-color 0.6s ease;
  padding: 10px;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
. {
  animation-name: ;
  animation-duration: 1.5s;
}

@keyframes  {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<style>


#switch_row {
    display: flex;
    flex-direction: row;
}



</style>


<script>

$("#next_button").hide()
$("#button_container").css({"justify-content":"center"})

function collect_input(){
    if ($("#mturkID").val().length > 0 ){
        return $("#mturkID").val()
    } else {
        alert("Please enter a value for the ID")
        return false
    }
    
}
function_running = false
$("#switch_button").click(function() {
        if (!function_running){
            function_running = true
        var is_checked = ($("#check_switch_value").is(":checked"))
        $.ajax({
            type: "POST",
            url: "backend.php?action=verify_id",
            data: "given_mtuk_id=" + $("#mturkID").val(),
            success: function(result) {
                if (is_checked && $("#mturkID").val().length > 0 ){
                    $("#button_container").css({"justify-content":"space-between"})
                    $("#next_button").show()
                }
                else if ($("#mturkID").val().length == 0) {
                    alert("Please enter a value for the ID")
                    $("#next_button").hide();
                    $("#button_container").css({"justify-content":"center"})
                    $("#check_switch_value").attr("checked", false);
                }
                else if (result == 0){
                    alert("Warning, your entered ID is not in our system");
                    $("#next_button").show()
                    $("#button_container").css({"justify-content":"space-between"})
                    $("#check_switch_value").attr("checked", false);
                }
                function_running = false

                }
            })
        }
    })

</script>