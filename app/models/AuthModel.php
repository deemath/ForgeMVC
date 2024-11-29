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
}