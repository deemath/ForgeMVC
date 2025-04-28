<?php
    require_once "navigationBar.php";
?>
<head>
    <meta charset="UTF-8">
    <title>Deactivated Coordinators</title>
    <style>
        .bb {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f9;
            margin: 0;
            padding: 2rem;
            width:75%;
        }
        .containerD {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            overflow-x: auto;
            padding: 2rem;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #ffc9c9;
        }
        tr:hover {
            background-color: #ffeaea;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 1rem;
            transition: background-color 0.2s ease;
        }
        .back-btn:hover {
            background-color: #bd2130;
        }

        .status {
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
            background-color:rgb(238, 66, 8);
        }

        .status.inactive {
            background-color: #dc3545;
        }

        .status.pending {
            background-color: #ffc107;
        }
    </style>
</head>
<div class="bb">
    <div class="containerD">
        <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">Back to Dashboard</a>
        <h2>Deactivated Coordinators</h2>
        <table>
            <thead>
                <tr>
                    <th>Coordinator ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Institute</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($coordinators)) : ?>
                    <?php foreach ($coordinators as $coordinator) : ?>
                        <tr>
                            <td><?= htmlspecialchars($coordinator->id) ?></td>
                            <td><?= htmlspecialchars($coordinator->name) ?></td>
                            <td><?= htmlspecialchars($coordinator->email) ?></td>
                            <td><?= htmlspecialchars($coordinator->institute) ?></td>
                            <td><span class="status">Deactivated</span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No deactivated coordinators found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

