<?php 
class Announcement{
    use Controller;

    public function announcements(){
        return $this->view('Supervisor/announcement');
    }

}