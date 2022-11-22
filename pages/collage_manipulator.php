
<head>
    <title>Box Modeling jQuery Plugin Examples</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<script src="pages/box-modeling.js"></script>

<!-- <div  class="moving_image" data-id="1" style="left: var(--left-1); top: var(--top-1); z-index: var(--zi-1); width: var(--width-1); height: var(--height-1); background-color: green;"></div> -->

    <!-- <img class="active_moving_image" src="https://avatars3.githubusercontent.com/u/9167554?s=460&v=4" draggable=false /> -->
<script>

// this variable will hold whichever object is currently being dragged
var currentlyDragging;

// this variable holds the curent mode (0=move, 1=resize, 2=rotate)
var mode = 0;

// these variables stores the old y position of the cursor (it is updated in whileDragging)
var oldY;

// keep track of the highest z-index so far
var maxZ = 1;

var collage_container_obj = document.getElementById('collage_manipulator_container')

// $("#footer_container").css("z-index", maxZ+2)

var time_at_last_update = performance.now();

function start_up_procedure(){
    
    
    $("#toolchooser").change(changeMode);
    var time_at_last_update = performance.now();
}

// run this code when fully loaded
$(window).load(function () {
    var current_search_query = ""
    start_up_procedure()
    
});


// the following function is called when the mode changes

function changeMode()
{
    // get the index (0 through 2 of the selection
    var selectedIndex = $(this)[0].selectedIndex;
        
    // update the global mode variable
    mode = selectedIndex;
}

if(window.FileReader) { 
  window.addEventListener('load', function() {

    function cancel(e) {
      if (e.preventDefault) { e.preventDefault(); }
      return false;
    }
  
    // Tells the browser that we *can* drop on this target
    collage_container_obj.addEventListener('dragover', cancel, false);
    collage_container_obj.addEventListener('dragenter', cancel, false);
      
    collage_container_obj.addEventListener('drop', droppedImage, false);
  }, false);
} else { 
  document.getElementById('status').innerHTML = 'Your browser does not support the HTML5 FileReader.';
}

function droppedImage(e)
{
    e.preventDefault();
    var dt    = e.dataTransfer;
    var files = dt.files;
    for (var i=0; i<files.length; i++) {
    var file = files[i];
    var reader = new FileReader();
      
    //attach event handlers here...
    reader.readAsDataURL(file);
    reader.addEventListener('loadend', function(e, file) {
    var bin           = this.result; 
    var img = document.createElement("img"); 
    img.file = file;   
    img.src = bin;
    collage_container_obj.appendChild(img);
    $(img).attr("draggable", "false");
}.bindToEventHandler(file), false);
  }
    return false;
}

Function.prototype.bindToEventHandler = function bindToEventHandler() {
  var handler = this;
  var boundParameters = Array.prototype.slice.call(arguments);
  //create closure
  return function(e) {
      e = e || window.event; // get window.event if e argument missing (in IE)   
      boundParameters.unshift(e);
      handler.apply(this, boundParameters);
  }
};

collage_data = {}


function past_image_to_canvas(src,x_position, y_position, rotation, width, height, z_index){
    var new_img = document.createElement("div");

    time_at_last_update = performance.now();

    $(new_img).css("background-image", 'url("' + src + '")'  )
    $(new_img).attr("class", "moving_image")
    $(new_img).attr("data-id", "1")

    $(new_img).css("left", 500)
    $(new_img).css("top", 500)
    $(new_img).css("z-index", 1)

    $(new_img).css("width", "var(--width-1)")

    $(new_img).css("height", "var(--height-1)")

    container_obj = document.getElementById('collage_manipulator_container')
    container_obj.appendChild(new_img);
    runPlugin();
    $(new_img).boxModeling({
            rotate: true,
            resize: true,
            move: true,
        });
    return new_img
}

function save_current_image_data(){
    sessionStorage.setItem("collage_img_information", JSON.stringify(collage_data));
}


function add_new_image(src,x_position,y_position)
{
    new_img = past_image_to_canvas(src,x_position, y_position, 0, null, null, null)
 
    collage_data[src] = ($("#search_input_box").val(), (performance.now() - time_at_last_update)/1000)

    save_current_image_data()
    $(new_img).css("top", y_position);
    $(new_img).css("left", x_position);
}

$('.moving_image').boxModeling({
            rotate: true,
            resize: true,
            move: true,
        });

</script>

<style>
  body { background: #fafafa; }
      .moving_image {
          position: absolute;
          user-select: none;
          transform: translate(-50%, -50%);
          background-size: 100% 100%;
      }

      .resize-handler {
          height: 10px;
          width: 10px;
          background-color: #0055ff;
          position: absolute;
          border-radius: 100px;
          border: 1px solid #ffffff;
          user-select: none;
          display: none;
      }
      .resize-handler:hover {background-color: #0000cc;}
      .resize-handler.rotate {cursor: url('https://findicons.com/files/icons/1620/crystal_project/16/rotate_ccw.png'), auto;}

      :root {
          /* id-1 */
          --left-1: 200px;
          --top-1: 480px;
          --width-1: 200px;
          --height-1: 200px;
          --bg-1: #ffff00cc;
          --zi-1: 1;

          /* id-2 */
          --left-2: 500px;
          --top-2: 480px;
          --width-2: 300px;
          --height-2: 200px;
          --bg-2: #0050ffcc;
          --zi-2: 2;
      }
  </style>


