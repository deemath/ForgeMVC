<?php 
class Supervisor {
    use Controller;

    use Controller;
    public function load() {
        $prj = new ProjectModel;

        if (isset($_POST['projectid']) && !empty($_POST['projectid'])) {
            $id = htmlspecialchars($_POST['projectid']);
        } else {
            // Handle the case where projectid is not set or empty
            throw new Exception("Project ID is required.");
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
        if (!isset($_SESSION['project_id'])) {
            $this->view('_404'); // Show a 404 view if project_id is not set
            return;
        }
        
        $userModel = new userModel; // Assuming userModel is the correct model to fetch users
        $data = $userModel->Showusers($_SESSION['project_id']); // Fetch users based on roles
        if ($data) {
            $this->view('supervisor/memberlist', $data); // Pass data as an array
        } else {
            // $this->view('_404'); // Show a 404 view if no data is returned
            $this->view('supervisor/memberlist', $data); 
        }
    }
}
