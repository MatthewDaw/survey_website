


    <main class="container">
        <p class="text-center display-4 fs-4 my-5">
            Thanks for submitting your collage! We now want to ask you more questions about your eating experience in Norway.
        </p>

        <section class="my-5">
            <p>How RELEVANT is your Norweigan food to is to you personally?</p>
            <table class="table table-bordered text-center small text-muted">
                <thead class="align-middle">
                    <tr class="bg-light">
                        <th scope="col">Not at all</th>
                        <th scope="col">Slightly</th>
                        <th scope="col">Somewhat</th>
                        <th scope="col">Moderately</th>
                        <th scope="col">Extremely</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="rv1" name="how_relivant_eating_in_norway" value="1">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                            <input type="radio" id="rv2" name="how_relivant_eating_in_norway" value="2">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                            <input type="radio" id="rv3" name="how_relivant_eating_in_norway" value="3">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                            <input type="radio" id="rv4" name="how_relivant_eating_in_norway" value="4">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                            <input type="radio" id="rv5" name="how_relivant_eating_in_norway" value="5">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="my-5">
            <p>How highly do you REGARD of Norweigan food?</p>
            <table class="table table-bordered text-center small text-muted">
                <thead class="align-middle">
                    <tr class="bg-light">
                        <th scope="col">Not at all</th>
                        <th scope="col">Slightly</th>
                        <th scope="col">Somewhat</th>
                        <th scope="col">Moderately</th>
                        <th scope="col">Extremely</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="rg1" name="how_highly_regard" value="1">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="rg2" name="how_highly_regard" value="2">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="rg3" name="how_highly_regard" value="3">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="rg4" name="how_highly_regard" value="4">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="rg5" name="how_highly_regard" value="5">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="my-5">
            <p>How FREQUENTLY do you eat Norweigan food?</p>
            <table class="table table-bordered text-center small text-muted">
                <thead class="align-middle">
                    <tr class="bg-light">
                        <th scope="col">Not at all</th>
                        <th scope="col">Slightly</th>
                        <th scope="col">Somewhat</th>
                        <th scope="col">Moderately</th>
                        <th scope="col">Extremely</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="fr1" name="how_frequently_eating_in_norway" value="1">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="fr2" name="how_frequently_eating_in_norway" value="2">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="fr3" name="how_frequently_eating_in_norway" value="3">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="fr4" name="how_frequently_eating_in_norway" value="4">
                            </div>
                        </td>
                        <td>
                            <div class="form-check ">
                                <input type="radio" id="fr5" name="how_frequently_eating_in_norway" value="5">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

<style>
p {
    font-size: 22
}
</style>

<script>

output_values = {}

data = sessionStorage.getItem(7);

if (typeof data != 'undefined'){
  var obj = JSON.parse(data);
  if (typeof obj["how_relivant_eating_in_norway"] != 'undefined'){
    $("#rv"+obj["how_relivant_eating_in_norway"]).prop("checked", true);
  }
  if (typeof obj["how_highly_regard"] != 'undefined'){
    $("#rg"+obj["how_highly_regard"]).prop("checked", true);
  }
  if (typeof obj["how_frequently_eating_in_norway"] != 'undefined'){
    $("#fr"+obj["how_frequently_eating_in_norway"]).prop("checked", true);
  }
}

function collect_input(){
  output_values["how_relivant_eating_in_norway"] = $("input[name='how_relivant_eating_in_norway']:checked").val();
  output_values["how_highly_regard"] = $("input[name='how_highly_regard']:checked").val();
  output_values["how_frequently_eating_in_norway"] = $("input[name='how_frequently_eating_in_norway']:checked").val();

  if(typeof output_values["how_relivant_eating_in_norway"] != 'undefined' &&  typeof output_values["how_highly_regard"] != 'undefined' && typeof output_values["how_frequently_eating_in_norway"] != 'undefined'){
    return output_values
  } else {
    return false
  }
}

</script>

