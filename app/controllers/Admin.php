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
            echo 'no';
            $this->view('_404');
        }   
    }

}




