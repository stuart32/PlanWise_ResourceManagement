<?php echo validation_errors(); ?>


<!-- FIND THE title VARIABLE BELOW -->

<!-- <?php  echo $title ?> -->
<?php echo form_open('edit_project/'.$project); ?>
<div class="container">
	<form>
	<fieldset>
	<!-- Form Name -->


	<legend >Edit Project Details<legend>

	<label class="col-md-7 control-label">Please fill in the details below(* denotes a required field)</label> <br/><br/>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="projectTitle">Project Title: </label>
	  <div class="col-md-5">
	  <input id="projectTitle" name="projectTitle" type="text" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['title']; }   ?>  > 
	  <span class="help-block">Enter the project title above</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="">Project Email: </label>  
	  <div class="col-md-5">
	  <input id="" name="" type="text" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['email']; }   ?> >
	  <span class="help-block">Enter the project email above</span>  
	  </div>
	</div>
	
	<!-- Date of birth input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="projectType">Project type: </label>  
	  <div class="col-md-5">
	  <input id="projectType" name="projectType" type="text" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['projectTypeID']; }   ?> >
	  <span class="help-block">Enter the project type above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="startDate">Start date: </label>  
	  <div class="col-md-5">
	  <input id="startDate" name="startDate" type="date" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['startDate']; }   ?> >
	  <span class="help-block">Enter the starting date above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="endDate">End date: </label>  
	  <div class="col-md-5">
	  <input id="endDate" name="endDate" type="date" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['endDate']; }   ?> >
	  <span class="help-block">Enter the ending date above</span>  
	  </div>
	</div>
		
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="projectBudget">Budget: </label>  
	  <div class="col-md-5">
	  <input id="projectBudget" name="projectBudget" type="number" placeholder="" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['budget']; }   ?> >
	  <span class="help-block">Enter project budget</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="country">Country: </label>  
	  <div class="col-md-5">
	  <input id="country" name="country" type="text" placeholder="Scotland..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['country']; }   ?> >
	  <span class="help-block">Enter residing country above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="city">City: </label>  
	  <div class="col-md-5">
	  <input id="city" name="city" type="text" placeholder="Edinburgh..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['city']; }   ?> >
	  <span class="help-block">Enter residing city above</span>  
	  </div>
	</div>
	
		<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="postcode">Postcode: </label>  
	  <div class="col-md-5">
	  <input id="postcode" name="postcode" type="text" pattern ="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}"  placeholder="EH11 ABC..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value='".$info[0]['postcode']."'"; }   ?>  >
	  <span class="help-block">Enter postcode above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="streetName">Street Name: </label>  
	  <div class="col-md-5">
	  <input id="streetName" name="streetName" type="text" placeholder="Riccarton Avenue..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['streetName']; }   ?>>
	  <span class="help-block">Enter street name</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="buildingNumber">Building Number: </label>  
	  <div class="col-md-5">
	  <input id="buildingNumber" name="buildingNumber" type="number" placeholder="Insert number..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info[0]['buldingNumber']; }   ?> >
	  <span class="help-block">Enter building number</span>  
	  </div>
	</div>

	

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-9 control-label">
		<button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg">Submit</button>
	  </div>
	</div>
	
	</fieldset>
	</form>
</div>

<div>

