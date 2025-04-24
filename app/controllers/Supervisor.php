<?php 
class Supervisor{
    use Controller;
    public function load() {
        $prj = new ProjectModel;
        if(isset($_POST['projectid'])){
            $id = $_POST['projectid'];
        }else{
            $id = $_SESSION['project_id'];
        }
        
    
        $data = $prj->ShowDashboard4($id);
        if ($data) {
            $this->view('Supervisor/dashboard', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
    }

    public function tasklist(){
        
        $prj = new ProjectModel;
        $data = $prj->ShowDashboard4($_SESSION['project_id']);
        if ($data) {
            $this->view('supervisor/tasklist', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
       
    }

    public function showTimeline(){
        $prj = new ProjectModel;
        $data = $prj->ShowDashboard4($_SESSION['project_id']);
        if ($data) {
            $this->view('supervisor/timeline', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
    }
    public function showDocument(){
        // $prj = new ProjectModel;
        // $data = $prj->ShowDashboard4($_SESSION['project_id']);
        $docModel = new DocModel;
        $data = $docModel->getdoc($_SESSION['project_id']);
        if ($data) {
            $this->view('supervisor/document', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
    }

    
    public function Chatbox(){
        $prj = new ProjectModel;
        $data = $prj->ShowDashboard4($_SESSION['project_id']);
        if ($data) {
            $this->view('supervisor/chatbox', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
    }
    

    public function memberlist(){
        $prj = new ProjectModel;
        $data = $prj->loadmembers();
        if ($data) {
            $this->view('supervisor/memberlist', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
    }
    
    public function showCalender(){
        $this->view('supervisor/calender');
    }

    public function addSubtask(){
        $data["title"] = $_POST['title'];
        $data['projectid']=$_SESSION["project_id"];
        $data['taskid'] = $_POST['taskid'];
        $data["description"] = $_POST['description'];
        $data['startdate'] = date('Y-m-d');
        $data['enddate'] = date('Y-m-d');
        // echo "pass";

        // $data["title"] = "dsfsdf";
        // $data['projectid']= 1;
        // $data['taskid'] = 45;
        // $data["description"] = 'fggdfgdf';
 
        $prj = new taskModel;
        $status = $prj->addsubtask($data);
        if($status){
                
               $this->tasklist();
        }
        else{
            $this->view("_404");
        }

    }
}