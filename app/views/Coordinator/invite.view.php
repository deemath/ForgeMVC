<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Members</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-size: 14px;
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

    </style>
</head>
<?php require_once 'navbar.php';
?>
<body class="bg-gray-100 font-roboto">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Invite Members</h1>
        <div class="bg-white p-6 border border-gray-300 mb-6">
            <form class="flex flex-col md:flex-row items-center mb-6" action="<?=ROOT?>/coordinator/invite" method="post">
                <div class="flex flex-col md:flex-row items-center w-full md:w-auto mb-4 md:mb-0">
                    <input type="email" placeholder="Enter email" class="border border-gray-300 p-2 w-full md:w-64 mb-4 md:mb-0 md:mr-4" name="email">
                    <input type="hidden" name="role" value="1">
                    <button type="submit" class="bg-blue-500 text-white p-2 w-full md:w-auto">
                        <i class="fas fa-plus"></i> Invite 
                    </button>
                  
                </div>
                <br>
            <div>
        <?php if (!empty($data['errors'])) : ?>
        <div class="alert alert-danger">
                    <?php foreach ($data['errors'] as $error): ?>
                        <?= htmlspecialchars($error) ?><br>
                    <?php endforeach; ?>
                </div> 
            <?php endif; ?>
        </div>

        </form>

        
            <h2 class="text-xl font-bold mb-4">Pending Invitations</h2>
            <table class="min-w-full bg-white border border-gray-300 mb-6">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-50">Id</th>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b border-gray-100">Date</th>
                        <th class="py-2 px-4 border-b border-gray-100">Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if (!empty($data['invitations'])) : ?>
                        <?php foreach ($data['invitations'] as $invitation): ?>
                            <?php if ($invitation->status==0) : ?>
                                <tr>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->id) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_name) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_email) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->date) ?></td>
                                <!-- <td class="py-2 px-4 border-b border-gray-300">
                                    <php 
                                        if ($invitation->role == 2) {
                                            echo 'Project Supervisor';
                                        } elseif ($invitation->role == 3) {
                                            echo 'Co Supervisor';
                                        } elseif ($invitation->role == 4) {
                                            echo 'Member';
                                        } else {
                                            echo 'Unknown Role';
                                        }
                                    ?>
                                </td> -->
                                <td class="py-2 px-4 border-b border-gray-300 text-green-500">Pending</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>

            <h2 class="text-xl font-bold mb-4">Accepted Invitations</h2>
            <table class="min-w-full bg-white border border-gray-300 mb-6">
            <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-50">Id</th>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b border-gray-100">Date</th>
                        <th class="py-2 px-4 border-b border-gray-100">Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if (!empty($data['invitations'])) : ?>
                        <?php foreach ($data['invitations'] as $invitation): ?>
                            <?php if ($invitation->status==1) : ?>
                                <tr>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->id) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_name) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_email) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->date) ?></td>
                                <!-- <td class="py-2 px-4 border-b border-gray-300">
                                    <php 
                                        if ($invitation->role == 2) {
                                            echo 'Project Supervisor';
                                        } elseif ($invitation->role == 3) {
                                            echo 'Co Supervisor';
                                        } elseif ($invitation->role == 4) {
                                            echo 'Member';
                                        } else {
                                            echo 'Unknown Role';
                                        }
                                    ?>
                                </td> -->
                                <td class="py-2 px-4 border-b border-gray-300 text-blue-500">Accepted</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>

            <h2 class="text-xl font-bold mb-4">Rejected Invitations</h2>
            <table class="min-w-full bg-white border border-gray-300">
            <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-50">Id</th>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b border-gray-100">date</th>
                        <th class="py-2 px-4 border-b border-gray-100">Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if (!empty($data['invitations'])) : ?>
                        <?php foreach ($data['invitations'] as $invitation): ?>
                            <?php if ($invitation->status==2) : ?>
                                <tr>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->id) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_name) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_email) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->date) ?></td>
                                <!-- <td class="py-2 px-4 border-b border-gray-300">
                                    <php 
                                        if ($invitation->role == 2) {
                                            echo 'Project Supervisor';
                                        } elseif ($invitation->role == 3) {
                                            echo 'Co Supervisor';
                                        } elseif ($invitation->role == 4) {
                                            echo 'Member';
                                        } else {
                                            echo 'Unknown Role';
                                        }
                                    ?>
                                </td> -->
                                <td class="py-2 px-4 border-b border-gray-300 text-red-500">Declined</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>