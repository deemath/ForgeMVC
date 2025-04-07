<?php 
    class AnnounceModel{
        use Model;

        protected $table = "announcement";
        public function makeAnnouncement($data){
            $this->table='announcement';
            $this->insert($data);
            return true;
        }
        
        public function getAnnouncements($projectid){
            $data['projectid']= $projectid;
            $this->table="announcement";      
            $data['announcements']= $this->where($data);
            return $data;
        }

        public function readAnnouncement($id){
            $this->table = 'announcement';
            $dmp['id'] =$id;
            $data['announcement'] = $this->where($dmp);
            if(!empty($data['announcement'])){
                // echo "bye";
                // print_r($data);
                return $data;
                
            } else{
               
                return false;
            }
            
        }
    }