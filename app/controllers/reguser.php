<?php




class reguser {
    use Controller;

    // Common interface method
    public function commonInterface() {
        $reg = new RegUserModel;
        
        // Call the dashboard method correctly
        $data=$reg->dashboard();

        
        // Optionally, render a view
        $this->view('common',$data);
    }

    public function acceptInvitation(){
       if (isset($_POST['submit'])) {
            $data['userid'] = $_POST['user_id'];
            $data1 = $_POST['invitation_id'];
            $data['coordinatorid'] = $_POST['coordinator_id'];
            print_r($data);
            $reg1 = new RegUserModel;
            $status=$reg1->acceptInvitation($data,$data1);
            if($status){
                header('Location: ' . ROOT . '/reguser/commonInterface');
            }
            else{
                $this->view('_404');
            }
        }
        


    }

    public function declineInvitation(){
        if (isset($_POST['decline'])) {
            $data1 = $_POST['invitation_id'];
            $reg2 = new RegUserModel;
            $status=$reg2->declineInvitation($data1);
            if($status){
                header('Location: ' . ROOT . '/reguser/commonInterface');
            }
            else{
                $this->view('_404');
            }
        }
    }
}