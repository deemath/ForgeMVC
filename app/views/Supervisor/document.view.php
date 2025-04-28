<html>

<?php 
require_once 'navigationbar.php'
?>
<head>
    <title>Storage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
        }
        .header .title {
            display: flex;
            align-items: center;
        }
        .header .title i {
            font-size: 24px;
            margin-right: 10px;
        }
        .header .title h1 {
            font-size: 24px;
            margin: 0;
        }
        .header .new-button {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .header .new-button i {
            font-size: 24px;
            margin-right: 10px;
        }
        .header .new-button span {
            font-size: 18px;
        }
        .storage-info {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
        }
        .storage-info .progress-bar {
            width: 100px;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin-right: 10px;
            position: relative;
        }
        .storage-info .progress-bar .progress {
            width: 35%;
            height: 100%;
            background-color: #3b82f6;
            border-radius: 5px;
        }
        .storage-info .storage-text {
            font-size: 14px;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            padding: 10px;
            gap: 0px; /* Add consistent spacing between rows and columns */
            align-items: flex-start;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            width: 23%;
            margin: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            height: 23vh;
        }
        .card .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        .card .card-header h2 {
            font-size: 16px;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card .card-header i {
            font-size: 16px;
            cursor: pointer;
        }
        .card .card-content {
            height: 100px;
            background-color: #f5f5f5;
            
        }
        .card .card-footer {
            display: flex;
            align-items: center;
            padding: 10px;
            border-top: 1px solid #e0e0e0;
        }
        .card .card-footer .avatar {
            width: 30px;
            height: 30px;
            background-color: #d32f2f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 16px;
            margin-right: 10px;
        }
        .card .card-footer .info {
            font-size: 12px;
        }
        .dropdown {
            display: none;
            position: absolute;
            top: 40px;
            right: 10px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        .dropdown a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }
        .dropdown a:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">
            <i class="fas fa-cloud"></i>
            <h1>Storage</h1>
        </div>
        <a href="<?=ROOT?>/document/addpop">
        <div class="new-button">
            <i class="fas fa-plus"></i>
            <span>New</span>
           
        </div>
        </a>
    </div>
    <div class="storage-info">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        <div class="storage-text">0.35GB of 1GB</div>
    </div>
    <?php if (isset($data['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?= $data['success'] ?></span>
        </div>
    <?php endif; ?>

    <div class="content">
        <?php if (isset($data['documents'])): ?>
            <?php foreach($data['documents']as $document): ?>
                        <div class="card">
                            <div class="card-header">
                                <h2><?=$document->name?></h2>
                                <i class="fas fa-ellipsis-v" onclick="toggleDropdown(this)"></i>
                                <div class="dropdown">
                                    <a href="<?=ROOT?>/Document/delete/<?=$document->id?>">Delete</a>
                                    <a href="<?=ROOT?>/public/document/<?= urlencode($document->filepath) ?>">Download</a>
                                </div>
                            </div>


                           <div class="card-content">
                                            <?php
                                            $filePath = ROOT . '/public/document/' . $document->filepath; // Adjust file path as per your setup
                                            $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION)); // Get file extension
                                            ?>

                                            <?php if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                                <!-- Image Preview -->
                                                <img src="http://localhost/testmvc/public/document/<?=$document->filename?>" 
                                                    alt="Document Image" 
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                                    
                                            <?php elseif ($fileExtension === 'pdf'): ?>
                                                <!-- PDF Preview -->
                                                <embed src="http://localhost/testmvc/public/document/<?=$document->filename?> ?>" 
                                                    type="application/pdf" 
                                                    width="100%" 
                                                    height="100%">
                                            <?php elseif (in_array($fileExtension, ['txt', 'csv'])): ?>
                                                <!-- Text File Preview -->
                                                <textarea style="width: 100%; height: 100%; border: none; resize: none;" readonly>
                                                    <?= file_get_contents("http://localhost/testmvc/public/document/". htmlspecialchars($document->filepath)) ?>
                                                </textarea>
                                            <?php else: ?>
                                                <!-- Fallback for Unsupported Types -->
                                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                                    <i class="fas fa-file" style="font-size: 24px; color: #999;"></i>
                                                    <span style="margin-left: 10px; font-size: 14px;">No Preview Available</span>
                                                </div>
                                            <?php endif; ?>
                                        </div>






                            <div class="card-footer">
                                <div class="avatar"><?=$document->image?></div>
                                <div class="info">
                                    <div><?=$document->username?></div>
                                    <div>Uploaded at : <?=$document->createdat?></div>
                                </div>
                            </div>
                        </div>
            <?php endforeach; ?>
        <?php endif; ?>


        
    </div>
    <script>
        function toggleDropdown(element) {
            var dropdown = element.nextElementSibling;
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.fa-ellipsis-v')) {
                var dropdowns = document.getElementsByClassName("dropdown");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }
    </script>
    
</body>
</html>