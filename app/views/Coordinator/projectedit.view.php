< lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<?php require_once 'navbar.php';
?>
<body class="font-roboto bg-white">
    <div class="container mx-auto p-20">
        <div class="flex justify-between">
            <!-- Left Side: Project Form -->
            <div class="w-full max-w-md bg-white p-10 border border-gray-300">
                <h2 class="text-2xl font-bold mb-4">Edit Project</h2>
                <form method="post" action="<?=ROOT?>/Coordinator/updateProject">
                    <input type="hidden" name="id" value="<?=$project->id?>">
                    <div class="mb-4">
                        <label for="project-name" class="block text-gray-700 font-bold mb-2">Project Name</label>
                        <input type="text" id="project-name" name="project-name" class="w-full px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter project name" value="<?=$project->title?:''?>">
                    </div>
                    <div class="mb-4">
                        <label for="project-description" class="block text-gray-700 font-bold mb-2">Project Description</label>
                        <textarea id="project-description" name="project-description" class="w-full px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter project description"><?=$project->description?:''?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="start-date" class="block text-gray-700 font-bold mb-2">Start Date</label>
                        <input type="date" id="start-date" name="start-date" class="w-full px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500"  value="<?=$project->startdate?:''?>">
                    </div>
                    <div class="mb-4">
                        <label for="end-date" class="block text-gray-700 font-bold mb-2">End Date</label>
                        <input type="date" id="end-date" name="end-date" class="w-full px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500"  value="<?=$project->enddate?:''?>">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Right Side: Project Supervisors  -->

            <div class="w-full max-w-md bg-white p-6 border border-gray-300">
                <h2 class="text-2xl font-bold mb-4">Project Supervisors</h2>
                <div class="mb-4">

                <?php if(!empty($data['supervisor'])):?>
                    <?php foreach ($data['supervisor'] as $supervisor): ?>
                    
                    <div class="flex justify-between items-center mb-2">
                        <form action="<?=ROOT?>/Coordinator/removeFromProject" method="post">
                        <span class="text-gray-700"><?= htmlspecialchars($supervisor->sup_email ?: 'No Supervisors Assigned yet !') ?></span>
                        <input type="hidden" name="supid" value="<?= $supervisor->id?>">
                        <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                        <input type="hidden" name="user_type" value="supervisor">
                        <button class="bg-red-500 text-white px-2 py-1 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" type="submit">
                            Remove
                        </button>
                        </form>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="mb-4">
    <label for="add-supervisor" class="block text-gray-700 font-bold mb-2">Add Supervisor</label>
    <div class="flex">
        <select id="add-supervisor" name="add-supervisor" class="w-full px-3 py-2 border border-r-0 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?php foreach ($data['users'] as $user): ?>
                <option value="<?= $user->user_id ?>"><?= htmlspecialchars($user->user_email) ?></option>
            <?php endforeach; ?>
        </select>
        <button class="bg-green-500 text-white px-4 py-2 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Add
        </button>
    </div>
</div>

                <h2 class="text-2xl font-bold mb-4">Project Co Supervisors</h2>
                <div class="mb-4">

                <?php if(!empty($data['cosupervisor'])):?>
                    <?php foreach ($data['cosupervisor'] as $cosupervisor): ?>
                    
                    <div class="flex justify-between items-center mb-2">
                        <form action="<?=ROOT?>/Coordinator/removeFromProject" method="post">
                        <span class="text-gray-700"><?= htmlspecialchars($cosupervisor->cosup_email ?: 'No Supervisors Assigned yet !') ?></span>
                        <input type="hidden" name="supid" value="<?= $cosupervisor->id?>">
                        <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                        <input type="hidden" name="user_type" value="cosupervisor">
                        <button class="bg-red-500 text-white px-2 py-1 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" type="submit">
                            Remove
                        </button>
                        </form>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="mb-4">
    <label for="add-cosupervisor" class="block text-gray-700 font-bold mb-2">Add Co-Supervisor</label>
    <div class="flex">
        <select id="add-cosupervisor" name="add-cosupervisor" class="w-full px-3 py-2 border border-r-0 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?php foreach ($data['users'] as $user): ?>
                <option value="<?= $user->user_id ?>"><?= htmlspecialchars($user->user_email) ?></option>
            <?php endforeach; ?>
        </select>
        <button class="bg-green-500 text-white px-4 py-2 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Add
        </button>
    </div>
</div>
                <h2 class="text-2xl font-bold mb-4">Project Members</h2>
                <div class="mb-4">

                <?php if(!empty($data['member'])):?>
                    <?php foreach ($data['member'] as $member): ?>
                    
                    <div class="flex justify-between items-center mb-2">
                        <form action="<?=ROOT?>/Coordinator/removeFromProject" method="post">
                        <span class="text-gray-700"><?= htmlspecialchars($member->mememail ?: 'No Supervisors Assigned yet !') ?></span>
                        <input type="hidden" name="supid" value="<?= $member->id?>">
                        <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                        <input type="hidden" name="user_type" value="member">
                        <button class="bg-red-500 text-white px-2 py-1 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500" type="submit">
                            Remove
                        </button>
                        </form>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="mb-4">
    <label for="add-member" class="block text-gray-700 font-bold mb-2">Add Member</label>
    <div class="flex">
        <select id="add-member" name="add-member" class="w-full px-3 py-2 border border-r-0 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?php foreach ($data['users'] as $user): ?>
                <option value="<?= $user->user_id ?>"><?= htmlspecialchars($user->user_email) ?></option>
            <?php endforeach; ?>
        </select>
        <button class="bg-green-500 text-white px-4 py-2 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Add
        </button>
    </div>
</div>
            </div>

        </div>
    </div>
</body>
</html>