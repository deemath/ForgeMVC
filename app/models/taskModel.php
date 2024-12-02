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
    public function createtask($data){
        $this->table='task';
        $data=$this->insert($data);
        return true;
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

        $sql = "SELECT t.*,u.name AS creator_name , u.email  AS creator_email FROM task t JOIN `user` u ON t.createdby=u.id WHERE t.projectid = :projectid";
        $data['creators']=$this->query($sql,$temp);

        $sql1 ="SELECT t.id AS taskid,u.name AS user_name , u.email AS user_email
                FROM taskassign t JOIN user u ON
                t.memberid=u.id WHERE t.taskid=:taskid;";
        
        $data['read']=$this->query($sql1, ['taskid' => $id]);

        $sql2 ="SELECT t.*,c.name AS create_user,c.email AS create_email FROM task t JOIN user c ON t.createdby=c.id WHERE t.id=:id";
        $data['selected']=$this->query($sql2, ['id' => $id]);

        return $data ;

        
    }

    public function deleteTask($id){
        $this->table='task';
        return $this->delete($id);
    }
    
}