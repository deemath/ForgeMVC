
<?php 
require_once 'navigationbar.php'
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
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if($data['tasks']) : ?>
                            
                            <?php foreach($data['tasks'] as $task) : ?>

                                    <?php foreach($data['creators'] as $creator) : ?>
                                    <?php if($creator->id == $task->id) : ?>
                                        
                                        
                                
                                <tr class="task-row">
                                    <form action="<?=ROOT?>/task/showdetail" method="post">
                                    <input type="hidden" name="id" value="<?=$task->id?>">

                                    <td class="py-2 px-4 border-b"><?=$task->no?> </td>
                                    <td class="py-2 px-4 border-b font-bold"><?=$task->title?></td>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars(substr($task->description, 0, 30)) . (strlen($task->description) > 200 ? ' ...' : '') ?></td>
                                    <td class="py-2 px-4 border-b flex justify-center items-center">
                                    <?php
                                        if ($task->status == 1) {
                                            $status = '<div class="px-2 py-2 border-2 border-blue-800 rounded-2xl bg-blue-100 text-blue-900">
                                                            To Do  </div>';
                                        }else
                                        if ($task->status == 2) {
                                            $status = '<div class="px-2 py-2 border-2 border-green-800 rounded-2xl bg-green-100 text-green-900">
                                                            In Progress  </div>';
                                        } elseif ($task->status == 3) {
                                            $status = '<div class="px-2 py-2 border-2 border-orange-800 rounded-2xl bg-orange-100 text-orange-900">
                                                            Complete  </div>';
                                        } elseif ($task->status == 4) {
                                            $status = '<div class="px-2 py-2 border-2 border-gray-800 rounded-2xl bg-gray-100 text-gray-900">
                                                            Terminated  </div>';
                                        } else {
                                            $status = '<div class="px-2 py-2 border-2 border-red-800 rounded-2xl bg-red-100 text-red-900">
                                                            Overdue  </div>';
                                        }
                                        echo $status;
                            ?>  
                                </td>
                                <td><button class="flex-1 bg-blue-500 text-white py-2 px-4 rounded mr-2" name="submit" type="submit">View </button></td>
                                </form>
                                </tr>
                                
                                <?php if($data['subtasks']) : ?>
                                <?php foreach($data['subtasks'] as $subtask) : ?>
                                    <?php if($subtask->projectid == $task->id) : ?>
                                    
                                     <tr class="task-row" 
                    
                                            data-task-subtasks='<?= json_encode($task->subtasks)?:'' ?>'
                                        >
                                            <td class="py-2 px-8 border-b"><?=$task->no?>.<?=$subtask->id?></td>
                                            <td class="py-2 px-8 border-b "><?=$subtask->title?></td>
                                            <td class="py-2 px-8 border-b"><?= htmlspecialchars(substr($subtask->description, 0, 30)) . (strlen($subtask->description) > 200 ? ' ...' : '') ?></td>
                                            <td class="py-2 px-8 border-b">
                                             
                                        </td>
                                        </tr>
                                       
                                    <?php endif;?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                
                                <?php endif; ?>
                                <?php endforeach; ?>
                              
                            
                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <!-- <tr class="bg-gray-100">
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
                        </tr> -->
                        </tbody>
                    </table>
                  
                    <a href="<?=ROOT?>/task/create" alt="Task can be create only if you are supervisor or Co-Supervisor">
                    <div class="mt-4 text-blue-500 cursor-pointer" >+ create task</div>
                    </a>
                </div>
                    <?php if (!empty($selected)): ?>
                        <?php foreach($data['selected'] as $selected) : ?>
                        
                        <div class="w-1/3 bg-white p-6 shadow-md">
                            
                            <div class="text-lg font-bold mb-2"># <?=$selected->no?></div>
                            <div class="text-2xl font-bold mb-4"><?=$selected->title?></div>
                            <p class="text-gray-700 mb-4"><?=$selected->description?></p>
                            <div class="mb-4">
                                <div class="font-bold mb-2">Assigned</div>
                                <div class="items-center mb-2">
                                <?php if($data['read']) : ?>
                                    
                                    <?php foreach($data['read'] as $read) : ?>
                                        <!-- <=$task->id?>
                                        <=$read->taskid?> -->
                                        <div class="flex items-center mb-2">
                                        <img alt="Dewmini Paboda" class="h-8 w-8 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/pJdqPaSTfY3yUiKHZ6maANZSwLNsmHkhLMN584QoRKxEJG4JA.jpg" width="40"/>
                                        <div>
                                            <div class="font-bold"><?=$read->user_name?></div>
                                            <div class="text-sm text-gray-500"><?=$read->user_email?></div>
                                        </div>
                                        <span class="ml-auto bg-purple-200 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Member</span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>       
                                </div>
                                <!-- <div class="flex items-center">
                                    <img alt="Peter Alan" class="h-8 w-8 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/6d1Oox55aSKVABfvwDWyfkImqgPkGPtxx4aqrOZDc62KSMwTA.jpg" width="40"/>
                                    <div>
                                        <div class="font-bold">Peter Alan</div>
                                        <div class="text-sm text-gray-500">Alanwalker@gmail.com</div>
                                    </div>
                                    <span class="ml-auto bg-purple-200 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Member</span>
                                </div> -->
                            </div>
                            <div class="mb-4">
                                <div class="font-bold mb-2">Duration</div>
                                <div class="text-gray-700"><b>from </b> <?=$selected->startdate?><b>  to  </b><?=$selected->enddate?></div>
                            </div>
                            <div class="mb-4">
                                <div class="font-bold mb-2">Created By</div>
                                <div class="flex items-center">
                                    <img alt="Sunil Perera" class="h-8 w-8 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/H3nZD5kB38odA5CAswIYzS9r2CoTsoig3f9SzapW9eNLSMwTA.jpg" width="40"/>
                                    <div>
                                        <div class="font-bold"> <?=$selected->create_user?></div>
                                        <div class="text-sm text-gray-500"><?=$selected->create_email?></div>
                                    </div>
                                    <span class="ml-auto bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Co-Supervisor</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-bold mb-2">Status</div>
                                <div class="flex items-center">
                                    <span class="bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                        
                                  
                                    <?php
                                        if ($selected->status == 1) {
                                            $status = 'To Do';
                                        }else
                                        if ($selected->status == 2) {
                                            $status = 'In Progress';
                                        } elseif ($selected->status == 3) {
                                            $status = 'Complete';
                                        } elseif ($selected->status == 4) {
                                            $status = 'Terminate';
                                        } else {
                                            $status = 'Overdue';
                                        }
                                        echo $status;
                                        ?>
                                
                                </span>
                                    <span class="ml-2 text-gray-500 text-sm">(Created on <?=$selected->createddate?>)</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-bold mb-2">Sub-Tasks</div>
                                <div class="text-gray-700">2.1 sub task of task 2</div>
                                <div class="text-gray-700">2.2 sub task of task 2</div>
                            </div>
                            <div class="flex">
                                <form action="<?=ROOT?>/task/edit" method="post">
                                <button class="flex-1 bg-blue-500 text-white py-2 px-4 rounded mr-2" onclick="window.location.href='./taskedit.php'">Edit</button>
                                </form>
                                <form action="<?=ROOT?>/task/delete" method="post" id="deleteForm">
                                    <input type="hidden" name="id" value="<?=$selected->id?>">
                                    <button class="flex-1 bg-red-500 text-white py-2 px-4 rounded" type="button" onclick="showDeleteModal()">Delete</button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </div>
        </main>
    </div>
</div>
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full relative">
            <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                <i class="fas fa-exclamation-triangle text-6xl text-red-600"></i>
            </div>
            <h2 class="text-xl font-semibold mb-4 mt-8 text-center">Are you sure you want to delete?</h2>
            <div class="flex justify-center space-x-4">
                <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400" onclick="closeDeleteModal()">No</button>
                <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" id="confirmDeleteButton">Yes</button>
            </div>
            
        </div>
    </div>
</body>
    <script>
        let deleteForm = document.getElementById('deleteForm');
        let deleteModal = document.getElementById('deleteModal');

        function showDeleteModal() {
            deleteModal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            deleteModal.classList.add('hidden');
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            deleteForm.submit(); // Submit the form if confirmed
        });
    </script>
</html>