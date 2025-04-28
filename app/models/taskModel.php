<?php 
class taskModel{
    use Model;

    protected $table = 'tasks';
   
    public function findtask($id){
        $input['id'] = $id;
        $project['id']=$_SESSION['project_id'];
        $this->table ='project';
        $data['project']=$this->first($project);

        $this->table ='task';
        $data['task']=$this->first($input);
        $sql="SELECT 
                u.email AS user_email,
                u.name AS user_name
            FROM 
                taskassign t
            JOIN 
                user u ON u.id = t.memberid
            WHERE 
                t.taskid = :taskid;
                ";
                $input['taskid']=$id;
                $data['assign']=$this->query($sql,['taskid'=>$id]);

        return $data;
    }

    public function updatetask($id,$data){
        $this->table ='task';
        $this->update($id,$data);
    }

    public function fetchUsers()
    {   
        $coordinatorId = $_SESSION['project_id'];
        try {
            $sql = 'SELECT 
                        u.id AS user_id,
                        u.name AS user_name,
                        u.email AS user_email,
                        u.createdat,
                        u.phone
                    FROM 
                        `member-project` cu
                    JOIN 
                        `user` u 
                    ON 
                        cu.userid = u.id
                    WHERE 
                        cu.projectid = :coordinator_id';
    
            $result = $this->query($sql, ['coordinator_id' => $coordinatorId]);
    
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    
        
    }
    public function createtask($data, $memlist) {
        $this->table = 'task';
        $task = $this->insert($data); // Ensure this returns the inserted task with its ID
    
        $sql = "Select * from task ORDER BY id DESC";
        $findId = $this->query($sql,[]);
        // if ($task === false) {
        //     // Handle the error, e.g., log it or return false
        //     return false; // Indicate that the task creation failed
        // }
    
       
        if (!empty($memlist)) {
            foreach ($memlist as $memberId) { // Assuming $memberId is the ID directly
                $dummy = [
                    'taskid' => $findId[0]->id, // Ensure $task['id'] is valid
                    'memberid' => $memberId
                ];
                $sql = "INSERT INTO `taskassign` (`taskid`, `memberid`) VALUES (:taskid, :memberid)";
                $this->query($sql, $dummy);
            }
        }
    
        return true; // Indicate success
    }

    public function fetchNumber($data){
        
        $this->table='task';
        $dump= $this->first($data);
        $tmp =$dump->no;
        return $tmp+1;
    }

    public function fetchAssign($id){

        $input['id'] =$_SESSION['project_id'];
         
    
        $this->table = 'project';
        $data['project'] = $this->first($input);
    
        $this->table='task';
        $this->order_type 	= "asc";
        $temp['projectid']=$_SESSION['project_id'];
        $data['tasks'] = $this->where($temp);

        $this->table='subtask';
        $data['subtasks'] = $this->where($temp);

        $x['taskid']= $id;
        $this->table='flag';
        $data['flags'] = $this->where($x);


        $sql = "SELECT t.*,u.name AS creator_name , u.email  AS creator_email FROM task t JOIN `user` u ON t.createdby=u.id WHERE t.projectid = :projectid";
        $data['creators']=$this->query($sql,$temp);

        $sql1 ="SELECT t.taskid AS taskid,u.name AS user_name , u.email AS user_email
                FROM taskassign t JOIN user u ON
                t.memberid=u.id WHERE t.taskid=:taskid;";
        
        $data['read']=$this->query($sql1, ['taskid' => $id]);

        $sql2 ="SELECT t.*,c.name AS create_user,c.email AS create_email FROM task t JOIN user c ON t.createdby=c.id WHERE t.id=:id";
        $data['selected']=$this->query($sql2, ['id' => $id]);

        $sql3 ="SELECT c.*, u.name AS user_name, u.email AS user_email
                FROM comment c JOIN user u ON c.createby=u.id WHERE c.taskid=:taskid;";
        $data['comments']=$this->query($sql3, ['taskid' => $id]);

        ///fetcting members
        $sql4 = "SELECT u.* FROM user u JOIN `member-project` mp ON mp.userid= u.id
                    WHERE mp.projectid=:projectid";
        $data['members'] =$this->query($sql4,$temp);
        
        return $data ;

        
    }

    public function deleteTask($id){
        $this->table='task';
        return $this->delete($id);
    }



    // task updating models

    public function updateDes($data){
        $this->table = "task";
        // $dataset['description'] = "set nna";
        $dataset['description'] = $data["newDescription"];
        if(!$this->update($data['taskid'],$dataset)){
            
            return true;
        }
        return false;

    }

    public function updateTitle($data){
        $this->table = "task";
        $dataset['title'] = $data["newtitle"];
        if(!$this->update($data['taskid'],$dataset)){
            
            return true;
        }
        return false;

    }
    

    public function updateStatus($data){
        $this->table = "task";
        $dataset['status'] = $data["status"];
        if(!$this->update($data['taskid'],$dataset)){
            
            return true;
        }
        return false;

    }

    public function addsubtask($data){
        $this->table = "subtask";
        
        if(!$this->insert($data)){
            
            return true;
        }
        return false;

    }
    public function updateflag($data){
        $this->table = "flag";
        $dataset['flagid'] = $data["flagid"];
        if(!$this->update($data['id'],$dataset)){
            
            return true;
        }
        return false;
    }

    public function createflag($data){
        $this->table = "flag";
        $dataset['taskid']=$data['taskid'];
        $dataset['flagid']=$data['flagid'];
        $dataset['projectid']=$data['projectid'];
        if(!$this->insert($dataset)){
            
            return true;
        }
        return false;

    }

    public function updatesubtask($data){
        $this->table= "subtask";
        $dataset['title'] =  $data["title"];
        $dataset['description'] =  $data["description"];

        if(!$this->update(  $data['subtaskid'],$dataset)){
            
            return true;
        }
        return false;

    }


    public function deletesubtask($data){
        $this->table= "subtask";
        if(!$this->delete($data['id'])){
            
            return true;
        }
        return false;
    }

    public function addcomment($data){
        $this->table= "comment";
        if(!$this->insert($data)){
            
            return true;
        }
        return false;
    }


    ///function for fetch all the task related to project_id
    public function fetchAllTask($id){
        $this->table = 'task';
        $this->order_type 	= "asc";
        $temp['projectid']=$_SESSION['project_id'];
        $data['tasks'] = $this->where($temp);
        return $data;
    }


    ///updateStartDate
    public function updateStartDate($data){
        $this->table = "task";
        $dataset['startdate'] = $data["startdate"];
        if(!$this->update($data['id'],$dataset)){
            
            return true;
        }
        return false;

    }
    ///updateEndDate
    public function updateEndDate($data){
        $this->table = "task";
        $dataset['enddate'] = $data["enddate"];
        if(!$this->update($data['id'],$dataset)){
            
            return true;
        }
        return false;

    }

    ///checkassign
    public function checkassign($data){
        $this->table = "taskassign";
        $dataset['taskid'] = $data["taskid"];
        $dataset['memberid'] = $data["member"];

        if($this->where($dataset)){
            return true;
        }
        return false;

    }

    ///assignMembers
    public function assignMembers($data){
        $this->table = "taskassign";
        $dataset['taskid'] = $data["taskid"];
        $dataset['memberid'] = $data["member"];

        


        if(!$this->insert($dataset)){
            
            return true;
        }
        return false;

    }

    ////deleteAssignedMember
    public function deleteAssignedMember($data){
        $this->table = "taskassign";
        $dataset['taskid'] = $data["taskid"];
        $dataset['memberid'] = $data["member"];
        $result = $this->where($dataset);

        if(!$this->delete($result[0]->id)){
            
            return true;
        }
        return false;

    }
}