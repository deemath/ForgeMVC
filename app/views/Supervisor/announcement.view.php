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
                        <!-- Replace textarea with a rich text editor -->
                        <textarea id="content" class="w-full p-2 border border-gray-300 rounded" rows="6" placeholder="Announcement Content" name="content"></textarea>
                    </div>
                    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('content', {
                            toolbar: [
                                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                                { name: 'links', items: ['Link', 'Unlink'] },
                                { name: 'insert', items: ['Image', 'Table'] },
                                { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                                { name: 'colors', items: ['TextColor', 'BGColor'] },
                                { name: 'tools', items: ['Maximize'] }
                            ]
                        });
                    </script>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Post Announcement</button>
                </form>
            </section>
        <?php endif; ?>

            <section class="lg:w-1/2">
                <h2 class="text-xl font-semibold mb-4">Previous Announcements</h2>
                <div class="space-y-4">
                    <?php if(isset($data['announcements'])): ?>
                        <?php foreach($data['announcements'] as $announcement):?>
                            <div class="bg-white p-6 rounded shadow-md">
                            <a href="showAnnouncement?id=<?= $announcement->id?>">
                                <h3 class="text-lg font-semibold mb-2"><?= $announcement->title?></h3>
                                <p class="text-gray-700 mb-2">
                                    <?= substr($announcement->description, 0, 100) . (strlen($announcement->description) > 100 ? '...' : '') ?>
                                </p>
                                <p class="text-gray-500 text-sm">Posted on: <?= $announcement->createdat?></p>
                                </a>
                            </div>
                        <?php endforeach ;?>
                    <?php endif; ?>
                   
                  
              
                </div>
            </section>
        </main>
    </div>
</body>
</html>
