<?php 
class DocModel{
    use Model;
    protected $table = 'doc';
    public function addpop(){
        $this->table='user';
        $data['id'] = $_SESSION['user_id'];
        $dmp['users']= $this->first($data);
        return $dmp;
    }
}