<?php
    require_once "navigationBar.php";
?>

<head>
    <meta charset="UTF-8">
    <title>All Projects - Forge</title>
    <style>
        .bb {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f9;
            margin: 0;
            padding: 2rem;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
        }

        .table-wrapper {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            overflow-x: auto;
            padding: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #e6e6e6;
        }

        th {
            background-color: #f0f4f8;
            color: #555;
        }

        tr:hover {
            background-color: #f9fbfd;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 1rem;
            padding: 8px 16px;
            background-color: #007BFF;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        .project-title {
            font-weight: bold;
            color: #333;
        }

        .project-desc {
            color: #555;
            font-size: 0.95rem;
        }
    </style>
</head>
<div class="bb">

    <div class="table-wrapper">
        <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">← Back to Dashboard</a>
        <h2>All Projects</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Title</th>
                    <th>Description</th>
                    <th>Coordinator ID</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($projects)) : ?>
                    <?php foreach ($projects as $project) : ?>
                        <tr>
                            <td><?= $project->id ?></td>
                            <td class="project-title"><?= htmlspecialchars($project->title) ?></td>
                            <td class="project-desc"><?= htmlspecialchars(substr($project->description, 0, 100)) ?><?= strlen($project->description) > 100 ? '...' : '' ?></td>
                            <td><?= $project->coordinatorid ?></td>
                            <td><?= $project->createdat ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No projects found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
