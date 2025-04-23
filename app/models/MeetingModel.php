<?php 
{
    class MeetingModel{
        use Model;
        protected $table = 'meeting';

        public function getMeeting($id){
            $this->table = 'meeting';
            $query = "SELECT * FROM meeting WHERE project_id = '$id' ORDER BY meet_date DESC";
            $data['result'] = $this->query($query);
            if($data['result']){
                return $data;
            }else{
                return false;
            }

        }

        public function createMeeting($data){
            $this->table="meeting";
            $status = $this->insert($data);
            if (!$status){
                return true;
            }else {
                return false;
            }
        }

    }
}



