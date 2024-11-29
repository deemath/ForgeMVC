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
        $data['name']="ane mata ba";
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

}