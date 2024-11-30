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
                <div class="task-column">
                    <div class="column-title">On Progress</div>
                    <div class="task-card">
                        <div class="title">Task 1</div>
                        <div class="description">Generate UI</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 2</div>
                        <div class="description">Design Database</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
                <div class="task-column">
                    <div class="column-title">To Do</div>
                    <div class="task-card">
                        <div class="title">Task 3</div>
                        <div class="description">Create API</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 4</div>
                        <div class="description">Write Documentation</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
                <div class="task-column">
                    <div class="column-title">Overdue</div>
                    <div class="task-card">
                        <div class="title">Task 5</div>
                        <div class="description">Fix Bugs</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 6</div>
                        <div class="description">Optimize Performance</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
                <div class="task-column">
                    <div class="column-title">Completed</div>
                    <div class="task-card">
                        <div class="title">Task 7</div>
                        <div class="description">Deploy Application</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 8</div>
                        <div class="description">User Training</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
                <div class="task-column">
                    <div class="column-title">Terminated</div>
                    <div class="task-card">
                        <div class="title">Task 9</div>
                        <div class="description">Initial Setup</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 10</div>
                        <div class="description">Requirement Analysis</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
            </div>
            <div class="flags">
                <div class="flag-column urgent">
                    <div class="column-title">Urgent</div>
                    <div class="task-card">
                        <div class="title">Task 11</div>
                        <div class="description">Fix Critical Bug</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 12</div>
                        <div class="description">Prepare Release</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
                <div class="flag-column important">
                    <div class="column-title">Important</div>
                    <div class="task-card">
                        <div class="title">Task 13</div>
                        <div class="description">Update Documentation</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 14</div>
                        <div class="description">Code Review</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
                <div class="flag-column revise">
                    <div class="column-title">Revise</div>
                    <div class="task-card">
                        <div class="title">Task 15</div>
                        <div class="description">Revise UI Design</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 16</div>
                        <div class="description">Revise Database Schema</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
                <div class="flag-column good">
                    <div class="column-title">Good</div>
                    <div class="task-card">
                        <div class="title">Task 17</div>
                        <div class="description">Optimize Code</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                    <div class="task-card">
                        <div class="title">Task 18</div>
                        <div class="description">Improve Performance</div>
                        <div class="assigned-users">dewmini@gmail.com</div>
                    </div>
                </div>
            </div>
            <div class="comments">
                <div class="column-title">Recent Comments</div>
                <div class="comment-card">
                    <div class="comment">This is a brief comment about the task.</div>
                    <div class="task">Task: Generate UI</div>
                    <div class="user">User: dewmini@gmail.com</div>
                </div>
                <div class="comment-card">
                    <div class="comment">Another comment about a different task.</div>
                    <div class="task">Task: Design Database</div>
                    <div class="user">User: dewmini@gmail.com</div>
                </div>
                <div class="comment-card">
                    <div class="comment">Yet another comment for a task.</div>
                    <div class="task">Task: Create API</div>
                    <div class="user">User: dewmini@gmail.com</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>