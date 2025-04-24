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

   
   public function addCosupervisor($projectId, $userId){
    $this->table = '`cosupervisor-project`';

    $data = [
        'userid' => $userId,
        'projectid' => $projectId
    ];

    return $this->insert($data);
}

public function addSupervisor($projectId, $userId){
    $this->table = '`supervisor-project`';

    $data = [
        'userid' => $userId,
        'projectid' => $projectId
    ];

    return $this->insert($data);
}

public function addMember($projectId, $userId){
    $this->table = '`member-project`';

    $data = [
        'userid' => $userId,
        'projectid' => $projectId
    ];

    return $this->insert($data);
}
    
        
public function deletesup($data){
    $sql = 'DELETE FROM `supervisor-project` WHERE projectid = :projectid AND id = :id';
    return $this->query($sql, ['projectid' => $data['project_id'], 'id' => $data['id']]);
}

public function deletecosup($data){
    $sql = 'DELETE FROM `cosupervisor-project` WHERE projectid = :projectid AND id = :id';
    return $this->query($sql, ['projectid' => $data['project_id'], 'id' => $data['id']]);
}

public function deletemem($data){
    $sql = 'DELETE FROM `member-project` WHERE projectid = :projectid AND id = :id';
    return $this->query($sql, ['projectid' => $data['project_id'], 'id' => $data['id']]);
}

public function getTotalProjects($coordinatorId){
    $sql = 'SELECT COUNT(*) as total FROM project WHERE coordinatorid = :coordinatorid';
    $result = $this->query($sql, ['coordinatorid' => $coordinatorId]);

    return isset($result[0]->total) ? (int)$result[0]->total : 0;
}

public function getRecentProject($coordinatorId){
    $sql = 'SELECT title FROM project WHERE coordinatorid = :coordinatorid ORDER BY createdat DESC LIMIT 1';
    $result = $this->query($sql, ['coordinatorid' => $coordinatorId]);

    return $result && isset($result[0]->title) ? $result[0]->title : null;
}

public function getCompletedProjects($coordinatorId){
    $sql = 'SELECT COUNT(*) as completed FROM project WHERE coordinatorid = :coordinatorid AND enddate < CURDATE()';
    $result = $this->query($sql, ['coordinatorid' => $coordinatorId]);

    return isset($result[0]->completed) ? (int)$result[0]->completed : 0;
}

public function getOngoingProjects($coordinatorId){
    $sql = 'SELECT COUNT(*) as ongoing FROM project WHERE coordinatorid = :coordinatorid AND enddate > CURDATE() AND startdate < CURDATE()';
    $result = $this->query($sql, ['coordinatorid' => $coordinatorId]);

    return isset($result[0]->ongoing) ? (int)$result[0]->ongoing : 0;
}

public function getAllProjects($coordinatorId){
    $sql = 'SELECT * FROM project WHERE coordinatorid = :coordinatorid';
    return $this->query($sql, ['coordinatorid' => $coordinatorId]);
}

public function getCoordInfo($coordinatorId) {
    $sql = 'SELECT * FROM coordinator WHERE id = :id';
    return $this->query($sql, ['id' => $coordinatorId]);
}

public function updateCoord($coordData) {
    $sql = "UPDATE coordinator SET name = :name, email = :email";
    //$sql = "UPDATE coordinator SET name = :name, email = :email WHERE id = :id";
    $params = [
        'name' => $coordData['name'],
        'email' => $coordData['email'],
        //'id' => $coordData['id']
    ];

    if(!empty($coordData['image'])) {
        $sql .= ", image = :image";
        $params['image'] = $coordData['image'];
    }

    $sql .= " WHERE id = :id";
    $params['id'] = $coordData['id'];
    return $this->query($sql, $params);
    //return $this->query($sql, ['name' => $coordData['name'], 'email' => $coordData['email'], 'id' => $coordData['id']], $params);
}

public function changePassword($currentPassword, $newPassword, $confirmPassword) {
    if (!isset($_SESSION['coordinator_id'])) {
        return "User not logged in.";
    }

    $userId = $_SESSION['coordinator_id'];

    $query = "SELECT password FROM coordinator WHERE id = :id";
    $result = $this->query($query, ['id' => $userId]);

    if (!$result || !isset($result[0])) {
        return "User not found.";
    }

    $user = $result[0];

    if($currentPassword !== $user->password) {
        return "Current password is incorrect.";
    }
    if ($newPassword !== $confirmPassword) {
        return "New password and confirmation do not match.";
    }
    if (strlen($newPassword) < 8) {
        return "New password must be at least 8 characters long.";
    }
//$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $query = "UPDATE coordinator SET password = :password WHERE id = :id";
    $updateResult = $this->query($query, [
        'password' => $newPassword, 
        'id' => $userId
    ]);

    return "Password updated successfully.";


}

}

