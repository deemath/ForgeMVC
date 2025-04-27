<?php
    require_once "navigationBar.php";
?>
        <div class="main">
            <div class="header">
                <div class="title">Forge</div>
                <div class="user">
                    <div class="avatar"></div>
                    <div class="name">Admin</div>
                </div>
            </div>
            <div class="content">
                <div class="stats">
                    <div class="stat">
                        <a href="<?= ROOT ?>/Admin/projectlistview">
                            <div class="number"><?= $project_count ?></div>
                            <div class="label">Total Projects</div>
                        </a>
                    </div>
                   
                    <div class="stat">
                        <a href="<?= ROOT ?>/Admin/activeCoordinatorsList">
                            <div class="number"><?= $active_accounts ?></div>
                            <div class="label">Active Accounts</div>
                        </a>
                    </div>

                    <div class="stat">
                        <a href="<?= ROOT ?>/Admin/dectiveCoordinatorsList">
                            <div class="number"><?= $inactive_accounts ?></div>
                             <div class="label">Deactivated Accounts</div>
                        </a>
                    </div>
                    <div class="stat">
                        <a href="<?= ROOT ?>/Admin/AllUsers">
                            <div class="number"><?= $total_users ?></div>
                            <div class="label">Total Registered Users</div>
                        </a>
                    </div>
                    <a href="<?=ROOT?>/Admin/registerView">
                    <button class="register-button"><i class="fas fa-plus"></i>Register New<br>Institute / Coordinator</button>
                    </a>
                </div>
                <div class="recent-projects-title">Recent Projects</div>
                <div class="projects">
                    <?php if (!empty($data)) : ?>

                            <!-- <php print_r($data['name'])?> -->
                        
                            

                  

                    <?php foreach ($data['projects'] as $project): ?>
                            <div class="project">
                                <div class="title"><?= htmlspecialchars($project->title) ?></div>
                                <div class="description">
                                    <?= htmlspecialchars(substr($project->description, 0, 200)) . (strlen($project->description) > 200 ? ' ...' : '') ?>
                                </div>
                                <div class="actions">
                                    <button class="edit-btn" onclick="location.href='<?= ROOT ?>/Admin/projectProfView/<?= $project->id ?>'">View</button>
                                    <button class="delete-button" data-id="<?= $project->id ?>">Delete</button>
                                </div>
                            </div>
                    <?php endforeach; ?>

                    <?php endif; ?>
                    
                    <!-- <div class="project">
                        <div class="title">Project 2</div>
                        <div class="description">Description of project 2. This is a brief overview of what the project is about.</div>
                        <div class="actions">
                            <button>Edit</button>
                            <button class="delete-button">Delete</button>
                        </div>
                    </div> -->
                
                    

<!-- <php print_r($data['name'])?> -->


            </div>

            <div class="coordinators">
            <div class="title">Project Coordinators</div>
            </div>
            <?php if (!empty($data)) : ?>
            <?php foreach ($data['coordinators'] as $coordinator): ?>
            <?php   $statusClass = (isset($coordinator->status) && $coordinator->status == 1) ? 'inactive-coordinator' : 'active-coordinator';?>
                         <div class="coordinator <?= $statusClass ?>">
                            <a href="<?= ROOT ?>/Admin/profilecard/<?= $coordinator->id ?>" style="display: flex; align-items: center; text-decoration: none; color: inherit; flex: 1;">
                                <div class="avatar">
                                    <?php if (!empty($coordinator->image)): ?>
                                        <img src="data:image/jpeg;base64,<?= base64_encode($coordinator->image) ?>" alt="<?= htmlspecialchars($coordinator->name) ?>" />
                                    <?php else: ?>
                                        <img src="default-avatar.png" alt="Default Avatar" />
                                    <?php endif; ?>
                                </div>
                                <div class="info">
                                    <div class="name"><?= htmlspecialchars($coordinator->name) ?></div>
                                    <div class="email"><?= htmlspecialchars($coordinator->email) ?></div>
                                </div>
                            </a>

    <!-- Action Button -->
                <form action="<?= ROOT ?>/Admin/toggleCoordinatorStatus/<?= $coordinator->id ?>" method="post">
                    <label class="toggle-switch">
                        <input type="checkbox" name="status" onchange="this.form.submit()" <?= $coordinator->status == 1 ? 'checked' : '' ?>>
                        <span class="slider"></span>
                    </label>
                </form>

        </div>


                        
                 </a>   
            <?php endforeach; ?>

            <?php endif; ?>
        <!-- </div> -->
    </div>



    <!-- Add this at the end of your dashboard file before closing body tag -->
<!-- Edit Project Modal -->
<!-- <div id="edit-project-modal" class="modal" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 999;">
    <div class="modal-content" style="background: white; width: 500px; margin: 100px auto; padding: 20px; border-radius: 10px; position: relative;">
        <span class="close" style="position: absolute; top: 10px; right: 15px; font-size: 24px; cursor: pointer;" onclick="document.getElementById('edit-project-modal').style.display='none'">&times;</span>
        <h2 style="margin-bottom: 20px;">Edit Project</h2>

        <form action="<?= ROOT ?>/Admin/updateProject" method="POST">
            <input type="hidden" id="edit-project-id" name="id">

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="edit-project-title" style="display: block; font-weight: bold; margin-bottom: 5px;">Title:</label>
                <input type="text" id="edit-project-title" name="title" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="edit-project-description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
                <textarea id="edit-project-description" name="description" rows="4" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
            </div>

            <div class="form-buttons" style="display: flex; justify-content: space-between;">
                <button type="submit" class="btn" style="background-color:rgb(25, 21, 229); color: white; padding: 10px 20px; border: none; border-radius: 5px;">Save Changes</button>
                <button type="button" class="btn" onclick="document.getElementById('edit-project-modal').style.display='none'" style="background-color:rgb(244, 75, 14); color: white; padding: 10px 20px; border: none; border-radius: 5px;">Cancel</button>
            </div>
        </form>
    </div>
</div>
 -->


<!-- <script>
// Add this to your dashboard page
document.addEventListener('DOMContentLoaded', function() {
    // Add click handlers to all edit buttons
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const projectId = this.getAttribute('data-id');
            
            // Fetch project data using AJAX
            fetch('<?= ROOT ?>/Admin/getProjectData/' + projectId)
                .then(response => response.json())
                .then(data => {
                    // Populate form fields
                    document.getElementById('edit-project-id').value = data.id;
                    document.getElementById('edit-project-title').value = data.title;
                    document.getElementById('edit-project-description').value = data.description;
                    
                    // Show the modal
                    document.getElementById('edit-project-modal').style.display = 'block';
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
</script> -->


<!-- Delete Confirmation Modal -->
<!-- <!-- <div id="delete-project-modal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5); z-index: 999;">
    <div class="modal-content" style="background: white; width: 400px; margin: 150px auto; padding: 20px; border-radius: 10px; position: relative;">
        <h3 style="margin-bottom: 20px;">Confirm Deletion</h3>
        <p>Are you sure you want to delete this project?</p>
        <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
            <button id="cancel-delete" style="padding: 10px 15px; border: none; border-radius: 5px; background-color: gray; color: white;">Cancel</button>
            <button id="confirm-delete" style="padding: 10px 15px; border: none; border-radius: 5px; background-color: red; color: white;">Delete</button>
        </div>
    </div>
</div>
 <script> -->
    <!-- document.addEventListener('DOMContentLoaded', function () {
    let projectIdToDelete = null;

    // Setup delete buttons
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            projectIdToDelete = this.getAttribute('data-id');
            document.getElementById('delete-project-modal').style.display = 'block';
        });
    });

    // Cancel deletion
    document.getElementById('cancel-delete').addEventListener('click', function () {
        projectIdToDelete = null;
        document.getElementById('delete-project-modal').style.display = 'none';
    });

    // Confirm deletion
    document.getElementById('confirm-delete').addEventListener('click', function () {
        if (projectIdToDelete) {
            fetch('<?= ROOT ?>/Admin/deleteProject/' + projectIdToDelete, {
                method: 'POST',
            })
            .then(response => {
                if (response.ok) {
                    // Remove project from UI
                    const projectElement = document.querySelector(`.delete-button[data-id="${projectIdToDelete}"]`).closest('.project');
                    if (projectElement) projectElement.remove();
                } else {
                    alert("Failed to delete the project.");
                }
                document.getElementById('delete-project-modal').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred.");
                document.getElementById('delete-project-modal').style.display = 'none';
            });
        }
    });
});
</script> -->
 -->
<style>
    .coordinator {
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        margin-bottom: 1rem;
        text-decoration: none;
        color: #333;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
        
    /* .active-coordinator {
        border-left: 5px solid #28a745;
    } */
    .coordinator:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    /* .inactive-coordinator {
        border-left: 5px solid #dc3545;
    } */

    .coordinator .info {
        flex: 1;
        margin-left: 1rem;
    }

    .coordinator .avatar img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ccc;
    }

    .coordinator .status-button {
        padding: 5px 10px;
        font-size: 0.9rem;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background 0.3s;
    }

    .coordinator .status-button:hover {
        background-color: #0056b3;
    }

    /* Toggle switch base */
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider background */
    .slider {
        position: absolute;
        cursor: pointer;
        background-color:rgb(28, 18, 223); /* Blue when OFF */
        border-radius: 34px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        transition: 0.4s;
        box-shadow: 0 0 1px #2196F3;
    }

    /* The white circle knob */
    .slider::before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        border-radius: 50%;
        transition: 0.4s;
    }

    /* When checked (green background) */
    .toggle-switch input:checked + .slider {
        background-color:rgb(120, 120, 125); /* Green when ON */
        box-shadow: 0 0 1pxrgb(91, 8, 132);
    }

    /* Move the knob when checked */
    .toggle-switch input:checked + .slider::before {
        transform: translateX(26px);
    }

</style>


</body>
</html>