<?php 
class Coordinator{
     use Controller;

     public function Dashboard(){
        $coordinatorId = $_SESSION['coordinator_id'];

        $dashboardModel = new CoordinatorModel();

        $data = [
            'totalProjects' => $dashboardModel->getTotalProjects($coordinatorId),
            'recentProject' => $dashboardModel->getRecentProject($coordinatorId),
            'completedProjects' => $dashboardModel->getCompletedProjects($coordinatorId),
            'ongoingProjects' => $dashboardModel->getOngoingProjects($coordinatorId),
            'Projects' => $dashboardModel->getAllProjects($coordinatorId)
        ];
        
        $this->view('Coordinator/Dashboard', $data);
     }

     public function ShowInvite($data=[]){
        $cor2 = new CoordinatorModel;
       
        $data['invitations']= $cor2->showInvite();
        


        $this->view('coordinator/invite',$data);

     }



     public function invite() {
        // Sanitize and validate inputs
        $inputs['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $inputs['role'] = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
    
        // Debugging print statement (remove in production)
        print_r($inputs);
    
        // Call the invite method from the CoordinatorModel
        $cor1 = new CoordinatorModel;
        $isInvited = $cor1->invite($inputs); // invite method will return true or false
    
        if ($isInvited) {
            // Redirect to ShowInvite page if successful
            $this->showInvite();
            exit; // Always exit after header to prevent further execution
        } else {
            // Pass errors and inputs back to the view
            $data['errors'] = $cor1->errors;
            $data['inputs'] = $inputs; // Preserve user inputs for repopulation
            $this->showInvite($data);
        }
    }
    

    public function Userlist(){

        $cor5= new CoordinatorModel;
        $result['users']= $cor5->fetchUsers();
        if( $result){
        $this->view('Coordinator/userList',$result);
        }else{
            $this->view('_404');
        }
    }
     public function removeUser(){
        $cor6 = new CoordinatorModel;
        $id = $_POST['id'];
        $result=$cor6->removeUser($id);
        if(!$result){
           header('Location: ' . ROOT . '/coordinator/userList');      
         }
     }

     public function projectlist(){
        $cor7 = new CoordinatorModel;
        $id = $_POST['id'];
        $result['projects']=$cor7->fetchProjectList($id);
        if($result){
            $this->view('Coordinator/projectList',$result);
            }else
            {
                $this->view('_404');
                }
     }


     public function createprojectForm($errors=[]){
        $cor5= new CoordinatorModel;
        $result['users']= $cor5->fetchUsers();
        $result['errors']= $errors;
        if( $result){
        $this->view('coordinator/addproject',$result);
        }else{
            $this->view('_404');
        }
     }

     public function createProject() {
        $errors=[];
        // Retrieve data from POST request
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $supervisors = $_POST['supervisors'] ?? [];
        $cosupervisors = $_POST['cosupervisors'] ?? [];
        $selected_members = $_POST['selected_members'] ?? [];
        $startDate = $_POST['start_date'] ?? null;
        $endDate = $_POST['end_date'] ?? null;

        if (empty($title) || empty($description) || empty($startDate) || empty($endDate)) {
            // Handle missing data, e.g., return an error message
            $errors['errors']= "Please fill in all required fields.";
            $this->createProjectForm($errors);
            
        }
        $allIds = array_merge($supervisors, $cosupervisors, $selected_members);
            if (count($allIds) !== count(array_unique($allIds))) {
                $errors['errors'] = "Duplicate IDs found in supervisors, cosupervisors, or members.";
                $this->createProjectForm($errors);
        }
        $basicData['title']= $title;
        $basicData['description']= $description;
        $basicData['startdate']= $startDate;
        $basicData['enddate']= $endDate;
        $basicData['updatedat']= date('Y-m-d H:i:s');
        $basicData['coordinatorid']= $_SESSION['coordinator_id'];

        $project = new ProjectModel;
        $status = $project->createProject($basicData,$supervisors,$cosupervisors,$selected_members);
        if($status){
            $this->projectlist();
        }else{
            $errors['errors'] = "Failed to create project.";
            $this->createProjectForm($errors);
        }

     }

     public function deleteProject(){
        $data=$_POST['id'];
        $project = new ProjectModel;
        $status = $project->deleteProject($data);
        $this->projectlist();

     }

     public function loadupdateproject($id = null){
        if(!$id) {
            $id = $_POST['id'] ?? null;
        }
        if(!$id) {
            $this->view('_404');
            return;
        }

        $fkd = new ProjectModel;
        $data =$fkd->loadupdateproject($id);
        
        $corModel = new CoordinatorModel();
        $data['users'] = $corModel->fetchUsers();

        return $this->view('coordinator/projectedit',$data);
     }


     public function updateProject(){
        $errors=[];
        // Retrieve data from POST request
        $id = $_POST['id'];
        $title = $_POST['project-name'] ?? null;
        $description = $_POST['project-description'] ?? null;
        $startDate = $_POST['start-date'] ?? null;
        $endDate = $_POST['end-date'] ?? null;
        
        if(empty($title) || empty($description) || empty($startDate) || empty($endDate)){
            $errors['errors']= "Please fill in all required fields.";
            $this->loadupdateproject();
            return;
        }

        $projectData = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'startdate' => $startDate,
            'enddate' => $endDate,
        ];

        $model = new CoordinatorModel;
        $status = $model->updateProject($projectData);

        if($status){
            $this->projectlist();
        } else{
            $errors['errors'] = "Failed to update project.";
            $this->loadupdateproject();
        }

        //$dmp = new ProjectModel;
        //$data = $dmp->updateproject($id);
        
     }

     public function deletesup(){

        echo "pass";


        $dat['userid'] = $_POST['supervisor_id'];
        $dat['projectid'] = $_POST['project_id'];

        $df= new ProjectModel;

        if($df->deletesup($dat)){
            echo "pass";
        }else{
            echo "fail";
        }
     
        $fkd = new ProjectModel;
        $data =$fkd->loadupdateproject($dat['projectid']);
      ///var_dump($data);
        return $this->view('Coordinator/projectedit',$data);
     }

     public function addMembersToProject($projectId) {
        $coordinatorId = $_SESSION['user_id'];

        $this->loadModel('CoordinatorModel');
        $model = new CoordinatorModel();

        $emails = $model->getUserEmailsByCoordinatorId($coordinatorId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $supervisorEmail = $_POST['user_email'];
            $memberEmails = $_POST['user_emails'];
            $coSupervisorEmail = $_POST['user_email'];

            $model->addProjectMembers($projectId, $supervisorEmail, $memberEmails, $coSupervisorEmail);

            header('Location: /coordinator/projectlist');
            exit;
        }

        $this->view('Coordinator/projectlist', ['emails' => $emails]);
    }


    public function removeFromProject() {
        $cor6 = new CoordinatorModel();
        $id = $_POST['supid'];
        $project_id = $_POST['project_id'];
        $user_type = $_POST['user_type'];
        
        // Debugging statements
        error_log("Removing user: ID = $id, Project ID = $project_id, User Type = $user_type");

        $data = ['id' => $id, 'project_id' => $project_id];
        
        if ($user_type === 'supervisor') {
            $result = $cor6->deletesup($data);
            error_log("Supervisor removal result: " . ($result ? "Success" : "Failure"));
        } elseif ($user_type === 'cosupervisor') {
            $result = $cor6->deletecosup($data);
            error_log("Co-supervisor removal result: " . ($result ? "Success" : "Failure"));
        } elseif ($user_type === 'member') {
            $result = $cor6->deletemem($data);
            error_log("Member removal result: " . ($result ? "Success" : "Failure"));
        }

        // Redirect to load the updated project edit form
        echo '<form id="redirectForm" method="post" action="' . ROOT . '/Coordinator/loadupdateproject">
                <input type="hidden" name="id" value="' . $project_id . '">
              </form>
              <script>document.getElementById("redirectForm").submit();</script>';
        exit;
    } 



    public function addSup($projectId){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $supervisor_Id = $_POST['add-supervisor'];

            $projectModel = new CoordinatorModel();
            $result = $projectModel->addSupervisor($projectId, $supervisor_Id);

            if($result){
                echo '<form id = "redirectForm" method = "post" action = "' . ROOT . '/coordinator/loadupdateproject">
                <input type = "hidden" name = "id" value = "' . $projectId . '">
                </form>
                <script>document.getElementById("redirectForm").submit();</script>';
                exit;
            }else{
                $_SESSION['error_message'] = 'Failed to add supervisor';
                echo '<form id = "redirectForm" method = "post" action = "' . ROOT . '/coordinator/loadupdateproject">
                <input type = "hidden" name = "id" value = "' . $projectId . '">
                </form>
                <script>document.getElementById("redirectForm").submit();</script>';
                exit;
            }
        }
    }

    public function addCosup($projectId){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $cosupervisor_Id = $_POST['add-cosupervisor'];

            $projectModel = new CoordinatorModel();
            $result = $projectModel->addCosupervisor($projectId, $cosupervisor_Id);

            if($result){
                echo '<form id = "redirectForm" method = "post" action = "' . ROOT . '/coordinator/loadupdateproject">
                <input type = "hidden" name = "id" value = "' . $projectId . '">
                </form>
                <script>document.getElementById("redirectForm").submit();</script>';
                exit;
            }else{
                $_SESSION['error_message'] = 'Failed to add co-supervisor';
                echo '<form id = "redirectForm" method = "post" action = "' . ROOT . '/coordinator/loadupdateproject">
                <input type = "hidden" name = "id" value = "' . $projectId . '">
                </form>
                <script>document.getElementById("redirectForm").submit();</script>';
                exit;
            }
        }
    }

    public function addMem($projectId){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $member_Id = $_POST['add-member'];

            $projectModel = new CoordinatorModel();
            $result = $projectModel->addMember($projectId, $member_Id);

            if($result){
                echo '<form id = "redirectForm" method = "post" action = "' . ROOT . '/coordinator/loadupdateproject">
                <input type = "hidden" name = "id" value = "' . $projectId . '">
                </form>
                <script>document.getElementById("redirectForm").submit();</script>';
                exit;
            }else{
                $_SESSION['error_message'] = 'Failed to add member';
                echo '<form id = "redirectForm" method = "post" action = "' . ROOT . '/coordinator/loadupdateproject">
                <input type = "hidden" name = "id" value = "' . $projectId . '">
                </form>
                <script>document.getElementById("redirectForm").submit();</script>';
                exit;
            }
        }
    }

    public function dashProjects() {
        $coordinatorId = $_SESSION['coordinator_id'];

        $dashboardModel = new CoordinatorModel();

        $data = [
            'totalProjects' => $dashboardModel->getTotalProjects($coordinatorId),
            'recentProject' => $dashboardModel->getRecentProject($coordinatorId),
            'completedProjects' => $dashboardModel->getCompletedProjects($coordinatorId),
            'ongoingProjects' => $dashboardModel->getOngoingProjects($coordinatorId),
            'Projects' => $dashboardModel->getProjects($coordinatorId)
        ];
        
        $this->view('Coordinator/Dashboard', $data);
    }

    public function Settings() {
        $this->view('coordinator/coordSettings');
    }
    

}

