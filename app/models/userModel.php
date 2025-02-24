<?php 



class userModel {
    use Database;

    public function Showusers($project_id) {
        $query = "SELECT u.id, u.name, u.email, u.phone, up.role 
                  FROM user u 
                  JOIN userrole up ON u.id = up.userid 
                  WHERE up.projectid = :project_id";
        
        $stmt = $this->query($query, [':project_id' => $project_id]);
        return $stmt;
    }
}
