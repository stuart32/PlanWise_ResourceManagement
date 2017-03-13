<?php
foreach($info as $project) {?>
	
	

	<a href="<?php echo site_url('find_project/'.$project->projectID ) ?>"><h1> <?php echo $project->title ?></h1></a>
   
<?php
}
?>