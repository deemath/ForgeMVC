<?php 
class Document{
    use Controller;

    public function addpop(){
        $new = new DocModel;
        $data = $new->addpop();
        if($data){
            //print_r($data);
            $this->view('supervisor/addDoc',$data);
        }
      
    }
    public function upload()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Define the target directory as a local file system path
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/testmvc/public/upload/"; 
        
        // Ensure the target directory exists
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
        }

        // Set the full path for the uploaded file
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);

        // Debugging: Check the actual target file path
        var_dump($targetFile);

        // Ensure the uploaded file is valid and attempt to move it
        if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                // Redirect after successful upload
                header("Location: " . "/testmvc/Supervisor/showDocument");
                exit;
            } else {
                echo "Error uploading file!";
            }
        } else {
            echo "Invalid file upload!";
        }
    }
}



}