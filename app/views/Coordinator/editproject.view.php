<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .custom-select {
            position: relative;
        }
        .custom-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            border-radius: 0;
            font-size: 14px;
        }
        .custom-select::after {
            content: '\25BC'; /* Unicode character for down arrow */
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #4A5568; /* Tailwind's text-gray-700 */
        }
        .input-field {
            border-radius: 0;
            font-size: 14px;
            box-shadow: none;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 14px;
            text-align: left;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
        }
    </style>
    <script>
        function addPerson(selectId, listId, inputName) {
            var selectElement = document.getElementById(selectId);
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var email = selectedOption.textContent;
            var userId = selectElement.value;

            if (userId && email) {
                var list = document.getElementById(listId);
                var listItem = document.createElement('div');
                listItem.className = 'flex items-center justify-between bg-gray-100 p-2 mb-2';
                listItem.innerHTML = `
                    <span>${email}</span>
                    <input type="hidden" name="${inputName}[]" value="${userId}">
                    <button type="button" class="text-red-500 hover:text-red-700" onclick="removePerson(this)">Remove</button>
                `;
                list.appendChild(listItem);
                selectElement.value = '';
            }
        }

        function removePerson(button) {
            var listItem = button.parentElement;
            listItem.remove();
        }

        function createProject() {
            setTimeout(() => {
                var successMessage = document.getElementById('success-message');
                successMessage.style.display = 'block';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }, 500);
        }
    </script>
</head>
<?php require_once 'navbar.php'; ?>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <br><br><br>
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h2 class="text-xl font-bold mb-4">Create Project</h2>
            <?php if (!empty($data['errors'])) : ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error)
                                 echo htmlspecialchars($error) . "<br>";
                            ?>
                            
                            
                            <!-- <php print_r( $data) ?> -->
                        </div> 
            <?php endif; ?>
            <!-- <php print_r($data)?> -->
            
                
                
            <form action="" method="post">

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="project-name">Project Name</label>
                    <input class="input-field border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="project-name" type="text" placeholder="Enter project name" name="title" value="<?=$project->title?:''?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="project-description">Project Description</label>
                    <textarea class="input-field border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="project-description" placeholder="<?=$project->description?:''?>" name="description" value="<?=$project->description?:''?>"><?=$project->description?:''?></textarea>
                </div>

                <!-- Supervisors -->
                <label class="block text-gray-700 font-bold mb-2" for="supervisor-select">Project Supervisors</label>
                <div id="supervisor-list" class="mb-4"></div>
                <div class="mb-4 flex items-center">
                    <label class="text-gray-700 w-1/3" for="supervisor-select">Select Supervisor</label>
                    <div class="custom-select w-2/3">
                         <div class=" py-2 mb-4 border border-purple-500 rounded">
                            <?php if(!empty($data['supervisor'])):?>
                            <?php foreach ($data['supervisor'] as $supervisor): ?>
                                <div>
                                <?= htmlspecialchars($supervisor->sup_email ?: 'No Supervisors Assigned yet !') ?>
                                <form action="<?=ROOT?>/coordinator/deletsup" method="post">
                                    <input type="hidden" name="supervisor_id" value="<?= htmlspecialchars($supervisor->id)?>">
                                    <input type="hidden" name="project_id" value="<?=htmlspecialchars($project->id?:'')?>">
                                    <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">Remove</button>
                                </form>
                                </div>
                            <?php endforeach;?>
                            <?php else: ?>
                                
                            <?php endif;?>
                        
                        </div>
                        <select id="supervisor-select" class="input-field border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select a supervisor</option>
                            <?php foreach ($data['users'] as $user): ?>
                                <option value="<?= htmlspecialchars($user->user_id) ?>"><?= htmlspecialchars($user->user_email) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="button" class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            onclick="addPerson('supervisor-select', 'supervisor-list', 'supervisors')">
                        Add
                    </button>
                </div>

                <!-- Co-Supervisors -->
                <label class="block text-gray-700 font-bold mb-2" for="cosupervisor-select">Project Co-Supervisors</label>
                <div id="cosupervisor-list" class="mb-4"></div>
                <div class="mb-4 flex items-center">
                    <label class="text-gray-700 w-1/3" for="cosupervisor-select">Select Co-Supervisor</label>
                    <div class="custom-select w-2/3">

                        <div>
                            <?php if(!empty($data['cosupervisor'])):?>
                            <?php foreach ($data['cosupervisor'] as $cosupervisor): ?>
                                <div>
                                <?= htmlspecialchars($cosupervisor->cosup_email ?: 'No Supervisors Assigned yet !') ?>
                                <form action="">
                                    <input type="hidden" name="supervisor_id" value="<?= $cosupervisor->id?>">
                                    <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                                    <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit" >Remove</button>
                                </form>
                                </div>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>



                        <select id="cosupervisor-select" class="input-field border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select a co-supervisor</option>
                            <?php foreach ($data['users'] as $user): ?>
                                <option value="<?= htmlspecialchars($user->user_id) ?>"><?= htmlspecialchars($user->user_email) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="button" class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            onclick="addPerson('cosupervisor-select', 'cosupervisor-list', 'cosupervisors')">
                        Add
                    </button>
                </div>

                <!-- Members -->
                <label class="block text-gray-700 font-bold mb-2" for="member-select">Project Members</label>
                <div id="member-list" class="mb-4"></div>
                <div class="mb-4 flex items-center">
                    <label class="text-gray-700 w-1/3" for="member-select">Select Members</label>
                    <div class="custom-select w-2/3">

                        <div >
                            <?php if(!empty($data['member'])):?>
                            <?php foreach ($data['member'] as $member): ?>
                                <div>
                                <?= htmlspecialchars($member->mememail ?: 'No Supervisors Assigned yet !') ?>
                                <form action="<?=ROOT?>/coordinator/deletemem" method="post">
                                    <input type="hidden" name="supervisor_id" value="<?= $member->id?>">
                                    <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                                    <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit" >Remove</button>
                                </form>
                                </div>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>





                        <select id="member-select" class="input-field border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select a member</option>
                            <?php foreach ($data['users'] as $user): ?>
                                <option value="<?= htmlspecialchars($user->user_id) ?>"><?= htmlspecialchars($user->user_email) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="button" class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            onclick="addPerson('member-select', 'member-list', 'selected_members')">
                        Add
                    </button>
                </div>

                <!-- Dates -->
                <div class="mb-4 flex items-center">
                    <label class="block text-gray-700 font-bold mb-2" for="start-date">Start Date</label>
                    <div class="relative ml-2">
                        <input class="input-field border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start-date" type="date" name="start_date" value="<?=$project->startdate?:''?>">
                        <i class="fas fa-calendar-alt absolute top-2 right-3 text-gray-500"></i>
                    </div>
                    <label class="block text-gray-700 font-bold mb-2 ml-4" for="end-date">End Date</label>
                    <div class="relative ml-2">
                        <input class="input-field border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end-date" type="date" name="end_date" value="<?=$project->enddate?:''?>">
                        <i class="fas fa-calendar-alt absolute top-2 right-3 text-gray-500"></i>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"  onclick="createProject()" type="submit">
                        Update Changes
                    </button>
                </div>
                
            </form>
        </div>

        <!-- Success Message -->
        <div id="success-message" class="fixed inset-0 flex items-center justify-center" style="display: none;">
            <div class="bg-green-500 text-white py-2 px-4 rounded shadow-lg">
