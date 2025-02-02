<?php 
class Announcement{
    use Controller;

    public function announcements(){
        return $this->view('Supervisor/announcement');
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

}