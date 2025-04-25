<?php require_once "navigationBar.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-wrapper {
            /* width: 2000px; */
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .top-left {
            display: flex;
            align-items: center;
        }

        .top-left img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 25px;
            border: 3px solid #d1d5db;
        }

        .top-left .info h2 {
            font-size: 1.8rem;
            margin: 0;
            color: #111827;
        }

        .top-left .info p {
            font-size: 1.05rem;
            color: #374151;
            margin-top: 8px;
        }

        .status-badge {
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            color: white;
        }

        .status-active {
            background-color: #10b981;
        }

        .status-disabled {
            background-color: #ef4444;
        }

        .divider {
            border-top: 2px solid #e5e7eb;
            margin: 30px 0;
        }

        .bottom-section {
            display: flex;
            gap: 40px;
        }

        .info-box {
            flex: 1;
            background-color: #f9fafb;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .info-box h3 {
            font-size: 1.4rem;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            color: #111827;
        }

        .info-box p {
            font-size: 1.05rem;
            margin: 10px 0;
            color: #374151;
        }

        .info-box p strong {
            color: #111827;
        }

        .project-title {
            background-color: #e5e7eb;
            padding: 10px 14px;
            border-radius: 6px;
            margin: 8px 0;
            font-size: 0.95rem;
            color: #111827;
        }

    .active-btn, .disable-btn {
        padding: 0.6rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .active-btn {
        background-color: #10b981; /* Tailwind emerald-500 */
        color: white;
    }

    .active-btn:hover {
        background-color: #059669; /* emerald-600 */
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .disable-btn {
        background-color: #ef4444; /* Tailwind red-500 */
        color: white;
    }

    .disable-btn:hover {
        background-color: #dc2626; /* red-600 */
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    </style>
</head>

<div class="main-wrapper">
    <?php if (isset($data['coordata'])) : ?>
        <?php $coordinator = $data['coordata']; ?>

        <!-- Top Section -->
        <div class="top-section">
            <div class="top-left">
                <?php if (!empty($coordinator->image)) : ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($coordinator->image) ?>" alt="<?= htmlspecialchars($coordinator->name) ?>">
                <?php else : ?>
                    <img src="<?= ROOT ?>/assets/img/default-avatar.png" alt="Default Avatar">
                <?php endif; ?>

                <div class="info">
                    <h2><?= htmlspecialchars($coordinator->name) ?></h2>
                    <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($coordinator->email) ?></p>
                </div>
            </div>

            <div>
         
                    

            <form method="POST" action="<?= ROOT ?>/Admin/<?= $data['coordata']->status == 1 ? 'disableCoordinator' : 'activeCoordinator' ?>">
                <!-- <input type="hidden" name="id" value="<?= $data['coordata']->id ?>"> -->
                <?php if ($data['coordata']->status == 1): ?>
                    <button type="submit" class="active-btn">Disable</button>
                <?php else: ?>
                    <button type="submit" class="disable-btn">Activate</button>
                <?php endif; ?>
            </form>


            </div>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Bottom Section -->
        <div class="bottom-section">
            <div class="info-box">
                <h3>Coordinator Details</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($coordinator->name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($coordinator->email) ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($coordinator->phone) ?></p>
                <p><strong>Institute:</strong> <?= htmlspecialchars($coordinator->institute) ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($coordinator->address) ?></p>
            </div>

            <div class="info-box">
                <h3>Assigned Projects</h3>
                <p><strong>Total:</strong> <?= $data['coordinatorprojectCount'][0]->count ?? 0 ?></p>
                <?php if (!empty($data['assignedProjects'])) : ?>
                    <?php foreach ($data['assignedProjects'] as $project) : ?>
                        <div class="project-title"><?= htmlspecialchars($project->title) ?></div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No assigned projects.</p>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>
</div>
