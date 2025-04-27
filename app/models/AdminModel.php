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

    public function getProjectById($id) {
        $this->table = 'project';
        $query = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
        $result = $this->query($query, array(':id' => $id));
        // $result = $this->project->query($query, ['id' => $id]);
        
        if(!empty($result)) {
            return $result[0];
        }
        
        return false;
    }

    public function updateProject($id, $data) {
        $this->table = 'project';
        
        // Create SET part of SQL query
        $setValues = [];
        foreach($data as $key => $value) {
            $setValues[] = "$key = :$key";
        }
        
        $setClause = implode(', ', $setValues);
        
        // Create SQL query
        $query = "UPDATE $this->table SET $setClause WHERE id = :id";
        
        // Add ID to data array
        $data['id'] = $id;
        
        // Execute query
        return $this->query($query, $data);
    }
    
    

    public function getCoordinatorById($id) {
        $this->table = 'coordinator';
        $query = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
        $result = $this->query($query, array(':id' => $id));
        // $result = $this->project->query($query, ['id' => $id]);
        // $result = $this->project->query($query, ['id' => $id]);
        
        if(!empty($result)) {
            return $result[0];
        }
        
        return false;
    }

    public function getcoordiById($id){
        $this->table = 'coordinator';
        $dump['id']= $id;
        $data = $this->first($dump);

        if($data){
            return $data;
        }
        echo "error";

        }

        public function getCoordinatorProjectCount($id){
            $query = "SELECT COUNT(*) as count FROM project WHERE coordinatorid = :id";
            $result = $this->query($query, array(':id' => $id));
            // echo '<pre>';
            //     print_r($result);
            // echo '</pre>';

            if(!empty($result)) {
                return $result;
            }
            
            return 0;
        }

        public function deleteProjectById($id) {
            $query = "DELETE FROM project WHERE id = :id";
            $result = $this->query($query, [':id' => $id]);

            if(!empty($result)) {
                return $result;
            }
            
            return 0;
        }

        public function getProjectsByCoordinatorId($id){
            $query = "SELECT * FROM project WHERE coordinatorid = :id"; 
            $result = $this->query($query, ['id' => $id]);

            if(!empty($result)) {
                return $result;
            }
            
            return 0;
        }

        // public function getCoordinatorStatus($status) {
        //     if ($status === '1' || $status === 1) {
        //         return 'active';
        //     }
        //     return 'inactive';
        // }
        

        public function disableCoordinatorById($id){
            // $sql = "UPDATE coordinator SET status = '1' WHERE id = :id";
            // $result =  $this->query($sql, ['id' =>$id]);

            $this->table="coordinator";
            $this->update($id, ['status'=> 1]);

            if(!empty($result)){
                return $result;
            }
            return 0;
        }
        
        public function activeCoordinatorById($id){
            $sql = "UPDATE coordinator SET status = '0' WHERE id = :id";
            $result =  $this->query($sql, ['id' =>$id]);

            if(!empty($result)){
                return $result;
            }
            return 0;
        }

        public function countActiveCoors(){
            $sql = "SELECT COUNT(*) as total FROM coordinator WHERE status = 0 or status is  NULL";
            $result = $this->query($sql);

            if(!empty($result)){
                return $result[0]->total;
            }
            return 0;
        }

        public function countDeactiveCoors(){
            $sql = "SELECT COUNT(*) as total FROM coordinator WHERE status =1";
            $result = $this->query($sql);

            if(!empty($result)){
                return $result[0]->total;
            }
            return 0;
        }
        
       public function getAllProjects(){
            $sql = "SELECT * FROM project";
            return $this->query($sql);
       } 

       public function getActiveCoordinators() {
        $sql = "SELECT * FROM coordinator WHERE status = 0 or status is NULL";
        return $this->query($sql);
       }

       public function getDeactiveCoordinators(){
        $sql = "SELECT * FROM coordinator WHERE status = 1";
        return $this->query($sql);
       }
    
       public function getAllCoordinators(){
        $sql ="SELECT * FROM coordinator";
        return $this->query($sql);
       }

       public function getAllUsers(){
        $sql ="SELECT * FROM user";
        return $this->query($sql);
       }

       public function updateCoordinatorStatus($id, $status)
            {
                $query = "UPDATE coordinator SET status = :status WHERE id = :id";
                $this->query($query, [
                    'status' => $status,
                    'id' => $id
                ]);
            }


        public function getTasks($id){
            $this->table= "task";
            return $this->where(["projectid"=>$id]);

        }

}