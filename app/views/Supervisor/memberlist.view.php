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
        <h1 class="text-xl font-semibold text-blue-900 mb-4">Supervisors</h1>
        <div class="overflow-x-auto">
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
                    <tr class="hover:bg-gray-100">
                       
                        <td class="py-3 px-4">John Doe</td>
                        <td class="py-3 px-4">john.doe@example.com</td>
                        <td class="py-3 px-4">123-456-7890</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('John Doe')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
                       
                        <td class="py-3 px-4">Jane Smith</td>
                        <td class="py-3 px-4">jane.smith@example.com</td>
                        <td class="py-3 px-4">987-654-3210</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('Jane Smith')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h1 class="text-xl font-semibold text-blue-900 mt-8 mb-4">Co-Supervisors</h1>
        <div class="overflow-x-auto">
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
                    <tr class="hover:bg-gray-100">
                        
                        <td class="py-3 px-4">Michael Brown</td>
                        <td class="py-3 px-4">michael.brown@example.com</td>
                        <td class="py-3 px-4">555-123-4567</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('Michael Brown')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
                        
                        <td class="py-3 px-4">Emily Davis</td>
                        <td class="py-3 px-4">emily.davis@example.com</td>
                        <td class="py-3 px-4">555-987-6543</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('Emily Davis')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h1 class="text-xl font-semibold text-blue-900 mt-8 mb-4">Members</h1>
        <div class="overflow-x-auto">
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
                    <tr class="hover:bg-gray-100">
                        
                        <td class="py-3 px-4">Chris Johnson</td>
                        <td class="py-3 px-4">chris.johnson@example.com</td>
                        <td class="py-3 px-4">555-111-2222</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('Chris Johnson')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
                  
                        <td class="py-3 px-4">Patricia Williams</td>
                        <td class="py-3 px-4">patricia.williams@example.com</td>
                        <td class="py-3 px-4">555-333-4444</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('Patricia Williams')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
             
                        <td class="py-3 px-4">David Miller</td>
                        <td class="py-3 px-4">david.miller@example.com</td>
                        <td class="py-3 px-4">555-555-6666</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('David Miller')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100">
                        
                        <td class="py-3 px-4">Linda Wilson</td>
                        <td class="py-3 px-4">linda.wilson@example.com</td>
                        <td class="py-3 px-4">555-777-8888</td>
                        <td class="py-3 px-4">
                            <button onclick="confirmDelete('Linda Wilson')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>