
<img src="images/select_nation_background.png" id="banner_image">

<div id="select_nation_main">

    <div id="select_nation_content">

        <p>We would like to know your familiarity with several nations.</p>

        <p>By "familiarity" we mean your overall awareness of the country, its cultuer, and your understanding of what kind of experiences the country represents. When answering, please consider the following:</p>

            <ol>
                <li>To what extent are you familiar with the following country?</li>
                <li>To what extent are you familiar with the eating experience of the following country?</li>
                <li>Have you lived in the following country?</li>
            </ol>

    </div>

    <div id="form_entry">


        <table class="table table-bordered">
            <thead>
              <tr class="table-active">
                <th scope="col">Country</th>
                <th scope="col">Not at all familiar</th>
                <th scope="col">Slightly Familiar</th>
                <th scope="col">Somewhat Familiar</th>
                <th scope="col">Moderately Familiar</th>
                <th scope="col">Extremely Familiar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Norway</th>
                <td><input type="radio" id="n1" name="norway_familiarity" value="1"></td>
                <td><input type="radio" id="n2" name="norway_familiarity" value="2"></td>
                <td><input type="radio" id="n3" name="norway_familiarity" value="3"></td>
                <td><input type="radio" id="n4" name="norway_familiarity" value="4"></td>
                <td><input type="radio" id="n5" name="norway_familiarity" value="5"></td>
              </tr>
              <tr>
                <th scope="row">Sweeden</th>
                <td><input type="radio" id="s1" name="sweeden_familiarity" value="1"></td>
                <td><input type="radio" id="s2" name="sweeden_familiarity" value="2"></td>
                <td><input type="radio" id="s3" name="sweeden_familiarity" value="3"></td>
                <td><input type="radio" id="s4" name="sweeden_familiarity" value="4"></td>
                <td><input type="radio" id="s5" name="sweeden_familiarity" value="5"></td>
              </tr>

              <tr>
                <th scope="row">Finland</th>
                <td><input type="radio" id="f1" name="finland_familiarity" value="1"></td>
                <td><input type="radio" id="f2" name="finland_familiarity" value="2"></td>
                <td><input type="radio" id="f3" name="finland_familiarity" value="3"></td>
                <td><input type="radio" id="f4" name="finland_familiarity" value="4"></td>
                <td><input type="radio" id="f5" name="finland_familiarity" value="5"></td>
              </tr>

            </tbody>
          </table>

    </div>

</div>

<script>

output_values = {}

data = sessionStorage.getItem(1);

if (typeof data != 'undefined'){
  var obj = JSON.parse(data);
  if (typeof obj["norway_familiarity"] != 'undefined'){
    $("#n"+obj["norway_familiarity"]).prop("checked", true);
  }
  if (typeof obj["sweeden_familiarity"] != 'undefined'){
    $("#s"+obj["sweeden_familiarity"]).prop("checked", true);
  }
  if (typeof obj["findland_familiarity"] != 'undefined'){
    $("#f"+obj["findland_familiarity"]).prop("checked", true);
  }
}

function collect_input(){
  output_values["norway_familiarity"] = $("input[name='norway_familiarity']:checked").val();
  output_values["sweeden_familiarity"] = $("input[name='sweeden_familiarity']:checked").val();
  output_values["findland_familiarity"] = $("input[name='finland_familiarity']:checked").val();

  if(typeof output_values["norway_familiarity"] != 'undefined' &&  typeof output_values["sweeden_familiarity"] != 'undefined' && typeof output_values["findland_familiarity"] != 'undefined'){
    return output_values
  } else {
    return false
  }
}

$("#next_button").html("Next")

</script>


<style>
html, body {
  margin: 0px;
}

#banner_image{
    width: 100%;
    height: 8cm;
}

#select_nation_main{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
    padding: 30px;
    
}

#select_nation_content{
    font-size: larger;
    padding: 30px;
    display: flex;
    flex-direction: column;
    width:30%;
    align-items: center;
}

#form_entry{
    height: 100%;
    width:70%;
}

.table tr{
    height: 100px;
    align-items: center;
}

td, th {
    text-align:center;
    vertical-align: middle !important;
}



</style>