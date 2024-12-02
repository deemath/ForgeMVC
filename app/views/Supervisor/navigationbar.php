


<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                
                <img alt="Dummy Project Logo" class="h-10 w-10" height="40" src="https://storage.googleapis.com/a1aa/image/m9MmFMflo3VjaqCbWInRx9fg1sOW9ZNN4cpCf7YfQoghIxAPB.jpg" width="40"/>
                <div class="ml-2">
                    <div class="text-lg font-bold">
                    <?php if(!empty($data['project'])): ?>
                
                
                    
                <!-- <php print_r($project)?> -->
                            <?=$project->title?>
                        
                        <?php endif; ?>
                    </div>
                    <div class="text-sm text-gray-500">project beta</div>
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
                        <a class="flex items-center text-gray-700" href="#">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="<?=ROOT?>/Supervisor/Chatbox">
                            <i class="fas fa-comments mr-3"></i>
                            <span>Forum</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="#">
                            <i class="fas fa-handshake mr-3"></i>
                            <span>Meetings</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-gray-700" href="#">
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
                        <a class="flex items-center text-gray-700" href="#">
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
            <?php if(!empty($data['project'])): ?>
            
    
                <?=$project->title?:''?>

            
            <?php endif; ?>

        </div>
            <div class="flex items-center">
                <img alt="User Avatar" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/MQVTGlFdiu5zJNa2BVfccPYnWhgY9CjCYWAfe72QBplfIxAPB.jpg" width="40"/>
            </div>
        </header>