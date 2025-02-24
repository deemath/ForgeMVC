<?php
require_once "navigationbar.php";
?>

<html>
<head>
    <title>Members List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function confirmDelete(name) {
            if (confirm(`Are you sure you want to delete ${name}?`)) {
                // Perform delete action here
                alert(`${name} has been deleted.`);
            }
        }
    </script>
</head>
<body class="bg-gray-100 p-7 font-poppins">
    <div class="container mx-auto p-5">
        <h1 class="text-xl font-semibold text-blue-900 mb-4">Members</h1>
        <div class="overflow-x-auto">
            
                    

                    <h2 class="text-lg font-semibold mt-4">Supervisors</h2>
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-blue-900 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">Name</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Phone</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $user): ?>
                                <?php if ($user->role == 2): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->name); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->email); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->phone); ?></td>
                                    <td class="py-3 px-4">
                                        <button onclick="confirmDelete('<?php echo htmlspecialchars($user->name); ?>')" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <h2 class="text-lg font-semibold mt-4">Co-Supervisors</h2>
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-blue-900 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">Name</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Phone</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $user): ?>
                                <?php if ($user->role == 3): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->name); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->email); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->phone); ?></td>
                                    <td class="py-3 px-4">
                                        <button onclick="confirmDelete('<?php echo htmlspecialchars($user->name); ?>')" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <h2 class="text-lg font-semibold mt-4">Members</h2>
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-blue-900 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">Name</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Phone</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $user): ?>
                                <?php if ($user->role == 4): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->name); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->email); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($user->phone); ?></td>
                                    <td class="py-3 px-4">
                                        <button onclick="confirmDelete('<?php echo htmlspecialchars($user->name); ?>')" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

            </table>
        </div>
    </div>
</body>
</html>
