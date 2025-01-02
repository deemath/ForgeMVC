


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/common.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Project Forge</div>
            <div class="user">
                <i class="fas fa-cogs settings"></i>
                <div class="avatar"></div>
            </div>
        </div>
        <div class="content">
            <div class="stats">
                <div class="stat">
                    <div class="number">10</div>
                    <div class="label">Total Projects</div>
                </div>
                <div class="stat">
                    <div class="number">8</div>
                    <div class="label">Active Projects</div>
                </div>
                <div class="stat">
                    <div class="number">2</div>
                    <div class="label">Deactivated Projects</div>
                </div>
                <div class="stat">
                    <div class="number">50</div>
                    <div class="label">Ongoing Projects</div>
                </div>
            </div>
            <div class="projects">
                <?php if (!empty($data['projects'])) : ?>
                    <?php foreach ($data['projects'] as $project): ?>
                    <div class="project">
                        <div class="status ongoing">Ongoing</div>
                        <div class="title"><?= htmlspecialchars($project->project_title) ?></div>
                        <div class="description"><?= htmlspecialchars($project->project_description) ?></div>
                        <div class="actions">
                            <?php 
                                if ($project->role == 2) {
                                    $role = 'Project Supervisor';
                                } elseif ($project->role == 3) {
                                    $role = 'Co Supervisor';
                                } elseif ($project->role == 4) {
                                    $role = 'member';
                                } else {
                                    $role = 'Unknown Role';
                                }
                            ?>  
                            <div class="role member" id="role"><?=$role?></div>
                            <form action="<?=ROOT?>/regularuser/load" method="post">
                            <input type="hidden" name="projectid" value="<?= $project->project_id ?>">
                            <button type="submit">Visit</button>
                            </form>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 70%;"></div>
                            <div class="progress-percentage">70%</div>
                        </div>
                    </div>
                <?php endforeach ;?>
                <?php endif ; ?>
               
            </div>
        
       
            <h2 class="text-xl font-bold mb-4">Invitations</h2>
            <table class="min-w-full bg-white border border-gray-300 mb-6">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-100">Coordinator ID</th>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b border-gray-300">Institute</th>
                        <th class="py-2 px-4 border-b border-gray-100">Date</th>
                        <th class="py-2 px-4 border-b border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['invitations'])) : ?>
                            <?php foreach ($data['invitations'] as $invitation): ?>
                                <?php if ($invitation->status==0) : ?>
                                    <tr>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->id) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_name) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_email) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_institute) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->date) ?></td>
                                    <!-- <td class="py-2 px-4 border-b border-gray-300">
                                        <php 
                                            if ($invitation->role == 2) {
                                                echo 'Project Supervisor';
                                            } elseif ($invitation->role == 3) {
                                                echo 'Co Supervisor';
                                            } elseif ($invitation->role == 4) {
                                                echo 'Member';
                                            } else {
                                                echo 'Unknown Role';
                                            }
                                        ?>
                                    </td> -->
                                    <td class="py-2 px-4 border-b border-gray-300">
                                    <div class="flex space-x-2">
                                        <form action="<?= ROOT ?>/reguser/acceptInvitation" method="post">
                                            <input type="hidden" name="invitation_id" value="<?= $invitation->id ?>"> <!-- Fixed field name -->
                                            <input type="hidden" name="user_id" value="<?= $invitation->userid ?>">
                                            <input type="hidden" name="coordinator_id" value="<?= $invitation->coordinatorid ?>">
                                            <button class="bg-green-500 text-white p-2 rounded mr-2" name="submit">Accept</button>
                                        </form>
                                        <form action="<?= ROOT ?>/reguser/declineInvitation" method="post">
                                            <input type="hidden" name="invitation_id" value="<?= $invitation->id ?>">
                                            <button type="submit" class="bg-red-500 text-white p-2 rounded" name="decline">Decline</button> <!-- Fixed type -->
                                        </form>
                                        </div>
                                    </td>

                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                  
                </tbody>
            </table>

            <h2 class="text-xl font-bold mb-4">Project Coordinators Assigned</h2>
            <table class="min-w-full bg-white border border-gray-300 mb-6">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Project ID</th>
                        <th class="py-2 px-4 border-b border-gray-300">Institute</th>
                        <th class="py-2 px-4 border-b border-gray-300">Coordinator Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Coordinator Email</th>
                        <th class="py-2 px-4 border-b border-gray-300">Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($data['invitations'])) : ?>
                            <?php foreach ($data['invitations'] as $invitation): ?>
                                <?php if ($invitation->status==1) : ?>
                                    <tr>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->id) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_institute) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_name) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->user_email) ?></td>
                                    <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($invitation->date) ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <script>
        // Get the role value
        let roleElement = document.getElementById('role');
        let role = roleElement ? roleElement.textContent : '';

        // Get the element whose color you want to change
        let colorBox = document.getElementById('color-box');

        // Function to change color based on the role
        function changeColorBasedOnRole(role) {
            switch(role.toLowerCase()) {
                case 'admin':
                    colorBox.style.backgroundColor = 'red'; // red for admin
                    break;
                case 'supervisor':
                    colorBox.style.backgroundColor = 'blue'; // blue for supervisor
                    break;
                case 'member':
                    colorBox.style.backgroundColor = 'green'; // green for member
                    break;
                case 'guest':
                    colorBox.style.backgroundColor = 'gray'; // gray for guest
                    break;
                default:
                    colorBox.style.backgroundColor = 'white'; // default color
                    break;
            }
        }

        // Call the function with the current role
        changeColorBasedOnRole(role);





        // JavaScript to dynamically change the status and progress bar
        const projects = [
            { status: 'ongoing', progress: 70 },
            { status: 'completed', progress: 100 },
            { status: 'terminated', progress: 30 },
            { status: 'ongoing', progress: 50 },
            { status: 'completed', progress: 100 },
            { status: 'terminated', progress: 20 }
        ];

        document.querySelectorAll('.project').forEach((project, index) => {
            const statusElement = project.querySelector('.status');
            const progressElement = project.querySelector('.progress');
            const progressPercentageElement = project.querySelector('.progress-percentage');

            statusElement.classList.add(projects[index].status);
            statusElement.textContent = projects[index].status.charAt(0).toUpperCase() + projects[index].status.slice(1);
            progressElement.style.width = projects[index].progress + '%';
            progressPercentageElement.textContent = projects[index].progress + '%';

            if (projects[index].progress < 25) {
                progressElement.style.backgroundColor = '#8bc34a'; // Light Green
            } else if (projects[index].progress < 50) {
                progressElement.style.backgroundColor = '#ffeb3b'; // Yellow
            } else if (projects[index].progress < 75) {
                progressElement.style.backgroundColor = '#03a9f4'; // Light Blue
            } else if (projects[index].progress < 100) {
                progressElement.style.backgroundColor = '#4caf50'; // Green
            } else {
                progressElement.style.backgroundColor = '#388e3c'; // Dark Green
            }
        });
    </script>
</body>
</html>