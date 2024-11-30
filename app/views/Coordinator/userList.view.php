<html lang="en">
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-size: 14px;
        }
    </style>
</head>
<?php 
    require_once 'navbar.php';
?>
<body class="bg-gray-100 font-roboto">
    <div class="container mx-auto p-4">
        <div class="content">
            <h2 class="text-xl font-bold mb-4">User List</h2>
            <table class="min-w-full bg-white border border-gray-300 mb-6">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">User ID</th>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b border-gray-300">Phone Number</th>
                        <th class="py-2 px-4 border-b border-gray-300">Date Joined</th>
                        <th class="py-2 px-4 border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($data['users'])) : ?>
                        <?php foreach ($data['users'] as $user): ?>
                            
                            <tr id="user-row-<?= htmlspecialchars($user->user_id) ?>">
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($user->user_id) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($user->user_name) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($user->user_email) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($user->phone) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($user->createdat) ?></td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    <button 
                                        class="bg-red-500 text-white p-2 rounded" 
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

    <div id="confirmModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg">
            <p id="confirmMessage" class="mb-4">Are you sure you want to remove this user?</p>
            <div class="flex justify-end">
            <form action="<?=ROOT?>/coordinator/removeUser" method="post">
                <button type="button" class="bg-gray-500 text-white p-2 rounded mr-2" onclick="closeModal()">No</button>
                
                    <input type="hidden" name="id" value="">
                <button class="bg-red-500 text-white p-2 rounded" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let userToRemoveId = ''; // To store the user ID
        let userToRemoveName = ''; // To store the user name

        // Function to show confirmation modal
        function confirmRemove(userId, userName) {
            userToRemoveId = userId;
            userToRemoveName = userName;
            document.getElementById('confirmMessage').textContent = `Are you sure you want to remove ${userName}?`;

            // Set the value of the hidden input field dynamically
            document.querySelector('input[name="id"]').value = userId;

            // Show the modal
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('confirmModal').classList.add('hidden');
            userToRemoveId = ''; // Clear stored ID
            userToRemoveName = ''; // Clear stored name
        }

    </script>
</body>
</html>