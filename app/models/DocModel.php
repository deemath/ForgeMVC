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

    public function adding($fileName,$filePath,$userid,$projectid,$name){
        $this->table='document';
        $data['filename'] = $fileName;
        $data['filepath'] = $filePath;
        $data['uploadby'] = $userid;
        $data['projectid'] = $projectid;
        $data['name']=$name;
        $this->insert($data);
        return true;
    }


    public function getdoc($projectid){
        $this->table='document';
      
        $sql = "SELECT d.* ,u.name AS username, u.email, u.image from document d JOIN user u ON d.uploadby=u.id WHERE d.projectid = '$projectid'";

        $dmp['documents'] = $this->query($sql);
        return $dmp;
    }
    public function deleteDocument($id){
        echo $id;
        $this->table='document';
        $data['id'] = $id;
        $this->delete($data['id']);
        return true;
    }
}