<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Coordinator Dashboard
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #fff;
            color: #333;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .sidebar .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .sidebar .logo span {
            font-size: 20px;
            font-weight: bold;
            color: #1e3a8a;
            margin-left: 8px;
        }
        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 18px;
        }
        .sidebar a {
            color: #333;
            text-decoration: none;
            margin: 10px 0;
            font-size: 16px;
            display: flex;
            align-items: center;
            width: 100%;
            padding-left: 20px;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: calc(100% - 250px);
            position: fixed;
            top: 0;
            left: 250px;
            z-index: 1000;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .header .user-info span {
            font-size: 14px;
        }
        .dashboard-content {
            margin-top: 80px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .stats-box {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            text-align: center;
            letter-spacing: 0.3px;
        }
        .stats-box h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #555;
        }
        .stats-box p {
            font-size: 24px;
            font-weight: bold;
            margin: 8px 0 0 0;
            color: #111827;
        }
        .total-projects-box {
            background-color: #7fb3d5;
            color: #000000;
        }
        .recent-project-box {
            background-color: #85c1e9;
            color: #000000;
        }
        .completed-projects-box {
            background-color: #76d7c4;
            color: #000000;
        }   
        .ongoing-projects-box {
            background-color: #f7dc6f;
            color: #000000;
        }

        .add-project-box {
            transition: transform 0.3s ease;
            background-color: #1e3a8a;
            color: #fff;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .add-project-box:hover {
            transform: scale(1.05);
            background-color: #1a2e6b;
        }
        .add-project-box i {
            margin-right: 10px;
        }
        .projects-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            margin-top: 80px;
        }
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }
        .project-box {
            transition: transform 0.3s ease;
            background-color: #dbeafe;
            padding: 15px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
            text-align: center;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .project-box:hover {
            transform: scale(1.03);
        }
        .project-box h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #0c4a6e;
        }
        .project-box p {
            font-size: 14px;
            margin: 5px 0;
        }
        .project-box .date {
            font-size: 12px;
            color: #666;
        }
        .project-box .supervisor {
            font-size: 14px;
            font-weight: 500;
            color: #1e3a8a;
            margin-top: 10px;
        }

        .settings-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        .settings-section:hover {
            transform: scale(1.01);
        }
        .settings-title {
            font-size: 24px;
            margin-bottom: 30px;
            margin-top: 80px;
            color: #1e3a8a;
            text-align: center;
        }
        .settings-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .settings-section {
            transition: transform 0.3s ease;
            background-color: #e6f0ff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        .settings-section h3 {
            margin-bottom: 15px;
            color: #1e3a8a;
        }

        .settings-section label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 500;
        }

        .settings-section input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .save-btn {
            margin-top: 15px;
            background-color: #1e3a8a;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .save-btn:hover {
            background-color: #3356c1;
        }

  </style>
 </head>
 <body>
  <div class="sidebar">
   <div class="logo">
    <img alt="Forge logo" height="40" src="https://storage.googleapis.com/a1aa/image/oPXahoEIfrXbMakgkCnnEQeQO8f0fsx8xOnKAyTVmnfOecf6JA.jpg" width="40"/>
    <span class="ml-2 text-xl font-bold text-blue-900">
     FORGE
    </span>
   </div>
   <a href="<?=ROOT?>/Coordinator/Dashboard">
   <h2>
    Dashboard
   </h2>
   </a>
   <a href="<?=ROOT?>/Coordinator/projectlist">
    <i class="fas fa-project-diagram">
    </i>
    Projects
   </a>
   <a href="<?=ROOT?>/Coordinator/ShowInvite">
    <i class="fas fa-users">
    </i>
    Invite users
   </a>
   <a href="<?=ROOT?>/Coordinator/Userlist">
    <i class="fas fa-users">
    </i>
    Users List
   </a>
   <a href="<?=ROOT?>/Coordinator/Settings">
    <i class="fas fa-cogs">
    </i>
    Settings
   </a>
   <a href="#">
    <i class="fas fa-sign-out-alt">
    </i>
    Logout
   </a>
  </div>
  <div class="main-content">
   <div class="header">
    <h1>
     Coordinator Dashboard
    </h1>
    <div class="user-info">
     <img alt="Profile picture of the user" height="40" src="https://storage.googleapis.com/a1aa/image/3atmTVEpQP7bERKmtzfVwkURkFdLuWHzfy9ifAfp28O7O3XPB.jpg" width="40"/>
     <span>
      <?=$_SESSION['coordinator_id']?>
     </span>
    </div>
   </div>