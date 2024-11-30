


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
                <div class="project">
                    <div class="status ongoing">Ongoing</div>
                    <div class="title">Project 1</div>
                    <div class="description">Description of project 1. This is a brief overview of what the project is about.</div>
                    <div class="actions">
                        <div class="role member">Member</div>
                        
                        <button onclick="window.location.href='#';">Visit</button>

                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 70%;"></div>
                        <div class="progress-percentage">70%</div>
                    </div>
                </div>
                <div class="project">
                    <div class="status completed">Completed</div>
                    <div class="title">Project 2</div>
                    <div class="description">Description of project 2. This is a brief overview of what the project is about.</div>
                    <div class="actions">
                        <div class="role co-supervisor">Co-Supervisor</div>
                        <button>Visit</button>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 100%;"></div>
                        <div class="progress-percentage">100%</div>
                    </div>
                </div>
                <div class="project">
                    <div class="status terminated">Terminated</div>
                    <div class="title">Project 3</div>
                    <div class="description">Description of project 3. This is a brief overview of what the project is about.</div>
                    <div class="actions">
                        <div class="role supervisor">Supervisor</div>
                        <button>Visit</button>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 30%;"></div>
                        <div class="progress-percentage">30%</div>
                    </div>
                </div>
                <div class="project">
                    <div class="status ongoing">Ongoing</div>
                    <div class="title">Project 4</div>
                    <div class="description">Description of project 4. This is a brief overview of what the project is about.</div>
                    <div class="actions">
                        <div class="role member">Member</div>
                        <button>Visit</button>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 50%;"></div>
                        <div class="progress-percentage">50%</div>
                    </div>
                </div>
                <div class="project">
                    <div class="status completed">Completed</div>
                    <div class="title">Project 5</div>
                    <div class="description">Description of project 5. This is a brief overview of what the project is about.</div>
                    <div class="actions">
                        <div class="role co-supervisor">Co-Supervisor</div>
                        <button>Visit</button>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 100%;"></div>
                        <div class="progress-percentage">100%</div>
                    </div>
                </div>
                <div class="project">
                    <div class="status terminated">Terminated</div>
                    <div class="title">Project 6</div>
                    <div class="description">Description of project 6. This is a brief overview of what the project is about.</div>
                    <div class="actions">
                        <div class="role supervisor">Supervisor</div>
                        <button>Visit</button>
                    </div>
                    <div class="progress-bar">
                        <div class="progress" style="width: 20%;"></div>
                        <div class="progress-percentage">20%</div>
                    </div>
                </div>
            </div>
        
       
            <h2 class="text-xl font-bold mb-4">Invitations</h2>
            <table class="min-w-full bg-white border border-gray-300 mb-6">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-100">Coordinator ID</th>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b border-gray-300">Institute</th>
                        <!-- <th class="py-2 px-4 border-b border-gray-100">Role</th> -->
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
                                        <form action="<?=ROOT?>/reguser/acceptInvitation" method="post">
                                        <input type="hidden" name="invitaton_id" value="<?=$invitation->id?>">
                                        <input type="hidden" name="user_id" value="<?=$invitation->userid?>">
                                        <input type="hidden" name="coordinator_id" value="<?=$invitation->coordinatorid?>">
                                        <button class="bg-green-500 text-white p-2 rounded mr-2" name="submit">Accept</button>
                                        <button class="bg-red-500 text-white p-2 rounded">Decline</button>
                                        </form>
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
                        <th class="py-2 px-4 border-b border-gray-300">Project Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Coordinator Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Coordinator Email</th>
                        <th class="py-2 px-4 border-b border-gray-300">Institute</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">P001</td>
                        <td class="py-2 px-4 border-b border-gray-300">Project Alpha</td>
                        <td class="py-2 px-4 border-b border-gray-300">John Doe</td>
                        <td class="py-2 px-4 border-b border-gray-300">john.doe@example.com</td>
                        <td class="py-2 px-4 border-b border-gray-300">Institute A</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">P002</td>
                        <td class="py-2 px-4 border-b border-gray-300">Project Beta</td>
                        <td class="py-2 px-4 border-b border-gray-300">Jane Smith</td>
                        <td class="py-2 px-4 border-b border-gray-300">jane.smith@example.com</td>
                        <td class="py-2 px-4 border-b border-gray-300">Institute B</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">P003</td>
                        <td class="py-2 px-4 border-b border-gray-300">Project Gamma</td>
                        <td class="py-2 px-4 border-b border-gray-300">Alice Johnson</td>
                        <td class="py-2 px-4 border-b border-gray-300">alice.johnson@example.com</td>
                        <td class="py-2 px-4 border-b border-gray-300">Institute C</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <script>
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