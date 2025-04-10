<?php 
// admin user model
class AdminModel{

    use Model;

    protected $table = 'admin';

    public function Validate($data){
        $this->errors=[];
        if(!isset($data['username']) || empty($data['username'])){
            $this->errors[]='username is required';
        }else
        if(!preg_match('/^[a-zA-Z0-9]+$/', $data['username'])){
            $this->errors[]='username must be alphanumeric';
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



    public function Dashboard(){
        $data=[];

        //fetching 9 recent projects
        $this->table = 'project';
        $this->limit = 9;
        $this->order_column='createdat';
       /// $data['name']="ane mata ba";
        $data['projects']=$this->findAll();

        ///fecting recent project cordinators
        $this->table = 'coordinator';
        $this->limit = 10;
        $this->order_column='createdat';
        
        $data['coordinators']=$this->findAll();


        return $data;

    }

    public function coordinatorlist(){

        $data=[];
        $this->table = 'coordinator';
        $this->limit = 10000;
        $data['coordinators'] = $this->findAll();
        return $data;
    }

    public function updateCoordinator($id,$data){
        $this->table='coordinator';
        $retult =$this->update($id,$data);
        if(!$retult){
            return true;
        }else{
            return false;
        }

    }
    public function deleteCoordinator($id){
        $this->table='coordinator';
        $retult =$this->delete($id);
        if(!$retult){
            return true;
        }else
        {
            return false;
        }
    }

    public function ValidateCorReg($input){
        $this->errors=[];
        if(empty($input['name']) || empty($input['email']) || empty($input['password']) || empty($input['re-password'] ) || empty($input['institute']) )
        {
            $this->errors[]='Some fields are empty';
        }else if(!filter_var($input['email'], FILTER_VALIDATE_EMAIL)){
            $this->errors[]='Incorrect email';
        }else if($input['phone'] && !preg_match('/^0\d{9}$/', $input['phone'])){
            $this->errors[]='phone number should start with 0 and have 10 numbers';
        }else if(!preg_match('/^[a-zA-Z]+$/', $input['name'])){
            $this->errors[]='name must be alphabetic';
        }
        else if (strlen($input['password']) < 8) {
            $this->errors[] = 'password must be at least 8 characters';
        }

        //check already exist
        $this->table="coordinator";
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


    public function AddCordinator1($data){
        $this->table='coordinator';
        $this->insert($data);

    }

    public function projectList(){
        $this->table='project';
        $this->limit = 10000;
        $data['projects'] = $this->findAll();
        return $data;
    }

    public function deleteProject($id){
        $this->table='project';
        return $this->delete($id);

    }

    public function getProjectCount() {
        $this->table = 'project';
        // return $this->count();
        $query = "SELECT COUNT(*) as count FROM project";
        $result = $this->query($query);
        return $result[0]->count;
    }

    public function getTotalRegisteredUsers() {
        // Count users from 'users' table
        $query1 = "SELECT COUNT(*) as count FROM user";
        $result1 = $this->query($query1);
        $usersCount = !empty($result1) ? $result1[0]->count : 0;
        
        // Count coordinators from 'coordinators' table
        $query2 = "SELECT COUNT(*) as count FROM coordinator";
        $result2 = $this->query($query2);
        $coordinatorsCount = !empty($result2) ? $result2[0]->count : 0;
        
        // Return the sum
        return $usersCount + $coordinatorsCount;
    }

}