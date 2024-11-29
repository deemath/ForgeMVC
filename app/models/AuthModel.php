<?php 
class AuthModel{
    use Model;
    protected $table = 'auth';
    protected $fillable = ['id', 'name', 'email', 'password', 'remember_token'];
    protected $data_not=[];
    public function AdminLoginValidate($data,$arr){
        $this->table= 'Admin';
        //echo "passing model";
        $result=$this->first($data);
       // print_r($result);
        
        if (!empty($result) && $arr['password'] == $result->password){
            return $result->id;
        }else{
            $this->errors[]="Invalid Credentials Please Check User Name and password again";
            return false;
        }
    }

    public function Loginvalidation($data){
        $this->errors=[];
        if(!isset($data['email']) || empty($data['email'])){
            $this->errors[]='username is required';
        }else
        if(!isset($data['password']) || empty($data['password'])){
            $this->errors[]='password is required';
        }else
        if(strlen($data['password'])<8){
            $this->errors[]='password must be at least 8 characters';
        }
        if(!empty($this->errors)){
            return true;
        }
        return false;

    }

    public function PasswordValidation($data,$arr){
        $this->table= 'user';
        $users=[];
        //echo "passing model";
        $result=$this->first($data);
        $this->table='coordinator';
        $result1=$this->first($data);
       // print_r($result);
        
        if (!empty($result) && $arr['password'] == $result->password){
            $users['user']= $result->id;
        }
        if(!empty($result1) && $arr['password'] == $result1->password){
            $users['coordinator']= $result1->id;

        }
        if(empty($result) && empty($result1)){
            $this->errors[]="Invalid Credentials Please Check User Name and password again";
            return false;
        }else{
            return $users;
        }
    }
    

}