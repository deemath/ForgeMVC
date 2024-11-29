<?php 

/**
 * signup class
 */
class Signup
{
	use Controller;

	public function index()
	{
		if(isset($_POST['submit'])){
            $input['name'] = $_POST['name'];
            $input['email'] = $_POST['email'];
            $input['password'] = $_POST['password'];
            $input['institute'] = $_POST['institute'];
            $input['re-password'] = $_POST['re-password'];
            $input['address'] = $_POST['address'];
            $input['phone'] = $_POST['phone'];
            // print_r($input);
            $cor = new CoordinatorModel;
            $result = $cor->ValidateCorReg($input);
            if($result){
                $data['errors'] = $cor->errors;
                $data['inputs'] = $input;
                $this->view('home',$data);
				
            }else{
                // register logic here
                $dataset['name'] = $_POST['name'];
                $dataset['email'] = $_POST['email'];
                $dataset['password'] = $_POST['password'];
                $dataset['institute'] = $_POST['institute'];
                $dataset['address'] = $_POST['address'];
                $dataset['phone'] = $_POST['phone'];
                $cor->AddCordinator1($dataset);
                header('Location:'.ROOT.'/login');
                exit;
            }
        }		
	}

}
