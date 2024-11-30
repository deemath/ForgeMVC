<?php 
class Coordinator{
     use Controller;

     public function Dashboard(){
        $this->view('coordinator/dashboard');
     }

     public function ShowInvite($data=[]){
        $cor2 = new CoordinatorModel;
       
        $data['invitations']= $cor2->showInvite();
        


        $this->view('coordinator/invite',$data);

     }



     public function invite() {
        // Sanitize and validate inputs
        $inputs['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $inputs['role'] = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
    
        // Debugging print statement (remove in production)
        print_r($inputs);
    
        // Call the invite method from the CoordinatorModel
        $cor1 = new CoordinatorModel;
        $isInvited = $cor1->invite($inputs); // invite method will return true or false
    
        if ($isInvited) {
            // Redirect to ShowInvite page if successful
            $this->showInvite();
            exit; // Always exit after header to prevent further execution
        } else {
            // Pass errors and inputs back to the view
            $data['errors'] = $cor1->errors;
            $data['inputs'] = $inputs; // Preserve user inputs for repopulation
            $this->showInvite($data);
        }
    }
    
}