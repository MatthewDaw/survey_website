

<div id="full_page">
    <h1>Collage Creation Instructions</h1>
<div id="main_page">
    <div id="left_section">

        <div id="row1">
            <div class="box">
                
                <div class="top_section">
                    <div class="number_circle">1</div>
                </div>
                <div class="text_box">
                    <p>Search for images to add to collage.</p>
                </div>
            </div>
            <div class="box">
                <div class="top_section">
                    <div class="number_circle">2</div>
                </div>

                <div class="text_box">

                    <p>Choose an image that you associate with Scandinavian food the best</p>
                    <p>click and drag the image onto the canvas</p>

                </div>
            </div>
        </div>
        <div id="row2">
            <div class="box">
                <div class="top_section">
                    <div class="number_circle">3</div>
                </div>
                <div class="text_box">
                <p>Position the picture in a way you consider appealing</p>
                <p>Click on the current tool box to change the tool you wish to use for positioning the image.</p>
                </div>
            </div>
            <div class="box">
                
                <div class="top_section">
                    <div class="number_circle">4</div>
                </div>
                <div class="text_box">
                <div id="special_instruction_wrapper">
                        <div class="special_spacing_div">
                        <p>When working on this, be sure to use images that remind you of the eating experience. We don't want images that Scandinavian countries themselves. Avoid using photos that have flags, famous landmarks, or other places or items about the country. We only want images that you remind you of actually eating in Scandinavia.</p>
                        </div>
                        <div class="special_spacing_div" id="special_spacing_div_for_img">
                            <img id="example_image" src="images/good_picture_example.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                

    </div>
    <!-- <div id="right_section">
        <img id="collage_instruction" src="instruction_images/ins0.png">
    </div> -->
</div>
</div>

<script>

function collect_input(){
    return true
}

</script>


<style>


#full_page{
    margin: 30px;
    width: 100%;
    height: 900px;
    display:flex;
    flex-direction: column;
}

#main_page{
    width: 100%;
    display:flex;
    flex-direction: row;
}

#left_section{
    width: 100%;
    height: 750px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    row-gap: 20px;
}

#right_section{
    width: 50%;
    height: 750px;
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
}

#row1{
    width: 100%;
    height: 900px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    
}

#row2{
    width: 100%;
    height: 600px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    
}

.box{
    height: 100%;
    width: 45%;

}

.number_circle{
    border-radius: 100%;
    background-color: blue;
    width: 40px;
    height: 40px;
    color:white;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px;
}

.top_section{
    height: 40px;
    width: 100%;
}

.text_box{
    padding-top:20px;
    width: 100%;
    height: 90%;
}

p{
    font-size: larger;
}

#special_instruction_wrapper{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-content: space-between;
    height: 100%;
}

#example_image{
    width: 60%;
}

.special_spacing_div{
    width: 100%;
}

#special_spacing_div_for_img{
    display: flex;
    justify-content: space-around;
}

#collage_instruction{
    width: 100%;
}

</style>
