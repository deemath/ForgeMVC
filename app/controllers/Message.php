<?php 
class  Message{
    use Controller;

    public function index() {
        echo "Welcome to the Message controller!";
     
    }
    

    public function chatbox(){
       $message = new MessageModel();
       $data['messages'] = $message->loadChat();

       
       if(isset($data['messages'])){
        return $this->view('supervisor/chatbox',$data);
       }else{
        return $this->view('_404');
       }


    }

    public function sendMessage() {
        $message = new MessageModel();
    
        
        if (isset($_POST['messagetext']) && !empty(trim($_POST['messagetext']))) {
            $messagetext = htmlspecialchars(trim($_POST['messagetext']), ENT_QUOTES, 'UTF-8');
            
            
            $status = $message->sendMessage1($messagetext);
            
            if ($status) {
                // echo "done";
                header('Location: ' . ROOT . '/Message/chatbox');
                exit; 
            } else {
                // echo "not done";
                return $this->view('_404');
            }
        } else {
           
            return $this->view('_404', ['error' => 'Message text cannot be empty.']);
        }
    }
    
    


    }
