<?php require_once 'navigationbar.php'; ?>


<html>
<head>
    <title>Meeting Scheduler</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row">
            <div class="form-container bg-white p-6 rounded-lg shadow-md flex-1 mb-6 md:mb-0 md:mr-6">
                <form action="createMeeting" method="post">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Create a Meeting</h2>
                <div class="form-group mb-4">
                    <label for="meeting-title" class="block text-gray-700 mb-2">Meeting Title</label>
                    <input type="text" name="meeting-title" placeholder="Enter meeting title" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="form-group mb-4">
                    <label for="meeting-date" class="block text-gray-700 mb-2">Meeting Date</label>
                    <div class="relative">
                        <input type="date" name="meeting-date" placeholder="dd/mm/yyyy" class="w-full p-2 border border-gray-300 rounded pr-10">
                       
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="meeting-time" class="block text-gray-700 mb-2">Meeting Time</label>
                    <div class="relative">
                        <input type="time" name="meeting-time" placeholder="--:--" class="w-full p-2 border border-gray-300 rounded pr-10">
                       
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="meeting-description" class="block text-gray-700 mb-2">Meeting Description</label>
                    <textarea name="meeting-description" rows="4" placeholder="Enter meeting description" class="w-full p-2 border border-gray-300 rounded"></textarea>
                </div>
                <!-- <div class="form-group mb-4">
                    <label for="meeting-members" class="block text-gray-700 mb-2">Meeting Members</label>
                    <input type="text" name="meeting-members" placeholder="Enter meeting members" class="w-full p-2 border border-gray-300 rounded">
                </div> -->
                <button type="submit" class="bg-blue-800 text-white py-2 px-4 rounded inline-block text-center">+ Create</button>
                </form>
            </div>
            <div class="upcoming-meetings bg-white p-6 rounded-lg shadow-md flex-1">
                <h3 class="text-xl font-semibold text-blue-800 mb-4">Upcoming Meetings</h3>
                            
                 
               

                <div class="grid grid-cols-1 gap-4">
                    <?php if(isset($data['result'])):?>
                    <?php foreach ($data['result'] as $meeting) : ?>
                        <div class="meeting-item bg-gray-50 p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2"><?=$meeting->meetingTitle ?></h4>
                        <p class="text-gray-600 mb-1"><i class="fas fa-calendar-alt mr-2"></i>Date: <?=$meeting->meet_date ?></p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-clock mr-2"></i>Time: <?=$meeting->meet_time ?></p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-user mr-2"></i>Created by: John Doe (Supervisor)</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-link mr-2"></i>Meeting Link: <a href="<?=$meeting->meeting_link ?>" class="text-blue-600 underline"><?=$meeting->meeting_link ?></a></p>
                        <button class="bg-blue-800 text-white py-1 px-3 rounded mt-2" onclick="copyToClipboard('<?=$meeting->meeting_link ?>')">Copy Link</button>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <!-- <div class="meeting-item bg-gray-50 p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Design Review</h4>
                        <p class="text-gray-600 mb-1"><i class="fas fa-calendar-alt mr-2"></i>Date: 2023-10-20</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-clock mr-2"></i>Time: 2:00 PM</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-user mr-2"></i>Created by: Jane Smith (Member)</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-link mr-2"></i>Meeting Link: <a href="#" class="text-blue-600 underline">https://example.com/meeting2</a></p>
                        <button class="bg-blue-800 text-white py-1 px-3 rounded mt-2" onclick="copyToClipboard('https://example.com/meeting2')">Copy Link</button>
                    </div>
                    <div class="meeting-item bg-gray-50 p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Sprint Planning</h4>
                        <p class="text-gray-600 mb-1"><i class="fas fa-calendar-alt mr-2"></i>Date: 2023-10-25</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-clock mr-2"></i>Time: 11:00 AM</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-user mr-2"></i>Created by: Alice Johnson (Supervisor)</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-link mr-2"></i>Meeting Link: <a href="#" class="text-blue-600 underline">https://example.com/meeting3</a></p>
                        <button class="bg-blue-800 text-white py-1 px-3 rounded mt-2" onclick="copyToClipboard('https://example.com/meeting3')">Copy Link</button>
                    </div>
                    <div class="meeting-item bg-gray-50 p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Retrospective</h4>
                        <p class="text-gray-600 mb-1"><i class="fas fa-calendar-alt mr-2"></i>Date: 2023-10-30</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-clock mr-2"></i>Time: 4:00 PM</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-user mr-2"></i>Created by: Bob Brown (Member)</p>
                        <p class="text-gray-600 mb-1"><i class="fas fa-link mr-2"></i>Meeting Link: <a href="#" class="text-blue-600 underline">https://example.com/meeting4</a></p>
                     <button class="bg-blue-800 text-white py-1 px-3 rounded mt-2" onclick="copyToClipboard('https://example.com/meeting4')">Copy Link</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Link copied to clipboard');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</body>
</html>