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

    public function PasswordValidationByRole($arr, $role) {
        $table = $role;// === 'user' ? 'user' : 'coordinator';
       // echo $table;
       // echo "<pre>";
       // print_r($arr);
       // echo "</pre>";
        $query = "SELECT * FROM $table WHERE email = :email";
        $row = $this->query($query, ['email' => $arr['email']]);
       // echo "<pre>";
        //print_r($row);
        //echo "</pre>";
        

        // if(isset($row) && password_verify($arr['password'], $row[0]->password)) {
        if (!empty($row) && isset($row[0]) && $arr['password'] == $row[0]->password) {
            if($role === 'coordinator' && isset($row[0]->status) && $row[0]->status == 1) {
                $this->errors[] = "Your account is deactivated. Please contact the admin.";
                return false;
            }

            // return ['id' => $row[0]->id];
            //echo "password correct";
            return  $row[0]->id;
        } else {

            $this->errors[] = "Invalid Credentials Please Check User Name and password again";
           // echo "passw incorrect";
            return false;
        }
    }
    

}