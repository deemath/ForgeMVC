<?php

class StudentModel {
    use Model;

    protected $table = 'task';

    public function getTasksByProjectAndStudent($projectId, $memberId) {
        $query = "
            SELECT 
                t.id AS task_id,
                t.no AS task_number,
                t.title AS task_title,
                t.description AS task_description,
                t.startdate AS start_date,
                t.enddate AS end_date,
                t.status AS task_status
            FROM task t
            JOIN taskassign ta ON t.id = ta.taskid
            WHERE t.projectid = :projectId AND ta.memberid = :memberId
        ";

        $params = [
            'projectId' => $projectId,
            'memberId' => $memberId
        ];

        return $this->findAll($query, $params);
    }

    public function getProjectDetails($projectId) {
        $query = "
            SELECT 
                p.id AS project_id,
                p.title AS project_title,
                p.description AS project_description,
                p.startdate AS start_date,
                p.enddate AS end_date
            FROM project p
            WHERE p.id = :projectId
        ";

        $params = ['projectId' => $projectId];

        return $this->find($query, $params);
    }

    public function updateTaskStatus($taskId, $status) {
        $query = "
            UPDATE task 
            SET status = :status 
            WHERE id = :taskId
        ";

        $params = [
            'taskId' => $taskId,
            'status' => $status
        ];

        return $this->update($query, $params);
    }
}
