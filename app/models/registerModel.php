<?php 
class RegisterModel{
    use Model;
    protected $table = 'user';
    public function user($dataset){
        $this->table='user';
        return $this->insert($dataset);
    }

    public function validate($input){
        $this->errors=[];
        if(empty($input['name']) || empty($input['email']) || empty($input['password']) || empty($input['re-password'] ) )
        {
            $this->errors[]='Some fields are empty';
        }else if(!filter_var($input['email'], FILTER_VALIDATE_EMAIL)){
            $this->errors[]='Incorrect email';
        }else if($input['phone'] && !preg_match('/^0\d{9}$/', $input['phone'])){
            $this->errors[]='phone number should start with 0 and have 10 numbers';
        }
        else if (strlen($input['password']) < 8) {
            $this->errors[] = 'password must be at least 8 characters';
        }

        //check already exist
        $this->table="user";
        $data['email']=$input['email'];
        $checkAvalible = $this->where($data);

        if(!empty($checkAvalible)){
            $this->errors[]='Email already exist';
        }

        if(!empty($this->errors)){
            return true;
        }
        return false;
    }
}