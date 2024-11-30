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
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    ///update coordinator-user table
        $this->table='coordinator-user';
        $this->insert($data);
        return true;
    }
}
