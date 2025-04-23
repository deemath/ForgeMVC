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
                        <div class="number"><?= $project_count ?></div>
                        <div class="label">Total Projects</div>
                    </div>
                    <div class="stat">
                        <div class="number">8</div>
                        <div class="label">Active Accounts</div>
                    </div>
                    <div class="stat">
                        <div class="number">2</div>
                        <div class="label">Deactivated Accounts</div>
                    </div>
                    <div class="stat">
                        <div class="number"><?= $total_users ?></div>
                        <div class="label">Total Registered Users</div>
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
                                <button class="edit-btn" data-id="<?= $project->id ?>">Edit</button>
                                <button class="delete-button">Delete</button>
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

            <?php if (!empty($data)) : ?>
            <?php foreach ($data['coordinators'] as $coordinator): ?>
                <a href="<?= ROOT ?>/Admin/profilecard/<?= $coordinator->id ?>" class="coordinator">
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
            <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>



    <!-- Add this at the end of your dashboard file before closing body tag -->
<!-- Edit Project Modal -->
<div id="edit-project-modal" class="modal" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 999;">
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



<script>
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
</script>


</body>
</html>