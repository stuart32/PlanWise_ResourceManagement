<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script
 

<div id="myContainerr">
<?php  if(isset($info)){ if(sizeof($info)){		 ?>
<table id="myTable" class="display table table-striped table-bordered" cellspacing="0" width="100%" margin-left="15px">
    <thead>
			<tr>
				                <th>user Name</th>
                <th>Skill Name</th>
                <th>Skill Level</th>
                <th>Years of Experience</th>
            </tr>
 
     </thead>
     <tbody>
<?php   foreach($info as $user) {  			 ?>
        <tr>
			<td><?php echo $user->username ?></td>
            <td><?php echo $user->skillName ?></td>
            <td><?php echo $user->skillLevel ?></td>
            <td><?php echo $user->experienceYears ?></td>
        </tr>
 <?php
}
?>
    </tbody>
 
     <tfoot>
            <tr>
                <th>Skill Name</th>
                <th>Skill Level</th>
                <th>Years of Experience</th>
            </tr>
        </tfoot>
    </table>
     <?php
}else{ ?>   <h3>There are no skills in the database yet for that user.</h3> <br> <?php } 
}else{ ?> 	<h3>There are no skills in the database yet for that user.</h3> <br> <?php }
?>

	<div class="col-sm-5 ">'+
		<label for="skillName" >Skill:</label>
		<select class="form-control" id="skillName'+taskNum+'_'+ i +'">
			<?php foreach($skills['names'] as $skillName) { ?>
			<option> <?php echo $skillName["skillName"]; ?> </option>
			<?php } ?>
		</select>
	</div>
	<div class="col-sm-3 ">
		<label for="skillLevel" >Level:</label>
		<select class="form-control" id="skillLevel">
			<?php foreach($skills['levels'] as $skillLevel) { ?>
			<option> <?php echo($skillLevel['level']);?> </option>
			<?php } ?>
		</select>
	</div>
	<div class=" input-group-btn noPadding">
		<button id="addSkill" type="button" onclick="addskill()" class="btn btn-default  ">Add Skill</button>
	</div>
	
	<script>	
		function addskill() {
				$("#projectSkills").append(' <li id="pSkills'+x+'_'+y+'_'+$("#projectSkills"+x+"_"+y+" li").length+'" value="'+ $("#skillName"+x+"_"+y).val() +' " onClick="selectSkill('+x+','+y+','+$("#projectSkills"+x+"_"+y+" li").length+')" class="list-group-item skill ">' + $("#skillName"+x+"_"+y).val() + '<span class="label label-primary pull-right">' 
                    + ($("#skillLevel"+x+"_"+y+" option:selected").index() + 1 )+ '</span>' 
                    + '<input type="number" hidden name="task['+ x +'][role]['+ y +'][skill]['+$("#projectSkills"+x+"_"+y+" li").length+'][skillID]" value="'+ ( $("#skillName"+x+"_"+y+" option:selected").index() + 1 )+'"/> '
					+ '<input type="number" hidden name="task['+ x +'][role]['+ y +'][skill]['+$("#projectSkills"+x+"_"+y+" li").length+'][skillLevel]" value="'+ ( $("#skillLevel"+x+"_"+y+" option:selected").index() + 1 )+'"/> '
					+ '</li>');
			};
	</script>
</div>



