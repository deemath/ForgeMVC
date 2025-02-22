<?php

class CoordinatorModel{

    use Model;
    protected $table = 'admin';

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


    public function invite($data) {
        $this->errors = []; // Initialize/reset errors array
    
        $this->table = 'user'; // Set the table to search in
        $dump['email'] = $data['email'];
    
        // Check if the email exists in the table
        $result = $this->first($dump);
    
        if ($result) {
            $this->table='invitation';
            // If email is found, proceed with the invite
            $sql['userid'] = $result->id;
            $sql['role'] = $data['role'];
            $sql['coordinatorid'] = $_SESSION['coordinator_id'];
            $sql['status'] = 0;
    
            // Insert the invite into the database
            if (!$this->insert($sql)) {
                return true; // Successfully inserted
            } else {
                $this->errors[] = 'Failed to create the invite.';
            }
        } else {
            // If email not found, add an error
            $this->errors[] = 'Email not found.';
        }
    
        // Return false to indicate failure
        return false;
    }

    public function showInvite(){
        $this->table='invitation';
        $corid = $_SESSION['coordinator_id'];
        $sql = 'SELECT i.*, 
            u.name AS user_name, 
            u.email AS user_email FROM invitation i JOIN user u ON i.userid = u.id WHERE i.coordinatorid = :corid';
        return $this->query($sql, ['corid' => $corid]);
    }

    public function fetchUsers()
{   
    $coordinatorId = $_SESSION['coordinator_id'];
    try {
        $sql = 'SELECT 
                    u.id AS user_id,
                    u.name AS user_name,
                    u.email AS user_email,
                    u.createdat,
                    u.phone
                FROM 
                    `coordinator-user` cu
                JOIN 
                    `user` u 
                ON 
                    cu.userid = u.id
                WHERE 
                    cu.coordinatorid = :coordinator_id';

        $result = $this->query($sql, ['coordinator_id' => $coordinatorId]);

        return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }

    
}

    public function removeUser($id){
        $coordinatorId = $_SESSION['coordinator_id'];
        $sql = 'DELETE FROM `coordinator-user` WHERE coordinatorid = :coordinatorid AND userid = :userid';
        return $this->query($sql, ['coordinatorid' => $coordinatorId, 'userid' => $id]);
    }    


    public function fetchProjectList()
{
    $coordinatorId = $_SESSION['coordinator_id'];
    try {
        $sql = 'SELECT 
                    *
                FROM 
                    `project`
                WHERE 
                    coordinatorid = :coordinator_id';

        $result = $this->query($sql, ['coordinator_id' => $coordinatorId]);

        return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}

   public function loadupdateproject($id) {
    $this->table = 'project';
    return $this->first(['id' => $id]);
   }

   public function updateproject($data) {
    $this->table = 'project';
    return $this->update($data['id'], $data);
   }

   

    
        



    
}