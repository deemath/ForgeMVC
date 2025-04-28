<?php 
class task{
    use Controller;
    public function updatetask(){
        $id = $_POST['id'];

       if (isset($_POST['title'])) {
            $data['title'] = $_POST['title'];
        }
        if (isset($_POST['description'])) {
            $data['description'] = $_POST['description'];
        }
        if (isset($_POST['startdate'])) {
            $data['startdate'] = $_POST['startdate'];
        }
        if (isset($_POST['enddate'])) {
            $data['enddate'] = $_POST['enddate'];
        }
        if (isset($_POST['status'])) {
            $data['status'] = $_POST['status'];
        }
        $dump = new taskModel;
        $dump->update($id, $data);

    }

    public function showedit(){
        $id = $_SESSION['project_id'];
        $dump = new taskModel;
        $data = $dump->findtask($id);
        $this->view('supervisor/edittask',$data);

    }


    public function create($errors=[]){
        $prj = new ProjectModel;
        $cor5= new taskModel;
        $result['users']= $cor5->fetchUsers();
        $result['errors']= $errors;
        $data = $prj->ShowDashboard4($_SESSION['project_id']);
        if ($result) {
            $this->view('supervisor/createtask', $result); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
        
    }
    public function createtask(){
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
            $this->create($errors);
            
        }
        $dump['projectid']=$_SESSION['project_id'];
        
        $prjj= new taskModel;
        $no = $prjj->fetchNumber($dump);

        $basicData['title']= $title;
        $basicData['no']= $no;
        $basicData['description']= $description;
        $basicData['startdate']= $startDate;
        $basicData['enddate']= $endDate;
        $basicData['createdby']= $_SESSION['user_id'];
        $basicData['status']= 1;
        $basicData['projectid']= $_SESSION['project_id'];

        $project = new taskModel;

        $status = $project->createtask($basicData,$selected_members);
        if($status){
            header('Location: ' . ROOT . '/supervisor/tasklist');
            exit;
        }else{
            $errors['errors'] = "Failed to create project.";
            $this->create($errors);
        }


    }

    public function showdetail(){
        $id = $_POST['id'];
        $prj = new taskModel;
        $data = $prj->fetchAssign($id);
        if ($data) {
//             print_r($_POST);
//             echo '<pre>';
// print_r($data);
// echo '</pre>';
            $this->view('supervisor/tasklist', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
    }

    public function delete(){
        $id = $_POST['id'];
        $prj1 = new taskModel;
        $status = $prj1->deleteTask($id);
        if(!$status){
            header('Location: ' . ROOT . '/supervisor/tasklist');
            exit;
        }else{
            $this->view('_404');
        }
    }
    public function edit($tempid=null, $errors=[]){
        
        if($tempid!=null){
            $id = $tempid;
        }else{
            
            $id = $_POST["id"];
        }
        
        
        // echo $id;
        $prj = new taskModel;
        $data = $prj->fetchAssign($id);
        $data['errors'] = $errors;
        if ($data) {
            $this->view('supervisor/edittask', $data); // Pass data as an array
        }
       
        return $this->view('_404');
    }

    // public function edit($tempid = null) {
    //     $id = $tempid ?? ($_POST['id'] ?? null); // Get from URL or POST
    
    //     if (!$id) {
    //         return $this->view('_404');
    //     }
    
    //     $prj = new taskModel;
    //     echo $id;
    //     $data = $prj->fetchAssign($id);
    
    //     if ($data) {
    //         return $this->view('supervisor/edittask', $data);
    //     }
    
    //     return $this->view('_404');
    // }
    


    
    public function editDescription(){
        if(!empty($_SESSION["project_id"])){
            $data["projectid"] = $_SESSION["project_id"];
            $data["taskid"] = $_POST['taskid'];
            $data["newDescription"] =  $_POST['description'];
            $prj = new taskModel;
            
            $status = $prj->updateDes($data);
    
            if($status){
                
               $this->edit($_POST['taskid']);
              
            }

            

        }
        else{
            $this->view("_404");
        }
    }

    public function editTitle(){
        if(!empty($_SESSION["project_id"])){
            $data["projectid"] = $_SESSION["project_id"];
            $data["taskid"] = $_POST['taskid'];
            $data["newtitle"] =  $_POST['title'];
            $prj = new taskModel;
            $status = $prj->updateTitle($data);
            if($status){
                
               $this->edit($_POST['taskid']);
            }

          
        }
        else{
            $this->view("_404");
        }
    }

    public function editStatus(){
        if(!empty($_SESSION["project_id"])){
            $data["projectid"] = $_SESSION["project_id"];
            $data["taskid"] = $_POST['taskid'];
            $data["status"] =  $_POST['status'];
            $prj = new taskModel;
            $status = $prj->updateStatus($data);
            if($status){
                
               $this->edit($_POST['taskid']);
            }

          
        }
        else{
            $this->view("_404");
        }
    }

    public function Updateflags(){

        

        if(!empty($_SESSION["project_id"])){
            $data["projectid"] = $_SESSION["project_id"];
            $data["id"] = $_POST['id'];
            $data["flagid"] =  $_POST['flagid'];
            $data["taskid"] = $_POST['taskid'];

            if( $data["id"] == 0 ){
                $prj = new taskModel;
                $status = $prj->createflag($data);
            }else{

                    $prj = new taskModel;
                    $status = $prj->updateflag($data);
            }       
            if($status){
                
                
            $this->edit($_POST['taskid']);
            }

          
        }
        else{
            $this->view("_404");
        }



       
    }
    public function addSubtask(){
        $data["title"] = $_POST['title'];
        $data['projectid']=$_SESSION["project_id"];
        $data['taskid'] = $_POST['taskid'];
        $data["description"] = $_POST['description'];
        $data['startdate'] = date('Y-m-d');
        $data['enddate'] = date('Y-m-d');
       
 
        $prj = new taskModel;
        $status = $prj->addsubtask($data);
        if($status){
                
            $this->edit($_POST['taskid']);
        }
        else{
            $this->view("_404");
        }
    }


    public function editSubtask(){
        if(!empty($_SESSION["project_id"])){
            $data["projectid"] = $_SESSION["project_id"];
            $data["title"] = $_POST['title'];
            $data['projectid']=$_SESSION["project_id"];
            $data['subtaskid'] = $_POST['id'];
            $data["description"] = $_POST['description'];

            

            $prj = new taskModel;
            $status = $prj->updatesubtask($data);
                  
            if($status){
                
                
            $this->edit($_POST['taskid']);
            }

          
        }
        else{
            $this->view("_404");
        }
    }

    public function deleteSubtask(){
        $data['id']= $_POST['id'];
        if(!empty($_SESSION["project_id"])){
            $data['id']= $_POST['id'];

            $prj = new taskModel;
            $status = $prj->deletesubtask($data);
                  
            if($status){
                
                
            $this->edit($_POST['taskid']);
            }

          
        }
        else{
            $this->view("_404");
        }
    }
    

    public function addcomment(){
        $data['include'] = $_POST['comment'];
        $data['taskid'] = $_POST['taskid'];
        $data['projectid'] = $_SESSION["project_id"];
        $data['createby'] = $_SESSION["user_id"];
        $data['role'] = $_SESSION["user_role"];
        $prj = new taskModel;
        $status = $prj->addcomment($data);
        if($status){
                
            $this->edit($_POST['taskid']);
        }
        else{
            $this->view("_404");
        }
    }

    public function editStartDate(){
        if(!empty($_SESSION["project_id"])){
            $data["projectid"] = $_SESSION["project_id"];
            $data["id"] = $_POST['id'];
          
            $projectEndDate = $_POST['projectEndDate'];
            $currentdate = date('Y-m-d');
            $projectStartDate = $_POST['projectStartDate'];
            $taskenddate = $_POST['taskenddate'];


            if($_POST['startdate'] > $taskenddate){
                $errors['errors'] = "Starting date is invalid . please make sure that date you entered before task ending date. (Project Starts on ".$taskenddate.")";
                $this->edit($data["id"],$errors);
                exit;
            }
            if($_POST['startdate'] > $projectEndDate){
                $errors['errors'] = "Starting date is invalid . please make sure that date you entered before project Starting date. (Project Starts on ".$projectEndDate.")";
                $this->edit($data["id"],$errors);
                exit;
            }

            if($_POST['startdate'] < $projectStartDate){
                $errors['errors'] = "Starting date is invalid . please make sure that date you entered after project Starting date. (Project Starts on ".$projectStartDate.")";
                $this->edit($data["id"],$errors);
                exit;
            }

            ///if function for redirrect with error["starting date is pastaway]
            if($currentdate > $_POST['startdate']){
                $errors['errors'] = "Starting date is passed away";
                $this->edit($data["id"],$errors);
                exit;
            }




            $data["startdate"] =  $_POST['startdate'];
            $prj = new taskModel;
            $status = $prj->updateStartDate($data);
            if($status){
                
               $this->edit($_POST['id']);
            }

          
        }
        else{
            $this->view("_404");
        }
    }


    ////end date change editEndDate
    public function editEndDate(){
        if(!empty($_SESSION["project_id"])){
            $data["projectid"] = $_SESSION["project_id"];
            $data["id"] = $_POST['id'];
          
            $taskstartdate = $_POST['taskstartdate'];
            $projectEndDate = $_POST['projectEndDate'];
            $currentdate = date('Y-m-d');
            $projectStartDate = $_POST['projectStartDate'];
            $taskenddate = $_POST['enddate'];


            if($_POST['enddate'] < $taskstartdate){
                $errors['errors'] = "Starting date is invalid . please make sure that date you entered after task start date. (Project Starts on ".$taskstartdate.")";
                $this->edit($data["id"],$errors);
                exit;
            }
            if($_POST['enddate'] > $projectEndDate){
                $errors['errors'] = "Starting date is invalid . please make sure that date you entered before project ending date. (Project Ends on ".$projectEndDate.")";
                $this->edit($data["id"],$errors);
                exit;
            }

            if($_POST['enddate'] < $projectStartDate){
                $errors['errors'] = "Starting date is invalid . please make sure that date you entered after project Starting date. (Project Starts on ".$projectStartDate.")";
                $this->edit($data["id"],$errors);
                exit;
            }

            ///if function for redirrect with error["starting date is pastaway]
            if($currentdate > $_POST['enddate']){
                $errors['errors'] = "Starting date is passed away";
                $this->edit($data["id"],$errors);
                exit;
            }




            $data["enddate"] =  $_POST['enddate'];
            $prj = new taskModel;
            $status = $prj->updateEnddate($data);
            if($status){
                
               $this->edit($_POST['id']);
            }

          
        }
        else{
            $this->view("_404");
        }
    }



    public function assignMembers(){
        $data['taskid'] =  $_POST['taskid'];
        $data['projectid'] = $_SESSION["project_id"];
        $data['member'] = $_POST['member'];
        $prj = new taskModel;

        $status = $prj->checkassign($data);
        if($status){
            $errors['errors'] = "This member already assigned to this task";
            $this->edit($data['taskid'],$errors);
            exit;
        }


        $status = $prj->assignMembers($data);
        if($status){
                
            $this->edit($_POST['taskid']);
        }
        else{
            $this->view("_404");
        }
    }

    ///delete assigned member
    public function deleteAssignedMember(){
        $data['taskid'] =  $_POST['taskid'];
        $data['projectid'] = $_SESSION["project_id"];
        $data['member'] = $_POST['member'];
        $prj = new taskModel;

        $status = $prj->deleteAssignedMember($data);
        if($status){
                
            $this->edit($_POST['taskid']);
        }
        else{
            $this->view("_404");
        }
    }
   

}