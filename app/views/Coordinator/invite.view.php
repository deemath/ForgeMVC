<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Members</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .invite-page {
            font-family: 'Roboto', sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 20px;
            font-size: 14px;
            padding-top: 80px;
        }
        .invite-page .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }
        .invite-page h1 {
            color: #1e3a8a;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
        }
        .invite-page h2 {
            color: #1e3a8a;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .invite-page .card{
            background-color: #dbeafe;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 24px;
            margin-bottom: 24px;
        }
        .invite-page form {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }
        .invite-page .form-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 16px;
            flex-wrap: nowrap;
        }
        @media (min-width:768px) {
            form{
                flex-direction: row;
                align-items: center;
            }
            .form-group {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 16px;
                flex-wrap: wrap;
            }
        }
        .invite-page input[type="email"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            max-width: 400px;
            margin-right: 16px;
        }
        .invite-page .invite-btn {
            padding: 8px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: auto;
        }
        .invite-page .invite-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .invite-page .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 14px;
            text-align: left;
        }

        .invite-page .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .invite-page .alert-danger ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
        }
        .invite-page table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .invite-page th, .invite-page td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .invite-page .text-green {
            color: #10b981;
        }

        .invite-page .text-blue {
            color: #3b82f6;
        }

        .invite-page .text-red {
            color: #ef4444;
        }

    </style>
</head>

<body>
<?php require_once 'navbar.php';
?>
<div class="invite-page">
    <div class="container">
        <div class="card">
            <h1>Invite Members</h1>
            <form action="<?=ROOT?>/coordinator/invite" method="post">
                <div class="form-group">
                    <input type="email" placeholder="Enter email" name="email">
                    <input type="hidden" name="role" value="1">
                    <button type="submit" class="invite-btn">
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

        
            <h2>Pending Invitations</h2>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if (!empty($data['invitations'])) : ?>
                        <?php foreach ($data['invitations'] as $invitation): ?>
                            <?php if ($invitation->status==0) : ?>
                                <tr>
                                <td><?= htmlspecialchars($invitation->id) ?></td>
                                <td><?= htmlspecialchars($invitation->user_name) ?></td>
                                <td><?= htmlspecialchars($invitation->user_email) ?></td>
                                <td><?= htmlspecialchars($invitation->date) ?></td>
                                <!-- <td>
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
                                <td class="text-green">Pending</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>

            <h2>Accepted Invitations</h2>
            <table>
            <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if (!empty($data['invitations'])) : ?>
                        <?php foreach ($data['invitations'] as $invitation): ?>
                            <?php if ($invitation->status==1) : ?>
                                <tr>
                                <td><?= htmlspecialchars($invitation->id) ?></td>
                                <td><?= htmlspecialchars($invitation->user_name) ?></td>
                                <td><?= htmlspecialchars($invitation->user_email) ?></td>
                                <td><?= htmlspecialchars($invitation->date) ?></td>
                                <!-- <td>
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
                                <td class="text-blue">Accepted</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>

            <h2>Rejected Invitations</h2>
            <table>
            <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if (!empty($data['invitations'])) : ?>
                        <?php foreach ($data['invitations'] as $invitation): ?>
                            <?php if ($invitation->status==2) : ?>
                                <tr>
                                <td><?= htmlspecialchars($invitation->id) ?></td>
                                <td><?= htmlspecialchars($invitation->user_name) ?></td>
                                <td><?= htmlspecialchars($invitation->user_email) ?></td>
                                <td><?= htmlspecialchars($invitation->date) ?></td>
                                <!-- <td>
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
                                <td class="text-red">Declined</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>