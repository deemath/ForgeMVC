<?php
require_once "./navigationbar.php";

?>

<html>
<head>
    <title>User Task Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .header {
            background-color: white;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .header .user {
            display: flex;
            align-items: center;
        }
        .header .user .settings {
            margin-right: 20px;
            cursor: pointer;
        }
        .header .user .avatar {
            width: 40px;
            height: 40px;
            background-color: #ddd;
            border-radius: 50%;
            cursor: pointer;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .task-board {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .task-column {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 18%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        .task-column .column-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .task-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
            position: relative;
        }
        .task-card .title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .task-card .description {
            font-size: 14px;
            margin-bottom: 5px;
        }
        .task-card .assigned-users {
            font-size: 12px;
            color: #888;
        }
        .flags {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .flag-column {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 18%;
            box-sizing: border-box;
        }
        .flag-column .column-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .flag-column.urgent {
            background-color: #ffebee;
            border-color: #f44336;
        }
        .flag-column.important {
            background-color: #fff3e0;
            border-color: #ff9800;
        }
        .flag-column.revise {
            background-color: #e3f2fd;
            border-color: #2196f3;
        }
        .flag-column.good {
            background-color: #e8f5e9;
            border-color: #4caf50;
        }
        .comments {
            margin-top: 20px;
        }
        .comments .column-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .comment-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .comment-card .comment {
            font-size: 14px;
            margin-bottom: 5px;
        }
        .comment-card .task {
            font-size: 12px;
            color: #888;
            margin-bottom: 5px;
        }
        .comment-card .user {
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="task-board">
                <?php
                    $statuses = ['on_progress', 'to_do', 'overdue', 'completed', 'terminated'];
                    foreach ($statuses as $status) {
                        echo "<div class='task-column'>";
                        echo "<div class='column-title'>" . ucfirst(str_replace('_', ' ', $status)) . "</div>";
                        
                        // Check if there are tasks for this status
                        if (isset($tasks[$status]) && is_array($tasks[$status]) && count($tasks[$status]) > 0) {
                            foreach ($tasks[$status] as $task) {
                                echo "<div class='task-card'>";
                                echo "<div class='title'>" . htmlspecialchars($task['title']) . "</div>";
                                echo "<div class='description'>" . htmlspecialchars($task['description']) . "</div>";
                                echo "<div class='assigned-users'>" . htmlspecialchars($task['assigned_users']) . "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div>No tasks available.</div>";
                        }

                        echo "</div>";
                    }
                ?>
            </div>

            <div class="flags">
                <?php
                    $flags = ['urgent', 'important', 'revise', 'good'];
                    foreach ($flags as $flag) {
                        echo "<div class='flag-column $flag'>";
                        echo "<div class='column-title'>" . ucfirst($flag) . "</div>";

                        // Check if there are flagged tasks
                        if (isset($tasks[$flag]) && is_array($tasks[$flag]) && count($tasks[$flag]) > 0) {
                            foreach ($tasks[$flag] as $task) {
                                echo "<div class='task-card'>";
                                echo "<div class='title'>" . htmlspecialchars($task['title']) . "</div>";
                                echo "<div class='description'>" . htmlspecialchars($task['description']) . "</div>";
                                echo "<div class='assigned-users'>" . htmlspecialchars($task['assigned_users']) . "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div>No tasks available.</div>";
                        }

                        echo "</div>";
                    }
                ?>
            </div>

            <div class="comments">
                <div class="column-title">Recent Comments</div>
                <?php
                    // Check if comments are available
                    if (isset($comments) && is_array($comments) && count($comments) > 0) {
                        foreach ($comments as $comment) {
                            echo "<div class='comment-card'>";
                            echo "<div class='comment'>" . htmlspecialchars($comment['comment']) . "</div>";
                            echo "<div class='task'>Task: " . htmlspecialchars($comment['task_title']) . "</div>";
                            echo "<div class='user'>User: " . htmlspecialchars($comment['user_email']) . "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div>No comments available.</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
