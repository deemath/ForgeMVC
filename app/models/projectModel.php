<?php 
class ProjectModel{
    use Model;
    protected $table = 'project';

    public function createProject($data,$suplist,$cosuplist,$memlist){

    $this->insert($data);
   

    $fk['title']=$data['title'];
    $fk['description']=$data['description'];
    
    $this->table ='`supervisor-project`';
    $added = $this->first($fk);

    foreach($suplist as $suppa){
        $dummy['coordinatorid']= $data['coordinatorid'];
        $dummy['project'] = $added->id;
        $this->insert($dummy);
    }
    $this->table ='`cosupervisor-project`';
    foreach($cosuplist as $suppa){
        $dummy['coordinatorid']= $data['coordinatorid'];
        $dummy['project'] = $added->id;
        $this->insert($dummy);
    }
    $this->table ='`member-project`';
    foreach($memlist as $suppa){
        $dummy['coordinatorid']= $data['coordinatorid'];
        $dummy['project'] = $added->id;
        $this->insert($dummy);
    }



    return true;

    }
}