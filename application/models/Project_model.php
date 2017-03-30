<?php
class Project_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_news($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array(' slug' => $slug));
        return $query->row_array();
}


public function convert_date($date){
	return date('Y/m/d', strtotime($date));
}

public function set_login()

{
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$this->db->select('accountID','username', 'password');
	$this->db->	from('user_account');
	$this->db->	where('username',$username);
	$this->db->	where('password',$password);
	$this->db->limit(1);
	
	$query = $this->db->get();
	
	if($query-> num_rows() == 1){
		$accountID = $query->result()[0]->accountID;
		$newsession = array(
		  'accountID' => $accountID,
        'username'  => $username,
        'logged_in' => TRUE
		);

		$this->session->set_userdata($newsession);
		return $query->result();

	}else{
		return FALSE;			
	}


    $this->load->helper('url');
   

}

public function set_logout(){	


	$this->session->unset_userdata('username');
	$this->session->unset_userdata('logged_in');
	
	$this->session->sess_destroy();
	}

public function set_account()
{
    $this->load->helper('url');
    

    $accountData = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'email' => $this->input->post('emailAddress'),
        'typeID' => $this->input->post('type')
    );
    

	
	$a = $this->db->insert('user_account', $accountData);

    return $a;
}

	
	public function load_skills(){
		//query existing skill names
		$this->db-> select('skillID, skillName');
        $this->db->order_by('skillID','asc');
		$this->db->	from('skills');
		
		$query = $this->db->get();
		
		if($query-> num_rows()  == 0){
			return;
		}
		$skillNames = $query->result_array();
		
        
        //query existing skill levels
		$this->db-> select('level');
		$this->db->	from('skillLevel');
 
		
		$query = $this->db->get();
		
		if($query-> num_rows() == 0){
			return;
		}
		$skillLevels = $query->result_array();
		//put skill names and levels into an array
		$skills =  array(
			'names' => $skillNames, 
			'levels' => $skillLevels
		);
		
		return $skills;
	}
	

	public function edit_profile()
	{
	    $this->load->helper('url');
	    
	   $accountID = $this->session->accountID;
	    
	   $this->db->select('addressID');
		$this->db->	from('person');
		$this->db->	where('accountID',$accountID);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() == 1){
			$addressID = $query->result()[0]->addressID;
		}
	    
		$addressData = array(
				'country' => $this->input->post('country'),
				'city' => $this->input->post('city'),
				'postcode' => $this->input->post('postcode'),
				'streetName' => $this->input->post('streetName'),
				'country' => $this->input->post('country'),
				'buldingNumber' => $this->input->post('buildingNumber')
			);
			
		$this->db->	where('addressID',$addressID);	
		$this->db->update('address', $addressData);

		
		echo $accountID. ' '. $addressID;
			
		$profileData = array(
			 'accountID' => ($accountID),
	         'firstname' => $this->input->post('fname'),
	         'lastname' => $this->input->post('sname'),
			 'addressID' => ($addressID),
	         'dob' => $this->input->post('dob'),
	         'religion' => $this->input->post('religion'),
	         'locationFlexibility' => $this->input->post('locationFlex') == "able" ? 1 : 0
	    );
	    
	  	$this->db->	where('accountID',$accountID);	
	  	$this->db->update('person', $profileData);

	}




public function set_project()
{
    $this->load->helper('url');
    
   $accountID = $this->session->accountID;
   
       
	$addressData = array(
			'city' => $this->input->post('city'),
			'postcode' => $this->input->post('postcode'),
			'streetName' => $this->input->post('streetName'),
			'country' => $this->input->post('country'),
			'buldingNumber' => $this->input->post('buildingNumber')
		);
		
		
	$this->db->insert('address', $addressData);
	$addressID = $this->db->insert_id();

//    projectID managerID	title	startDate	endDate	budget	projectTypeID	completed
	$projectData = array(
			'title' => $this->input->post('projectTitle'),
            'managerID' => ($accountID),
            'addressID' => ($addressID),
			'startDate' => $this->project_model->convert_date($this->input->post('startDate')),
			'endDate' => $this->project_model->convert_date($this->input->post('endDate')),
			'budget' => $this->input->post('projectBudget'),
			'projectTypeID' => $this->input->post('projectType')
		);
		
		
	$this->db->insert('project', $projectData);
	$projectID = $this->db->insert_id();

	return $projectID;

}



public function set_tasks()
{
    $this->load->helper('url');
    
    $accountID = $this->session->accountID;
	$tasks = $this->input->post('task');
	$projectID = ( $this->session->projectID);
	echo $projectID;
		//taskID 	projectID 	title 	startDate 	endDate
	foreach($tasks as $id4 => $task){		
		if(isset($taskData))
			unset($taskData);
		$taskData[] = array(
			'projectID'=>$projectID,
			'title' => 	$task['title'],			//$this->input->post('task[][title]'),
			'startDate' => 	$this->project_model->convert_date($task['startDate']),	// $this->input->post('task[][startDate]'),
			'endDate' => $this->project_model->convert_date($task['endDate']) 		//$this->i nput->post('task[][endDate]'),
		);
		echo "<br> COUNT <br>";
		print_r($taskData);

		$this->db->insert_batch('project_tasks', $taskData);		
		$taskID = $this->db->insert_id();
		$roles = $this->input->post('task[' . $id4 . '][role]');
		foreach($roles as $id2 => $role){
			if(isset($roleData))
				unset($roleData);
			$roleData[] = array(
				'taskID' => $taskID,
				'roleName' => 	$role['name'],			//$this->input->post('task[][title]'),
				'numPeople' => 	$role['numPeople'],	// $this->input->post('task[][startDate]'),
			);
			$this->db->insert_batch('project_roles', $roleData);
			$roleID = $this->db->insert_id();
			
			if(isset($skillData))
				unset($skillData);
			$skills = $this->input->post('task[' . $id4 . '][role]['.$id2.'][skill]');
			//~ $skillData[] = array();
			foreach($skills as $id3 => $skill){
				$skillData[] = array(
					'roleID' => $roleID,
					'skillID' => 	$skill['skillID'],			//$this->input->post('task[][title]'),
					'skillLevel' => 	$skill['skillLevel'],	// $this->input->post('task[][startDate]'),
				);
			}
			echo "<br> skills entry <br>";
			$this->db->insert_batch('role_skills_required', $skillData);

		}
	}

}

public function search_algorithmOLD(){
	/*
		1. take in tasks. For each task, query the database for someone with the skills required to do the task.
		2. return a person appropriate to the task.
		3. Insert into the database the person associated to the task and project.
	*/
	
	//get project ID
	//get roles in project
	 
	//$projectID = $this->session->userdata('projectID');	

	/*$this->db->select('projectID');
	$this->db->from('project');
	$this->db->where('project.projectID', '1');
	$projectID = $this->db->get()->result();
	*/
	
	/*$projectID = 1;*/
	$projectID = ( $this->session->projectID);
	//print_r($projectID);
	
	$this->db-> select('taskID');
	$this->db-> from('project_tasks');
	$this->db-> where('projectID', $projectID);
	$tasks = $this->db->get()->result_array();
	
	//print_r($tasks);

	foreach($tasks as $t){
		//print_r($t);
		$this->db-> select('roleID');
		$this->db-> from('project_roles');
		$this->db-> where('taskID', $t['taskID']);
		//$this->db-> where('projectID',$projectID);
		$roles = $this->db->get()->result_array();
		
		foreach($roles as $r){
			
				$this->db-> select('skillID');
				$this->db-> from ('role_skills_required');
				$this->db-> where('roleID',$r['roleID']);
				$skill_required = $this->db->get()->result_array();
	
			foreach($skill_required as $skill){
		
				/*$this->db-> select('*');
				$this->db->	from('person', 'user_account');
				$this->db-> join('user_account', 'person.accountID = user_account.accountID');
				$this->db-> join('address', 'person.addressID = address.addressID');
				$this->db-> join('user_skills', 'person.accountID = user_skills.accountID');
				$this->db->	where('user_skills.skillID',$skill['skillID']); //where each element of skills required array 	
				//$this->db->	where('person.availability','0');
				*/
				
				$this->db->select('user_account.accountID');
				$this->db->from('user_account');
				$this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
				$this->db->where('user_skills.skillID', $skill['skillID']);
				$this->db-> limit(1);
				
				$accountID = $this->db->get()->row();
			
				if(count($accountID) < 1){
					echo 'No match of person that fulfills the roles skill requirements!';
					return;
				}
			
				$employee_assignment = array(
					'accountID' => $accountID->accountID,
		            'roleID' => $r['roleID']
				);

				
				$this->db->insert('employee_assignment', $employee_assignment);
				
			}
		}
	}
	
	
	/*$this->db-> select('*');
	$this->db-> from ('user_account acc', 'person p', 'project_roles pr', 'project_assignment pa', 'project_tasks pt');
	$this->db-> join('user_account', 'p.accountID = acc.accountID'); 
	$this->db-> join('employee_assignment', 'pa.accountID = acc.accountID'); 
	$this->db-> join('project_roles','pa.roleID = pr.roleID');
	$this->db-> join('project_tasks', '
	*/
	
	$this->db->select('taskID');
	$this->db->from ('project_tasks');
	$this->db->where ('projectID', $projectID);
	$tasks = $this->db->get()->result_array();

	$assigned_data[] = array();
	foreach($tasks as $t){
		
		$this->db-> select('roleID');
		$this->db-> from('project_roles');
		$this->db-> where('taskID', $t['taskID']);
		$roles = $this->db->get()->result_array();
		
		foreach($roles as $r){
				$this->db->select('accountID');
				$this->db->from('employee_assignment');
				$this->db->where('roleID', $r['roleID']);
				$accounts_assigned = $this->db->get()->result_array();

				foreach($accounts_assigned as $accounts){

					$this->db->select('*');
					$this->db->from ('user_account', 'person');
					$this->db->join('person', 'user_account.accountID = person.accountID');
					$this->db->where('person.accountID', $accounts['accountID']);
					$query = $this->db->get()->result_array();
					echo "hello";
					$assigned_data[] = $query;
					/*'username', 'person.accountID', 'email', 'firstname', 'lastname'
					$this->db->select('user_account.accountID');
					$this->db->from('user_account');
					$this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
					$this->db->where('user_skills.skillID', $skill['skillID']);
					$query = $this->db-> limit(1);
					$query = $this->db->get()->result();*/

					
					}

			}		

		}
				return $assigned_data;
	
	
	/*$this->db->select

		$this->db->from('employee_assignment');
	$roleID = $this->db->get()->reslt_array();
		
	*/
	
}
//$this->db-> join('project_roles', 'project_tasks.taskID = project_roles.taskID');

public function find_roles($projectID)
{
	$this->db-> select('*');
	$this->db-> from('project_tasks');
	$this->db-> where('project_tasks.projectID', $projectID);
	$tasks = $this->db->get()->result_array();
	$roles=array();
	//print_r($tasks);

	foreach($tasks as $t){
		//print_r($t);

		$this->db-> select('pr.*, firstname, lastname, username');
		$this->db-> from('project_roles as pr');
		$this->db-> join('employee_assignment','pr.roleID = employee_assignment.roleID');
		$this->db-> join('user_account', 'employee_assignment.accountID = user_account.accountID');
		$this->db-> join('person','employee_assignment.accountID = person.accountID');
		$this->db-> where('pr.taskID', $t['taskID']);
		//$this->db-> where('projectID',$projectID);
		$roles[] = $this->db->get()->result_array();
		//echo "<br>";
		//print_r($this->db->last_query());
	}
	print_r($roles);

	//echo "hello";
	return $roles; 
}

public function find_roles_alloc($projectID)
{
	$this->db-> select('*');
	$this->db-> from('project_tasks');
	$this->db-> where('project_tasks.projectID', $projectID);
	$tasks = $this->db->get()->result_array();
	$roles=array();
	//print_r($tasks);
	foreach($tasks as $t){
		//print_r($t);
		$this->db-> select('pr.*');
		$this->db-> from('project_roles as pr');
//		$this->db-> join('project_tasks','pr.taskID = project_tasks.taskID');
//		$this->db-> join('project','project.projectID = project_tasks.projectID');
		$this->db-> where('pr.taskID', $t['taskID']);
		//$this->db-> where('projectID',$projectID);
		$roles[] = $this->db->get()->result_array();
	}
	//	print_r($roles);
	//echo "hello";
	return $roles; 
}

public function find_tasks($projectID)
{
		$this->db-> select('*');
		$this->db->	from('project_tasks');
		$this->db->	where('project_tasks.projectID',$projectID);
		
		$query = $this->db->get();

		return $query->result_array();
}



public function join_find_project($projectID){
				
		$this->db-> select('*');
		$this->db->	from('project');
		$this->db-> join('user_account', 'project.managerID = user_account.accountID');
		$this->db-> join('person', 'project.managerID = person.accountID');
		$this->db-> join('address', 'project.addressID = address.addressID'); 
		$this->db->	where('project.projectID',$projectID);
		$this->db-> limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() != 1){
			return;
		}
		
		return $query->result_array();
			
	}


public function find_role_skills($projectID)
{  /*
	$this->db-> select('*');
		$this->db->	from('project'); 
		$this->db->	where('project.projectID',$projectID);
		$this->db-> limit(1);
		$roles = array();
		$skills = array();
		$tasks = array();

		//$query = $this->db->get();
		/*
		if($query-> num_rows() != 1){
			return;
		} 
		
		$query = $this->db->get()->result_array();

	foreach($query as $project){

		$this->db-> select('pt.*');
		$this->db-> from('project_tasks as pt');
		$this->db-> where('pt.projectID', $projectID);
		$tasks[] = $this->db->get()->result_array();
			//print_r($tasks);
		
		$j = 0;
		foreach($tasks[$j] as $t){
			//print_r($t);
			$this->db-> select('pr.*');
			$this->db-> from('project_roles as pr');
	//		$this->db-> join('project_tasks','pr.taskID = project_tasks.taskID');
	//		$this->db-> join('project','project.projectID = project_tasks.projectID');
			$this->db-> where('pr.taskID', $t['taskID']);
			//$this->db-> where('projectID',$projectID);
			$roles[] = $this->db->get()->result_array();
		
		//$i=0;
			foreach ($roles[$j] as $role) {
					echo $role['roleID'];
					$this->db->select('rs.*, skillName');
					$this->db->from('role_skills_required as rs');
					$this->db->join('skills', 'rs.skillID = skills.skillID');
					$this->db->join('skillLevel', 'rs.skillLevel = skillLevel.levelID');
					$this->db->where('rs.roleID', $role['roleID']);
					$skills[] = $this->db->get()->result_array();
					//$i++;

				}

		

		}
		$j++;
	}
	

	//print_r($roles);
	print_r($skills);
	return $skills;

	

*/	
	$tasks = array();
	$roles = array();
	$skills = array();
	
	$this->db-> select('pt.*');
	$this->db-> from('project_tasks as pt');
	$this->db-> where('pt.projectID', $projectID);
	$tasks[] = $this->db->get()->result_array();
		//print_r($tasks);
	
	$skillList[] =array();
$i=0;
	foreach($tasks[$i] as $t){
		//print_r($t);
		if(isset($skills))
		{
			unset($skills);
		}
		if(isset($roles))
		{
			unset($roles);
		}
		$this->db-> select('pr.*');
		$this->db-> from('project_roles as pr');
//		$this->db-> join('project_tasks','pr.taskID = project_tasks.taskID');
//		$this->db-> join('project','project.projectID = project_tasks.projectID');
		$this->db-> where('pr.taskID', $t['taskID']);
		//$this->db-> where('projectID',$projectID);
		$roles[] = $this->db->get()->result_array();

	$j =0;
		foreach ($roles[$j] as $role) {
				echo $role['roleID'];
				$this->db->select('rs.*, skillName');
				$this->db->from('role_skills_required as rs');
				$this->db->join('skills', 'rs.skillID = skills.skillID');
				$this->db->join('skillLevel', 'rs.skillLevel = skillLevel.levelID');
				$this->db->where('rs.roleID', $role['roleID']);
				$skills[] = $this->db->get()->result_array();
							$skillList[$i] = $skills;

				$j ++;

			}

	$i++;
   	

	}
	

	//print_r($roles);
	print_r($skillList);
	return $skillList;


	
}

/*
public function join_load_project($projectID){
		
		
		$this->db-> select('*');
		$this->db->	from('project');
		$this->db-> join('user_account', 'project.managerID = user_account.accountID');
		$this->db-> join('person', 'project.managerID = person.accountID');
		$this->db->	where('project.projectID',$projectID);
		$this->db-> limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() != 1){
			return;
		}
		
		
		
		return $query->result_array();
		
		//return $query->result_array();
			
	}
*/

public function project_search($option, $search){
	

	$option1 = (string)$option;
	$this->db->select('*');
	$this->db->	from('project');
	$this->db->join('person', 'project.managerID = person.accountID');
	$this->db->join('user_account', 'person.accountID = user_account.accountID');
	
	$this->db-> like($option1,$search);
	
	$query = $this->db->get()->result();
	
	
	return $query;
}



public function get_all_projects()
{
	return $this->db->get('project')->result();
}

public function find_interest_project($projectID){
	$accountID = $this->session->accountID;

	$this->db->select('personID');
	$this->db->	from('person');
	$this->db->	where('person.accountID',$accountID);

	$query = $this->db->get();
	if($query-> num_rows() != 1){
		return NULL;
	}
		
	$personID = $query->result()[0]->personID;
	
	
	$this->db->select('*');
	$this->db->	from('project_interests');
	$this->db->	where('projectID',$projectID);
	$this->db->	where('personID',$personID);

	$query = $this->db->get();

	if($query-> num_rows() != 1){
		return NULL;
	}

	return $query->result_array()	;

}

public function add_interest_project($projectID){
	$accountID = $this->session->accountID;

	$this->db->select('personID,username,firstname,lastname,email');
	$this->db->	from('person'); 
	$this->db->join('user_account', 'person.accountID = user_account.accountID');
	$this->db->	where('person.accountID',$accountID);

	$query = $this->db->get();
	if($query-> num_rows() != 1){
		return NULL;
	}
		
	$personID = $query->result()[0]->personID;
		$firstname = $query->result()[0]->firstname;	
		$lastname = $query->result()[0]->lastname;
		$username = $query->result()[0]->username;

	$interestData = array(
		'projectID' => $projectID,
		'personID' => $personID,
		
	);
	
	
	
	$this->db->select('email,title');
	$this->db->	from('project'); 		
	$this->db->	join('user_account','user_account.accountID = project.managerID'); 
	$this->db->	where('project.projectID', $projectID );

	$query = $this->db->get();
	if($query-> num_rows() != 1){
		return NULL;
	}
	 
    $title = $query->result()[0]->title;	
    $email = $query->result()[0]->email;
	 $to = "sernikpl1@gmail.com"; // this is PlanWiseRMS email
    $subject = $title." Project Interest";
    $subject2 = "Copy of registration details";
    $message = "The user ".$username."(".$firstname." ".$lastname.") has shown interest in your project:".$title.". ";
    
    $headers = "From:" . "Planwise@hw.macs.co.uk";
    mail($email,$subject,$message,$headers);
    mail($to,$subject2,$message,$headers); // sends a copy of the message to the sender
    

	$inter = $this->db->insert('project_interests', $interestData);

	return $interestData;

}

public function edit_project($projectID)
	{
	    $this->load->helper('url');
	    
		$accountID = $this->session->accountID;

	    $this->db->select('addressID');
		$this->db->	from('project');
		$this->db->	where('projectID',$projectID);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query-> num_rows() == 1){
			$addressID = $query->result()[0]->addressID;
		}
	    

		$addressData = array(
			'city' => $this->input->post('city'),
			'postcode' => $this->input->post('postcode'),
			'streetName' => $this->input->post('streetName'),
			'country' => $this->input->post('country'),
			'buldingNumber' => $this->input->post('buildingNumber')
		);
		
		
	$this->db->	where('addressID',$addressID);	
	$this->db->update('address', $addressData);

	echo $projectID. ' '. $addressID;

//    projectID managerID	title	startDate	endDate	budget	projectTypeID	completed
	$projectData = array(
			'title' => $this->input->post('projectTitle'),
            'managerID' => ($accountID),
            'addressID' => ($addressID),
			'startDate' => $this->project_model->convert_date($this->input->post('startDate')),
			'endDate' => $this->project_model->convert_date($this->input->post('endDate')),
			'budget' => $this->input->post('projectBudget'),
			'projectTypeID' => $this->input->post('projectType')
		);
	    
	  	$this->db->where('projectID',$projectID);	
	  	$this->db->update('project', $projectData);

	}

/*
public function edit_tasks($projectID)
{
		$this->db-> select('*');
		$this->db->	from('project_tasks');
		$this->db->	where('project_tasks.projectID',$projectID);
		
		$tasks = $this->db->get()->result_array();
		$count = 0;
		$taskData = array();

		foreach ($tasks as $task)
		{
			$count++;
			$this->db->select('taskID');
			$this->db->from('project_tasks');
			$this->db->where('taskID', $task['taskID']);
			$this->db->limit(1);

			$query = $this->db->get();

			if($query-> num_rows() == 1){
			$taskID = $query->result()[0]->taskID;}

			$taskData[$count] = array(
			'title' => $this->input->post('taskTitle'),
			'taskID' => ($taskID),
			'startDate' => $this->project_model->convert_date($this->input->post('taskStartDate')),
			'endDate' => $this->project_model->convert
			e($this->input->post('taskEndDate')),
		);

		$this->db->where('taskID', $taskID);	

		}

		
	  	$this->db->update_batch('project_tasks', $taskData, 'taskID');




}
*/


public function edit_tasks($projectID)
{
    $this->load->helper('url');
    
    $accountID = $this->session->accountID;
	$tasks = $this->input->post('task');
	
	echo $projectID;
		//taskID 	projectID 	title 	startDate 	endDate
	foreach($tasks as $id4 => $task){
		$taskData[] = array(
			'projectID'=>$projectID,
			'title' => 	$task['title'],			//$this->input->post('task[][title]'),
			'startDate' => 	$this->project_model->convert_date($task['startDate']),	// $this->input->post('task[][startDate]'),
			'endDate' => $this->project_model->convert_date($task['endDate']) 		//$this->i nput->post('task[][endDate]'),
		);
		$this->db->update_batch('project_tasks', $taskData);
		$taskID = $this->db->insert_id();
		if(isset($roleData))
			unset($roleData);
		$roles = $this->input->post('task[' . $id4 . '][role]');
		foreach($roles as $id2 => $role){
			$roleData[] = array(
				'taskID' => $taskID,
				'roleName' => 	$role['name'],			//$this->input->post('task[][title]'),
				'numPeople' => 	$role['numPeople'],	// $this->input->post('task[][startDate]'),
			);
			$this->db->update_batch('project_roles', $roleData);
			$roleID = $this->db->insert_id();
			
			

		}
	}

}


 public function allocation(){
    	
    	if($this->check_restricted() == false) {return;};
    	$this->load->helper('form');
    	
		$data['query'] = $this->project_model->search_algorithm();
    	
    	$this->load->view('templates/profile_header');
		$this->load->view('pages/project/project_allocation', $data);
		$this->load->view('templates/footer');
    	
    }




 
   public function load_project_history(){
       
        $accountID = $this->session->accountID; // will only work for the logged in account ??
       

        $this->db->select('*');
        $this->db-> from ( 'project AS proj', 'project_tasks AS task', 'project_roles AS role');
        $this->db-> join ('project_tasks AS task', 'proj.projectID = task.projectID');
        $this->db-> join ('project_roles AS role', 'task.taskID = role.taskID ');
        $this->db-> join ('employee_assignment AS ea', 'role.roleID = ea.roleID');
        $this->db-> where('ea.accountID', $accountID); 
       
        $query = $this->db->get();
       
        if($query-> num_rows() < 1){
            print_r("There are no records to fetch!... \n");
            return;
        }
       
        return $query;
           
    }

    
    
    public function day_count($startDate, $endDate){
        
        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);
        $dayCount = date_diff($startDate, $endDate);
        return $dayCount;
    }


    public function in_between($taskStartDate, $taskEndDate, $date){
        
        $taskStartDate = strtotime($taskStartDate);
        $taskEndDate = strtotime($taskEndDate);
        $date = strtotime($date);
        
        return (($date>=$taskStartDate) && ($date<=$taskEndDate));
        
        
    }




    public function allocate_assignment($employeeAssignment){
        
        $this->db->insert('employee_assignment', $employeeAssignment);
        
    
        
    }
    
    
    
    public Function allCandidates(){
    
     /* Current expenditure on employees for the project // project ID */
        $budgetExpenditure = 0;
        $projectID = ($this->session->projectID);
        
        /* Get the budget for the project */
        $this->db->select('budget');
        $this->db->from('project');
        $this->db->where('projectID', $projectID);
        
        $budgetLimit = (int)($this->db->get()->result()[0]->budget);
        
        /* Return all tasks in project into an array */
        $this->db->select('taskID,startDate,endDate');
        $this->db->from('project_tasks');
        $this->db->where('projectID', $projectID);
        $taskArray = $this->db->get()->result_array();
        
        
        $candidateArray = array();
       // $rolesArray = array();
        
        
        /* Loop through tasks to get all roles  */
        foreach($taskArray as $t){
			$this->db->select('roleID,numPeople');
            $this->db->from('project_roles');
            $this->db->where('taskID', $t['taskID']);
            $query = $this->db->get();
            $rolesArray = $query->result_array();
			$taskStartDate = $t['startDate'];
			$taskEndDate   = $t['endDate'];

           // array_push($rolesArray, $this->db->get()->result_array());
        
            /* Loop through roles and get the skills required for them */    
            foreach($rolesArray as $r){

                $this->db->select('skillID,skillLevel');
                $this->db->from('role_skills_required');
                $this->db->where('roleID', $r['roleID']);
                $skills_required = $this->db->get()->result();
                $skillslist = array();
                foreach($skills_required as $sr)
					$skillslist[]=$sr->skillID;

                  
                $this->db->select('user_account.accountID,user_skills.skillLevel, firstname,lastname');
                $this->db->from('user_account');
                $this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
                $this->db->join('person','person.accountID = user_account.accountID');
                $this->db->where_in('user_skills.skillID',$skillslist);
               

           
                $candidates = $this->db->get()->result();
                array_push(
					$candidateArray, 
                    array(
						'roleID' => $r['roleID'],
						'candidates' => $candidates
					)
				);
			}
		}
		
		return $candidateArray;
    
}
 
 
 
public function travel_distance($to, $from){
 
            $from = urlencode($from);
            $to = urlencode($to);
 
            $data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
            $data = json_decode($data);
 
            $time = 0;
            $distance = 0;
 
            foreach($data->rows[0]->elements as $road) {
               $time += $road->duration->value;
               $distance += $road->distance->value;
            }
 
            //~ echo "To: ".$data->destination_addresses[0];
            //~ echo "<br/>";
            //~ echo "From: ".$data->origin_addresses[0];
            //~ echo "<br/>";
            $time = $time / 60;
            //~ echo "Time: ".$time." Minutes";
            //~ echo "<br/>";
            $distance = ($distance / 1000) * 0.62137;
            //~ echo "Distance: ".$distance." Miles";
            //~ print_r($distance);
           
            return $distance;
       
}   
    
    
public function search_algorithm(){
        
        /* Current expenditure on employees for the project // project ID */
        $budgetExpenditure = 0;
        $projectID = ($this->session->projectID);
        			print_r($projectID);
		echo "  hello   ";
        
		$this->db->select('a.postcode, p.projectID, p.addressID');
        $this->db->from('address AS a');
        $this->db->join('project as p', 'p.addressID = a.addressID');
        $this->db->where('p.projectID', $projectID);
        
        $projectAddress = $this->db->get()->result_array();
        
        /* Get the budget for the project */
        $this->db->select('budget');
        $this->db->from('project');
        $this->db->where('projectID', $projectID);
        
        $budgetLimit = (int)($this->db->get()->result()[0]->budget);
        
        /* Return all tasks in project into an array */
        $this->db->select('taskID,startDate,endDate');
        $this->db->from('project_tasks');
        $this->db->where('projectID', $projectID);
        $taskArray = $this->db->get()->result_array();
        
        
        $employeeAssignment = array();
       // $rolesArray = array();
        
        
        /* Loop through tasks to get all roles  */
        foreach($taskArray as $t){
			$this->db->select('roleID,numPeople');
            $this->db->from('project_roles');
            $this->db->where('taskID', $t['taskID']);
            $query = $this->db->get();
            $rolesArray = $query->result_array();
			$taskStartDate = $t['startDate'];
			$taskEndDate   = $t['endDate'];
			print_r($rolesArray);
           // array_push($rolesArray, $this->db->get()->result_array());
        
            /* Loop through roles and get the skills required for them */    
            foreach($rolesArray as $r){
				print_r($r['roleID']);
                $this->db->select('skillID,skillLevel');
                $this->db->from('role_skills_required');
                $this->db->where('roleID', $r['roleID']);
                $skills_required = $this->db->get()->result();
                $skillslist = array();
                foreach($skills_required as $sr)
					$skillslist[]=$sr->skillID;

                  
                $this->db->select('user_account.accountID,user_skills.skillLevel');
                $this->db->from('user_account');
                $this->db->join('user_skills', 'user_skills.accountID = user_account.accountID');
                $this->db->join('person','person.accountID = user_account.accountID');
                $this->db->where_in('user_skills.skillID',$skillslist);
               

           
                $candidates = $this->db->get();
				
                if($candidates->num_rows() <  $r['numPeople']){
                        echo 'No candidates match the required number for this role';
                        return;
                }
                $candidates = $candidates->result();

                    foreach($candidates as $c){
                        $suitable = true;
                        foreach($skills_required as $skill){
                            if($c->skillLevel < $skill->skillLevel){
                                $suitable = false;
                                print_r('candidate does not have required skill level');
                                break;  
                            }
                        }
                        
                        if($suitable = false){
                            continue;
                        }
                                              
                                              
                        $accountID = $c->accountID;


						$this->db->select('a.postcode, p.travel_distance, p.accountID, p.addressID');
						$this->db->from('address AS a');
						$this->db->join('person as p', 'p.addressID = a.addressID');
						$this->db->where('p.accountID', $accountID);
						$this->db->limit(1);
       
 
						$personAddress = $this->db->get()->result_array();
						//~ print_r( $projectAddress);

                        
                        $this->db->select('dayRate');
                        $this->db->from('person');
                        $this->db->where('accountID', $accountID);
                        $dayRate = $this->db->get()->result()[0]->dayRate;

                        /* */


                        /* check employee availability */

                        $this->db->select('time_off.startDate, time_off.endDate');
                        $this->db->from('time_off');
                        $this->db->where('time_off.accountID', $accountID);
                        $holiday = $this->db->get()->result_array();

                        /* For every holiday the current candidate has, check whether their holiday start date or end date lies anywhere between the tasks start and end dates. */
                        /* THIS TABLE SHOULD HANDLE ALREADY BEING ASSIGNED TO A PROJECT! --> AVAILABILITY TABLE (availability instead of time_off) */


                        foreach($holiday as $h){  
                            if(in_between($t['startDate'],$t['endDate'], $h['startDate']) || in_between($t['startDate'], $t['endDate'], $h['startDate'])){
                                echo 'The employee isn\'t available during the task dates!' ;
                                $suitable = false;
                                break;
                            }  
                        }

                        if($suitable = false){
                            continue;

                        }
							
						//~ print_r("  before location <br>");
                        if($this->project_model->travel_distance($personAddress[0]['postcode'], $projectAddress[0]['postcode']) > $personAddress[0]['travel_distance'] ){
                            $suitable = false;
                            continue;
                           
						}
							
							
                        $numberOfDays = $this->project_model->day_count($taskStartDate, $taskEndDate);
                        $employeeCost =$dayRate * ( $numberOfDays->d);
                        $budgetExpenditure = $budgetExpenditure + (int) $employeeCost;

                        if($budgetExpenditure > $budgetLimit){
                            echo 'project budget exceeded! ';
                            continue; 
                        }

					$this->db->select('accountID,firstname,lastname');
					$this->db->from('person');
					$this->db->where('accountID',$accountID);
					$pData = $this->db->get()->result()[0];
					
					$this->db->select('skillID,skillLevel, experienceYears');
					$this->db->from('user_skills');
					$this->db->where('accountID',$accountID);
					$pSkills = $this->db->get()->result();
					
					
                         array_push(
					$employeeAssignment, 
                    array(
						'roleID' => $r['roleID'],
						'accountID' => $accountID,
						'data' => $pData,
						'skills' => $pSkills

					)
                );	
                        break;
                        
                    }
                    
               
                    
              }
              
        }
        //~ echo "<br> employees:";
        //~ print_r($employeeAssignment);
        return $employeeAssignment; 
        
 }
 
 public function get_matched_profiles($list){
	 if(!isset($list) and empty($list))
		return;
	
	 
 }
	 
    
    
    
    

}



