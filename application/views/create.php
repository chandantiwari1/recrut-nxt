<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css');?>">


    <title>Chandan Tiwari's assignment</title>
  </head>
    <body>

    <div class="container">
        <form action="" method="post"  id="createFrm" name="createFrm">
        <div class="row">
            <div class="col-md-12">
                <h3 class="bg-dark text-white p-3">Chandan Tiwari's assignment</h3>
            </div>

            
                <div class="col-md-12">
                    <h3>Create</h3>
                    <hr>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" value="" class="form-control">
                        <p class="name_error"></p>
                    </div>

                    <div class="form-group">
                        <label for="">Total Sales</label>
                        <input type="number" name="total_sales" id="total_sales" value="" class="form-control">
                        <p class="total_sales"></p>
                    </div>


                    <div class="form-group">
                        <label for="">Country</label>
                        <select name="country" id="country" class="form-control">
                            <option value="">Select a Country</option>
                            <?php 
                            if(!empty($countries)) {
                                foreach ($countries as $country) {
                                    ?>
                                    <option value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>}
                                    <?php
                                }
                            } 
                            ?>
                        </select>
                        <p class="country_error"></p>
                         
                    </div>

                    <div class="form-group">
                        <label for="">State</label>
                        <div id="statesBox">
                            <select name="state" id="state" class="form-control">
                                <option value="">Select a State</option>
                            </select>
                        </div>
                        <p class="state_error"></p>

                    </div>

                    <div class="form-group">
                        <label for="">City</label>
                        <div id="citiesBox">
                            <select name="city" id="city" class="form-control">
                                <option value="">Select a City</option>
                            </select>
                        </div>
                        <p class="city_error"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Invoice</label>
                        <input type="number" name="invoice" id="invoice" value="" class="form-control">
                        <p class="invoice"></p>
                    </div>
                    <!-- <div class="form-group">
                        <label for="">image</label>
                        <input type="file" name="image" id="image" value="" class="form-control">
                        <p class="image"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Date Invoice</label>
                        <input type="date" name="date" id="date" value="" class="form-control" multiple>
                        <p class="date"></p>
                    </div> -->
                    <button class="btn btn-primary" type="submit">Create</button>

                    <a href="<?php echo base_url('home/index')?>" class="btn btn-secondary">BACK</a>

                </div>
            
            

        </div>
        </form>
    </div>
    </body>

    <script src="<?php echo base_url('public/js/jquery-3.5.1.min.js');?>"></script>

    <script>

        $(document).ready(function(){
            $("#country").change(function(){
                // Here we will run an ajax request
                var country_id = $(this).val();  // Selected country id

                $.ajax({
                    url : '<?php echo base_url('home/getStates')?>/',
                    type: 'POST',
                    data:{country_id:country_id},
                    dataType: 'json',
                    success: function(response){
                        if(response['states']) {
                            $("#statesBox").html(response['states']);
                        }
                    }
                });

                
                $("#citiesBox").html("<select name=\"city\" id=\"city\" class=\"form-control\">\
                    <option value=\"\">Select a City</option>\
                </select>");
               
            });


            

            $(document).on("change","#state",function(){
                var state_id = $(this).val();  // Selected state id

                $.ajax({
                    url : '<?php echo base_url('home/getCities')?>/',
                    type: 'POST',
                    data:{state_id:state_id},
                    dataType: 'json',
                    success: function(response){
                        if(response['cities']) {
                            $("#citiesBox").html(response['cities']);
                        }
                    }
                });
                //alert(state_id)
            })
            

        });

        $("#createFrm").submit(function(event){
            event.preventDefault();

            $.ajax({
                url : '<?php echo base_url('home/saveUser')?>',
                type: 'post',
                data: $(this).serializeArray(),
                dataType : 'json',
                success: function(response){
                    if (response['status'] == 0) {
                        if (response['name']) {
                            $(".name_error").html(response['name']);
                        } else {
                            $(".name_error").html("");
                        }

                        if (response['email']) {
                            $(".email_error").html(response['email']);
                        } else {
                            $(".email_error").html("");
                        }

                        if (response['country']) {
                            $(".country_error").html(response['country']);
                        } else {
                            $(".country_error").html("");
                        }

                        if (response['state']) {
                            $(".state_error").html(response['state']);
                        } else {
                            $(".state_error").html("");
                        }

                        if (response['city']) {
                            $(".city_error").html(response['city']);
                        } else {
                            $(".city_error").html("");
                        }
                    } else {
                        window.location.href="<?php echo base_url('home/index')?>";
                    }
                    //console.log(response)
                }
            })
        });

    </script>    




</html>