
<?php 
require_once 'navigationbar.php'
?>
<style>
  /* Modal Overlay */
  .modal {
    display: none;
    position: fixed;
   
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
  }

  /* Modal Content */
  .modal-content {
    background: #fff;
    margin: 50px;
    margin-right: auto;
    margin-left: auto;
    padding: 25px 30px;
    width: 100%;
    max-width: 450px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    font-family: 'Segoe UI', sans-serif;
    animation: fadeIn 0.3s ease-in-out;
  }

  .modal-title {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
  }

  .modal-content label {
    display: block;
    margin: 10px 0 6px;
    font-weight: 500;
  }

  .modal-content input,
  .modal-content textarea,
  .modal-content select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    transition: border-color 0.3s;
  }

  .modal-content input:focus,
  .modal-content textarea:focus,
  .modal-content select:focus {
    border-color: #007bff;
    outline: none;
  }

  .modal-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    gap: 10px;
  }

  .btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  .btn-secondary {
    background-color: #ddd;
    color: #333;
    padding: 10px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
  }

  .btn-secondary:hover {
    background-color: #bbb;
  }

  .open-btn {
    padding: 8px 14px;
    font-size: 14px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
  }

  .open-btn:hover {
    background-color: #218838;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>
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

                            <th class="py-2 px-4 border-b" colspan="2">Actions</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <!-- <pre>
                            <php print_r($data) ?>
                        </pre> -->

                        <?php if($data['tasks']) : ?>
                            <?php $maincount =0;?>
                            <?php foreach($data['tasks'] as $task) : ?>
                                    <?php $maincount++;?>

                                    <?php foreach($data['creators'] as $creator) : ?>
                                    <?php if($creator->id == $task->id) : ?>
                                        
                                        
                                
                                <tr class="task-row">
                                    <form action="<?=ROOT?>/task/showdetail" method="post">
                                    <input type="hidden" name="id" value="<?=$task->id?>">

                                    <td class="py-2 px-4 border-b"><?=$maincount?> </td>
                                    <td class="py-2 px-4 border-b font-bold"><?= strlen($task->title) > 15 ? substr($task->title, 0, 15) . '...' : $task->title ?>
                                    </td>
                                    <td class="py-2 px-4 border-b"><?= strlen($task->description) > 15 ? substr($task->description, 0, 15) . '...' : $task->description ?></td>
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
                                <td style="font-size: 14px; color: #007bff;">
                                    <button onclick="openModal(<?= $task->id ?>)">+ subtask</button>
                                </td>
                              
                                </tr>
                                
                                <?php if($data['subtasks']) : ?>
                                <?php $count= 0;?>
                                <?php foreach($data['subtasks'] as $subtask) : ?>
                                    <?php if($subtask->taskid == $task->id) : ?>
                                    <?php $count++;?>
                                     <tr class="task-row" style="color:rgba(44, 43, 43, 0.6);"
                    
                                            data-task-subtasks='<?= json_encode($task->subtasks)?:'' ?>'
                                        >
                                            <td class="py-2 px-8 border-b"><?=$task->no?>.<?=$count?></td>
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
                    <?php 
                        if($_SESSION['user_role']==2 || $_SESSION['user_role']==3 ):
                    ?>

                            <a href="<?=ROOT?>/task/create" alt="Task can be create only if you are supervisor or Co-Supervisor">
                            <div class="mt-4 text-blue-500 cursor-pointer" >+ create task</div>
                            </a>
                    <?php endif; ?>
                </div>

                
                <?php if (empty($selected)): ?>
                       
                        
                        <div class="w-1/3 bg-white p-6 shadow-md">
                            
                          <!-- -->
                            <p class="text-gray-800 mb-4"><?=$_SESSION['institute_name']?></p>
                            <div class="text-2xl font-bold mb-4"><?=$data['project']->title?></div>
                            
                            <p class="text-gray-700 mb-4"><?=$data['project']->description?></p>
                            

                            <div class="mb-4 flex">
                                <div class="font-bold mb-2">Duration</div>
                                <div class="text-gray-700"><b>from </b> <?=$data['project']->startdate?><b>  to  </b><?=$data['project']->enddate?></div>
                            </div>
                            <!-- <pre>
                                <php print_r($data); ?>
                                <php print_r($_SESSION); ?>
                            </pre> -->

                            <div class="mb-4 ">
                                <div class="font-bold mb-2">Created At : </div>
                                <div class="text-gray-700"><?=$data['project']->createdat?></div>
                            </div>

                            <div class="font-bold mb-2"> Assigned users : </div>
                            <?php if(!empty($data['members'])):?>
                                <?php foreach($data['members']['members'] as $member):?>
                                   <?php if($member->userrole==2):?>
                                        <div class="flex items-center mb-2">
                                            <div>
                                                <div class="font-bold"><?=$member->username?></div>
                                                <div class="text-sm text-gray-500"><?=$member->useremail?></div>
                                            </div>
                                            <span class="ml-auto bg-yellow-200 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Supervisor</span>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                                <?php foreach($data['members']['members'] as $member):?>
                                   <?php if($member->userrole==3):?>
                                        <div class="flex items-center mb-2">
                                            <div>
                                                <div class="font-bold"><?=$member->username?></div>
                                                <div class="text-sm text-gray-500"><?=$member->useremail?></div>
                                            </div>
                                            <span class="ml-auto bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Co-Supervisor</span>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                                <?php foreach($data['members']['members'] as $member):?>
                                   <?php if($member->userrole==4):?>
                                        <div class="flex items-center mb-2">
                                            <div>
                                                <div class="font-bold"><?=$member->username?></div>
                                                <div class="text-sm text-gray-500"><?=$member->useremail?></div>
                                            </div>
                                            <span class="ml-auto bg-purple-200 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Member</span>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php endif; ?>
                            

                         
                              
                                  
                                   
                                
                              
                          
                        </div> 
                        
                    <?php endif; ?>







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
                                        <img alt="Dewmini Paboda" class="h-8 w-8 rounded-full mr-2" height="40" src="<?=IMAGES?>profile.jpg" width="40"/>
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
                                    <img alt="Sunil Perera" class="h-8 w-8 rounded-full mr-2" height="40" src="<?=IMAGES?>profile.jpg" width="40"/>
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
                                    <!-- <span class="bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded"> -->
                                        
                                  
                                    <?php
                                        if ($selected->status == 1) {
                                           echo '<span class="bg-blue-200 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">To Do
                                            </span> ';
                                            // $status = 'To Do';
                                        }else
                                        if ($selected->status == 2) {
                                            echo '<span class="bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">In Progress
                                            </span> ';
                                            // $status = 'In Progress';
                                        } elseif ($selected->status == 3) {
                                            echo '<span class="bg-orange-200 text-orange-800 text-xs font-semibold px-2.5 py-0.5 rounded">Complete
                                            </span> ';
                                            // $status = 'Complete';
                                        } elseif ($selected->status == 4) {
                                            echo '<span class="bg-red-200 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Terminate
                                            </span> ';
                                            // $status = 'Terminate';
                                        } else {
                                            echo '<span class="bg-gray-200 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded">Overdue
                                            </span> ';
                                            // $status = 'Overdue';
                                        }
                                        // echo $status;
                                        ?>
                                
                                </span>
                                    <span class="ml-2 text-gray-500 text-sm">(Created on <?=$selected->createddate?>)</span>
                                </div>
                            </div>
                            <div class="mb-4">

                                <?php if(!empty($data['subtasks'])):?>
                                    <div class="font-bold mb-2">Sub-Tasks</div>
                                    <?php foreach($data['subtasks'] as $subtask):?>
                                        <?php if($subtask->taskid == $selected->id):?>
                                        


                                               
                                                <div class="text-gray-700"><?=$subtask->title?></div>
                                                
                                        <?php endif;?>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </div>
                            <div class="flex">
                                <form action="<?=ROOT?>/task/edit" method="post">
                                        <input type="hidden" name="id" value="<?=$selected->id?>">
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
   

                    <!-- add sub task pop up window -->
                    <div id="taskModal" class="modal">
                        <form method="post" action="addSubtask" class="modal-content">
                            
                            <h2 class="modal-title">Add Sub Task</h2>

                            <!-- Hidden Task ID -->
                            <input type="hidden" name="taskid" id="task_id" value="">

                            <label for="taskTitle">Title</label>
                            <input type="text" name="title" id="taskTitle" required>

                            <label for="taskDesc">Description</label>
                            <textarea name="description" id="taskDesc" rows="3" required></textarea>

                            <!-- <label for="taskStatus">Status</label>
                            <select name="status" id="taskStatus" required>
                            <option value="To Do">To Do</option>
                            <option value="On Going">On Going</option>
                            <option value="Terminated">Terminated</option>
                            <option value="Overdue">Overdue</option>
                            </select> -->

                            <div class="modal-actions">
                            <button type="submit" class="btn-primary">Add</button>
                            <button type="button" class="btn-secondary" onclick="closeModal()">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <script>
                    function openModal(taskId) {
                        document.getElementById('task_id').value = taskId;
                        document.getElementById('taskModal').style.display = 'block';
                    }

                    function closeModal() {
                        document.getElementById('taskModal').style.display = 'none';
                    }
                    </script>

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