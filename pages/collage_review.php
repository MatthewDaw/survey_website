
<div id="collage_viewer_editor">
<div id="collage_and_naming_box">
    <h2>Give Your Collage A Name</h2>
    <input type="text" class="form-control" placeholder="Collage Name" aria-label="Username" aria-describedby="basic-addon1" id="collage_name">
    <h2>Please Describe Your Collage</h2>
    <textarea class="form-control" rows="7" placeholder="write at least 300 characters" id="collage_description"></textarea>
    <div id="collage_view"></div>
</div>
</div>

<script>

function populate_collage(){
    $('#collage_view').empty()
    $('#collage_manipulator_container').clone().appendTo('#collage_view');
    $('#collage_view').children().css( "position", "relative" );
    $('#collage_view').children().children().empty()
}

</script>

<style>

#collage_view{
    margin-top: 30px;
    width: 62.5%;
    height: 900px;
    background-color:white;
    overflow: auto;
    margin-bottom: 30px;
}

h2{
    text-align:center;
}

#collage_and_naming_box{
    width: 80%;
    flex-direction: column;
    align-items: center;
    display: flex;
    justify-content: space-around;
}

#collage_viewer_editor{
    margin-top: 350px;
    width: 100%;
    height: 100%;
    align-items: center;
    display: flex;
    justify-content: center;
}

</style>
