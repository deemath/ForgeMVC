<?php 
class ProjectModel{
    use Model;
    protected $table = 'project';
    public $order_type ='desc';

    public function createProject($data,$suplist,$cosuplist,$memlist){

    $this->insert($data);
   

    $fk['title']=$data['title'];
    $fk['description']=$data['description'];
    $added = $this->first($fk);

    //$this->table ="`supervisor-project`";
   
    
    if(!empty($suplist)){
    foreach($suplist as $suppa){
        $dummy['userid']= $suppa[0];
        $dummy['projectid'] = $added->id;
        $sql = "INSERT INTO `supervisor-project` (`userid`, `projectid`) VALUES (:userid, :projectid)";
        $this->query($sql,$dummy);
        //$this->insert($dummy);
    }
    }
    
    if(!empty($cosuplist)){
    foreach($cosuplist as $suppa){
        $dummy['userid']= $suppa[0];
        $dummy['projectid'] = $added->id;
        $sql = "INSERT INTO `cosupervisor-project` (`userid`, `projectid`) VALUES (:userid, :projectid)";
        $this->query($sql,$dummy);

        ///$this->insert($dummy);
    }
    }
    
    if(!empty($memlist)){
        foreach($memlist as $suppa){
            $dummy['userid']= $suppa[0];
            $dummy['projectid'] = $added->id;
            $sql = "INSERT INTO `member-project` (`userid`, `projectid`) VALUES (:userid, :projectid)";
            $this->query($sql,$dummy);

            //$this->insert($dummy);
        }
    }


    return true;

    }


    public function addMember($memlist,$id){
        foreach($memlist as $suppa){
            $dummy['userid']= $suppa[0];
            $dummy['projectid'] = $id;
            $sql = "INSERT INTO `member-project` (`userid`, `projectid`) VALUES (:userid, :projectid)";
            $this->query($sql,$dummy);

            //$this->insert($dummy);
        }
    }
    public function addSup($memlist,$id){
        foreach($memlist as $suppa){
            $dummy['userid']= $suppa[0];
            $dummy['projectid'] = $id;
            $sql = "INSERT INTO `supervisor-project` (`userid`, `projectid`) VALUES (:userid, :projectid)";
            $this->query($sql,$dummy);

            //$this->insert($dummy);
        }
    }
    public function addCosup($memlist,$id){
        foreach($memlist as $suppa){
            $dummy['userid']= $suppa[0];
            $dummy['projectid'] = $id;
            $sql = "INSERT INTO `cosupervisor-project` (`userid`, `projectid`) VALUES (:userid, :projectid)";
            $this->query($sql,$dummy);

            //$this->insert($dummy);
        }
    }

    public function ShowDashboard4($id) {
        $input['id'] = $id;
        $_SESSION['project_id'] = $id;
    
        $this->table = 'project';
        $data['project'] = $this->first($input);
    
        $this->table='task';
        $this->order_type 	= "asc";
        $temp['projectid']=$id;
        $data['tasks'] = $this->where($temp);

        $this->table='subtask';
        $data['subtasks'] = $this->where($temp);

        $sql = "SELECT t.*,u.name AS creator_name , u.email  AS creator_email FROM task t JOIN `user` u ON t.createdby=u.id WHERE t.projectid = :projectid";
        $data['creators']=$this->query($sql,$temp);

        

        return $data ; 
        
        
        // Return null if no project is found
    }


    public function deleteProject($data){
        $this->table='project';
        return $this->delete($data);
    }

    public function loadupdateproject($id){
        $this->table='project';
        $input['id']=$id;
        $input1['projectid']=$id;
        $data['project']=$this->first($input);

        $sql1="SELECT s.* ,u.email AS sup_email FROM `supervisor-project` s JOIN user u ON s.userid=u.id WHERE s.projectid = :projectid";
        $data['supervisor']=$this->query($sql1,$input1);

        $sql2="SELECT m.*,u.email AS mememail FROM `member-project` m JOIN user u ON m.userid=u.id WHERE m.projectid = :projectid";
        $data['member']=$this->query($sql2,$input1);

        $sql3="SELECT c.* ,u.email AS cosup_email FROM `cosupervisor-project` c JOIN user u ON c.userid=u.id WHERE c.projectid = :projectid";
        $data['cosupervisor']=$this->query($sql3,$input1);

        return $data;



    }


    public function updateproject($id){
        
        return true;
    }

    public function deletesup($data){
        $this->table='supervisor-project';
        $sql = "DELETE FROM `supervisor-project` WHERE userid = :userid AND projectid = :projectid";
        return $this->query($sql, $data);
        
    }

    
}