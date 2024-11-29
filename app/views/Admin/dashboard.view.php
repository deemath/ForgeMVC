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
                        <div class="number">10</div>
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
                        <div class="number">50</div>
                        <div class="label">Total Registered Users</div>
                    </div>
                    <button class="register-button" onclick="window.location.href='register.php';"><i class="fas fa-plus"></i>Register New<br>Institute / Coordinator</button>
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
                                <button>Edit</button>
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
                <div class="coordinator">
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
                </div>
                    
            <?php endforeach; ?>

            <?php endif; ?>

               
                
            </div>
        </div>
    </div>
</body>
</html>