<?php
    require_once "navigationBar.php";
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <!-- recent project list -->

        <div class="recent-projects-title">Recent Projects</div>
        <div class="projects">
            <?php if (!empty($data)) : ?>
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
        </div>


        <!-- Coordinator list -->
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

        
                            <form id="statusForm" action="<?= ROOT ?>/Admin/toggleCoordinatorStatus/<?= $coordinator->id ?>" method="post">
                                <label class="toggle-switch">
                                    <input 
                                        type="checkbox" 
                                        name="status" 
                                        id="statusCheckbox"
                                    <?= $coordinator->status == 1 ? 'checked' : '' ?>>
                                    <span class="slider"></span>
                                </label>
                            </form>


                            

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const deleteButtons = document.querySelectorAll('.delete-button');
                                    
                                    deleteButtons.forEach(button => {
                                        button.addEventListener('click', function(event) {
                                            const projectId = this.getAttribute('data-id');
                                            const projectTitle = this.getAttribute('data-title');
                                            
                                            // Set the modal content
                                            document.getElementById('delete-title').textContent = projectTitle;
                                            document.getElementById('delete-id').value = projectId;
                                            
                                            // Show the modal
                                            document.getElementById('delete-modal').style.display = 'block';
                                        });
                                    });
                                });

                                // Function to close the modal
                                function closeModal() {
                                    document.getElementById('delete-modal').style.display = 'none';
                                }

                            
                                const checkbox = document.getElementById('statusCheckbox');
                                const form = document.getElementById('statusForm');

                                checkbox.addEventListener('change', function(e) {
                                    // Prevent immediate submit
                                    e.preventDefault();

                                    // Remember current checked state
                                    const isChecked = checkbox.checked;
                                    
                                    // Set the modal content dynamically
                                    document.getElementById('status-action').textContent = isChecked ? "Activate" : "Deactivate";
                                    document.getElementById('status-id').value = checkbox.getAttribute('data-id'); // Assuming you're passing the coordinator's ID

                                    // Show the modal
                                    document.getElementById('status-modal').style.display = 'block';
                                });

                                // Function to close the modal
                                function closeStatusModal() {
                                    document.getElementById('status-modal').style.display = 'none';
                                }

                            </script>
                        </div>
                <?php endforeach; ?>
            <?php endif; ?> 
    </div>


    <!-- delete button model -->
    <div id="delete-modal" class="prj-modal" style="display: none;">
        <div class="prj-modal-content">
            <div class="prj-modal-header">
                <span class="warning-icon">&#9888;</span>
                <h3>Delete Confirmation</h3>
            </div>
                <p>Are you sure you want to delete <span class="bold" id="delete-title"></span>?</p>
            <div class="prj-modal-buttons">
            <br>
                <span class="error-text">This action cannot be undone. Deleting this will permanently remove it from the system.</span>
            <br>
                <span class="note-text">Warning: This may cause issues if the coordinator is actively involved in ongoing projects. Please proceed with caution.</span>
            <div class="prj-modal-actions">
                <form action="<?=ROOT?>/Admin/deleteProject" method="post">
                    <input type="hidden" id="delete-id" name="id">
                    <button class="prj-yes-btn" type="submit">Yes</button>
                    <button type="button" class="prj-no-btn" onclick="closeModal()">No</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Toggle button model -->
    <div id="status-modal" class="prj-modal" style="display: none;">
        <div class="prj-modal-content">
            <div class="prj-modal-header">
                <span class="warning-icon">&#9888;</span>
                <h3>Change Status Confirmation</h3>
            </div>
                <p>Are you sure you want to <span class="bold" id="status-action"></span> this coordinator?</p>
            <div class="prj-modal-buttons">
            <br>
                <span class="error-text">This action cannot be undone. Please proceed with caution.</span>
            <div class="prj-modal-actions">
                <form action="<?=ROOT?>/Admin/toggleCoordinatorStatus" method="post" id="statusForm">
                    <input type="hidden" id="status-id" name="id">
                    <button class="prj-yes-btn" type="submit">Yes</button>
                    <button type="button" class="prj-no-btn" onclick="closeStatusModal()">No</button>
                </form>
            </div>
        </div>
    </div>
</div>


  
<style>

    .number{
        color: #333;
    }
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
        background-color:rgb(18, 149, 75); /* Blue when OFF */
        border-radius: 34px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        transition: 0.4s;
        box-shadow: 0 0 1pxrgb(33, 243, 222);
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

<style>
    /* Modal background */
.prj-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

/* Modal content */
.prj-modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Modal header */
.prj-modal-header {
    display: flex;
    align-items: center;
    font-size: 1.2rem;
    color: #333;
}

.warning-icon {
    font-size: 1.8rem;
    margin-right: 10px;
    color: red;
}

/* Modal buttons */
.prj-modal-buttons {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

/* Modal action buttons - Yes and No */
.prj-modal-actions {
    display: flex;
    justify-content: space-between; /* Align buttons horizontally */
    margin-top: 20px;
}

.prj-yes-btn, .prj-no-btn {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    width: 45%; /* Set width to make both buttons evenly spaced */
}

.prj-yes-btn {
    background-color: red;
    color: white;
}

.prj-no-btn {
    background-color: gray;
    color: white;
}

.prj-yes-btn:hover {
    background-color: darkred;
}

.prj-no-btn:hover {
    background-color: darkgray;
}

/* Error and warning text */
.error-text {
    color: red;
}

.note-text {
    color: #FFA500;
}

</style>
<style>
    /* Modal background */
.prj-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

/* Modal content */
.prj-modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Modal header */
.prj-modal-header {
    display: flex;
    align-items: center;
    font-size: 1.2rem;
    color: #333;
}

.warning-icon {
    font-size: 1.8rem;
    margin-right: 10px;
    color: red;
}

/* Modal buttons */
.prj-modal-buttons {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

/* Modal action buttons - Yes and No */
.prj-modal-actions {
    display: flex;
    justify-content: space-between; /* Align buttons horizontally */
    margin-top: 20px;
}

.prj-yes-btn, .prj-no-btn {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    width: 45%; /* Set width to make both buttons evenly spaced */
}

.prj-yes-btn {
    background-color: red;
    color: white;
}

.prj-no-btn {
    background-color: gray;
    color: white;
}

.prj-yes-btn:hover {
    background-color: darkred;
}

.prj-no-btn:hover {
    background-color: darkgray;
}

/* Error and warning text */
.error-text {
    color: red;
}

.note-text {
    color: #FFA500;
}

</style>



</body>
</html>