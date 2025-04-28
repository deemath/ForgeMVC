<?php
require_once "navigationbar.php";

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
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->status==2): ?>       
                                <div class="task-card">
                                    <div class="title"><?=$task->title?></div>
                                    <div class="description">
                                        <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?>


                </div>
                <div class="task-column">
                
                    <div class="column-title">To Do</div>
                        <?php if(!empty($data['creators'])):?>
                            <?php foreach($data['creators'] as $task):?> 
                                <?php if($task->status==1): ?>       
                                    <div class="task-card">
                                        <div class="title"><?=$task->title?></div>
                                        <div class="description">
                                            <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                        </div>
                                        <div class="assigned-users"><?=$task->creator_name?></div>
                                        <div class="assigned-users"><?=$task->creator_email?></div>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endif; ?>
                    
                </div>
                <div class="task-column">
                    <div class="column-title">Overdue</div>
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->status==5): ?>       
                                <div class="task-card">
                                    <div class="title"><?=$task->title?></div>
                                    <div class="description">
                                        <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?>


                </div>
                <div class="task-column">
                    <div class="column-title">Completed</div>
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->status==3): ?>       
                                <div class="task-card">
                                    <div class="title"><?=$task->title?></div>
                                    <div class="description">
                                        <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?>


                </div>
                <div class="task-column">
                    <div class="column-title">Terminated</div>
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->status==4): ?>       
                                <div class="task-card">
                                    <div class="title"><?=$task->title?></div>
                                    <div class="description">
                                        <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?>


                </div>
            </div>
            <!-- <pre><php print_r($data) ?></pre> -->
            <div class="flags">
                <div class="flag-column urgent">
                    <div class="column-title">Urgent</div>
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->flag==4): ?> 
                                <div class="task-card">
                                    <div class="title"><?=$task->title?></div>
                                    <div class="description">
                                        <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?> 

                </div>

                <div class="flag-column important">
                    <div class="column-title">Important</div>
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->flag==1): ?> 
                                <div class="task-card">
                                    <div class="title"><?=$task->title?></div>
                                    <div class="description">
                                        <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                                </div>
                                <?php endif;?>
                            <?php endforeach;?>
                         <?php endif; ?> 
                    
                </div>
                <div class="flag-column revise">
                    <div class="column-title">Revise</div>
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->flag==2): ?> 
                                <div class="task-card">
                                <div class="title"><?=$task->title?></div>
                                    <div class="description">
                                        <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?> 
                    
                </div>
                <div class="flag-column good">
                    <div class="column-title">Good</div>
                    <?php if(!empty($data['creators'])):?>
                        <?php foreach($data['creators'] as $task):?> 
                            <?php if($task->flag==3): ?> 
                            <div class="task-card">
                                    <div class="description">
                                    <?= strlen($task->description) > 30 ? substr($task->description, 0, 30) . '...' : $task->description ?>
                                    </div>
                                    <div class="assigned-users"><?=$task->creator_name?></div>
                                    <div class="assigned-users"><?=$task->creator_email?></div>
                            </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif; ?> 
                    
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
            <pre><?php print_r($data)?></pre>
        </div>
    </div>

</body>
</html>