<?php 
class Document{
    use Controller;

    public function addpop(){
        $new = new DocModel;
        $data = $new->addpop();
        if($data){
            //print_r($data);
            $this->view('supervisor/addDoc',$data);
        }else{
            $this->view('_404');
        }
      
    }
    

    public function upload1(){
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $filePath = __DIR__.'./../../public/document/' . $fileName;
        $userid = $_SESSION['user_id'];
        $projectid = $_SESSION['project_id'];
        $name = $_POST['name'];
        

        if (move_uploaded_file($fileTmpName, $filePath)) {
            $doc = new DocModel;
            $status = $doc->adding($fileName,$filePath,$userid,$projectid,$name);
            if($status){ 
                $data['success']= "File uploaded successfully";
                return $this->view('supervisor/document',$data);
            }
           
        } else {
            echo "Failed to upload file.";
    }
    }

    // delete document
    public function delete($id){
        $doc = new DocModel;
        // echo $id;
        // $id = $_POST['id'];
        $status = $doc->deleteDocument($id);
        if($status){
            header('Location: '.ROOT.'/supervisor/showDocument');
            exit;
        }else{
            $this->view('_404');
        }
    }



}