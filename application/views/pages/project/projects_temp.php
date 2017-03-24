<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
 
</script>

<div id="myContainerr">
<table id="myTable" class="display table table-striped table-bordered" cellspacing="0" width="100%" margin-left="15px">
    <thead>
                <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget</th>
            </tr>
 
     </thead>
     <tbody>
<?php   foreach($info as $project) {  ?>
        <tr>
            <td><?php echo $project->title ?></td>
            <td><?php echo $project->startDate ?></td>
            <td><?php echo $project->endDate ?></td>
            <td><?php echo $project->budget ?></td>
        </tr>
 <?php
}
?>
    </tbody>
 
     <tfoot>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Budget</th>
            </tr>
        </tfoot>
    </table>
</div>
