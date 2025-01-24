<!DOCTYPE html>
<?php 
require_once 'navigationbar.php'
?>
<html lang="en">
<head>
    <title>Task 02</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .header .edit-icon {
            font-size: 18px;
            cursor: pointer;
        }
        .section {
            margin-top: 20px;
        }
        .section h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .description {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 8px;
            position: relative;
        }
        .description .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }
        .status, .flags, .duration, .sub-tasks, .assign, .created-by, .comments {
            margin-top: 20px;
        }
        .status, .flags, .duration, .sub-tasks {
            display: inline-block;
            vertical-align: top;
            width: 48%;
        }
        .status .status-indicator {
            display: flex;
            align-items: center;
            position: relative;
        }
        .status .status-indicator span {
            background-color: #d4edda;
            color: #155724;
            padding: 5px 10px;
            border-radius: 20px;
            margin-right: 10px;
        }
        .status .dropdown {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            margin-top: 5px;
            z-index: 1;
            width: 100%;
        }
        .status .dropdown div {
            padding: 10px;
            cursor: pointer;
        }
        .status .dropdown div:hover {
            background-color: #f0f0f0;
        }
        .duration .date {
            display: flex;
            justify-content: space-between;
        }
        .duration .date div {
            width: 48%;
            display: flex;
            align-items: center;
            position: relative;
        }
        .duration .date div input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .duration .date div i {
            position: absolute;
            right: 10px;
            cursor: pointer;
        }
        .sub-tasks .task-list {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
        }
        .sub-tasks .task-list .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
        }
        .sub-tasks .task-list .task-item .remove-icon {
            cursor: pointer;
        }
        .sub-tasks .add-task {
            display: flex;
            align-items: center;
            margin-top: 10px;
            cursor: pointer;
        }
        .assign, .created-by {
            display: inline-block;
            vertical-align: top;
            width: 48%;
        }
        .assign .member-list, .created-by .creator {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
        }
        .assign .member-list .member-item, .created-by .creator .creator-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
        }
        .assign .member-list .member-item .remove-icon, .created-by .creator .creator-item .role {
            cursor: pointer;
        }
        .assign .add-member {
            display: flex;
            align-items: center;
            margin-top: 10px;
            cursor: pointer;
        }
        .comments .comment-list {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
        }
        .comments .comment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .comments .comment-item .comment-text {
            width: 80%;
        }
        .comments .comment-item .comment-author {
            width: 20%;
            text-align: right;
        }
        .comments .add-comment {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .comments .add-comment input {
            width: 85%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .comments .add-comment button {
            width: 15%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .footer .discard {
            background-color: #6c757d;
            color: #fff;
        }
        .footer .save {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="task-form">
            <div class="header">
                <h1 id="task-title">Task Title Example</h1>
                <input type="text" id="task-title-edit" style="display: none; width: 100%;" />
                <i class="fas fa-pencil-alt edit-icon" onclick="editTaskTitle()"></i>
            </div>
            <div class="section description">
                <h2>Description</h2>
                <p id="description-text">This is a sample description for the task. It provides details about what needs to be done.</p>
                <textarea id="description-edit" style="display: none; width: 100%; height: 100px;"></textarea>
                <i class="fas fa-pencil-alt edit-icon" onclick="editDescription()"></i>
            </div>
            <div class="status">
                <h2>Status</h2>
                <div class="status-indicator" onclick="toggleStatusDropdown()">
                    <span id="selected-status">On Progress</span>
                    <i class="fas fa-caret-down"></i>
                </div>
                <div class="dropdown" id="status-dropdown">
                    <div class="to-do" onclick="selectStatus('To Do', 'purple', '#e6e6fa')">To Do</div>
                    <div class="on-progress" onclick="selectStatus('On Progress', 'green', '#d4edda')">On Progress</div>
                    <div class="completed" onclick="selectStatus('Completed', 'orange', '#ffe5b4')">Completed</div>
                    <div class="overdue" onclick="selectStatus('OverDue', 'red', '#f8d7da')">OverDue</div>
                    <div class="terminated" onclick="selectStatus('Terminated', 'gray', '#e2e3e5')">Terminated</div>
                </div>
            </div>
            <div class="flags">
                <h2>Flags</h2>
                <div class="status-indicator" onclick="toggleFlagDropdown()">
                    <span id="selected-flag">--None--</span>
                    <i class="fas fa-caret-down"></i>
                </div>
                <div class="dropdown" id="flag-dropdown">
                    <div onclick="selectFlag('Important')">Important</div>
                    <div onclick="selectFlag('Urgent')">Urgent</div>
                    <div onclick="selectFlag('Revise')">Revise</div>
                    <div onclick="selectFlag('Good')">Good</div>
                </div>
            </div>
            <div class="duration">
                <h2>Duration</h2>
                <div class="date">
                    <div>
                        <input type="text" id="start-date" value="2024-01-01">
                        <i class="fas fa-calendar-alt" onclick="$('#start-date').datepicker('show')"></i>
                    </div>
                    <div>
                        <input type="text" id="end-date" value="2024-01-10">
                        <i class="fas fa-calendar-alt" onclick="$('#end-date').datepicker('show')"></i>
                    </div>
                </div>
            </div>
            <div class="sub-tasks">
                <h2>Sub-Tasks</h2>
                <div class="task-list" id="task-list">
                    <div class="task-item">
                        <span>Sub-task 1</span>
                        <i class="fas fa-times remove-icon" onclick="removeTask(this)"></i>
                    </div>
                    <div class="task-item">
                        <span>Sub-task 2</span>
                        <i class="fas fa-times remove-icon" onclick="removeTask(this)"></i>
                    </div>
                    <div class="task-item">
                        <span>Sub-task 3</span>
                        <i class="fas fa-times remove-icon" onclick="removeTask(this)"></i>
                    </div>
                </div>
                <div class="add-task" onclick="addSubTask()">
                    <i class="fas fa-plus"></i>
                    <span>Add Sub Tasks</span>
                </div>
            </div>
            <div class="assign">
                <h2>Assign</h2>
                <div class="member-list">
                    <div class="member-item">
                        <span>John Doe</span>
                        <span>john.doe@example.com</span>
                        <i class="fas fa-times remove-icon"></i>
                    </div>
                    <div class="member-item">
                        <span>Jane Smith</span>
                        <span>jane.smith@example.com</span>
                        <i class="fas fa-times remove-icon"></i>
                    </div>
                </div>
                <div class="add-member">
                    <i class="fas fa-plus"></i>
                    <span>Assign Members</span>
                </div>
            </div>
            <div class="created-by">
                <h2>Created By</h2>
                <div class="creator">
                    <div class="creator-item">
                        <span>Admin User</span>
                        <span>admin@example.com</span>
                        <span class="role">Project Manager</span>
                    </div>
                </div>
            </div>
            <div class="comments">
                <h2>Comments</h2>
                <div class="comment-list">
                    <div class="comment-item">
                        <div class="comment-text">This is a comment about the task.</div>
                        <div class="comment-author">
                            <div>John Doe</div>
                            <div>Member</div>
                            <div>12/08/2024</div>
                        </div>
                    </div>
                    <div class="comment-item">
                        <div class="comment-text">Another comment regarding the task.</div>
                        <div class="comment-author">
                            <div>Jane Smith</div>
                            <div>Member</div>
                            <div>12/09/2024</div>
                        </div>
                    </div>
                </div>
                <div class="add-comment">
                    <input type="text" placeholder="Add Comment...">
                    <button>Post</button>
                </div>
            </div>
            <div class="footer">
                <button type="button" class="discard">Discard</button>
                <button type="submit" class="save">Save</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#start-date").datepicker();
            $("#end-date").datepicker();
        });

        function toggleStatusDropdown() {
            var dropdown = document.getElementById("status-dropdown");
            dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
        }

        function selectStatus(status, color, bgColor) {
            var statusElement = document.getElementById("selected-status");
            statusElement.innerText = status;
            statusElement.style.color = color;
            statusElement.style.backgroundColor = bgColor;
            document.getElementById("status-dropdown").style.display = "none";
        }

        function toggleFlagDropdown() {
            var dropdown = document.getElementById("flag-dropdown");
            dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
        }

        function selectFlag(flag) {
            document.getElementById("selected-flag").innerText = flag;
            document.getElementById("flag-dropdown").style.display = "none";
        }

        function editDescription() {
            var descriptionText = document.getElementById("description-text");
            var descriptionEdit = document.getElementById("description-edit");
            if (descriptionEdit.style.display === "none" || descriptionEdit.style.display === "") {
                descriptionEdit.value = descriptionText.innerText;
                descriptionText.style.display = "none";
                descriptionEdit.style.display = "block";
                descriptionEdit.focus();
            } else {
                descriptionText.innerText = descriptionEdit.value;
                descriptionText.style.display = "block";
                descriptionEdit.style.display = "none";
            }
        }

        function editTaskTitle() {
            var taskTitle = document.getElementById("task-title");
            var taskTitleEdit = document.getElementById("task-title-edit");
            if (taskTitleEdit.style.display === "none" || taskTitleEdit.style.display === "") {
                taskTitleEdit.value = taskTitle.innerText;
                taskTitle.style.display = "none";
                taskTitleEdit.style.display = "block";
                taskTitleEdit.focus();
            } else {
                taskTitle.innerText = taskTitleEdit.value;
                taskTitle.style.display = "block";
                taskTitleEdit.style.display = "none";
            }
        }

        function removeTask(element) {
            if (element && element.parentElement) {
                var taskItem = element.parentElement;
                taskItem.remove();
            } else {
                console.error("Error: Unable to remove task. Element not found.");
            }
        }

        function addSubTask() {
            var subTask = prompt("Enter sub task:");
            if (subTask) {
                if (subTask.trim() === "") {
                    alert("Error: Sub-task cannot be empty.");
                    return; // Exit the function if input is invalid
                }
                var taskList = document.getElementById("task-list");
                var taskItem = document.createElement("div");
                taskItem.className = "task-item";
                taskItem.innerHTML = '<span>' + subTask + '</span><i class="fas fa-times remove-icon" onclick="removeTask(this)"></i>';
                taskList.appendChild(taskItem);
            } else {
                alert("Error: Sub-task input was cancelled.");
            }
        }

        document.addEventListener('click', function(event) {
            var isClickInsideStatus = document.querySelector('.status').contains(event.target);
            if (!isClickInsideStatus) {
                document.getElementById("status-dropdown").style.display = "none";
            }

            var isClickInsideFlag = document.querySelector('.flags').contains(event.target);
            if (!isClickInsideFlag) {
                document.getElementById("flag-dropdown").style.display = "none";
            }
        });
    </script>
</body>
</html>