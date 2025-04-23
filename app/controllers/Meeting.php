<?php 
class Meeting{
    use Controller;


    public function meetings(){
        $model = new MeetingModel();
        $checksum =  $model->getMeeting($_SESSION['project_id']);
        // echo "<pre>";
        //    print_r($checksum);
        // echo "</pre>";
        $this->view('Supervisor/meetings',$checksum);
    }


    public function createMeeting(){
    
        $meetid = "Meet_". uniqid();
        $meetDate = $_POST['meeting-date'];;
        $meetingTitle = $_POST['meeting-title'];
        $meetTime = $_POST['meeting-time'];;
        $meetDescription = $_POST['meeting-description'];;
        $meetCreatedBy = 1;
        $meetingLink = "https://meet.jit.si/".$meetid;
        $projectid = 4;


        empty($meetDescription) ? $meetDescription = " " : $meetDescription;

        $meetingData = [
            'meet_id' => $meetid,
            'meetingTitle'=> $meetingTitle,
            'meet_date' => $meetDate,
            'meet_time' => $meetTime,
            'description' => $meetDescription,
            'created_by' => $meetCreatedBy,
            'meeting_link' => $meetingLink,
            'project_id' => $projectid
        ];
                // echo "<pre>";
                //     print_r($meetingData);
                // echo "</pre>";
        $model = new MeetingModel();
        $checksum =  $model->createMeeting($meetingData);
        if ($checksum){
            header('Location: http://localhost/testmvc/public/Meeting/meetings');
            exit;
        }
        else{
            echo "failes";
        }

    }




}