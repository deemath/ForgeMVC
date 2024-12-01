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


    
}