<?php
    require_once "navigationBar.php";
?>

<style>
    .bb {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 2rem;
    }

    .project-container {
        max-width: 1100px;
        margin: auto;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        padding: 2rem;
        margin-top: 20px;
    }

    .project-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .project-header h2 {
        font-size: 2rem;
        color: #333;
        margin: 0;
    }

    .project-status {
        font-size: 1rem;
        font-weight: 600;
        color: #28a745;
    }

    .project-description {
        margin-top: 1.5rem;
        padding: 20px;
        background-color: #eaf6f6;
        border-radius: 8px;
    }

    .project-description h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .project-description p {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }

    .project-details, .timeline {
        margin-top: 2rem;
    }

    .project-details table, .timeline table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    thead {
        background-color: #007bff;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #fafafa;
    }

    .timeline td {
        text-align: center;
        color: #007bff;
    }

    .timeline .status {
        padding: 8px 16px;
        background-color: #28a745;
        color: white;
        border-radius: 5px;
    }

    .back-btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="bb">

<div class="project-container">
    <div class="project-header">
        <h2>Project Title: <?= htmlspecialchars($project->title) ?></h2>
        <span class="project-status"><?= $project->status == 'completed' ? 'Completed' : 'Ongoing' ?></span>
    </div>

    <div class="project-description">
        <h3>Project Overview</h3>
        <p><?= htmlspecialchars($project->overview) ?></p>
    </div>

    <div class="project-details">
        <h3>Project Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Manager</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Budget</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $project->id ?></td>
                    <td><?= htmlspecialchars($project->manager_name) ?></td>
                    <td><?= $project->start_date ?></td>
                    <td><?= $project->end_date ?></td>
                    <td>$<?= number_format($project->budget, 2) ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="timeline">
        <h3>Project Timeline</h3>
        <table>
            <thead>
                <tr>
                    <th>Phase</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($project->timeline as $phase): ?>
                    <tr>
                        <td><?= htmlspecialchars($phase->name) ?></td>
                        <td><?= $phase->start_date ?></td>
                        <td><?= $phase->end_date ?></td>
                        <td><span class="status"><?= $phase->status ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="<?= ROOT ?>/projects" class="back-btn">← Back to Projects</a>
</div>

</div>