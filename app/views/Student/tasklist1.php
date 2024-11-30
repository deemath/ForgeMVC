
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/projectforge/config.php";

?>
<?php
require_once "./navigationbar.php";

?>
<main class="flex-1 p-6">
            <div class="flex">
                <!-- Task List -->
                <div class="w-2/3 pr-6">
                    <h1 class="text-2xl font-bold mb-4">Task Manager</h1>
                    <table class="min-w-full bg-white border">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">#</th>
                            <th class="py-2 px-4 border-b">Topic</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-gray-100">
                            <td class="py-2 px-4 border-b">01</td>
                            <td class="py-2 px-4 border-b font-bold">Diagrams</td>
                            <td class="py-2 px-4 border-b">Darw ER and usecase diagrams</td>
                            <td class="py-2 px-4 border-b">
                                <span class="bg-green-200 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">On Progress</span>
                            </td>
                        </tr>
                        <tr class="bg-blue-100">
                            <td class="py-2 px-4 border-b">02</td>
                            <td class="py-2 px-4 border-b font-bold">task 02</td>
                            <td class="py-2 px-4 border-b">Description of task 02</td>
                            <td class="py-2 px-4 border-b">
                                <span class="bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">To Do</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">2.1</td>
                            <td class="py-2 px-4 border-b">sub task of task 2</td>
                            <td class="py-2 px-4 border-b">Description of subtaks</td>
                            <td class="py-2 px-4 border-b">
                                <span class="bg-red-200 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Terminated</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">2.2</td>
                            <td class="py-2 px-4 border-b">subtask of task 02</td>
                            <td class="py-2 px-4 border-b">Description</td>
                            <td class="py-2 px-4 border-b">
                                <span class="bg-orange-200 text-orange-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Over Due</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 text-blue-500 cursor-pointer">+ create task</div>
                </div>
                <!-- Task Details -->
                <div class="w-1/3 bg-white p-6 shadow-md">
                    <div class="text-lg font-bold mb-2">#02</div>
                    <div class="text-2xl font-bold mb-4">task 02</div>
                    <p class="text-gray-700 mb-4">
                        Description of task 02 simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    </p>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Assigned</div>
                        <div class="flex items-center mb-2">
                            <img alt="Dewmini Paboda" class="h-8 w-8 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/pJdqPaSTfY3yUiKHZ6maANZSwLNsmHkhLMN584QoRKxEJG4JA.jpg" width="40"/>
                            <div>
                                <div class="font-bold">Dewmini Paboda</div>
                                <div class="text-sm text-gray-500">dissanayakej@gmail.com</div>
                            </div>
                            <span class="ml-auto bg-purple-200 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Member</span>
                        </div>
                        <div class="flex items-center">
                            <img alt="Peter Alan" class="h-8 w-8 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/6d1Oox55aSKVABfvwDWyfkImqgPkGPtxx4aqrOZDc62KSMwTA.jpg" width="40"/>
                            <div>
                                <div class="font-bold">Peter Alan</div>
                                <div class="text-sm text-gray-500">Alanwalker@gmail.com</div>
                            </div>
                            <span class="ml-auto bg-purple-200 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Member</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Duration</div>
                        <div class="text-gray-700">23 June 2023 - 13 Aug 2023</div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Created By</div>
                        <div class="flex items-center">
                            <img alt="Sunil Perera" class="h-8 w-8 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/H3nZD5kB38odA5CAswIYzS9r2CoTsoig3f9SzapW9eNLSMwTA.jpg" width="40"/>
                            <div>
                                <div class="font-bold">Sunil Perera</div>
                                <div class="text-sm text-gray-500">sperera@gmail.com</div>
                            </div>
                            <span class="ml-auto bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Co-Supervisor</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Status</div>
                        <div class="flex items-center">
                            <span class="bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">On Progress</span>
                            <span class="ml-2 text-gray-500 text-sm">(last updated on 17 May 24)</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Sub-Tasks</div>
                        <div class="text-gray-700">2.1 sub task of task 2</div>
                        <div class="text-gray-700">2.2 sub task of task 2</div>
                    </div>
                    <div class="flex">
                       
                        <button class="flex-1 bg-blue-500 text-white py-2 px-4 rounded mr-2" onclick="window.location.href='./taskedit.php'">Edit</button>
                      
                        <button class="flex-1 bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>