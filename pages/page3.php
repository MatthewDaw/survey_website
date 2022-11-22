

<div id="ins_head">
How to make your collage beautiful?
</div>

<div id="img_container">
  <img src="instruction_images/ins1.png" id="ins_image">

  <div id="next_instruction_button_container">
    <button type="button" id="next_instruction_button" class="btn btn-secondary">Next Instruction</button>
  </div>

</div>

<script>
  var current_img_instruction = 1

  $("#next_button").hide()
  $("#button_container").css({"justify-content":"center"})

  var image_name_list = ["instruction_images/ins1.png","instruction_images/ins2.png","instruction_images/ins3.png","instruction_images/ins4.png","instruction_images/ins5.png","instruction_images/ins6.png","instruction_images/ins7.png","instruction_images/ins8.png","instruction_images/ins9.png"]

  $("#ins_image").attr("src",image_name_list[current_img_instruction-1])

  $("#next_instruction_button").click(function() {
    current_img_instruction = Math.min(current_img_instruction+1, image_name_list.length)
      $("#ins_image").attr("src",image_name_list[current_img_instruction-1])
      if (current_img_instruction == image_name_list.length){
        $("#next_instruction_button").hide()
        $("#next_button").show()
        // $("#button_container").css({"justify-content":"space-between"})
      }
  })

function collect_input(){
  return true
}

</script>

<style>

#next_instruction_button{
  width: 100%;
}

#next_instruction_button_container{
  width: 30%;
  display: flex;
  justify-content: center;
  margin-top: 15px;

}

#img_container{
  width: 100%;
  height: 100%;
  display: flex;
  align-items:center;
  justify-content: center;
  flex-direction: column;
}

#ins_head{
  width: 100%;
  height: 40px;
  font-size: 40;
}

#ins_image{
  height: 60%;
}



</style>

