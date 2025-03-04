<?php 
class Announcement{
    use Controller;

    public function announcements(){
        ///fuction for fetch from data base all the announcements that related to session project_id
        $project_id = 4;
        $model = new AnnounceModel;
        $data = $model->getAnnouncements($project_id);

        return $this->view('Supervisor/announcement',$data);

    }

    public function makeAnnouncement(){
        $data['title'] = $_POST['title'];
        $data['description'] =$_POST['content'];
        $data['userid'] = $_SESSION['user_id'];
        $data['projectid']=$_SESSION['project_id'];

       if(empty($data['title'])){
            $errors[] = 'Title is required';
        } elseif (empty($data['description'])){
            $errors[] = 'Description is required';
        } elseif (empty($data['userid'])){
            $errors[] = 'User ID is required';
        } elseif (empty($data['projectid'])){
            $errors[] = 'Project ID is required';
        }

        if(!empty($errors)){
            return $this->view('Supervisor/announcement', ['errors' => $errors]);
        }   

        $model = new AnnounceModel;
        $status = $model->makeAnnouncement($data);
        if($status){
            $_SESSION['status']= "Announcement has been made successfully";
            header('location: '.ROOT.'/Announcement/announcements');
            exit;
            // return $this->view('_404');
        }else{
            $_SESSION['status-error']= "Unexpected Error Occoured !";
            header('location: '.ROOT.'/Announcement/announcements');
            exit;
            // return $this->view('_404');
        }

    }
    public function showAnnouncement() {
        if (!isset($_GET['id'])) {
            die("Error: No ID provided.");
        }
    
        $id = intval($_GET['id']); // Sanitize input
        
    
        $model = new AnnounceModel;
        $data = $model->readAnnouncement($id);
    
        return $this->view('Supervisor/announceFile', $data);
    }
    

}