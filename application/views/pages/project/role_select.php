	<script>
 					$('#nextRole button').on('click', function () {
  					  var $btn = $(this).button('loading')
  					  <?php
  					  $roleNumber ++;
  					  $currentRole = $roles[$roleNumber][0]['roleID'];
  					  echo $currentRole;
  					  ?>
    				$btn.button('reset')
  })
</script>

<section>
<div class="container">
<h1>Role Selection</h1>
<br>
<br>
<style type="text/css">

.list-group-item.active {
	background-color: #ABB7B7;
	border-color: #ABB7B7;
}

li .active {
	background-color: orange;
}

</style>

	<section class="col-md-3">

		<h1>Tasks</h1>
		<br>
		<?php 
		$roleNumber = 0;
		$taskNumber = 0;
		$currentTask = $tasks[0]['taskID'];
		$currentRole = $roles[$roleNumber][0]['roleID'];

		foreach($tasks as $task)
		{ ?>


		 <!--<div class="col-sm-6 col-md-3 list-group">-->
			  <a href="#" 
			  <?php if($currentTask == $task['taskID'])
			  		{
			  			?>
			  			class="list-group-item active"
			  			<?php
			  		}
			  		else if( empty($task)) 
						continue;
			  		else
			  		{
			  			?>
			  			class="list-group-item"
			  			<?php
			  		}
			  		?>
			   ><?php echo $task['title']; ?></a>
			<?php } ?>  
			<!--</div>-->


	</section>
	 
	
	<section class="col-md-9" style="background-color: #ABB7B7;">

		<div class="col-md-12">

			<nav aria-label="...">
 			 <ul class="pagination">
 			 	<!--
   			 	<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true"> <?php echo "<<";?> </span></a></li> -->

   			 	<?php 
   			 	foreach($roles as $role)
   			 		{ 	if(empty($role)) 
							continue;
   			 			if($currentRole == $role[0]['roleID'])
   			 				{ ?>

			   				<li class="active"><a href="#"><?php echo $role[0]['roleName'];?> <span class="sr-only">(current)</span></a></li>

			   		<?php   }

			   			else
			   			{ ?>
							<li class="disabled"><a href="#"><?php echo $role[0]['roleName'];?><span class="sr-only"></span></a></li>
							<?php
			   			}
			   		}
			   			?>

   				   			
   				<!--<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true"><?php echo ">>";?> </span></a></li> -->
 			 </ul>
			</nav>

		
			<h1>Selected Staff:</h1>
			<p>Please select employees for each role.</p>
			<br>
				<div class="row">

				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h2>Employee Name</h2>
				        <h3>Employee Position</h3>
				        <ul>
				        	<li>Skill 1</li>
				        	<li>Skill 2</li>
				        	<li>Skill 3</li>
				        </ul>
				        <p><a href="#" class="btn btn-danger btn-xs" role="button">Remove</a> </p>
				      </div>
				    </div>
				  </div>

				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h2>Employee Name</h2>
				        <h3>Employee Position</h3>
				        <ul>
				        	<li>Skill 1</li>
				        	<li>Skill 2</li>
				        	<li>Skill 3</li>
				        </ul>
				        <p><a href="#" class="btn btn-danger btn-xs" role="button">Remove</a> </p>
				      </div>
				    </div>
				  </div>

				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h2>Employee Name</h2>
				        <h3>Employee Position</h3>
				        <ul>
				        	<li>Skill 1</li>
				        	<li>Skill 2</li>
				        	<li>Skill 3</li>
				        </ul>
				        <p><a href="#" class="btn btn-danger btn-xs" role="button">Remove</a> </p>
				      </div>
				    </div>
				  </div>
			</div>
				<br>
		

				<h1>Matching staff for role</h1>

				<br>
				<div class="bs-example">
    <table  class="table table-border"   style="background-color: white; ">
        <thead>
            <tr >
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <td>Position</td>
                <td>Skill Level</td>
                <td>  </td>

            </tr>
        </thead>
        <tbody>
        	<?php 
        	foreach ($match as $m)
        	 { ?>
        		
<!--
            <tr>
                
                <td><?php echo $m['firstname'];?></td>
                <td><?php echo $m['lastname'];?></td>
                <td><?php echo $m['email'];?></td>
                <td>Software Engineer</td>
                <td><?php echo $m['level'];?> </td>
                <td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
            </tr>
-->

           <?php } ?>

          
            <tr>
                
                <td>Peter</td>
                <td>Parker</td>
                <td>peterparker@mail.com</td>
                 <td>Software Engineer</td>
                <td> 5 Years </td>
                <td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
            </tr>
            <tr>
                
                <td>John</td>
                <td>Rambo</td>
                <td>johnrambo@mail.com</td>
                 <td>Software Engineer</td>
                <td> 5 Years </td>
                <td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
            </tr>
            <tr>
                
                <td>John</td>
                <td>Carter</td>
                <td>johncarter@mail.com</td>
                <td>Software Engineer</td>
                <td> 5 Years </td>
                <td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
            </tr>
            <tr>
                
                <td>Peter</td>
                <td>Parker</td>
                <td>peterparker@mail.com</td>
                 <td>Software Engineer</td>
                <td> 5 Years </td>
                <td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
            </tr>
            <tr>
                
                <td>John</td>
                <td>Rambo</td>
                <td>johnrambo@mail.com</td>
                 <td>Software Engineer</td>
                <td> 5 Years </td>
                <td><button id="submit" name="submit" type="submit" class="btn btn-success btn-xs">Add to role</button></td>
            </tr>
        
        </tbody>
    </table>
</div>

			
				

					<!-- Button -->
					<div class="form-group">
					  <div class="col-md-9 control-label">
						<button id="nextRole" name="submit" type="submit" class="btn btn-primary btn-lg">Next Role</button>
					  </div>
					</div>

				


		</div>

		




	</section>
		

</section>
