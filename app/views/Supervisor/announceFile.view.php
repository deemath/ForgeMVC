<?php 
require_once 'navigationbar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <style>
        /* General Page Styling
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        } */

        .container {
            width: 100%;
            
        }

        /* Announcement Card Styling */
        .announcement-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* margin-bottom: 15px; */
            margin-top: 5%;
            margin-right:5% ;
            margin-left: 5%;
            min-height: 80%;
            transition: transform 0.2s ease-in-out;
        }

        /* .announcement-card:hover {
            transform: scale(1.02);
        } */

        h2 {
            margin: 0;
            font-size: 22px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        .no-announcement {
            text-align: center;
            font-size: 18px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if(isset($data['announcement']) && !empty($data['announcement'])): ?>
            <?php foreach($data['announcement'] as $announcement): ?>
                <div class="announcement-card">
                    <h2><?= htmlspecialchars($announcement->title) ?></h2>
                    <p><?= htmlspecialchars($announcement->description) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-announcement">No announcements available.</p>
        <?php endif; ?>
    </div>
</body>
</html>

