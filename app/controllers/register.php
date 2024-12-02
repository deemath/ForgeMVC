<?php 
class register{
    use Controller;
        public function coordinator(){
            
        if(isset($_POST['submit'])){
            $input['name'] = $_POST['name'];
            $input['email'] = $_POST['email'];
            $input['password'] = $_POST['password'];
            $input['institute'] = $_POST['institute'];
            $input['re-password'] = $_POST['confirm_password'];
            $input['address'] = $_POST['address'];
            $input['phone'] = $_POST['phone'];
            // print_r($input);

            $admin4 = new AdminModel;
            $result = $admin4->ValidateCorReg($input);
            if($result){
                $data['errors'] = $admin4->errors;
               // print_r($data);
                $this->view('/',$data);
            }else{
                // register logic here
                $dataset['name'] = $_POST['name'];
                $dataset['email'] = $_POST['email'];
                $dataset['password'] = $_POST['password'];
                $dataset['institute'] = $_POST['institute'];
                $dataset['address'] = $_POST['address'];
                $dataset['phone'] = $_POST['phone'];
                $admin4->AddCordinator1($dataset);
                header('Location:'.ROOT.'/login');
                exit;
            }
        }

        
        }


    public function user(){
        if(isset($_POST['submit'])){
            $input['name'] = $_POST['name'];
            $input['email'] = $_POST['email'];
            $input['password'] = $_POST['password'];
        
            $input['re-password'] = $_POST['confirm_password'];
            
            $input['phone'] = $_POST['phone'];
            // print_r($input);

            $admin4 = new RegisterModel;
            $result = $admin4->validate($input);
            if($result){
                $data['errors'] = $admin4->errors;
               print_r($data);
                //$this->view('/',$data);
            }else{
                // register logic here
                $dataset['name'] = $_POST['name'];
                $dataset['email'] = $_POST['email'];
                $dataset['password'] = $_POST['password'];
                
                
                $dataset['phone'] = $_POST['phone'];
                $admin4->user($dataset);
                header('Location:'.ROOT.'/login');
                exit;
            }
        }
    }
}

