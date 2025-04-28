<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Institute</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            background-color: #f9fafb;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 14px;
            text-align: left;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
        }
        .body{
            overflow-y: auto;
        }
        
    </style>
</head>

<body>
    <div class="flex min-h-screen">
        <?php require_once "navigationBar.php"; ?>
        <div class="flex-1 flex items-center justify-center">
            <div class="bg-white border border-gray-300 p-8 w-4/5">
                <h2 class="text-2xl font-bold mb-6 text-center">Register New Institute</h2>
                <form id="registration-form" class="space-y-5" action="<?=ROOT?>/Admin/register" method="post">
                  
                    <div>
                        <label for="institute-name" class="block text-gray-700 font-medium">Institute Name</label>
                        <input type="text" id="institute-name" name="institute" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter institute name" required>
                    </div>
               
                    <div>
                        <label for="address" class="block text-gray-700 font-medium">Address</label>
                        <input type="text" id="address" name="address" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter address" required>
                    </div>
                
                    <div>
                        <label for="project-coordinator" class="block text-gray-700 font-medium">Project Coordinator</label>
                        <input type="text" id="project-coordinator" name="name" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter project coordinator name" required>
                    </div>
                    <div>
                        <label for="project-coordinator" class="block text-gray-700 font-medium">Phone Number</label>
                        <input type="number" id="project-coordinator" name="phone" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter project coordinator name" required>
                    </div>
                
                    <div>
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter email" required>
                    </div>
                  
                    <div>
                        <label for="password" class="block text-gray-700 font-medium">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
                    </div>
                    
                    <div>
                        <label for="confirm-password" class="block text-gray-700 font-medium">Confirm Password</label>
                        <input type="password" id="confirm-password" name="re-password" class="w-full p-3 border border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Re-enter password" required>
                    </div>
                    
                    <div>
                        <button type="submit" name="submit" class="w-full bg-blue-600 text-white p-3 mt-4 hover:bg-blue-700 transition duration-200">Register</button>
                    </div>
                    <?php if (!empty($data)) : ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error)
                                 echo htmlspecialchars($error) . "<br>";
                            ?>
                            
                            
                            <!-- <php print_r( $data) ?> -->
                        </div> 
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
</body>
