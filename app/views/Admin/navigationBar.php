
<html>
<head>
    <title>Admin Dashboard</title>
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
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #0a2859;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .sidebar .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sidebar .menu {
            flex: 1;
        }
        .sidebar .menu a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
            font-size: 16px;
        }
        .sidebar .menu a:hover {
            background-color: #010a8c;
            padding-left: 10px;
        }
        .sidebar .footer {
            text-align: center;
            font-size: 14px;
        }
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: white;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .title {
            font-size: 24px;
            font-weight: bold;
        }
        .header .user {
            display: flex;
            align-items: center;
        }
        .header .user .avatar img {
            width: 40px;
            height: 40px;
            /* background-color: #ddd; */
            border-radius: 50%;
            margin-right: 10px;
        }
        .header .user .name {
            font-size: 18px;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .stats .stat {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }
        .stats .stat .number {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .stats .stat .label {
            font-size: 14px;
            color: #888;
        }
        a{
            text-decoration: none;
            padding: 0;
            margin: 0;
        }
         .register-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            flex: 1;
            margin: 0 10px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.2;
        }
        .register-button i {
            font-size: 20px;
            margin-right: 10px;
        }
        .register-button:hover {
            background-color: #218838;
        }
        .projects {
            display: flex;
            flex-wrap: wrap;
        }
        .project {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .project .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .project .description {
            font-size: 14px;
            margin-bottom: 10px;
        }
        .project .actions {
            display: flex;
            justify-content: space-between;
        }
        .project .actions button {
            background-color: #020fbf;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .project .actions button:hover {
            background-color: #010a8c;
        }
        .project .actions .delete-button {
            background-color: #ff4d4d;
        }
        .project .actions .delete-button:hover {
            background-color: #cc0000;
        }
        .coordinators {
            margin-top: 20px;
        }
        .coordinators .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .coordinator {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .coordinator .avatar {
            width: 50px;
            height: 50px;
            background-color: #ddd;
            border-radius: 50%;
            margin-right: 10px;
        }
        .coordinator .info {
            flex: 1;
        }
        .coordinator .info .name {
            font-size: 18px;
            font-weight: bold;
        }
        .coordinator .info .email {
            font-size: 14px;
            color: #888;
        }
        .recent-projects-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .content1 {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .form-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-container input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #0a2859;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #010a8c;
        }
        .content2 {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .profile {
            display: flex;
            flex-direction: column;
        }
        .profile .details {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .profile .details .avatar {
            width: 100px;
            height: 100px;
            background-color: #ddd;
            border-radius: 50%;
            margin-right: 20px;
        }
        .profile .details .info {
            flex: 1;
        }
        .profile .details .info .name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .profile .details .info .email, .profile .details .info .institute {
            font-size: 18px;
            color: #888;
            margin-bottom: 10px;
        }
        .profile .details .actions {
            display: flex;
            flex-direction: column;
        }
        .profile .details .actions button {
            background-color: #3f51b5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .profile .details .actions button:hover {
            background-color: #303f9f;
        }
        .profile .projects {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
        }
        .profile .projects .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .profile .projects .project {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .profile .projects .project:last-child {
            border-bottom: none;
        }
        .profile .projects .project .name {
            font-size: 18px;
            font-weight: bold;
        }
        .profile .projects .project .details {
            font-size: 14px;
            color: #888;
        }
        .coordinators {
            margin-top: 20px;
        }
        .coordinators .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .coordinators .coordinator {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .coordinators .coordinator .avatar img{
            width: 50px;
            height: 50px;
            /* background-color: #ddd; */
            border-radius: 50%;
            margin-right: 10px;
        }
        .coordinators .coordinator .info {
            flex: 1;
        }
        .coordinators .coordinator .info .name {
            font-size: 18px;
            font-weight: bold;
        }
        .coordinators .coordinator .info .email {
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">Admin Dashboard</div>
            <div class="menu">
                <a href="<?=ROOT?>/Admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="<?=ROOT?>/Admin/projectlist"><i class="fas fa-project-diagram"></i> Projects</a>
                <a href="<?=ROOT?>/Admin/coordinatorlist"><i class="fas fa-users"></i> Project Coordinators</a>
                <a href="#"><i class="fas fa-cogs"></i> Settings</a>
            </div>
            <div class="footer">
                &copy; 2024 Admin Dashboard
            </div>
        </div>
    