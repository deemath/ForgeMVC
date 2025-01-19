<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        } */
        .dc-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            justify-content: center;
            margin: auto;
        }
        .dc-form-group {
            margin-bottom: 15px;
        }
        .dc-form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .dc-form-group input[type="file"] {
            display: block;
        }
        .dc-form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .dc-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .dc-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<?php 
    require_once 'navigationbar.php';
?>
<body>

    <div class="dc-container">
    <form action="<?=ROOT?>/document/upload1" method="POST" enctype="multipart/form-data">
            <div class="dc-form-group">
                <label for="attachment">Attachment</label>
                <input type="file" name="file" required>
            </div>
            <div class="dc-form-group">
                <label for="save-as">Save as</label>
                <input type="text" id="save-as" name="name" required>
            </div>
            <div class="dc-form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" value="<?=$data['users']->name;?>">
   
            </div>
            <button type="submit" class="dc-btn">Upload this file</button>
        </form>
            
               
  
         
    </div>
</body>
</html>
