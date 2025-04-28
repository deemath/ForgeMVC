<?php
    require_once "navigationBar.php";
?>
<head>
    <meta charset="UTF-8">
    <title>Active Coordinators</title>
    <style>
        .bb {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f9;
            margin: 0;
            padding: 2rem;
            color: #333;
            width:75%;
          
        }

        .containerA {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 1.5rem;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #d8f3dc;
            font-weight: 600;
            color: #333;
            font-size: 1rem;
        }

        td {
            color: #555;
            font-size: 0.95rem;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .back-btn {
            background-color: #28a745;
            display: inline-block;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            border-radius: 6px;
            text-decoration: none;
            margin-bottom: 2rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .status {
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
            background-color: #28a745;
        }

        .status.inactive {
            background-color: #dc3545;
        }

        .status.pending {
            background-color: #ffc107;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            table {
                font-size: 0.85rem;
            }

            .back-btn {
                padding: 10px 16px;
            }
        }
    </style>
</head>

<div class="bb">

<div class="containerA">

    <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">← Back to Dashboard</a>
    <h2>All Active Coordinators</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Institute</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['cordinators'])) : ?>
                <?php foreach ($data['cordinators'] as $coor) : ?>
                    <tr>
                        <td><?= $coor->id ?></td>
                        <td><?= htmlspecialchars($coor->name) ?></td>
                        <td><?= htmlspecialchars($coor->email) ?></td>
                        <td><?= htmlspecialchars($coor->institute_name ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($coor->contact ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($coor->address ?? 'N/A') ?></td>
                        <td><span class="status">Active</span></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">No active coordinators found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</div>
