<?php 
require_once 'navigationbar.php'
?>

<html>
<head>
    <title>LMS Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">

            <?php
                if(isset($data['errors'])){
                    foreach($data['errors'] as $error){
                        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">'.$error.'</span>
                        </div>';
                    }
                }

                if(isset($_SESSION['status'])){
                    echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">'.$_SESSION['status'].'</span>
                    </div>';
                    unset($_SESSION['status']);
                }
                if(isset($_SESSION['status-error'])){
                    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">'.$_SESSION['status-error'].'</span>
                    </div>';
                    unset($_SESSION['status-error']);
                }

            ?>
    
   

        <main class="flex flex-col lg:flex-row lg:space-x-8">
        <?php 
            if($_SESSION['user_role']==2 || $_SESSION['user_role']==3 ):
        ?>
            <section class="mb-8 lg:w-1/2">
                <h2 class="text-xl font-semibold mb-4">Make an Announcement</h2>
                <form class="bg-white p-6 rounded shadow-md" action="<?=ROOT?>/Announcement/makeAnnouncement" method="post">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                        <input type="text" id="title" class="w-full p-2 border border-gray-300 rounded" placeholder="Announcement Title" name="title">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                        <textarea id="content" class="w-full p-2 border border-gray-300 rounded" rows="4" placeholder="Announcement Content" name="content"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Post Announcement</button>
                </form>
            </section>
        <?php endif; ?>

            <section class="lg:w-1/2">
                <h2 class="text-xl font-semibold mb-4">Previous Announcements</h2>
                <div class="space-y-4">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 1</h3>
                        <p class="text-gray-700 mb-2">This is the content of the first announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-10-01</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 2</h3>
                        <p class="text-gray-700 mb-2">This is the content of the second announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-25</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 3</h3>
                        <p class="text-gray-700 mb-2">This is the content of the third announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-20</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 4</h3>
                        <p class="text-gray-700 mb-2">This is the content of the fourth announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-15</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 5</h3>
                        <p class="text-gray-700 mb-2">This is the content of the fifth announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-10</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>