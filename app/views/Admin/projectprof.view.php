<?php require_once "navigationBar.php"; ?>

<div class="page-container">
    <div class="main-wrapper">
        <?php if (!empty($data)): ?>
            <!-- Project Overview -->
            <div class="section">
                <h3 class="section-title">Project Overview</h3>
                <p><strong>Project Title:</strong> <?= htmlspecialchars($data['project']->title) ?></p>
                <p><?= htmlspecialchars($data['project']->description) ?></p>
            </div>

            <!-- Project Details -->
            <div class="section">
                <h3 class="section-text">Project Details</h3>
                <table class="styled-table">
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

            <!-- Project Tasks -->
            <div class="section">
                <h3 class="section-text">Project Tasks</h3>
                <table class="styled-table">
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
                        <?php if (!empty($data['tasks'])): ?>
                            <?php foreach ($data["tasks"] as $task): ?>
                                <tr>
                                    <td><?= $task->id ?></td>
                                    <td><?= htmlspecialchars($task->title) ?></td>
                                    <td><?= htmlspecialchars($task->description) ?></td>
                                    <td><?= htmlspecialchars($task->createdby) ?></td>
                                    <td><?= $task->enddate ?></td>
                                    <td><span class="status <?= strtolower($task->status) ?>"><?= htmlspecialchars($task->status) ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">No tasks available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Back Button -->
            <div class="back-btn-wrapper">
                <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">← Back to Dashboard</a>
                <a href="<?= ROOT ?>/Admin/projectlist" class="back-btn">← Back to Projects</a>
            </div>
        <?php else: ?>
            <p>No project data found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Styling for improved layout -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }

    .page-container {
        padding: 20px;
        width: 75%;
        margin:  auto;
        height: 75%;
    }

    .main-wrapper {
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .section {
        margin-bottom: 30px;
    }

    .section-title {
        color: #333;
        font-size: 2em;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 15px;
        font-style: normal;
    }
    .section-text{
        font-size:1.5rem;
        font-style: normal;
        font-weight: 400;
    }


    .styled-table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f5f5f5;
        font-weight: bold;
        color: #333;
    }

    td {
        font-size: 0.95em;
    }

    .status {
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        text-transform: capitalize;
    }

    .status.completed {
        background-color: #28a745;
        color: white;
    }

    .status.pending {
        background-color: #ffc107;
        color: white;
    }

    .status.in-progress {
        background-color: #007bff;
        color: white;
    }

    .back-btn-wrapper {
        text-align: right;
        margin-top: 30px;
    }

    .back-btn {
    padding: 12px 25px;
    background-color: rgb(250, 251, 251);
    color: #007bff;
    text-decoration: none;
    border: 2px solid #007bff; /* Fix: set full border */
    border-radius: 10px;
    font-weight: 400;
    transition: background-color 0.3s, color 0.3s;
    margin-right: 10px;
}


    .back-btn:hover {
        background-color: #0056b3;
    }

</style>
