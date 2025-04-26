<?php

class Admin{
    use Controller;

    
   
    public function index(){
        $data=[];
        
        $this->view('Admin/index',$data);
    }

    public function Login(){
        $data=[];
        $datanot =[];
        
        session_unset();
        session_destroy();
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $arr['username'] = $_POST['username'];
            $arr['password'] = $_POST['password'];
            $arr1['username']= $_POST['username'];
            ///print_r($arr1);
            $admin = new AdminModel;

            if($admin->Validate($arr)){
                // echo 'invalid';
                $data['errors'] = $admin->errors;
                $this->view('Admin/index',$data);
            }else{
                
                $adminAuth = new AuthModel;
                $result=$adminAuth->AdminLoginValidate($arr1,$arr);
                if($result){
                    //echo "credentials are correct";
                    session_start();
                    $_SESSION['admin_id'] = $result;
                    $this->Dashboard();
                    // $this->view('Admin/dashboard');
                }else{
                    $data['errors'] = $adminAuth->errors;
                    $this->view('Admin/index',$data);
                    
                }
            }

        }else{
            $this->view('_404');
        }
    }

    public function Dashboard(){
        if(!empty($_SESSION['admin_id'])){
            //fecting moast recent 10 projects
            $admin1 = new AdminModel;
            $data = $admin1->Dashboard();
            $data['project_count'] = $admin1->getProjectCount();
            $data['total_users'] = $admin1->getTotalRegisteredUsers();
            $this->view('Admin/dashboard',$data);
        }else{
            $this->view('_404');
        }
    }

    public function coordinatorlist(){
        if(!empty($_SESSION['admin_id'])){
            $admin2 = new AdminModel;
            $data = $admin2->coordinatorlist();
            $this->view('Admin/coordinatorlist',$data);
        }else{
            //echo 'no';
            $this->view('_404');
        }   
    }
    public function updateCoordinator(){
        if(!empty($_SESSION['admin_id'])){
            $id = $_POST['id'];
            $input['name'] = $_POST['name'];
            $input['email'] = $_POST['email'];
            $input['institute'] = $_POST['institute'];
            $admin3 = new AdminModel;
            $data = $admin3->updateCoordinator($id,$input);
            if($data){
                header('Location:'.ROOT.'/Admin/coordinatorlist');
                exit;
            }
        }else{
            $this->view('_404');
        }
    }

    public function deleteCoordinator(){
       
        if(!empty($_SESSION['admin_id'])){
            $id = $_POST['id'];
            // print_r($id);
            // echo $id;
            $admin4 = new AdminModel;
            $data = $admin4->deleteCoordinator($id);
            if($data){
                header('Location:'.ROOT.'/Admin/coordinatorlist');
                exit;
               
            }
        }else{
            $this->view('_404');
        }
    }

    public function registerView(){
        $this->view('Admin/register');
    }

    public function register(){
        
        if(isset($_POST['submit'])){
            $input['name'] = $_POST['name'];
            $input['email'] = $_POST['email'];
            $input['password'] = $_POST['password'];
            $input['institute'] = $_POST['institute'];
            $input['re-password'] = $_POST['re-password'];
            $input['address'] = $_POST['address'];
            $input['phone'] = $_POST['phone'];
            // print_r($input);
            $admin4 = new AdminModel;
            $result = $admin4->ValidateCorReg($input);
            if($result){
                $data['errors'] = $admin4->errors;
                
                $this->view('Admin/register',$data);
            }else{
                // register logic here
                $dataset['name'] = $_POST['name'];
                $dataset['email'] = $_POST['email'];
                $dataset['password'] = $_POST['password'];
                $dataset['institute'] = $_POST['institute'];
                $dataset['address'] = $_POST['address'];
                $dataset['phone'] = $_POST['phone'];
                $admin4->AddCordinator1($dataset);
                header('Location:'.ROOT.'/Admin/coordinatorlist');
                exit;
            }
        }

    }

    public function projectlist(){
        ///$this->view('Admin/projectlist');
        if(!empty($_SESSION['admin_id'])){
            $admin5 = new AdminModel;
            $data = $admin5->projectList();
            $this->view('Admin/projectlist',$data);
        }else{
            ///echo 'no';
            $this->view('_404');
        }  
    }

    public function deleteProject(){
        if(!empty($_SESSION['admin_id'])){
        $id = $_POST['id'];
        $dsd = new AdminModel;
        $dsd->deleteProject($id);
        header('Location:'.ROOT.'/Admin/projectlist');
        exit;
    }else{
        $this->view('_404');
    }
        $this->projectlist();
    }

    public function profilecard(){
        return $this->view(name:'Admin/profilecard');
    }



    // Method to get project data for editing
    public function getProjectData($id) {
        if(!empty($_SESSION['admin_id'])) {
            $admin = new AdminModel;
            $project = $admin->getProjectById($id);
        
        if($project) {
            header('Content-Type: application/json');
            echo json_encode($project);
            exit;
        }
        
        echo json_encode(['error' => 'Project not found']);
        exit;
    }
    
    $this->view('_404');
}

// Method to update project
    public function updateProject() {
        if(!empty($_SESSION['admin_id'])) {
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $id = $_POST['id'];
                $input = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description']
                // Add other fields as needed
                ];
            
                $admin = new AdminModel;

                $admin->updateProject($id, $input);
                $result = $admin->updateProject($id, $input);
            
            if($result) {
                header('Location:' . ROOT . '/Admin/dashboard?success=1');
            } else {
                header('Location:' . ROOT . '/Admin/dashboard?error=1');
            }
            exit;
        }
        } else {
            $this->view('_404');
        }
    }

}




