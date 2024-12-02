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

        $status = $project->createtask($basicData);
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


}