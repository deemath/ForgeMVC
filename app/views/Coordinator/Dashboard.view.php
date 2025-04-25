<?php require_once 'navbar.php';
?>



   <div class="dashboard-content">
      <div class="stats-grid">
         <div class="stats-box total-projects-box">
            <h4>Total Projects</h4>
            <p><?= isset($totalProjects) ? $totalProjects : '0' ?></p>
         </div>
         <div class="stats-box recent-project-box">
            <h4>Recent Project</h4>
            <p><?= $recentProject ?? 'No Projects'; ?></p>
         </div>
         <div class="stats-box completed-projects-box">
            <h4>Completed Projects</h4>
            <p><?= isset($completedProjects) ? $completedProjects : '0' ?></p>
         </div>
         <div class="stats-box ongoing-projects-box">
            <h4>Ongoing Projects</h4>
            <p><?= isset($ongoingProjects) ? $ongoingProjects : '0' ?></p>
         </div>
         <div class="add-project-box">
            <a href="<?=ROOT?>/coordinator/createprojectForm" >
               <i class="fas fa-plus"></i>Add New Project
            </a>     
         </div>
    </div>

    <h2 class="projects-title">Projects</h2>
    <div class="projects-grid">
      <?php if(!empty($Projects)): ?>
         <?php foreach ($Projects as $project): ?>
         <div class="project-box">
            <h3><?= htmlspecialchars($project->title) ?></h3>
            <p><?= htmlspecialchars($project->description) ?></p>
            <p class="date">Created on: <?= htmlspecialchars($project->createdat) ?></p>
            <p class="deadline">Project Deadline: <?= htmlspecialchars($project->enddate) ?></p>
         </div>
         <?php endforeach; ?>
      <?php else: ?>
         <div class="no-projects-box">
            <p>No projects available.</p>
         </div>
      <?php endif; ?>
    </div>
   </div>
  </div>
 </body>
</html>
