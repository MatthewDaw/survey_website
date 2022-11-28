<div id="main_content">
    <div id="header">
        <h1>Sample Of Good And Not So Good Collages</h1>
    </div>
    <div id="examples">

        <div class="container-not-moving">
            <div class="slidercontainer ">
                <div class="example_container">
                    <div class="example_cell">
                        <img src="images/good_example_collage.png">
                        <div class="sub_example_text_container">
                            This collage is good.
                            <br>
                            For the respondent, the Norwegien eating experience represents the job of spending money. It associates with juicy colors as the orange flowers and the rainbox cocktails. Travelling and laughter are also representative of how the collage maker feels abotu Visa. Skyscrappers represent the fact that this brand is modern and up-to-date.                            
                        </div>
                    </div>
                    <div class="example_cell">
                        <img src="images/bad_example_collage.png">
                        <div class="sub_example_text_container">
                            This collage is not good.
                            <br>
                            This collage contains multiple references to the country.
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="slidercontainer ">
                <div class="numbertext">2 / 3</div>
                    <img src="images/good_bad_collage_examples.png" style="width:100%">
                <div class="text">Caption Two</div>
            </div>

            <div class="slidercontainer ">
                <div class="numbertext">3 / 3</div>
                    <img src="images/good_bad_collage_examples.png" style="width:100%">
                <div class="text">Caption Three</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
    </div>
    <div id="start_making_collage">
        <h2>Are you ready to start working on your collage?</h2>
        <p>You can alwasy return to this page to review the instructions.</p>
        <div id="switch_row">
            <label class="switch" id="switch_button">
                <input type="checkbox" id="check_switch_value">
                <span class="slider round"></span>
              </label>
              <div style="margin-left:15px">I have read the instructions and am ready to start working on my collage</div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

<script>

$(document).ready(function(){
  $("#button_container").css({"justify-content":"center"})
            $("#previous_button").show()
            $("#next_button").hide()
});

    $("#switch_button").click(function() {
        var is_checked = ($("#check_switch_value").is(":checked"))
        if (is_checked){
          $("#button_container").css({"justify-content":"space-between"})
          $("#previous_button").show()
            $("#next_button").show()
        } else {

          $("#button_container").css({"justify-content":"center"})
            $("#previous_button").show()
            $("#next_button").hide()
        }
        
    })

    let slideIndex = 1;
    showSlidesNotMoving(slideIndex);
    
    function plusSlides(n) {
      showSlidesNotMoving(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlidesNotMoving(slideIndex = n);
    }
    
    function showSlidesNotMoving(n) {
      let i;
      let slides = document.getElementsByClassName("slidercontainer");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }

    function collect_input(){
      return true
    }

    </script>

<style>

#fooder_container{
    height: 150px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background-color: red;
}

#pgoress_bar{
    margin: 20px;
    width: 900px;
    color: lightslategray
}

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
</style>

<style>
    * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
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


#main_content{
    padding:20px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    gap: 20px;
}

#header{
    width: 100%;
}

#examples{
    width: 100%;
}

.example_container{
    display: flex;
    flex-direction: row;
    width: 100%;
}

.example_cell{
    width: 50%;
    height: 100%;
}

.sub_example_text_container{
    width: 100%;
}


#start_making_collage{
    width: 100%;
    padding:15px;
}

img {
    width: 100%;
    height: 300px;
    border-style: solid;
    border-color:#717171;
    border-width: 2px;
}

#switch_row {
    display: flex;
    flex-direction: row;
}



</style>
