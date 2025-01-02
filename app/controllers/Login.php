<?php 

/**
 * login class
 */
class Login
{
	use Controller;

	public function index()
	{	
		$this->view('login');
	}

	public function Login(){
        $data=[];
        $datanot =[];
        
        session_unset();
        session_destroy();
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $arr['email'] = $_POST['username'];
            $arr['password'] = $_POST['password'];
            $arr1['email']= $_POST['username'];
            ///print_r($arr1);
            $loginauth = new AuthModel;

            if($loginauth->Loginvalidation($arr)){
                // echo 'invalid';
                $data['errors'] = $loginauth->errors;
                $this->view('login',$data);
            }else{
                
                
                $result=$loginauth->PasswordValidation($arr1,$arr);
                if($result){
                    //echo "credentials are correct";
                    session_start();
                   /// print_r($result);
                    if(!empty($result['user'])&& isset($result['user'])){
                        $_SESSION['user_id'] = $result['user'];
                        
                       
                    }

                    if(!empty($result['coordinator']) && isset($result['coordinator'])){
                        $_SESSION['coordinator_id'] = $result['coordinator'];
                    }
                    ///print_r($_SESSION);
                    $this->view('loginAs');
                }else{
                    $data['errors'] = $loginauth->errors;
                    $this->view('login',$data);
                    
                }
            }

        }else{
            $this->view('_404');
        }
    }

	public function losinAs(){
		return $this->view('loginAs');
	}
}
