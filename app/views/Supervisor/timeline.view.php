<?php
require_once "navigationbar.php";

// Sample tasks data (in a real scenario, you'd fetch this from a database)
// $tasks = [
//     ['title' => 'Generate UI', 'startdate' => '2023-06-01', 'enddate' => '2023-06-15'],
//     ['title' => 'Design Database', 'startdate' => '2023-06-15', 'enddate' => '2023-07-01'],
//     ['title' => 'Create API', 'startdate' => '2023-07-01', 'enddate' => '2023-07-15'],
//     ['title' => 'Write Documentation', 'startdate' => '2023-07-15', 'enddate' => '2023-08-01'],
//     ['title' => 'Fix Bugs', 'startdate' => '2023-08-01', 'enddate' => '2023-08-15'],
//     ['title' => 'Optimize Performance', 'startdate' => '2023-08-15', 'enddate' => '2023-09-01'],
//     ['title' => 'Deploy Application', 'startdate' => '2023-09-01', 'enddate' => '2023-09-15'],
//     ['title' => 'User Training', 'startdate' => '2023-09-15', 'enddate' => '2023-09-30'],
//     ['title' => 'User Training', 'startdate' => '2023-09-15', 'enddate' => '2023-09-30']
// ];

?>

<html>
<head>
    <title>Project Agile Timeline</title>
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
        .gantt-chart {
            display: flex;
            flex-direction: column;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
        }
        .gantt-chart .chart-header {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .gantt-chart .chart-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .gantt-chart .chart-row .task-name {
            width: 200px;
            font-size: 14px;
            font-weight: bold;
        }
        .gantt-chart .chart-row .task-bar {
            flex: 1;
            position: relative;
            height: 30px;
            background-color: #f5f5f5;
            border-radius: 5px;
            overflow: hidden;
        }
        .gantt-chart .chart-row .task-bar .bar {
            position: absolute;
            height: 100%;
            background-color: #2196f3;
            border-radius: 5px;
        }
        .gantt-chart .chart-row .task-bar .bar.ongoing {
            background-color: #4caf50;
        }
        .gantt-chart .chart-row .task-bar .bar.completed {
            background-color: #9c27b0;
        }
        .gantt-chart .chart-row .task-bar .bar.overdue {
            background-color: #ff9800;
        }
        .gantt-chart .chart-row .task-bar .bar.terminated {
            background-color: #f44336;
        }
        .gantt-chart .chart-row .task-dates {
            width: 150px;
            font-size: 12px;
            color: #888;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
     
        <div class="content">
            <div class="gantt-chart">
                <div class="chart-header">Project Agile Timeline</div>
                <?php
                    // Find the earliest and latest dates from the tasks
                    $startDate = strtotime(min(array_column($tasks, 'startdate')));
                    $endDate = strtotime(max(array_column($tasks, 'enddate')));
                    $totalDuration = ($endDate - $startDate) / (60 * 60 * 24); // Duration in days

                    // Loop through the tasks and display them on the timeline
                    foreach ($tasks as $task):
                        $taskStart = strtotime($task->startdate);
                        $taskEnd = strtotime($task->enddate);
                        $taskDuration = ($taskEnd - $taskStart) / (60 * 60 * 24); // Duration in days

                        // Calculate the left position and width as percentage values
                        $left = (($taskStart - $startDate) / (60 * 60 * 24)) / $totalDuration * 100;
                        $width = ($taskDuration / $totalDuration) * 100;
                ?>
                <div class="chart-row">
                    <div class="task-name"><?= htmlspecialchars($task->title) ?></div>
                    <div class="task-bar">
                        <div class="bar ongoing" style="left: <?= $left ?>%; width: <?= $width ?>%;"></div>
                    </div>
                    <div class="task-dates"><?= date('Y-m-d', $taskStart) ?> to <?= date('Y-m-d', $taskEnd) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
