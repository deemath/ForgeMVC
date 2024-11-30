<?php

class Student{
    use Controller;

    public function index(){
        $data=[];
        
        $this->view('Student/index',$data);
    }

    

    public function dashboard() {
        if (!empty($_SESSION['user_id'])) {
            $studentModel = new StudentModel;

            $projectId = $_GET['project_id'] ?? null;

            if ($projectId) {
                $data['tasks'] = $studentModel->getTasksByProjectAndStudent($projectId, $_SESSION['user_id']);
                $data['project'] = $studentModel->getProjectDetails($projectId);

                if ($data['tasks'] && $data['project']) {
                    $this->view('Student/dashboard', $data);
                } else {
                    $this->view('_404');
                }
            } else {
                $this->view('_404');
            }
        } else {
            $this->view('_404');
        }
    }

    public function updateTaskStatus() {
        if (!empty($_SESSION['user_id']) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $task_id = $_POST['task_id'];
            $status = $_POST['status'];
            $project_id = $_POST['project_id'];

            // Check if task_id, status, and project_id are set
            if ($task_id && $status && $project_id) {
                $studentModel = new StudentModel();
                $result = $studentModel->updateTaskStatus($task_id, $status);

                // If the task status is updated successfully, redirect back to the dashboard
                if ($result) {
                    header('Location: ' . ROOT . '/Student/dashboard?project_id=' . $project_id);
                    exit;
                } else {
                    // If update failed, show 404
                    $this->view('_404');
                }
            } else {
                $this->view('_404');
            }
        } else {
            $this->view('_404');
        }
    }

}