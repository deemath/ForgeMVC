
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
                        </tr>
                        </thead>
                        <tbody>

                        <?php if($data['tasks']) : ?>
                            
                            <?php foreach($data['tasks'] as $task) : ?>

                                    <?php foreach($data['creators'] as $creator) : ?>
                                    <?php if($creator->id == $task->id) : ?>
                                        <?php print_r($creator->creator_name.$task->id);
                                            $temp['name']=$creator->creator_name;
                                            $temp['email']=$creator->creator_name;

                                        ?>
                                        

                                <tr class="task-row" 
                                    data-task-id="<?= $task->id ?>" 
                                    data-task-title="<?= htmlspecialchars($task->title) ? htmlspecialchars($task->title) : 'Default Value' ?>" 
                                    data-task-description="<?= htmlspecialchars($task->description)?:'' ?>" 
                                    data-task-status="<?= $task->status ?>" 
                                    data-task-assigned='<?= json_encode($task->assigned)?:'' ?>' 
                                    data-task-duration="<?= htmlspecialchars($task->duration)?:'' ?>" 
                                    data-task-createdby='<?= json_encode($temp)?:'' ?>' 
                                    data-task-subtasks='<?= json_encode($task->subtasks)?:'' ?>'
                                >
                                    <td class="py-2 px-4 border-b"><?=$task->no?></td>
                                    <td class="py-2 px-4 border-b font-bold"><?=$task->title?></td>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars(substr($task->description, 0, 30)) . (strlen($task->description) > 200 ? ' ...' : '') ?></td>
                                    <td class="py-2 px-4 border-b">
                                    <?php
                                        if ($task->status == 1) {
                                            $status = 'Todo';
                                        }else
                                        if ($task->status == 2) {
                                            $status = 'In Progress';
                                        } elseif ($task->status == 3) {
                                            $status = 'Complete';
                                        } elseif ($task->status == 4) {
                                            $status = 'Terminate';
                                        } else {
                                            $status = 'Overdue';
                                        }
                                        echo $status;
                            ?>  
                                </td>
                                </tr>
                                
                                <?php if($data['subtasks']) : ?>
                                <?php foreach($data['subtasks'] as $subtask) : ?>
                                    <?php if($subtask->projectid == $task->id) : ?>
                                    
                                     <tr class="task-row" 
                    
                                            data-task-subtasks='<?= json_encode($task->subtasks)?:'' ?>'
                                        >
                                            <td class="py-2 px-4 border-b"><?=$task->no?>.<?=$subtask->id?></td>
                                            <td class="py-2 px-4 border-b font-bold"><?=$subtask->title?></td>
                                            <td class="py-2 px-4 border-b"><?= htmlspecialchars(substr($subtask->description, 0, 30)) . (strlen($subtask->description) > 200 ? ' ...' : '') ?></td>
                                            <td class="py-2 px-4 border-b">
                                             
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

                    <div class="mt-4 text-blue-500 cursor-pointer">+ create task</div>
                </div>
                <!-- dump -->
                <div class="w-1/3 bg-white p-6 shadow-md">
                    <div class="text-lg font-bold mb-2">Task No </div>
                    <div class="text-2xl font-bold mb-4 task-details-title">Select a task</div>
                    <p class="text-gray-700 mb-4 task-details-description">Please select a task to see the details.</p>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Assigned</div>
                        <div class="task-details-assigned"></div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Duration</div>
                        <div class="text-gray-700 task-details-duration"></div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Created By</div>
                        <div class="task-details-created-by"></div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Status</div>
                        <div class="text-gray-700 task-details-status"></div>
                    </div>
                    <div class="mb-4">
                        <div class="font-bold mb-2">Sub-Tasks</div>
                        <div class="task-details-subtasks"></div>
                    </div>
                    <div class="flex">
                        <button class="flex-1 bg-blue-500 text-white py-2 px-4 rounded mr-2" onclick="window.location.href='./taskedit.php'">Edit</button>
                        <button class="flex-1 bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                    </div>
                </div>
                 <!-- dumpclose -->
                <!-- Task Details -->
                <div class="w-1/3 bg-white p-6 shadow-md">
                            <!-- start -->
                            <script>
                                document.querySelectorAll('.task-row').forEach(row => {
                                    row.addEventListener('click', function() {
                                        // Get data attributes from the clicked row
                                        const taskId = this.dataset.taskId;
                                        const taskTitle = this.dataset.taskTitle;
                                        const taskDescription = this.dataset.taskDescription;
                                        const taskStatus = this.dataset.taskStatus;
                                        const taskAssigned = this.dataset.taskAssigned;
                                        const taskDuration = this.dataset.taskDuration;
                                        const taskCreatedBy = this.dataset.taskCreatedBy;
                                        const taskSubtasks = this.dataset.taskSubtasks;

                                        // Update the task details section
                                        document.querySelector('.task-details-title').innerText = taskTitle;
                                        document.querySelector('.task-details-description').innerText = taskDescription;
                                        document.querySelector('.task-details-status').innerText = taskStatus;
                                        document.querySelector('.task-details-assigned').innerHTML = JSON.parse(taskAssigned).map(member => `
                                            <div class="flex items-center mb-2">
                                                <img alt="${member.name}" class="h-8 w-8 rounded-full mr-2" src="${member.avatar}" />
                                                <div>
                                                    <div class="font-bold">${member.name}</div>
                                                    <div class="text-sm text-gray-500">${member.email}</div>
                                                </div>
                                            </div>
                                        `).join('');
                                        document.querySelector('.task-details-duration').innerText = taskDuration;
                                        document.querySelector('.task-details-created-by').innerHTML = JSON.parse(taskCreatedBy).map(creator => `
                                            <div class="flex items-center mb-2">
                                                <img alt="${creator.name}" class="h-8 w-8 rounded-full mr-2" src="${creator.avatar}" />
                                                <div>
                                                    <div class="font-bold">${creator.name}</div>
                                                    <div class="text-sm text-gray-500">${creator.email}</div>
                                                </div>
                                            </div>
                                        `).join('');
                                        document.querySelector('.task-details-subtasks').innerHTML = JSON.parse(taskSubtasks).map(subtask => `
                                            <div class="text-gray-700">${subtask}</div>
                                        `).join('');
                                    });
                                });
                            </script>


                           



                       <!-- end -->
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