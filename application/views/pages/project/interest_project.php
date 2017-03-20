<section>
    <div class="well well-sm">
      <div class="container" style="margin-top: 30px;">
        <div class="profile-head">
		  <?php if(isset($interest)) { ?>
          <div class="alert alert-info text-center" role="alert">
            <h3>You have shown interest in the project and the project leader of project</h3>
              <strong><?php echo $info[0]['title']; ?></strong>
            <h3>was notified at <?php echo $interest[0]['timestamp']; ?> and you will be considered during the allocation process.</h3>
          </div>
          <?php } else { echo form_open('interest_project/'+); ?>
	        <div class="alert alert-info text-center" role="alert">
			  <h3>You have shown interest in the project and the project leader of project</h3>
              <strong><?php echo $info[0]['title']; ?></strong>
            <h3>was notified at <?php echo $interest[0]['timestamp']; ?> and you will be considered during the allocation process.</h3>
			</div>
		  <?php } ?>
          <div class="col-md-4 col-sm-6">
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
            </ul>


          </div>
		  </div>
		</div>
      </div>
    </div>
</section>

