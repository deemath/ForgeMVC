<?php 
require_once 'navigationbar.php'
?>

<html>
<head>
    <title>LMS Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
   

        <main class="flex flex-col lg:flex-row lg:space-x-8">
            <section class="mb-8 lg:w-1/2">
                <h2 class="text-xl font-semibold mb-4">Make an Announcement</h2>
                <form class="bg-white p-6 rounded shadow-md">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                        <input type="text" id="title" class="w-full p-2 border border-gray-300 rounded" placeholder="Announcement Title">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                        <textarea id="content" class="w-full p-2 border border-gray-300 rounded" rows="4" placeholder="Announcement Content"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Post Announcement</button>
                </form>
            </section>

            <section class="lg:w-1/2">
                <h2 class="text-xl font-semibold mb-4">Previous Announcements</h2>
                <div class="space-y-4">
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 1</h3>
                        <p class="text-gray-700 mb-2">This is the content of the first announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-10-01</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 2</h3>
                        <p class="text-gray-700 mb-2">This is the content of the second announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-25</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 3</h3>
                        <p class="text-gray-700 mb-2">This is the content of the third announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-20</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 4</h3>
                        <p class="text-gray-700 mb-2">This is the content of the fourth announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-15</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow-md">
                        <h3 class="text-lg font-semibold mb-2">Announcement Title 5</h3>
                        <p class="text-gray-700 mb-2">This is the content of the fifth announcement. It contains important information for all users.</p>
                        <p class="text-gray-500 text-sm">Posted on: 2023-09-10</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>