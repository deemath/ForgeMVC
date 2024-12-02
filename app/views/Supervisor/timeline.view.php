
<?php
require_once "navigationbar.php";

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
        <div class="header">
            <div class="logo">Project Forge</div>
            <div class="user">
                <i class="fas fa-cogs settings"></i>
                <div class="avatar"></div>
            </div>
        </div>
        <div class="content">
            <div class="gantt-chart">
                <div class="chart-header">Project Agile Timeline</div>
                <div class="chart-row">
                    <div class="task-name">Generate UI</div>
                    <div class="task-bar">
                        <div class="bar ongoing" style="width: 20%; left: 0%;"></div>
                    </div>
                    <div class="task-dates">2023-06-01 to 2023-06-15</div>
                </div>
                <div class="chart-row">
                    <div class="task-name">Design Database</div>
                    <div class="task-bar">
                        <div class="bar ongoing" style="width: 20%; left: 20%;"></div>
                    </div>
                    <div class="task-dates">2023-06-15 to 2023-07-01</div>
                </div>
                <div class="chart-row">
                    <div class="task-name">Create API</div>
                    <div class="task-bar">
                        <div class="bar ongoing" style="width: 20%; left: 40%;"></div>
                    </div>
                    <div class="task-dates">2023-07-01 to 2023-07-15</div>
                </div>
                <div class="chart-row">
                    <div class="task-name">Write Documentation</div>
                    <div class="task-bar">
                        <div class="bar ongoing" style="width: 20%; left: 60%;"></div>
                    </div>
                    <div class="task-dates">2023-07-15 to 2023-08-01</div>
                </div>
                <div class="chart-row">
                    <div class="task-name">Fix Bugs</div>
                    <div class="task-bar">
                        <div class="bar ongoing" style="width: 20%; left: 80%;"></div>
                    </div>
                    <div class="task-dates">2023-08-01 to 2023-08-15</div>
                </div>
                <div class="chart-row">
                    <div class="task-name">Optimize Performance</div>
                    <div class="task-bar">
                        <div class="bar ongoing" style="width: 20%; left: 100%;"></div>
                    </div>
                    <div class="task-dates">2023-08-15 to 2023-09-01</div>
                </div>
                <div class="chart-row">
                    <div class="task-name">Deploy Application</div>
                    <div class="task-bar">
                        <div class="bar completed" style="width: 20%; left: 120%;"></div>
                    </div>
                    <div class="task-dates">2023-09-01 to 2023-09-15</div>
                </div>
                <div class="chart-row">
                    <div class="task-name">User Training</div>
                    <div class="task-bar">
                        <div class="bar completed" style="width: 20%; left: 140%;"></div>
                    </div>
                    <div class="task-dates">2023-09-15 to 2023-09-30</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>