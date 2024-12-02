<?php
// Make sure the class name is consistent and properly capitalized.
class RegUserModel {
    use Model;

    protected $table = 'user';

    // Define the dashboard method
    public function dashboard() {
        // Fetching invitations
        try {
            $this->table = 'invitation';
            $userid = $_SESSION['user_id'];
            $sql = 'SELECT i.*, 
                    c.name AS user_name, 
                    c.email AS user_email, 
                    c.institute AS user_institute ,
                    i.date AS invitation_date
                    
                    FROM invitation i 
                    JOIN coordinator c ON i.coordinatorid = c.id 
                    WHERE i.userid = :userid';
            // Properly binding the parameter 'userid'
            $data['invitations'] = $this->query($sql, ['userid' => $userid]);
            $sql1='SELECT u.*,
                        p.title AS project_title,
                        p.id AS project_id,
                        p.description AS project_description
                        FROM userrole u JOIN project p ON u.projectid = p.id WHERE u.userid = :userid';

            $data['projects'] = $this->query($sql1, ['userid' => $userid]);
        } catch (Exception $e) {
            // Handle the exception
           // $data['invitations'] = [];
            $data['error'] = $e->getMessage();
        }   
        // Print the fetched invitations for debugging
        
        
        return $data;
    }

    public function acceptInvitation($data,$invitationId) {

        //accepting
    try {
        $this->table = 'invitation';
        $sql = 'UPDATE invitation SET status = :status WHERE id = :invitationId';
        $this->query($sql, ['status' =>1, 'invitationId' => $invitationId]);
            ///return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    ///update coordinator-user table
        $this->table='coordinator-user';
       
        try {
            $sql = 'INSERT INTO `coordinator-user` (userid, coordinatorid) VALUES (:userid, :coordinatorid)';
           
             $this->query($sql, ['userid' => $data['userid'], 'coordinatorid' => $data['coordinatorid']]);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function declineInvitation($data1){
        try {
            $this->table = 'invitation';
            $sql = 'UPDATE invitation SET status = :status WHERE id = :invitationId';
            $this->query($sql, ['status' =>2, 'invitationId' => $data1]);
                return true;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
    }
}
