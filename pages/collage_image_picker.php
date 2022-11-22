

<div id="image_container"></div>

<script>
$("#search_for_images").click(function() {
  // var current_search_query = $("#search_input_box").val();
    $.ajax({
        type: "POST",
        url: "pages/query_google_images.php?action=getImages",
        data: "search_query=" + $("#search_input_box").val(),
        success: function(result) {
            const results_json = JSON.parse(result);
            results_list = results_json['value'];

            list_length = results_list.length;

            elements_to_add = ""
            
            for (let i = 0; i < list_length; i++) {

                resulting_string = "<img draggable='true' ondragstart='drag(event)' class='image_box' id="+"newly_added_image"+i+" src="+JSON.stringify(results_list[i]['url']);
            
                resulting_string += "></img>";
                
                elements_to_add += resulting_string
            }
            $("#image_container").html("")
            $("#image_container").append(elements_to_add);
        }
        
    })
})

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data_id = ev.dataTransfer.getData("text");
  var data = $("#"+data_id).attr("src");
  var x_position = ev.clientX;
  var y_position = ev.clientY;
  add_new_image(data,x_position, y_position)
}

</script>

<style>
.image_box{
    width: 200px;
    height: 200px;
    margin: 15px;
}
</style>
