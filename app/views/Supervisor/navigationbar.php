


<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/common.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif; 
        }
        .mb-4:hover {
            background-color: #E0E7FF; /* Light blue background */
            border-radius: 0.375rem; /* Rounded corners */
            padding: 5px 5px 5px 10px;
            transition: 10 ms;
            
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md fixed h-full">
        <div class="flex items-center justify-start py-4 px-4">
            <img alt="Forge Logo" class="h-10 w-10" height="40" src="https://storage.googleapis.com/a1aa/image/FL6xkg4viyYCNdTNVTAOFTqFFVNkhDSFlfAe3fYoNClakYgnA.jpg" width="40"/>
            <span class="ml-2 text-xl font-bold text-blue-900">FORGE</span>
        </div>
        <div class="px-6 py-4">
            <a href="<?=ROOT ?>/Supervisor/load" > 
            <div class="flex items-center mb-6">
                
                
                <div class="ml flex  space-x-4">
                    
                    <img alt="Dummy Project Logo" class="h-10 w-10" height="40" src="https://storage.googleapis.com/a1aa/image/m9MmFMflo3VjaqCbWInRx9fg1sOW9ZNN4cpCf7YfQoghIxAPB.jpg" width="40"/>
                    <div>
                    <div class="text-lg font-bold">
                        <?php if(isset($_SESSION['project_title'])): ?>
                            <?=$_SESSION['project_title']?>
                        <?php endif; ?>
                  
                    </div>
                    <div class="text-sm text-gray-500">
                            <?php if(isset($_SESSION['institute_name'])): ?>
                                <?=$_SESSION['institute_name']?>
                            <?php endif; ?>
                    </div>
                    </div>
                </div>
                </a>
            </div>
           
            <nav>
                <ul>
                    <li class="mb-4 ">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Supervisor/tasklist">
                            <i class="fas fa-tasks mr-3"></i>
                            <span>Tasks</span>
                        </a>
                    </li>
                    <li class="mb-4 ">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Supervisor/showTimeline">
                            <i class="fas fa-stream mr-3"></i>
                            <span>Timeline</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Supervisor/showcalender">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Message/chatbox">
                            <i class="fas fa-comments mr-3"></i>
                            <span>Forum</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Meeting/meetings">
                            <i class="fas fa-handshake mr-3"></i>
                            <span>Meetings</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Announcement/announcements">
                            <i class="fas fa-bullhorn mr-3"></i>
                            <span>Announcements</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Supervisor/showDocument">
                            <i class="fas fa-hdd mr-3"></i>
                            <span>Drive Space</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Supervisor/memberlist">
                            <i class="fas fa-users mr-3"></i>
                            <span>Members</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Logout/Ask">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col ml-64">
        <!-- Header -->
        <header class="flex items-center justify-between bg-white shadow-md px-6 py-4">
            <div class="text-lg font-bold">Projects /
                        <?php if(isset($_SESSION['project_title'])): ?>
                            <?=$_SESSION['project_title']?>
                        <?php endif; ?>

        </div>
            <div class="flex items-center">
                        <?php if(isset($_SESSION['user_role'])){
                            if ($_SESSION['user_role'] == 2) {
                                
                                    echo '<div class="role member px-3 py-1 mx-3 border-2 border-yellow-800 rounded-2xl bg-yellow-100 text-yellow-900" id="role">Project Supervisor</div> ';
                                    
                                } elseif ($_SESSION['user_role'] == 3) {
                                    echo '<div class="role member px-3 py-1 mx-3 border-2 border-green-800 rounded-2xl bg-green-100 text-green-900" id="role"> Co Supervisor</div>';
                                } elseif ($_SESSION['user_role'] == 4) {
                                    echo '<div class="role member px-3 py-1 mx-3 border-2 border-purple-800 rounded-2xl bg-purple-100 text-purple-900" id="role"> member</div>';
                                } else {
                                    echo '<div class="role member" id="role"> Unknown Role</div>';

                                }
                            }
                         ?>
                <img alt="User Avatar" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/MQVTGlFdiu5zJNa2BVfccPYnWhgY9CjCYWAfe72QBplfIxAPB.jpg" width="40"/>
                <?php if(isset($_SESSION['user_name'])): ?>
                            <?=$_SESSION['user_name']?>
                <?php endif; ?>
            </div>
        </header>