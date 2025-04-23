<html lang="en">
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            font-size: 14px;
            margin: 0;
            padding: 0;
            color: #1e293b;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px;
        }

        .content h2 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 16px;
            color: #1e3a8a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border: 1px solid #cbd5e1;
            margin-bottom: 24px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #cbd5e1;
            text-align: left;
        }

        th {
            background-color: #1e3a8a;
            color: white;
            font-weight: bold;
        }

        .btn-remove {
            background-color: #ef4444;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-remove:hover {
            background-color: #dc2626;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(15, 23, 42, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal-content {
            background-color: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 16px;
        }

        .btn-secondary {
            background-color: #6b748b;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-secondary:hover {
            background-color: #475569;
        }

        .btn-confirm {
            background-color: #ef4444;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-confirm:hover {
            background-color: #dc2626;
        }
    </style>
</head>

<?php 
    require_once 'navbar.php';
?>

<body>
    <div class="container">
        <div class="content">
            <h2>User List</h2>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($data['users'])) : ?>
                    <?php foreach ($data['users'] as $user): ?>
                        <tr id="user-row-<?= htmlspecialchars($user->user_id) ?>">
                            <td><?= htmlspecialchars($user->user_id) ?></td>
                            <td><?= htmlspecialchars($user->user_name) ?></td>
                            <td><?= htmlspecialchars($user->user_email) ?></td>
                            <td><?= htmlspecialchars($user->phone) ?></td>
                            <td><?= htmlspecialchars($user->createdat) ?></td>
                            <td>
                                <button 
                                    class="btn-remove" 
                                    onclick="confirmRemove('<?= htmlspecialchars($user->user_id) ?>', '<?= htmlspecialchars($user->user_name) ?>')">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="confirmModal" class="modal-overlay">
        <div class="modal-content">
            <p id="confirmMessage" class="mb-4">Are you sure you want to remove this user?</p>
            <div class="modal-buttons">
                <form action="<?=ROOT?>/coordinator/removeUser" method="post">
                    <button type="button" class="btn-secondary" onclick="closeModal()">No</button>
                    <input type="hidden" name="id" value="">
                    <button class="btn-confirm" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let userToRemoveId = '';
        let userToRemoveName = '';

        function confirmRemove(userId, userName) {
            userToRemoveId = userId;
            userToRemoveName = userName;
            document.getElementById('confirmMessage').textContent = `Are you sure you want to remove ${userName}?`;
            document.querySelector('input[name="id"]').value = userId;
            document.getElementById('confirmModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
            userToRemoveId = '';
            userToRemoveName = '';
        }
    </script>
</body>
</html>
