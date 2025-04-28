< lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #eff6ff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 40px;
        }

        @media (min-width: 768px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .form-section {
            background-color: #dbeafe;
            padding: 32px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 24px;
        }

        .label {
            display: block;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 16px;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px #93c5fd;
        }

        .btn {
            height: 42px;
            padding: 10px 20px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #3b82f6;
            color: white;
        }

        .btn-blue:hover {
            background-color: #2563eb;
            transform: scale(1.05);
            transition: 0.3s ease;
        }

        .btn-red {
            background-color: #ef4444;
            color: white;
        }

        .btn-red:hover {
            background-color: #dc2626;
            transform: scale(1.05);
            transition: 0.3s ease;
        }

        .btn-green {
            background-color: #10b981;
            color: white;
        }

        .btn-green:hover {
            background-color: #059669;
            transform: scale(1.05);
            transition: 0.3s ease;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .flex-row {
            display: flex;
        }

        .user-label {
            color: #374151;
        }

        .gap-right {
            margin-right: 10px;
        }
    </style>
</head>
<?php require_once 'navbar.php';
?>
<body>
    <div class="container">
        <div class="grid">
            <!-- Left Side: Project Form -->
            <div class="form-section">
                <h2 class="title">Edit Project</h2>
                <form method="post" action="<?=ROOT?>/Coordinator/updateProject">
                    <input type="hidden" name="id" value="<?=$project->id?>">
                    
                    <label for="project-name" class="label">Project Name</label>
                    <input type="text" id="project-name" name="project-name" class="form-input" placeholder="Enter project name" value="<?=$project->title?:''?>">
                    
                    <label for="project-description" class="label">Project Description</label>
                    <textarea id="project-description" name="project-description" class="form-textarea" placeholder="Enter project description"><?=$project->description?:''?></textarea>
                    
                    <label for="start-date" class="label">Start Date</label>
                    <input type="date" id="start-date" name="start-date" class="form-input"  value="<?=$project->startdate?:''?>">
                    
                    <label for="end-date" class="label">End Date</label>
                    <input type="date" id="end-date" name="end-date" class="form-input"  value="<?=$project->enddate?:''?>">
                    
                    <div class="flex">
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Right Side: Project Supervisors  -->

            <div class="form-section">

                <?php
                $assignedUserIds = $data['assignedUserIds'] ?? [];
                ?>

                <h2 class="title">Project Supervisors</h2>
                <div>
<!--Remove supervisors -->
                <?php if(!empty($data['supervisor'])):?>
                    <?php foreach ($data['supervisor'] as $supervisor): ?>
                    
                    <div class="flex">
                        <form action="<?=ROOT?>/Coordinator/removeFromProject" method="post">
                        <span class="user-label"><?= htmlspecialchars($supervisor->sup_email ?: 'No Supervisors Assigned yet !') ?></span>
                        <input type="hidden" name="supid" value="<?= $supervisor->id?>">
                        <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                        <input type="hidden" name="user_type" value="supervisor">
                        <button class="btn btn-red" type="submit">
                            Remove
                        </button>
                        </form>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>

<!--Add supervisors -->
                <div>
                <form method="POST" action="<?=ROOT?>/Coordinator/addSup/<?=$data['project']->id?>">
                    <label for="add-supervisor" class="label">Add Supervisor</label>
                    <div class="flex-row">
                        <select id="add-supervisor" name="add-supervisor" class="form-select gap-right">
                            <?php foreach ($data['users'] as $user): ?>
                                <?php if (!in_array($user->user_id, $assignedUserIds)): ?>
                                    <option value="<?= $user->user_id ?>"><?= htmlspecialchars($user->user_email) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-green">
                            Add
                        </button>
                    </div>
                </form>
                </div>

                <h2 class="title">Project Co Supervisors</h2>
                <div>
<!--Remove cosupervisors -->
                <?php if(!empty($data['cosupervisor'])):?>
                    <?php foreach ($data['cosupervisor'] as $cosupervisor): ?>
                    
                    <div class="flex">
                        <form action="<?=ROOT?>/Coordinator/removeFromProject" method="post">
                        <span class="user-label"><?= htmlspecialchars($cosupervisor->cosup_email ?: 'No Supervisors Assigned yet !') ?></span>
                        <input type="hidden" name="supid" value="<?= $cosupervisor->id?>">
                        <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                        <input type="hidden" name="user_type" value="cosupervisor">
                        <button class="btn btn-red" type="submit">
                            Remove
                        </button>
                        </form>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>

                <!--Add Co-supervisors -->
                <div>
                <form method="POST" action="<?=ROOT?>/Coordinator/addCosup/<?= $data['project']->id ?>">
                    <label for="add-cosupervisor" class="label">Add Co-Supervisor</label>
                    <div class="flex-row">
                        <select id="add-cosupervisor" name="add-cosupervisor" class="form-select gap-right">
                            <?php foreach ($data['users'] as $user): ?>
                                <?php if (!in_array($user->user_id, $assignedUserIds)): ?>
                                    <option value="<?= $user->user_id ?>"><?= htmlspecialchars($user->user_email) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-green">
                            Add
                        </button>
                    </div>
                </form>
                </div>
                <h2 class="title">Project Members</h2>
                <div>
<!--Remove members -->
                <?php if(!empty($data['member'])):?>
                    <?php foreach ($data['member'] as $member): ?>
                    
                    <div class="flex">
                        <form action="<?=ROOT?>/Coordinator/removeFromProject" method="post">
                        <span class="user-label"><?= htmlspecialchars($member->mememail ?: 'No Supervisors Assigned yet !') ?></span>
                        <input type="hidden" name="supid" value="<?= $member->id?>">
                        <input type="hidden" name="project_id" value="<?=$project->id?:''?>">
                        <input type="hidden" name="user_type" value="member">
                        <button class="btn btn-red" type="submit">
                            Remove
                        </button>
                        </form>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>

                <!--Add Members -->
                <div>
                <form method="POST" action="<?=ROOT?>/Coordinator/addMem/<?= $data['project']->id ?>">
                    <label for="add-member" class="label">Add Member</label>
                    <div class="flex-row">
                        <select id="add-member" name="add-member" class="form-select gap-right">
                            <?php foreach ($data['users'] as $user): ?>
                                <?php if(!in_array($user->user_id, $assignedUserIds)): ?>
                                    <option value="<?= $user->user_id ?>"><?= htmlspecialchars($user->user_email) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-green">
                            Add
                        </button>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>