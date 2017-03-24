<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );

</script>

<table id="myTable" class="display table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<?php
foreach($info as $project) {?>
				<tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget</th>
            </tr>
<?php
}
?>
	 </thead>
	 <tfoot>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget</th>
            </tr>
        </tfoot>
        <tbody>
			
 <tr>
<td><?php echo $project->title ?></td>
<td><?php echo $project->startDate ?></td>
<td><?php echo $project->endDate ?></td>
<td><?php echo $project->budget ?></td>
 </tr>
    </tbody>
    </table>


