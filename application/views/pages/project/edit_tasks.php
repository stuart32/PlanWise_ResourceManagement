<div class="container" style="background-color: #ABB7B7; padding: 1%">

 <title>Task Assignment</title>

    <!--
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="./Setting Tasks and Role 2s_files/jquery-ui.js.download"></script>
    <link rel="stylesheet" href="./Setting Tasks and Role 2s_files/jquery-ui.css">


    <!--
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="jquery-3.1.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' />
-->

    <style type="text/css">
        .row {
            margin-top: 40px;
            padding: 0 10px;
        }
        
        .clickable {
            cursor: pointer;
        }
        
        .panel-heading span {
            margin-top: -20px;
            font-size: 15px;
        }

    </style>


    <!--
  <div class="buttons">
    <button type="button" onclick="location.href='http://google.com';" class="btn btn-info">
      <span class="glyphicon glyphicon-user"></span> Profile
    </button>
    <button type="button" onclick="location.href='https://preview.c9users.io/mvv1/stage2/calendar/fullcalendar-3.0.1/demos/agenda-views.html?_c9_id=livepreview1&_c9_host=https://ide.c9.io';" class="btn btn-info ">
      <span class="glyphicon glyphicon-calendar"></span> Calendar
    </button>
      </div>
<div class="page-header">
  <h4>Creating A project : Task Assignment </h4>
</div>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PlanWise</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Home</a></li>
      <li><a href="#">My Account</a></li>
      <li class="active"><a href="#">Create Project</a></li>
      <li><a href="#">Company</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Log Out</a></li>
    </ul>
  </nav>
  </div>
  
-->
    <div class="alert alert-info text-center" role="alert">
        <h3>Create Project tasks and assign roles to the tasks</h3>
        <strong>(Project must contain at least one task)</strong>
        <h4>  </h4>
    </div>
    <form action="http://137.195.15.99/~gg3/index.php/create_tasks" method="post" accept-charset="utf-8">

        <div class="row">
            <div class="col-lg-12 noPadding ">
                <div class="input-group " id="skillSelect">
                    <div class="col-sm-5 ">
                        <label>Task Title:</label>
                        <input type="text" name="taskTitle" id="taskTitle" placeholder="Task Title" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <label>Start Date:</label>
                        <input type="text" class="form-control hasDatepicker" placeholder="Start date" name="startDate" id="datepicker">
                    </div>
                    <div class="col-sm-2 ">
                        <label>End Date:</label>
                        <input type="text" class="form-control hasDatepicker" placeholder="End date" name="endDate" id="datepicker2">
                    </div>
                    <div class="col-sm-2 ">
                        <label>Number of Roles in task:</label>
                        <input type="number" id="numOfPeople" value="1" min="1" class="form-control">
                    </div>
                    <div class=" input-group-btn noPadding">
                        <button id="create_task" type="button" class="btn btn-default  ">Create Task</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Tasks</h3>
                </div>

                <div class="panel-body">
                    Please allocate a member of staff to every task role in the project.
                    <!--            <input type="text" class="form-control" name="taskTitle">-->
                   



                    <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 800px; overflow-y:auto;" id="projectTasks">
                        
                    

                        <?php
                        $taskNo = 0; 
                        foreach($tasks as $task)
                        { echo $taskNo;
                            ?>           


                        <li id="pTask<?php echo $taskNo; ?>" onclick="selectTask(<?php echo $taskNo;?>)" class="">

                            <div id="taskcon" class="panel panel-primary">
                                <div class="panel-heading task foundit" name="task[0]" style="background: rgb(51, 122, 183);"> Task: first task Start Date:14/03/2017 End Date :30/03/2017 Number Of Roles : 1 <a data-toggle="collapse" href="http://137.195.15.99/~gg3/index.php/edit_tasks#<?php echo $task['taskID'];?>" style="color: #C0C0C0;" class="collapsed" aria-expanded="false">  Click to exand/collapse </a> </div>
                        
                                <div id="<?php echo $task['taskID'];?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">


                                <?php
                                $roleNo = 0;
                                foreach($roles[$taskNo] as $role)
                                { 


                                    ?> 





                                    <div id="first_task_roles" class="panel-body">
                                        <input name="task[<?php echo $roleNo; ?>][title]" type="text" value="first_task" hidden="">
                                        <input name="task[<?php echo $roleNo; ?>][startDate]" type="text" value="14/03/2017" hidden="">
                                        <input name="task[<?php echo $roleNo; ?>][endDate]" type="text" value="30/03/2017" hidden="">
                                        <div class="" id="first_task_table">
                                            <label class="text-center">Role Title</label>
                                            <label class="text-center">Number of People</label>
                                            <div class="panel panel-danger" name="0_0" id="first_task0">
                                                <div class="panel-heading role">Role <?php echo $roleNo + 1;?></div>
                                                <div>
                                                    <input name="task[<?php echo $taskNo; ?>][role][<?php echo $roleNo; ?>][name]" type="text" placeholder="Role Title" class="form-control input-md" value="<?php    echo $role['roleName'];   ?>" >
                                                 </div>
                                                <div>
                                                    <input name="task[<?php echo $taskNo; ?>][role][<?php echo $roleNo; ?>][numPeople]" placeholder="1" type="number" class="form-control input-md" value="<?php  echo $role['numPeople'];    ?>"> </div>
                                                <div class="row">
                                                    <div class="col-lg-12 noPadding ">
                                                        <div class="input-group " id="skillSelect">
                                                            <div class="col-sm-5 ">
                                                                <label for="skillName">Skill:</label>
                                                                <select class="form-control" id="skillName0_0">
                                                                    <option> IT governance </option>
                                                                    <option> IT strategy and planning </option>
                                                                    <option> Information management </option>
                                                                    <option> Information systems coordination </option>
                                                                    <option> Information security </option>
                                                                    <option> Information assurance </option>
                                                                    <option> Analytics </option>
                                                                    <option> Information content publishing </option>
                                                                    <option> Consultancy </option>
                                                                    <option> Technical specialism </option>
                                                                    <option> Research </option>
                                                                    <option> IT management </option>
                                                                    <option> Financial management </option>
                                                                    <option> Innovation </option>
                                                                    <option> Business process improvement </option>
                                                                    <option> Enterprise and business architecture </option>
                                                                    <option> Business risk management </option>
                                                                    <option> Sustainability strategy </option>
                                                                    <option> Emerging technology monitoring </option>
                                                                    <option> Continuity management </option>
                                                                    <option> Sustainability management </option>
                                                                    <option> Network planning </option>
                                                                    <option> Solution architecture </option>
                                                                    <option> Data management </option>
                                                                    <option> Methods and tools </option>
                                                                    <option> Portfolio management </option>
                                                                    <option> Programme management </option>
                                                                    <option> Project management </option>
                                                                    <option> Portfolio, programme and project support </option>
                                                                    <option> Business analysis </option>
                                                                    <option> Requirements definition and management </option>
                                                                    <option> Business process testing </option>
                                                                    <option> Change implementation planning and management </option>
                                                                    <option> Organisation design and implementation </option>
                                                                    <option> Benefits management </option>
                                                                    <option> Business modelling </option>
                                                                    <option> Sustainability assessment </option>
                                                                    <option> Systems development management </option>
                                                                    <option> Data analysis </option>
                                                                    <option> Systems design </option>
                                                                    <option> Network design </option>
                                                                    <option> Database design </option>
                                                                    <option> Programming/software development </option>
                                                                    <option> Animation development </option>
                                                                    <option> Safety engineering </option>
                                                                    <option> Sustainability engineering </option>
                                                                    <option> Information content authoring </option>
                                                                    <option> Testing </option>
                                                                    <option> User experience analysis </option>
                                                                    <option> User experience design </option>
                                                                    <option> User experience evaluation </option>
                                                                    <option> Systems integration </option>
                                                                    <option> Porting/software configuration </option>
                                                                    <option> Hardware design </option>
                                                                    <option> Systems installation/decommissioning </option>
                                                                    <option> Availability management </option>
                                                                    <option> Service level management </option>
                                                                    <option> Service acceptance </option>
                                                                    <option> Configuration management </option>
                                                                    <option> Asset management </option>
                                                                    <option> Change management </option>
                                                                    <option> Release and deployment </option>
                                                                    <option> System software </option>
                                                                    <option> Capacity management </option>
                                                                    <option> Security administration </option>
                                                                    <option> Penetration testing </option>
                                                                    <option> Radio frequency engineering </option>
                                                                    <option> Application support </option>
                                                                    <option> IT Infrastructure </option>
                                                                    <option> Database administration </option>
                                                                    <option> Storage management </option>
                                                                    <option> Network support </option>
                                                                    <option> Problem management </option>
                                                                    <option> Incident management </option>
                                                                    <option> Facilities management </option>
                                                                    <option> Learning and development management </option>
                                                                    <option> Learning assessment and evaluation </option>
                                                                    <option> Learning design and development </option>
                                                                    <option> Learning delivery </option>
                                                                    <option> Teaching and subject formation </option>
                                                                    <option> Performance management </option>
                                                                    <option> Resourcing </option>
                                                                    <option> Professional development </option>
                                                                    <option> Quality management </option>
                                                                    <option> Quality assurance </option>
                                                                    <option> Quality standards </option>
                                                                    <option> Conformance review </option>
                                                                    <option> Safety assessment </option>
                                                                    <option> Digital forensics </option>
                                                                    <option> Sourcing </option>
                                                                    <option> Contract management </option>
                                                                    <option> Relationship management </option>
                                                                    <option> Customer service support </option>
                                                                    <option> Digital marketing </option>
                                                                    <option> Selling </option>
                                                                    <option> Sales support </option>
                                                                    <option> Product management </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 ">
                                                                <label for="skillLevel">Level:</label>
                                                                <select class="form-control" id="skillLevel0_0">
                                                                    <option> Follow </option>
                                                                    <option> Assist </option>
                                                                    <option> Apply </option>
                                                                    <option> Enable </option>
                                                                    <option> Ensure, advise </option>
                                                                    <option> Initiate, influence </option>
                                                                    <option> Set strategy, inspire, mobilise </option>
                                                                </select>
                                                            </div>
                                                            <div class=" input-group-btn noPadding">
                                                                <button id="addSkill" type="button" onclick="addskill(0,0)" class="btn btn-default  ">Add Skill</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h3 id="titleSkills" class="panel-title">Skills</h3></div>
                                                        <div class="panel-body">Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.
                                                            <label for="projectSkills">* Skills Required:</label>
                                                            <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;" id="projectSkills0_0">



                                                                <?php 
                                                               $skillNo = 0;

                                                                   // echo $skills[0]['skillName'];
                                                                    foreach($skills[$taskNo][$roleNo] as $skill)
                                                                    { ?>



                                                                <li id="pSkills0_0_0" value="Analytics " onclick="selectSkill(0,0,0)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);"><?php echo $skill['skillName']; echo $skill['skillID']; ?><span class="label label-primary pull-right"><?php echo $skill['skillLevel']; ?></span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][0][skillID]" value="7">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][0][skillLevel]" value="4">
                                                                </li>

<!--
                                                                <li id="pSkills0_0_1" value="Enterprise and business architecture " onclick="selectSkill(0,0,1)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Enterprise and business architecture<span class="label label-primary pull-right">6</span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][1][skillID]" value="16">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][1][skillLevel]" value="6"> </li>
                                                                <li id="pSkills0_0_2" value="Information assurance " onclick="selectSkill(0,0,2)" class="list-group-item skill selectedSkill" style="background: rgb(0, 0, 119); color: rgb(255, 255, 255);">Information assurance<span class="label label-primary pull-right">6</span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][2][skillID]" value="6">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][2][skillLevel]" value="6"> </li>
                                                                <li id="pSkills0_0_3" value="Emerging technology monitoring " onclick="selectSkill(0,0,3)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Emerging technology monitoring<span class="label label-primary pull-right">4</span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][3][skillID]" value="19">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][3][skillLevel]" value="4"> </li>
                                                        
          -->                                                         
                                                                    <?php 
                                                                   
                                                                    }

                                                                    //echo $skills[0]['skillName'];
                                                                    ?>

                                                                    
                                                            </ul>
                                                            <button id="delSkill" type="button" onclick="delskill(0,0)" class="btn btn-primary">Delete Skill</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <?php 
                                    $roleNo ++;
                                    }
                                     ?>  


                                    </div>
                                </div>
                            </div>
                        </li>

                   


                        <!--
                        <li id="pTask1" onclick="selectTask(1)" class="selected">
                            <div id="taskcon" class="panel panel-primary">
                                <div class="panel-heading task foundit" name="task[1]" style="background: rgb(0, 0, 119);"> Task: second task Start Date:31/03/2017 End Date :13/04/2017 Number Of Roles : 3 <a data-toggle="collapse" href="http://137.195.15.99/~gg3/index.php/create_tasks#second_task" style="color: #C0C0C0;" class="" aria-expanded="true">  Click to exand/collapse </a> </div>
                                <div id="second_task" class="panel-collapse collapse in" aria-expanded="true">
                                    <div id="second_task_roles" class="panel-body">
                                        <input name="task[1][title]" type="text" value="second_task" hidden="">
                                        <input name="task[1][startDate]" type="text" value="31/03/2017" hidden="">
                                        <input name="task[1][endDate]" type="text" value="13/04/2017" hidden="">
                                        <div class="" id="second_task_table">
                                            <label class="text-center">Role Title</label>
                                            <label class="text-center">Number of People</label>
                                            <div class="panel panel-danger" name="1_0" id="second_task0">
                                                <div class="panel-heading role">Role 1</div>
                                                <div>
                                                    <input name="task[1][role][0][name]" type="text" placeholder="Role Title" class="form-control input-md"> </div>
                                                <div>
                                                    <input name="task[1][role][0][numPeople]" placeholder="1" type="number" class="form-control input-md"> </div>
                                                <div class="row">
                                                    <div class="col-lg-12 noPadding ">
                                                        <div class="input-group " id="skillSelect">
                                                            <div class="col-sm-5 ">
                                                                <label for="skillName">Skill:</label>
                                                                <select class="form-control" id="skillName1_0">
                                                                    <option> IT governance </option>
                                                                    <option> IT strategy and planning </option>
                                                                    <option> Information management </option>
                                                                    <option> Information systems coordination </option>
                                                                    <option> Information security </option>
                                                                    <option> Information assurance </option>
                                                                    <option> Analytics </option>
                                                                    <option> Information content publishing </option>
                                                                    <option> Consultancy </option>
                                                                    <option> Technical specialism </option>
                                                                    <option> Research </option>
                                                                    <option> IT management </option>
                                                                    <option> Financial management </option>
                                                                    <option> Innovation </option>
                                                                    <option> Business process improvement </option>
                                                                    <option> Enterprise and business architecture </option>
                                                                    <option> Business risk management </option>
                                                                    <option> Sustainability strategy </option>
                                                                    <option> Emerging technology monitoring </option>
                                                                    <option> Continuity management </option>
                                                                    <option> Sustainability management </option>
                                                                    <option> Network planning </option>
                                                                    <option> Solution architecture </option>
                                                                    <option> Data management </option>
                                                                    <option> Methods and tools </option>
                                                                    <option> Portfolio management </option>
                                                                    <option> Programme management </option>
                                                                    <option> Project management </option>
                                                                    <option> Portfolio, programme and project support </option>
                                                                    <option> Business analysis </option>
                                                                    <option> Requirements definition and management </option>
                                                                    <option> Business process testing </option>
                                                                    <option> Change implementation planning and management </option>
                                                                    <option> Organisation design and implementation </option>
                                                                    <option> Benefits management </option>
                                                                    <option> Business modelling </option>
                                                                    <option> Sustainability assessment </option>
                                                                    <option> Systems development management </option>
                                                                    <option> Data analysis </option>
                                                                    <option> Systems design </option>
                                                                    <option> Network design </option>
                                                                    <option> Database design </option>
                                                                    <option> Programming/software development </option>
                                                                    <option> Animation development </option>
                                                                    <option> Safety engineering </option>
                                                                    <option> Sustainability engineering </option>
                                                                    <option> Information content authoring </option>
                                                                    <option> Testing </option>
                                                                    <option> User experience analysis </option>
                                                                    <option> User experience design </option>
                                                                    <option> User experience evaluation </option>
                                                                    <option> Systems integration </option>
                                                                    <option> Porting/software configuration </option>
                                                                    <option> Hardware design </option>
                                                                    <option> Systems installation/decommissioning </option>
                                                                    <option> Availability management </option>
                                                                    <option> Service level management </option>
                                                                    <option> Service acceptance </option>
                                                                    <option> Configuration management </option>
                                                                    <option> Asset management </option>
                                                                    <option> Change management </option>
                                                                    <option> Release and deployment </option>
                                                                    <option> System software </option>
                                                                    <option> Capacity management </option>
                                                                    <option> Security administration </option>
                                                                    <option> Penetration testing </option>
                                                                    <option> Radio frequency engineering </option>
                                                                    <option> Application support </option>
                                                                    <option> IT Infrastructure </option>
                                                                    <option> Database administration </option>
                                                                    <option> Storage management </option>
                                                                    <option> Network support </option>
                                                                    <option> Problem management </option>
                                                                    <option> Incident management </option>
                                                                    <option> Facilities management </option>
                                                                    <option> Learning and development management </option>
                                                                    <option> Learning assessment and evaluation </option>
                                                                    <option> Learning design and development </option>
                                                                    <option> Learning delivery </option>
                                                                    <option> Teaching and subject formation </option>
                                                                    <option> Performance management </option>
                                                                    <option> Resourcing </option>
                                                                    <option> Professional development </option>
                                                                    <option> Quality management </option>
                                                                    <option> Quality assurance </option>
                                                                    <option> Quality standards </option>
                                                                    <option> Conformance review </option>
                                                                    <option> Safety assessment </option>
                                                                    <option> Digital forensics </option>
                                                                    <option> Sourcing </option>
                                                                    <option> Contract management </option>
                                                                    <option> Relationship management </option>
                                                                    <option> Customer service support </option>
                                                                    <option> Digital marketing </option>
                                                                    <option> Selling </option>
                                                                    <option> Sales support </option>
                                                                    <option> Product management </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 ">
                                                                <label for="skillLevel">Level:</label>
                                                                <select class="form-control" id="skillLevel1_0">
                                                                    <option> Follow </option>
                                                                    <option> Assist </option>
                                                                    <option> Apply </option>
                                                                    <option> Enable </option>
                                                                    <option> Ensure, advise </option>
                                                                    <option> Initiate, influence </option>
                                                                    <option> Set strategy, inspire, mobilise </option>
                                                                </select>
                                                            </div>
                                                            <div class=" input-group-btn noPadding">
                                                                <button id="addSkill" type="button" onclick="addskill(1,0)" class="btn btn-default  ">Add Skill</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h3 id="titleSkills" class="panel-title">Skills</h3></div>
                                                        <div class="panel-body">Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.
                                                            <label for="projectSkills">* Skills Required:</label>
                                                            <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;" id="projectSkills1_0">
                                                                <li id="pSkills1_0_0" value="Information security " onclick="selectSkill(1,0,0)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Information security<span class="label label-primary pull-right">3</span>
                                                                    <input type="number" hidden="" name="task[1][role][0][skill][0][skillID]" value="5">
                                                                    <input type="number" hidden="" name="task[1][role][0][skill][0][skillLevel]" value="3"> </li>
                                                                <li id="pSkills1_0_1" value="Sustainability strategy " onclick="selectSkill(1,0,1)" class="list-group-item skill  selectedSkill" style="background: rgb(0, 0, 119); color: rgb(255, 255, 255);">Sustainability strategy<span class="label label-primary pull-right">7</span>
                                                                    <input type="number" hidden="" name="task[1][role][0][skill][1][skillID]" value="18">
                                                                    <input type="number" hidden="" name="task[1][role][0][skill][1][skillLevel]" value="7"> </li>
                                                            </ul>
                                                            <button id="delSkill" type="button" onclick="delskill(1,0)" class="btn btn-primary">Delete Skill</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-danger" name="1_1" id="second_task1">
                                                <div class="panel-heading role">Role 2</div>
                                                <div>
                                                    <input name="task[1][role][1][name]" type="text" placeholder="Role Title" class="form-control input-md"> </div>
                                                <div>
                                                    <input name="task[1][role][1][numPeople]" placeholder="1" type="number" class="form-control input-md"> </div>
                                                <div class="row">
                                                    <div class="col-lg-12 noPadding ">
                                                        <div class="input-group " id="skillSelect">
                                                            <div class="col-sm-5 ">
                                                                <label for="skillName">Skill:</label>
                                                                <select class="form-control" id="skillName1_1">
                                                                    <option> IT governance </option>
                                                                    <option> IT strategy and planning </option>
                                                                    <option> Information management </option>
                                                                    <option> Information systems coordination </option>
                                                                    <option> Information security </option>
                                                                    <option> Information assurance </option>
                                                                    <option> Analytics </option>
                                                                    <option> Information content publishing </option>
                                                                    <option> Consultancy </option>
                                                                    <option> Technical specialism </option>
                                                                    <option> Research </option>
                                                                    <option> IT management </option>
                                                                    <option> Financial management </option>
                                                                    <option> Innovation </option>
                                                                    <option> Business process improvement </option>
                                                                    <option> Enterprise and business architecture </option>
                                                                    <option> Business risk management </option>
                                                                    <option> Sustainability strategy </option>
                                                                    <option> Emerging technology monitoring </option>
                                                                    <option> Continuity management </option>
                                                                    <option> Sustainability management </option>
                                                                    <option> Network planning </option>
                                                                    <option> Solution architecture </option>
                                                                    <option> Data management </option>
                                                                    <option> Methods and tools </option>
                                                                    <option> Portfolio management </option>
                                                                    <option> Programme management </option>
                                                                    <option> Project management </option>
                                                                    <option> Portfolio, programme and project support </option>
                                                                    <option> Business analysis </option>
                                                                    <option> Requirements definition and management </option>
                                                                    <option> Business process testing </option>
                                                                    <option> Change implementation planning and management </option>
                                                                    <option> Organisation design and implementation </option>
                                                                    <option> Benefits management </option>
                                                                    <option> Business modelling </option>
                                                                    <option> Sustainability assessment </option>
                                                                    <option> Systems development management </option>
                                                                    <option> Data analysis </option>
                                                                    <option> Systems design </option>
                                                                    <option> Network design </option>
                                                                    <option> Database design </option>
                                                                    <option> Programming/software development </option>
                                                                    <option> Animation development </option>
                                                                    <option> Safety engineering </option>
                                                                    <option> Sustainability engineering </option>
                                                                    <option> Information content authoring </option>
                                                                    <option> Testing </option>
                                                                    <option> User experience analysis </option>
                                                                    <option> User experience design </option>
                                                                    <option> User experience evaluation </option>
                                                                    <option> Systems integration </option>
                                                                    <option> Porting/software configuration </option>
                                                                    <option> Hardware design </option>
                                                                    <option> Systems installation/decommissioning </option>
                                                                    <option> Availability management </option>
                                                                    <option> Service level management </option>
                                                                    <option> Service acceptance </option>
                                                                    <option> Configuration management </option>
                                                                    <option> Asset management </option>
                                                                    <option> Change management </option>
                                                                    <option> Release and deployment </option>
                                                                    <option> System software </option>
                                                                    <option> Capacity management </option>
                                                                    <option> Security administration </option>
                                                                    <option> Penetration testing </option>
                                                                    <option> Radio frequency engineering </option>
                                                                    <option> Application support </option>
                                                                    <option> IT Infrastructure </option>
                                                                    <option> Database administration </option>
                                                                    <option> Storage management </option>
                                                                    <option> Network support </option>
                                                                    <option> Problem management </option>
                                                                    <option> Incident management </option>
                                                                    <option> Facilities management </option>
                                                                    <option> Learning and development management </option>
                                                                    <option> Learning assessment and evaluation </option>
                                                                    <option> Learning design and development </option>
                                                                    <option> Learning delivery </option>
                                                                    <option> Teaching and subject formation </option>
                                                                    <option> Performance management </option>
                                                                    <option> Resourcing </option>
                                                                    <option> Professional development </option>
                                                                    <option> Quality management </option>
                                                                    <option> Quality assurance </option>
                                                                    <option> Quality standards </option>
                                                                    <option> Conformance review </option>
                                                                    <option> Safety assessment </option>
                                                                    <option> Digital forensics </option>
                                                                    <option> Sourcing </option>
                                                                    <option> Contract management </option>
                                                                    <option> Relationship management </option>
                                                                    <option> Customer service support </option>
                                                                    <option> Digital marketing </option>
                                                                    <option> Selling </option>
                                                                    <option> Sales support </option>
                                                                    <option> Product management </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 ">
                                                                <label for="skillLevel">Level:</label>
                                                                <select class="form-control" id="skillLevel1_1">
                                                                    <option> Follow </option>
                                                                    <option> Assist </option>
                                                                    <option> Apply </option>
                                                                    <option> Enable </option>
                                                                    <option> Ensure, advise </option>
                                                                    <option> Initiate, influence </option>
                                                                    <option> Set strategy, inspire, mobilise </option>
                                                                </select>
                                                            </div>
                                                            <div class=" input-group-btn noPadding">
                                                                <button id="addSkill" type="button" onclick="addskill(1,1)" class="btn btn-default  ">Add Skill</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h3 id="titleSkills" class="panel-title">Skills</h3></div>
                                                        <div class="panel-body">Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.
                                                            <label for="projectSkills">* Skills Required:</label>
                                                            <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;" id="projectSkills1_1">
                                                                <li id="pSkills1_1_0" value="Innovation " onclick="selectSkill(1,1,0)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Innovation<span class="label label-primary pull-right">4</span>
                                                                    <input type="number" hidden="" name="task[1][role][1][skill][0][skillID]" value="14">
                                                                    <input type="number" hidden="" name="task[1][role][1][skill][0][skillLevel]" value="4"> </li>
                                                                <li id="pSkills1_1_1" value="Information security " onclick="selectSkill(1,1,1)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Information security<span class="label label-primary pull-right">4</span>
                                                                    <input type="number" hidden="" name="task[1][role][1][skill][1][skillID]" value="5">
                                                                    <input type="number" hidden="" name="task[1][role][1][skill][1][skillLevel]" value="4"> </li>
                                                                <li id="pSkills1_1_2" value="Continuity management " onclick="selectSkill(1,1,2)" class="list-group-item skill  selectedSkill" style="background: rgb(0, 0, 119); color: rgb(255, 255, 255);">Continuity management<span class="label label-primary pull-right">6</span>
                                                                    <input type="number" hidden="" name="task[1][role][1][skill][2][skillID]" value="20">
                                                                    <input type="number" hidden="" name="task[1][role][1][skill][2][skillLevel]" value="6"> </li>
                                                            </ul>
                                                            <button id="delSkill" type="button" onclick="delskill(1,1)" class="btn btn-primary">Delete Skill</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-danger" name="1_2" id="second_task2">
                                                <div class="panel-heading role">Role 3</div>
                                                <div>
                                                    <input name="task[1][role][2][name]" type="text" placeholder="Role Title" class="form-control input-md"> </div>
                                                <div>
                                                    <input name="task[1][role][2][numPeople]" placeholder="1" type="number" class="form-control input-md"> </div>
                                                <div class="row">
                                                    <div class="col-lg-12 noPadding ">
                                                        <div class="input-group " id="skillSelect">
                                                            <div class="col-sm-5 ">
                                                                <label for="skillName">Skill:</label>
                                                                <select class="form-control" id="skillName1_2">
                                                                    <option> IT governance </option>
                                                                    <option> IT strategy and planning </option>
                                                                    <option> Information management </option>
                                                                    <option> Information systems coordination </option>
                                                                    <option> Information security </option>
                                                                    <option> Information assurance </option>
                                                                    <option> Analytics </option>
                                                                    <option> Information content publishing </option>
                                                                    <option> Consultancy </option>
                                                                    <option> Technical specialism </option>
                                                                    <option> Research </option>
                                                                    <option> IT management </option>
                                                                    <option> Financial management </option>
                                                                    <option> Innovation </option>
                                                                    <option> Business process improvement </option>
                                                                    <option> Enterprise and business architecture </option>
                                                                    <option> Business risk management </option>
                                                                    <option> Sustainability strategy </option>
                                                                    <option> Emerging technology monitoring </option>
                                                                    <option> Continuity management </option>
                                                                    <option> Sustainability management </option>
                                                                    <option> Network planning </option>
                                                                    <option> Solution architecture </option>
                                                                    <option> Data management </option>
                                                                    <option> Methods and tools </option>
                                                                    <option> Portfolio management </option>
                                                                    <option> Programme management </option>
                                                                    <option> Project management </option>
                                                                    <option> Portfolio, programme and project support </option>
                                                                    <option> Business analysis </option>
                                                                    <option> Requirements definition and management </option>
                                                                    <option> Business process testing </option>
                                                                    <option> Change implementation planning and management </option>
                                                                    <option> Organisation design and implementation </option>
                                                                    <option> Benefits management </option>
                                                                    <option> Business modelling </option>
                                                                    <option> Sustainability assessment </option>
                                                                    <option> Systems development management </option>
                                                                    <option> Data analysis </option>
                                                                    <option> Systems design </option>
                                                                    <option> Network design </option>
                                                                    <option> Database design </option>
                                                                    <option> Programming/software development </option>
                                                                    <option> Animation development </option>
                                                                    <option> Safety engineering </option>
                                                                    <option> Sustainability engineering </option>
                                                                    <option> Information content authoring </option>
                                                                    <option> Testing </option>
                                                                    <option> User experience analysis </option>
                                                                    <option> User experience design </option>
                                                                    <option> User experience evaluation </option>
                                                                    <option> Systems integration </option>
                                                                    <option> Porting/software configuration </option>
                                                                    <option> Hardware design </option>
                                                                    <option> Systems installation/decommissioning </option>
                                                                    <option> Availability management </option>
                                                                    <option> Service level management </option>
                                                                    <option> Service acceptance </option>
                                                                    <option> Configuration management </option>
                                                                    <option> Asset management </option>
                                                                    <option> Change management </option>
                                                                    <option> Release and deployment </option>
                                                                    <option> System software </option>
                                                                    <option> Capacity management </option>
                                                                    <option> Security administration </option>
                                                                    <option> Penetration testing </option>
                                                                    <option> Radio frequency engineering </option>
                                                                    <option> Application support </option>
                                                                    <option> IT Infrastructure </option>
                                                                    <option> Database administration </option>
                                                                    <option> Storage management </option>
                                                                    <option> Network support </option>
                                                                    <option> Problem management </option>
                                                                    <option> Incident management </option>
                                                                    <option> Facilities management </option>
                                                                    <option> Learning and development management </option>
                                                                    <option> Learning assessment and evaluation </option>
                                                                    <option> Learning design and development </option>
                                                                    <option> Learning delivery </option>
                                                                    <option> Teaching and subject formation </option>
                                                                    <option> Performance management </option>
                                                                    <option> Resourcing </option>
                                                                    <option> Professional development </option>
                                                                    <option> Quality management </option>
                                                                    <option> Quality assurance </option>
                                                                    <option> Quality standards </option>
                                                                    <option> Conformance review </option>
                                                                    <option> Safety assessment </option>
                                                                    <option> Digital forensics </option>
                                                                    <option> Sourcing </option>
                                                                    <option> Contract management </option>
                                                                    <option> Relationship management </option>
                                                                    <option> Customer service support </option>
                                                                    <option> Digital marketing </option>
                                                                    <option> Selling </option>
                                                                    <option> Sales support </option>
                                                                    <option> Product management </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 ">
                                                                <label for="skillLevel">Level:</label>
                                                                <select class="form-control" id="skillLevel1_2">
                                                                    <option> Follow </option>
                                                                    <option> Assist </option>
                                                                    <option> Apply </option>
                                                                    <option> Enable </option>
                                                                    <option> Ensure, advise </option>
                                                                    <option> Initiate, influence </option>
                                                                    <option> Set strategy, inspire, mobilise </option>
                                                                </select>
                                                            </div>
                                                            <div class=" input-group-btn noPadding">
                                                                <button id="addSkill" type="button" onclick="addskill(1,2)" class="btn btn-default  ">Add Skill</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h3 id="titleSkills" class="panel-title">Skills</h3></div>
                                                        <div class="panel-body">Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.
                                                            <label for="projectSkills">* Skills Required:</label>
                                                            <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;" id="projectSkills1_2">
                                                                <li id="pSkills1_2_0" value="Information systems coordination " onclick="selectSkill(1,2,0)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Information systems coordination<span class="label label-primary pull-right">5</span>
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][0][skillID]" value="4">
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][0][skillLevel]" value="5"> </li>
                                                                <li id="pSkills1_2_1" value="Analytics " onclick="selectSkill(1,2,1)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Analytics<span class="label label-primary pull-right">7</span>
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][1][skillID]" value="7">
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][1][skillLevel]" value="7"> </li>
                                                                <li id="pSkills1_2_2" value="IT management " onclick="selectSkill(1,2,2)" class="list-group-item skill  selectedSkill" style="background: rgb(0, 0, 119); color: rgb(255, 255, 255);">IT management<span class="label label-primary pull-right">6</span>
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][2][skillID]" value="12">
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][2][skillLevel]" value="6"> </li>
                                                                <li id="pSkills1_2_3" value="Financial management " onclick="selectSkill(1,2,3)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Financial management<span class="label label-primary pull-right">6</span>
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][3][skillID]" value="13">
                                                                    <input type="number" hidden="" name="task[1][role][2][skill][3][skillLevel]" value="6"> </li>
                                                            </ul>
                                                            <button id="delSkill" type="button" onclick="delskill(1,2)" class="btn btn-primary">Delete Skill</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="pTask2" onclick="selectTask(2)" class="">
                            <div id="taskcon" class="panel panel-primary">
                                <div class="panel-heading task foundit" name="task[0]" style="background: rgb(51, 122, 183);"> Task: first task Start Date:14/03/2017 End Date :30/03/2017 Number Of Roles : 1 <a data-toggle="collapse" href="http://137.195.15.99/~gg3/index.php/create_tasks#first_task" style="color: #C0C0C0;" class="collapsed" aria-expanded="false">  Click to exand/collapse </a> </div>
                                <div id="first_task" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div id="first_task_roles" class="panel-body">
                                        <input name="task[0][title]" type="text" value="first_task" hidden="">
                                        <input name="task[0][startDate]" type="text" value="14/03/2017" hidden="">
                                        <input name="task[0][endDate]" type="text" value="30/03/2017" hidden="">
                                        <div class="" id="first_task_table">
                                            <label class="text-center">Role Title</label>
                                            <label class="text-center">Number of People</label>
                                            <div class="panel panel-danger" name="0_0" id="first_task0">
                                                <div class="panel-heading role">Role 1</div>
                                                <div>
                                                    <input name="task[0][role][0][name]" type="text" placeholder="Role Title" class="form-control input-md"> </div>
                                                <div>
                                                    <input name="task[0][role][0][numPeople]" placeholder="1" type="number" class="form-control input-md"> </div>
                                                <div class="row">
                                                    <div class="col-lg-12 noPadding ">
                                                        <div class="input-group " id="skillSelect">
                                                            <div class="col-sm-5 ">
                                                                <label for="skillName">Skill:</label>
                                                                <select class="form-control" id="skillName0_0">
                                                                    <option> IT governance </option>
                                                                    <option> IT strategy and planning </option>
                                                                    <option> Information management </option>
                                                                    <option> Information systems coordination </option>
                                                                    <option> Information security </option>
                                                                    <option> Information assurance </option>
                                                                    <option> Analytics </option>
                                                                    <option> Information content publishing </option>
                                                                    <option> Consultancy </option>
                                                                    <option> Technical specialism </option>
                                                                    <option> Research </option>
                                                                    <option> IT management </option>
                                                                    <option> Financial management </option>
                                                                    <option> Innovation </option>
                                                                    <option> Business process improvement </option>
                                                                    <option> Enterprise and business architecture </option>
                                                                    <option> Business risk management </option>
                                                                    <option> Sustainability strategy </option>
                                                                    <option> Emerging technology monitoring </option>
                                                                    <option> Continuity management </option>
                                                                    <option> Sustainability management </option>
                                                                    <option> Network planning </option>
                                                                    <option> Solution architecture </option>
                                                                    <option> Data management </option>
                                                                    <option> Methods and tools </option>
                                                                    <option> Portfolio management </option>
                                                                    <option> Programme management </option>
                                                                    <option> Project management </option>
                                                                    <option> Portfolio, programme and project support </option>
                                                                    <option> Business analysis </option>
                                                                    <option> Requirements definition and management </option>
                                                                    <option> Business process testing </option>
                                                                    <option> Change implementation planning and management </option>
                                                                    <option> Organisation design and implementation </option>
                                                                    <option> Benefits management </option>
                                                                    <option> Business modelling </option>
                                                                    <option> Sustainability assessment </option>
                                                                    <option> Systems development management </option>
                                                                    <option> Data analysis </option>
                                                                    <option> Systems design </option>
                                                                    <option> Network design </option>
                                                                    <option> Database design </option>
                                                                    <option> Programming/software development </option>
                                                                    <option> Animation development </option>
                                                                    <option> Safety engineering </option>
                                                                    <option> Sustainability engineering </option>
                                                                    <option> Information content authoring </option>
                                                                    <option> Testing </option>
                                                                    <option> User experience analysis </option>
                                                                    <option> User experience design </option>
                                                                    <option> User experience evaluation </option>
                                                                    <option> Systems integration </option>
                                                                    <option> Porting/software configuration </option>
                                                                    <option> Hardware design </option>
                                                                    <option> Systems installation/decommissioning </option>
                                                                    <option> Availability management </option>
                                                                    <option> Service level management </option>
                                                                    <option> Service acceptance </option>
                                                                    <option> Configuration management </option>
                                                                    <option> Asset management </option>
                                                                    <option> Change management </option>
                                                                    <option> Release and deployment </option>
                                                                    <option> System software </option>
                                                                    <option> Capacity management </option>
                                                                    <option> Security administration </option>
                                                                    <option> Penetration testing </option>
                                                                    <option> Radio frequency engineering </option>
                                                                    <option> Application support </option>
                                                                    <option> IT Infrastructure </option>
                                                                    <option> Database administration </option>
                                                                    <option> Storage management </option>
                                                                    <option> Network support </option>
                                                                    <option> Problem management </option>
                                                                    <option> Incident management </option>
                                                                    <option> Facilities management </option>
                                                                    <option> Learning and development management </option>
                                                                    <option> Learning assessment and evaluation </option>
                                                                    <option> Learning design and development </option>
                                                                    <option> Learning delivery </option>
                                                                    <option> Teaching and subject formation </option>
                                                                    <option> Performance management </option>
                                                                    <option> Resourcing </option>
                                                                    <option> Professional development </option>
                                                                    <option> Quality management </option>
                                                                    <option> Quality assurance </option>
                                                                    <option> Quality standards </option>
                                                                    <option> Conformance review </option>
                                                                    <option> Safety assessment </option>
                                                                    <option> Digital forensics </option>
                                                                    <option> Sourcing </option>
                                                                    <option> Contract management </option>
                                                                    <option> Relationship management </option>
                                                                    <option> Customer service support </option>
                                                                    <option> Digital marketing </option>
                                                                    <option> Selling </option>
                                                                    <option> Sales support </option>
                                                                    <option> Product management </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 ">
                                                                <label for="skillLevel">Level:</label>
                                                                <select class="form-control" id="skillLevel0_0">
                                                                    <option> Follow </option>
                                                                    <option> Assist </option>
                                                                    <option> Apply </option>
                                                                    <option> Enable </option>
                                                                    <option> Ensure, advise </option>
                                                                    <option> Initiate, influence </option>
                                                                    <option> Set strategy, inspire, mobilise </option>
                                                                </select>
                                                            </div>
                                                            <div class=" input-group-btn noPadding">
                                                                <button id="addSkill" type="button" onclick="addskill(0,0)" class="btn btn-default  ">Add Skill</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h3 id="titleSkills" class="panel-title">Skills</h3></div>
                                                        <div class="panel-body">Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.
                                                            <label for="projectSkills">* Skills Required:</label>
                                                            <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;" id="projectSkills0_0">
                                                                <li id="pSkills0_0_0" value="Analytics " onclick="selectSkill(0,0,0)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Analytics<span class="label label-primary pull-right">4</span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][0][skillID]" value="7">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][0][skillLevel]" value="4"> </li>
                                                                <li id="pSkills0_0_1" value="Enterprise and business architecture " onclick="selectSkill(0,0,1)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Enterprise and business architecture<span class="label label-primary pull-right">6</span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][1][skillID]" value="16">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][1][skillLevel]" value="6"> </li>
                                                                <li id="pSkills0_0_2" value="Information assurance " onclick="selectSkill(0,0,2)" class="list-group-item skill selectedSkill" style="background: rgb(0, 0, 119); color: rgb(255, 255, 255);">Information assurance<span class="label label-primary pull-right">6</span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][2][skillID]" value="6">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][2][skillLevel]" value="6"> </li>
                                                                <li id="pSkills0_0_3" value="Emerging technology monitoring " onclick="selectSkill(0,0,3)" class="list-group-item skill" style="background: rgb(255, 255, 255); color: rgb(0, 0, 0);">Emerging technology monitoring<span class="label label-primary pull-right">4</span>
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][3][skillID]" value="19">
                                                                    <input type="number" hidden="" name="task[0][role][0][skill][3][skillLevel]" value="4"> </li>
                                                            </ul>
                                                            <button id="delSkill" type="button" onclick="delskill(0,0)" class="btn btn-primary">Delete Skill</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                </div>
                            

                        </li>
-->
                        <?php 
                    $taskNo ++;
                    }
                    ?>


                    </ul>

                 


                    <button id="delTask" type="button" class="btn btn-primary">Delete Task</button>
                </div>
            </div>


        </div>

        <br>
        <br>
        <br>

        <script>
            var taskNum = 0;
            $("#create_task").click(function() {
                var title = $("#taskTitle").val();
                var j = $("#numOfPeople").val();
                var i;
                var newtitle = title.replace(" ", "_");
                if (!$("[name='taskTitle']").val()) {
                    alert("Please enter a Task Title.");
                    return;
                }
                if (!$("[name='startDate']").val()) {
                    alert("Please enter a Start Date.");
                    return;
                }
                if (!$("[name='endDate']").val()) {
                    alert("Please enter an End Date.");
                    return;
                }
                if ($("#" + newtitle).length) {
                    alert("A task with the name '" + newtitle + "' already exists.\nPlease enter a unique title.");
                    return;
                }
                $("#projectTasks").append('<li id="pTask' + taskNum + '"  onClick="selectTask(' + taskNum + ')" > <div id="taskcon" class="panel panel-primary"> ' +
                    '<div class="panel-heading task"   name="task[' + taskNum + ']"> Task: ' + title + '   Start Date:' + $("#datepicker").val() + '       End Date :' + $("#datepicker2").val() + '       Number Of Roles : ' + $("#numOfPeople").val() + ' <a data-toggle="collapse"  href="#' + newtitle + '"  style="color: #C0C0C0;" >  Click to exand/collapse </a>     </div>' +
                    '<div id="' + newtitle + '" class="panel-collapse collapse">' +
                    '<div id="' + newtitle + '_roles" class="panel-body">   ' +
                    '<input name="task[' + taskNum + '][title]" type="text" value="' + newtitle + '" hidden > </input>' +
                    '<input name="task[' + taskNum + '][startDate]" type="text" value="' + $("#datepicker").val() + '"  hidden > </input>' +
                    '<input name="task[' + taskNum + '][endDate]" type="text" value="' + $("#datepicker2").val() + '" hidden > </input>' +

                    '<div class="" id="' + newtitle + '_table"> ' +
                    '<label class="text-center">Role Title</label>' +
                    '<label class="text-center">Number of People</label>' +
                    '</div id="roletable"></div></li>');

                for (i = 0; i < j; i++) {
                    $('#' + newtitle + '_table').append('<div class ="panel panel-danger" name="' + taskNum + '_' + i + '" id="' + newtitle + '' + i + '"><div class="panel-heading role">Role ' + (i + 1) + '</div>' +
                        '<div><input name="task[' + taskNum + '][role][' + i + '][name]" type="text" placeholder="Role Title" class="form-control input-md"/> </div>' +
                        '<div><input name="task[' + taskNum + '][role][' + i + '][numPeople]" placeholder="1" type="number" class="form-control input-md"/> </div>' +
                        '<div class="row">' +
                        '<div class="col-lg-12 noPadding ">' +
                        '<div class="input-group " id="skillSelect">' +
                        '<div class="col-sm-5 ">' +
                        '<label for="skillName" >Skill:</label>' +
                        '<select class="form-control" id="skillName' + taskNum + '_' + i + '">' +
                        '<option> IT governance </option>' +
                        '<option> IT strategy and planning </option>' +
                        '<option> Information management </option>' +
                        '<option> Information systems coordination </option>' +
                        '<option> Information security </option>' +
                        '<option> Information assurance </option>' +
                        '<option> Analytics </option>' +
                        '<option> Information content publishing </option>' +
                        '<option> Consultancy </option>' +
                        '<option> Technical specialism </option>' +
                        '<option> Research </option>' +
                        '<option> IT management </option>' +
                        '<option> Financial management </option>' +
                        '<option> Innovation </option>' +
                        '<option> Business process improvement </option>' +
                        '<option> Enterprise and business architecture </option>' +
                        '<option> Business risk management </option>' +
                        '<option> Sustainability strategy </option>' +
                        '<option> Emerging technology monitoring </option>' +
                        '<option> Continuity management </option>' +
                        '<option> Sustainability management </option>' +
                        '<option> Network planning </option>' +
                        '<option> Solution architecture </option>' +
                        '<option> Data management </option>' +
                        '<option> Methods and tools </option>' +
                        '<option> Portfolio management </option>' +
                        '<option> Programme management </option>' +
                        '<option> Project management </option>' +
                        '<option> Portfolio, programme and project support </option>' +
                        '<option> Business analysis </option>' +
                        '<option> Requirements definition and management </option>' +
                        '<option> Business process testing </option>' +
                        '<option> Change implementation planning and management </option>' +
                        '<option> Organisation design and implementation </option>' +
                        '<option> Benefits management </option>' +
                        '<option> Business modelling </option>' +
                        '<option> Sustainability assessment </option>' +
                        '<option> Systems development management </option>' +
                        '<option> Data analysis </option>' +
                        '<option> Systems design </option>' +
                        '<option> Network design </option>' +
                        '<option> Database design </option>' +
                        '<option> Programming/software development </option>' +
                        '<option> Animation development </option>' +
                        '<option> Safety engineering </option>' +
                        '<option> Sustainability engineering </option>' +
                        '<option> Information content authoring </option>' +
                        '<option> Testing </option>' +
                        '<option> User experience analysis </option>' +
                        '<option> User experience design </option>' +
                        '<option> User experience evaluation </option>' +
                        '<option> Systems integration </option>' +
                        '<option> Porting/software configuration </option>' +
                        '<option> Hardware design </option>' +
                        '<option> Systems installation/decommissioning </option>' +
                        '<option> Availability management </option>' +
                        '<option> Service level management </option>' +
                        '<option> Service acceptance </option>' +
                        '<option> Configuration management </option>' +
                        '<option> Asset management </option>' +
                        '<option> Change management </option>' +
                        '<option> Release and deployment </option>' +
                        '<option> System software </option>' +
                        '<option> Capacity management </option>' +
                        '<option> Security administration </option>' +
                        '<option> Penetration testing </option>' +
                        '<option> Radio frequency engineering </option>' +
                        '<option> Application support </option>' +
                        '<option> IT Infrastructure </option>' +
                        '<option> Database administration </option>' +
                        '<option> Storage management </option>' +
                        '<option> Network support </option>' +
                        '<option> Problem management </option>' +
                        '<option> Incident management </option>' +
                        '<option> Facilities management </option>' +
                        '<option> Learning and development management </option>' +
                        '<option> Learning assessment and evaluation </option>' +
                        '<option> Learning design and development </option>' +
                        '<option> Learning delivery </option>' +
                        '<option> Teaching and subject formation </option>' +
                        '<option> Performance management </option>' +
                        '<option> Resourcing </option>' +
                        '<option> Professional development </option>' +
                        '<option> Quality management </option>' +
                        '<option> Quality assurance </option>' +
                        '<option> Quality standards </option>' +
                        '<option> Conformance review </option>' +
                        '<option> Safety assessment </option>' +
                        '<option> Digital forensics </option>' +
                        '<option> Sourcing </option>' +
                        '<option> Contract management </option>' +
                        '<option> Relationship management </option>' +
                        '<option> Customer service support </option>' +
                        '<option> Digital marketing </option>' +
                        '<option> Selling </option>' +
                        '<option> Sales support </option>' +
                        '<option> Product management </option>' +
                        '</select>' +
                        '</div>' +
                        '<div class="col-sm-3 ">' +
                        '<label for="skillLevel" >Level:</label>' +
                        '<select class="form-control" id="skillLevel' + taskNum + '_' + i + '">' +
                        '<option> Follow </option>' +
                        '<option> Assist </option>' +
                        '<option> Apply </option>' +
                        '<option> Enable </option>' +
                        '<option> Ensure, advise </option>' +
                        '<option> Initiate, influence </option>' +
                        '<option> Set strategy, inspire, mobilise </option>' +
                        '</select>' +
                        '</div>' +
                        '<div class=" input-group-btn noPadding">' +
                        '<button id="addSkill" type="button" onclick="addskill(' + taskNum + ',' + i + ')" class="btn btn-default  ">Add Skill</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '</div>' +
                        '<br>' +
                        '<div class="">' +
                        '<div class = "panel panel-info">' +
                        '<div class = "panel-heading">' +
                        '<h3 id="titleSkills" class = "panel-title">Skills</h3>' +
                        '</div>' +

                        ' <div class = "panel-body">' +
                        'Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.' +
                        '<label for="projectSkills">* Skills Required:</label>' +
                        '<ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;"  id="projectSkills' + taskNum + '_' + i + '">' +
                        '</ul>' +
                        '<button id="delSkill" type="button" onclick="delskill(' + taskNum + ',' + i + ')" class="btn btn-primary">Delete Skill</button>' +
                        '</div>' +
                        ' </div>' +
                        '</div></tr>');
                }
                taskNum = taskNum + 1;
            });

            function addskill(x, y) {
                $("#projectSkills" + x + "_" + y).append(' <li id="pSkills' + x + '_' + y + '_' + $("#projectSkills" + x + "_" + y + " li").length + '" value="' + $("#skillName" + x + "_" + y).val() + ' " onClick="selectSkill(' + x + ',' + y + ',' + $("#projectSkills" + x + "_" + y + " li").length + ')" class="list-group-item skill ">' + $("#skillName" + x + "_" + y).val() + '<span class="label label-primary pull-right">' + ($("#skillLevel" + x + "_" + y + " option:selected").index() + 1) + '</span>' + '<input type="number" hidden name="task[' + x + '][role][' + y + '][skill][' + $("#projectSkills" + x + "_" + y + " li").length + '][skillID]" value="' + ($("#skillName" + x + "_" + y + " option:selected").index() + 1) + '"/> ' + '<input type="number" hidden name="task[' + x + '][role][' + y + '][skill][' + $("#projectSkills" + x + "_" + y + " li").length + '][skillLevel]" value="' + ($("#skillLevel" + x + "_" + y + " option:selected").index() + 1) + '"/> ' + '</li>');
            };




            //$("#taskcon").append('<tr id="role'+ i +'"> <td>'+ i +'</td><td><input name="taskTitle" type="text" placeholder="Task Title" class="form-control input-md"/></td><td><input name="employeeName" type="text" placeholder="Employee Name" class="form-control input-md" /> </td></tr>'); }


            //<tbody><tr id="addr0"><td>1</td><td><input type="text" name="name0"  placeholder="Name" class="form-control"/></td><td><input type="text" class="form-control" placeholder="Start date" name="startDate0" id="datepicker" /></td><td><input type="text" class="form-control" placeholder="End date" name="endDate0" id="datepicker2" /></td><td><input type="number" id="rolesInTask" value="1" min="1" class="form-control"></td></tr></tbody> 



            // <li value="'+ $("#taskTitle").val() +'">' + $("#taskTitle").val() + '<span class="label label-primary pull-right">'     

            // <input type="text" ='name0'  placeholder='Name' class="form-control"/></td><td>





            /// Notes  id and name for role,  the skill required and the number of people wilth thtat sikill and their proficiency,  along with the employee id and name perhaps

            function delskill(x, y) {
                var r = confirm("Are you sure you would like to delete this task?");
                if (r == true)
                    $("#projectSkills" + x + "_" + y + " .selectedSkill").remove();
            }


            $("#delTask").click(function() {
                $("#projectTasks .selected").remove();
            });

            function selectSkill(x, y, z) {
                $("#projectSkills" + x + "_" + y + "  .selectedSkill").css('background', '#fff');
                $("#projectSkills" + x + "_" + y + "  .selectedSkill").css('color', '#000');
                $("#projectSkills" + x + "_" + y + "  .selectedSkill").removeClass("selectedSkill");
                $("#pSkills" + x + "_" + y + "_" + z).addClass("selectedSkill");
                $("#pSkills" + x + "_" + y + "_" + z).css('background', '#007');
                $("#pSkills" + x + "_" + y + "_" + z).css('color', '#fff');
            }

            function selectTask(x) {
                $("#projectTasks .selected > div .task").css('background', '#337ab7');
                $("#projectTasks .selected ").removeClass("selected");
                $("#pTask" + x).addClass("selected");
                $("#pTask" + x + " > div  .task").addClass("foundit");
                $("#pTask" + x + " > div  .task").css('background', '#007');
            }
            //~ $("#delSkill").click(function() {
            //~ $("#projectSkills"+x+"_"+y+" .selected").remove();
            //~ });

            //~ $("#projectSkills"+x+"_"+y).on("click",".skill",function(e) {
            //~ $(this).parent().children().removeClass("selected");
            //~ $(this).addClass("selected");
            //~ });

            $(function() {
                $("#datepicker").datepicker();
                $("#datepicker").datepicker("option", "dateFormat", "dd/mm/yy");
            });

            $(function() {
                $("#datepicker2").datepicker();
                $("#datepicker2").datepicker("option", "dateFormat", "dd/mm/yy");

            });

        </script>




        <button type="submit" class="btn btn-success btn-lg">Go Forward</button>

    </form>






    <em>© 2015 PlanWise</em>

    <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="position: absolute; top: 544px; left: 1076.31px; z-index: 4; display: none;">
        <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a>
            <div class="ui-datepicker-title"><span class="ui-datepicker-month">April</span>&nbsp;<span class="ui-datepicker-year">2017</span></div>
        </div>
        <table class="ui-datepicker-calendar">
            <thead>
                <tr>
                    <th scope="col" class="ui-datepicker-week-end"><span title="Sunday">Su</span></th>
                    <th scope="col"><span title="Monday">Mo</span></th>
                    <th scope="col"><span title="Tuesday">Tu</span></th>
                    <th scope="col"><span title="Wednesday">We</span></th>
                    <th scope="col"><span title="Thursday">Th</span></th>
                    <th scope="col"><span title="Friday">Fr</span></th>
                    <th scope="col" class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">1</a></td>
                </tr>
                <tr>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">2</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">3</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">4</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">5</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">6</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">7</a></td>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">8</a></td>
                </tr>
                <tr>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">9</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">10</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">11</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">12</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">13</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">14</a></td>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">15</a></td>
                </tr>
                <tr>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">16</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">17</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">18</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">19</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">20</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">21</a></td>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">22</a></td>
                </tr>
                <tr>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">23</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">24</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">25</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">26</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">27</a></td>
                    <td class=" " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">28</a></td>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">29</a></td>
                </tr>
                <tr>
                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="3" data-year="2017"><a class="ui-state-default" href="http://137.195.15.99/~gg3/index.php/create_tasks#">30</a></td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                    <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>