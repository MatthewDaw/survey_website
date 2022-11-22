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
        <p>Thank you for taking the survey! Please fill your ID in the box below to begin the survey</p>

        <input type="text" class="form-control" id="mturkID" placeholder="Your Profile / Mturk ID" aria-label="Username" aria-describedby="basic-addon1">

    </div>


</div>

<style>
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

<script>

$("#next_button").html("BEGIN SURVEY")


function collect_input(){
    output_values = {}
    output_values["mturk_id"] = $("#mturkID").val();
    if (output_values["mturk_id"]){
        return output_values
    }
    return false
}

</script>