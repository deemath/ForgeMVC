<?php 
    class AnnounceModel{
        use Model;

        protected $table = "announcement";
        public function makeAnnouncement($data){
            $this->table='announcement';
            $this->insert($data);
            return true;
        }
        
    }