<?php 
class MessageModel{
    use Model;

    protected $table = 'chatbox';
    public function loadChat(){
        $data['projectid'] = $_SESSION['project_id'];
        
        $this->table='chatbox';
        $this->order_type="asc";
        $sql = "SELECT c.* ,u.name AS username, u.email, u.image from chatbox c JOIN user u ON c.userid=u.id WHERE c.projectid = '$data[projectid]'";
        $data = $this->query($sql);
        return $data;

        // return $this->where($data);
    }

    public function sendMessage1($messagetext) {
        
        $data['projectid'] = $_SESSION['project_id'];
        $data['userid'] = $_SESSION['user_id'];
        $data['message'] = $messagetext;
    
       
        $this->table = 'chatbox';
        $insertStatus = $this->insert($data);
        if($insertStatus){
            return false;
        }else{
            return true;
        }
        
        
    }

   
    

}




?>