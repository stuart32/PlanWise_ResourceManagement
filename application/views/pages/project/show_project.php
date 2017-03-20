<section>
    <div class="well well-sm">
      <div class="container" style="margin-top: 30px;">
        <div class="profile-head">
            
          <div class="col-md-4 col-sm-6">
            <div id="map" style="width:40%x;height:400px;background:White">      
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7XTpRX5A-G83XNzV_7ORF-OYKfepSD4g&callback=myOptions"></script>
                <script>
                    var myOptions = {
                        zoom: 14,
                        center: new google.maps.LatLng(55.910213, -3.319792)
                    }

                    var geocoder = new google.maps.Geocoder;
                    var infowindow = new google.maps.InfoWindow;

                    var map = new google.maps.Map(document.getElementById("map"), myOptions);

                    var marker;

                    function placeMarker(location) {
                        geocoder = new google.maps.Geocoder();

                        if (marker) {
                            marker.setPosition(location);
                        } else {
                            marker = new google.maps.Marker({
                                position: location,
                                map: map
                            });
                        }

                        geocoder.geocode({
                            'location': location
                        }, function(results) {
                            if (results[1]) {
                                map.setZoom(15);
                                infowindow.setContent(results[1].formatted_address);
                                infowindow.open(map, marker);
                                var addresslocaion = results[1].formatted_address;
                                //Note  when extracting the location for database input use the variable "addresslocation"
                                
                                
                                
                                //Splits up location string and applys the vaules to hidden html inputs
                                var getcode = addresslocaion.match('[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}');
                                var postcode = getcode[0];
                                var removePost = addresslocaion.replace(postcode,'');
                                var values = removePost.split(',');
                                var streetname = values[0];
                                var city = values[1];
                                var country = values[2];
                                
                                 $("#loca1").val(streetname);
                                 $("#loca2").val(city);
                                 $("#loca3").val(country);
                                 $("#loca4").val(postcode);
                                
                                
                                
                                
                            }
                        });



                    }

                    google.maps.event.addListener(map, 'click', function(event) {
                        placeMarker(event.latLng)
                    });
                </script>

            <h6>Jenifer Smith</h6>
          </div>
          <!--col-md-4 col-sm-4 col-xs-12 close-->
    </div>
    
    
          <div class="col-md8">
            <h5 id="h01"><?php echo $info[0]['title']; ?> </h5>
            <h2 id="h01" style="color: white;">Project Leader:  </h2>
            <p id="p01"> <?php echo $info[0]['firstname'] ?> <?php echo $info[0]['lastname']?></p>
            <p><?php echo $info[0]['email'];?></p>
            <h2 id="h01" style="color: white;">Description: </h2>
            <p> <?php echo $info[0]['description']; ?></p>
            <br>
            <ul>
              <li><span class="glyphicon glyphicon-calendar"></span> <?php echo $info[0]['startDate']; ?> - <?php echo $info[0]['endDate'];?></li>
              <li><span class="glyphicon glyphicon-map-marker"></span> Edinburgh</li>
              <li><span class="glyphicon glyphicon-ok-circle"></span> <?php if($info[0]['completed'] == 0){echo "Active";}else{echo "Completed";}?></li>
              <li><span class="glyphicon glyphicon-ok-sign"></span> On Schedual </li>
              <li><span class="glyphicon glyphicon-gbp"></span> Budget: <?php echo $info[0]['budget']; ?></li>

              <?php 
              if($this->session->accountID == $info[0]['managerID']) 
              {?>
               <a href="<?php echo site_url('edit_project/'.$info[0]['projectID'] ) ?>"> <button type="button" class="btn btn-warning" >Edit Project</button></a>
              <?php 
              }else{ ?>
				<a href="<?php echo site_url('interest_project/'.$info[0]['projectID'] ) ?>"> <button type="button" class="btn btn-warning" >Show Interest</button></a>
             <?php } ?>
              

              
            </ul>


          </div>
          <!--col-md-8 col-sm-8 col-xs-12 close-->
    
</div>
        
        <!--profile-head close-->
    
   <?php

 

   if($tasks == null)
   {
      echo "This project has no tasks";
   }
   else
   {
   foreach ($tasks as $task) {

       ?>

          <div class="panel panel-default">
            <div class="panel-heading"> 

              <h3 class="panel-title"> <?php echo $task['title']; ?></h3>
            </div>
            <div class="panel-body">
              <h3><?php echo $task['startDate']; ?> - <?php echo $task['endDate'];?></h3>

              <br>
         <div class="row">    
        <?php 
          foreach ($roles as $role) {
            if($roles == null)
            {
               echo "This task has no roles";
            }
             else
             {
            ?>
            
                <div class="col-sm-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading"> 
                       <h3 class="panel-title"><?php echo $role['roleName'];?></h3>
                     </div>
                    <div class="panel-body">
                      
                      
                        <h1>Member name</h1>
                        <img src="pictures/Profile-pic.jpg" alt="...">
                          <div class="caption">
                            
                            <p>Software Engineer</p>
                            <p><a href="#" class="btn btn-primary" role="button">Profile</a> </p>
                          </div>
                      
                    </div>
                  </div>
                </div>
             
          <?php
        }
          }
         ?>     

             </div>
          </div>


       <?php
     }
     } 
    ?>


  
      
    



    
    

    <!--start of profile information-->

    <div id="sticky" class="container">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav-menu" role="tablist">
        <li class="active">
          <a href="#profile" role="tab" data-toggle="tab">
            <i class="fa fa-male"></i> Schedual
          </a>
        </li>
        <li>
          <a href="#change" role="tab" data-toggle="tab">
            <i class="fa fa-key"></i> Edit Project
          </a>
        </li>
      </ul>
      <!--nav-tabs close-->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane fade active in" id="profile">
          <div class="container">
            <div class="col-sm-11" style="float:left;">
              
              <!--hve-pro close-->
            </div>
            <!--col-sm-12 close-->
            <br clear="all" />
            






          </div>
          <!--container close-->
        </div>
        <!--tab-pane close-->


        <div class="tab-pane fade" id="change">
          <div class="container fom-main">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="register">Edit Project</h2>
              </div>
              <!--col-sm-12 close-->

            </div>
            <!--row close-->
            <br />
            <div class="row">

              <form class="form-horizontal main_form text-left" action=" " method="post" id="contact_form">
                <fieldset>


                  <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Project Name</label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <input name="first_name" placeholder="Project Name" class="form-control" type="text">
                      </div>
                    </div>
                  </div>

                  <!-- Text input-->

                  <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Project E-mail</label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <input name="last_name" placeholder="Project Email" class="form-control" type="text">
                      </div>
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Project Type</label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <input name="email" placeholder="Project Type" class="form-control" type="text">
                      </div>
                    </div>
                  </div>

                  
                  <!-- Text input-->

                  <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Start date</label></label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <input type='text' class="form-control" placeholder='Start date' name='startDate' id='datepicker' />
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">End date</label></label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <input type='text' class="form-control" placeholder='Start date' name='startDate' id='datepicker' />
                      </div>
                    </div>
                  </div>
                  
                  <script>
  $( function() 
  {$( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy");
  } );
  
  $( function() {
    $( "#datepicker1" ).datepicker();
    $( "#datepicker1" ).datepicker( "option", "dateFormat", "dd/mm/yy");
    
  } );
  
  
  </script>

                  <!-- Text input-->

                  <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Location</label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <textarea class="form-control" name="comment" placeholder="Location"></textarea>
                      </div>
                    </div>
                  </div>


                  <!-- Select Basic -->
                <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Project Description</label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <textarea class="form-control" rows="10" name="comment" placeholder="Project Description"></textarea>
                      </div>
                    </div>
                  </div>
                
                <div class="form-group col-md-12">
                    <label class="col-md-10 control-label">Budget</label>
                    <div class="col-md-12 inputGroupContainer">
                      <div class="input-group">
                        <textarea class="form-control" name="comment" placeholder="Budget"></textarea>
                      </div>
                    </div>
                  </div>
                  
                   <label for="projectSkills">* Skills Required:</label>
  
  <br>
  <br>
  
  <button type="button" class="btn btn-info pull-left" data-toggle="collapse" data-target="#demo">Click to show and select required skills</button></button>
  <div id="demo" class="collapse">
        <br>
        
  
<div class="checkbox checkbox-primary">
                        <input id="checkbox2" type="checkbox" checked>
                        <label for="checkbox2">
                            Primary
                        </label>
                    </div>
        
        
        
        
         <form>
    <div class="checkbox">
      <label><input type="checkbox" value="PHP">PHP</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="HTML">HTML</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="JavaScript">JavaScript</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="SQL">SQL</label>
    </div>
        </form>

  </div>
                  <!--col-md-12 close-->


                  <!-- Buttons Save and Cancel -->
                  <div class="form-group col-md-10">
                    <div class="col-md-6">
                      <button type="submit" class="btn submit-button">Save</button>
                      <button type="submit" class="btn submit-button">Cancel</button>

                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
            <!--row close-->
          </div>
          <!--container close -->
        </div>
        <!--tab-pane close-->
      </div>
      <!--tab-content close-->
    </div>
    <!--container close-->

  </section>
