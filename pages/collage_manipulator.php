
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

$("#footer_container").css("z-index", maxZ+2)

function start_up_procedure(){
    $("img").mousedown(startDragging);
    
    $("#collage_manipulator_container").mousemove(whileDragging);
    
    $("#collage_manipulator_container").mouseup(doneDragging);
    
    $("#toolchooser").change(changeMode);
    var time_at_last_update = performance.now();
}

// run this code when fully loaded
$(window).load(function () {
    var current_search_query = ""
    start_up_procedure()
    
});

// start dragging will always fire, then while dragging, and finally done dragging on mouse up

function startDragging(e)
{
    // set this image as the current one to be dragged
    currentlyDragging = $(this);
    
    // set the degrees for this object if it isn't already set, to 0
    if (!currentlyDragging[0].degree)
        currentlyDragging[0].degree = 0;
    
    // mode 3, bring to front
    if (mode == 3)
    {
        // this mode will set the clicked on element's z-index to the front so far, and then increment the max z-index for next time
        currentlyDragging.css("z-index", maxZ);
        $("#right_child").css("z-index", maxZ+2)
        $("#footer_container").css("z-index", maxZ+2)
        maxZ ++;
    }
    
    // mode 4, delete
    else if (mode == 4)
    {
            delete collage_data[currentlyDragging.attr('src')]
            currentlyDragging[0].parentElement.removeChild(currentlyDragging[0]);
            currentlyDragging = null;
            save_current_image_data()
    }
}

function whileDragging(e)
{
    if (currentlyDragging == null)
        return false;
        
    // mode 0, move
    if (mode == 0)
    {
        // for moving, dragging the image moves it to to the new coordinates
        
        // offset the new drag coordinates (by half the image height)
        var newY = e.pageY - $(currentlyDragging).height()/2;
        var newX = e.pageX - $(currentlyDragging).width()/2;

        // adjust the x and y values of the currently being dragged image
        // currentlyDragging.css({"margin-top":newY+"px", "left":newX+"px"});

        top_boundary = $("#collage_manipulator_container").position().top
        bottom_boundary = top_boundary + $("#collage_manipulator_container").height() - $(currentlyDragging).height();
        newY_bottom_bounded = Math.min(newY, bottom_boundary)
        newY_fully_bounded = Math.max(newY_bottom_bounded, top_boundary)

        left_boundary = 0
        right_boundary = $("#collage_manipulator_container").width() - $(currentlyDragging).width();
        newX_bounded = Math.min(newX, right_boundary)
        newX_fully_bounded = Math.max(newX_bounded, left_boundary)

        currentlyDragging.css({"top":newY_fully_bounded+"px", "left":newX_fully_bounded+"px"});

        // currentlyDragging.css({"margin-top":"0px", "margin-left":"0px"});
    }
    // mode 1, resize
    else if (mode == 1)
    {
        // for resizing, dragging the image up makes it larger, down makes it smaller
        
        // to detect if the cursor moved up or down, we need to check if its y value is greater than or less than the y value that it previously held
        if (e.pageY > oldY)
        {
            // dragged down, make it smaller
            currentlyDragging.css({height: '-=10%', width: '-=10%'})
        }
        else if (e.pageY < oldY)
        {
            // dragged up, make it larger
            currentlyDragging.css({height: '+=10%', width: '+=10%'})
        }
        
        // update old Y for the next call to currentlyDragging
        oldY = e.pageY;
    }
    // mode 2, rotate
    else if (mode == 2)
    {
        // for rotating, going up rotates counterclockwise, and going down rotates clockise
        
        if (e.pageY > oldY){
            currentlyDragging[0].degree += 1;
            collage_data[currentlyDragging.attr('src')][2] += 1;
            }
           
        else if (e.pageY < oldY) {
            currentlyDragging[0].degree -= 1;
            collage_data[currentlyDragging.attr('src')][2] -= 1;
        }
            
         // dragged down, make it smaller
        currentlyDragging.css("transform", 'rotate(' + currentlyDragging[0].degree + 'deg)');
            
        // update old Y for the next call to currentlyDragging
        oldY = e.pageY;
    }
}

function doneDragging(e)
{
    // // unset the image that's being dragged
    if (currentlyDragging != null){
        collage_data[currentlyDragging.attr('src')] = [parseInt(currentlyDragging.position().left), parseInt(currentlyDragging.position().top ), collage_data[currentlyDragging.attr('src')][2], $(currentlyDragging).width(), $(currentlyDragging).height(), $(currentlyDragging).css("z-index") ]
        save_current_image_data()
    }
    currentlyDragging = null;
    current_dragging_overflow = 1
    // location.reload();
}


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
        
    // attach the mousedown event to all image tags
    $(img).mousedown(startDragging);
   
        
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

collage_data = sessionStorage.getItem("collage_img_information");

current_dragging_overflow = 1

if (typeof collage_data == 'undefined' || collage_data == null ){
    collage_data = {}
} else {
    collage_data = JSON.parse(collage_data)
    for (const [key, value] of Object.entries(collage_data)) {
         past_image_to_canvas(key,value[0], value[1], value[2], value[3], value[4], value[5])
    }
}

function past_image_to_canvas(src,x_position, y_position, rotation, width, height, z_index){
    var new_img = document.createElement("img");
    $(new_img).attr("src", src)
    $(new_img).attr("class", "active_moving_image")
    $(new_img).attr("draggable", false)
    container_obj = document.getElementById('collage_manipulator_container')
    container_obj.appendChild(new_img);
    $(new_img).attr("draggable", "false");
    $(new_img).mousedown(startDragging);
    $(new_img).css("top", y_position);
    $(new_img).css("left", x_position);

    $(new_img).css("transform", 'rotate(' + rotation+ 'deg)');

    if (width != null){
        $(new_img).css("width", width+"px");
    }

    if (height != null){
        $(new_img).css("height", height+"px");
    }

    if (z_index != null){
        $(new_img).css("z-index", z_index);
    }

    return new_img
}

past_image_to_canvas()

function save_current_image_data(){
    sessionStorage.setItem("collage_img_information", JSON.stringify(collage_data));
}

var time_at_last_update = performance.now();

function add_new_image(src,x_position,y_position)
{
    var current_search_query = $("#search_input_box").val();

    var end = performance.now();

    
    if (src in collage_data){
        alert("You can't have the same image in the collage multiple times")
        return
    }

    new_img = past_image_to_canvas(src,x_position, y_position, 0, null, null, null)

    var y_center_of_image = y_position - $(new_img).height()/2;
    var newY_bounded_by_top = Math.max($("#collage_manipulator_container").position().top + 100, y_center_of_image);
    var bottom_bound = $("#collage_manipulator_container").height() - $(new_img).height()/2;
    var newY_bounded_by_top_and_bottom = Math.min(newY_bounded_by_top,bottom_bound);

    var x_center_of_image = x_position - $(new_img).width()/2;
    var newX_bounded_by_left = Math.max($("#collage_manipulator_container").position().left,x_center_of_image);
    var right_bound = 15+$("#collage_manipulator_container").width() - $(new_img).width();
    var newX_bounded_by_left_and_right = Math.min(newX_bounded_by_left,right_bound);
    
    collage_data[src] = [newX_bounded_by_left_and_right, newY_bounded_by_top_and_bottom, 0, $(new_img).width(), $(new_img).height(), $(new_img).css("z-index")]
    
    save_current_image_data()

    $(new_img).css("top", newY_bounded_by_top_and_bottom);
    $(new_img).css("left", newX_bounded_by_left_and_right);

}

add_new_image("https://cdn.britannica.com/23/523-050-0C120420/cow-Holstein-Friesian.jpg",0,0)

</script>
