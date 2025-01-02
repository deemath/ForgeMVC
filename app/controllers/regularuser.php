<!-- //// this controller gonna handle all the functions that has to any regular user -->
 <!-- this associated with the regusermodel -->

 <!-- loading particular dashboad -->
<!-- load same dashboad but put the role id with related to particular user with in that project and rectric funtions according to that -->

<?php 
class Regularuser{
    use Controller;

    public function load() {
        $prj = new RegUserModel;
        if(isset($_POST['projectid'])){
            $id = $_POST['projectid'];
        } elseif(isset($_SESSION['project_id'])){
            $id = $_SESSION['project_id'];
        }else{
            $this->view('_404');
        }
     
    
         $data = $prj->loadDashboards($id);
        if (isset($data)) {
            $this->view('Supervisor/dashboard', $data); // Pass data as an array
        } else {
            $this->view('_404'); // Show a 404 view
        }
    }
}












