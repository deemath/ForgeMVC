<?php
    require_once "navigationBar.php";
?>

<style>
    .bb {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 2rem;
        width:75%;
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
        font-weight: 500;
    }

    .project-status {
        font-size: 1rem;
        font-weight: 500;
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
        font-weight: 500;
    }

    .project-description p {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
        font-weight: 400;
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
        font-weight: 400;
    }

    thead {
        background-color: #007bff;
        color: #fff;
        font-weight: 500;
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
        font-weight: 400;
    }

    .back-btn {
        display: inline-block;
        margin-top: 2rem;
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
<?php if (!empty($data)): ?>
<div class="project-container">
    <div class="project-header">
        <h2>Project Title: <?= htmlspecialchars($data['project']->title) ?></h2>
    </div>

    <div class="project-description">
        <h3>Project Overview</h3>
        <p><?= htmlspecialchars($data['project']->description) ?></p>
    </div>

    <div class="project-details">
        <h3>Project Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Assigned Coordinator</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $data['project']->id ?></td>
                    <td><?= htmlspecialchars($data['project']->coordinatorid) ?></td>
                    <td><?= $data['project']->startdate ?></td>
                    <td><?= $data['project']->enddate ?></td>
                    <td><?= $data['project']->createdat ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="timeline">
        <h3>Task</h3>
        <table>
            <thead>
                <tr>
                    <th>Task ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($data['tasks'])):?>
                    <?php foreach ($data["tasks"] as $task): ?>
                        <tr>
                            <td><?= $task->id ?></td>
                            <td><?= htmlspecialchars($task->title) ?></td>
                            <td><?= htmlspecialchars($task->description) ?></td>
                            <td><?= htmlspecialchars($task->createdby) ?></td>
                            <td><?= $task->enddate ?></td>
                            <td><span class="status"><?= htmlspecialchars($task->status) ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center; padding: 20px;">No tasks available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">← Back to Projects</a>
</div>
<?php endif; ?>
</div>
