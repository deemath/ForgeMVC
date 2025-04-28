<?php require_once "navigationBar.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        /* --- Styles moved here (same as you wrote) --- */
        body {
            margin: 0;
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
        }
        .main-wrapper {
            max-width: 1200px;
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }
        .top-left {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        .top-left img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 25px;
            border: 4px solid #e2e8f0;
        }
        .info h2 {
            font-size: 1.9rem;
            margin: 0;
            color: #1e293b;
        }
        .info p {
            font-size: 1.1rem;
            color: #4b5563;
            margin-top: 8px;
        }
        .divider {
            border-top: 2px solid #e2e8f0;
            margin: 30px 0;
        }
        .bottom-section {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }
        .info-box {
            flex: 1;
            background-color: #f9fafb;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            min-width: 280px;
        }
        .info-box h3 {
            font-size: 1.5rem;
            margin-bottom: 18px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e5e7eb;
            color: #1e293b;
        }
        .info-box p {
            font-size: 1.05rem;
            margin: 12px 0;
            color: #374151;
        }
        .info-box p strong {
            font-weight: 600;
            color: #111827;
        }
        .back-btn {
            display: inline-block;
            margin-top: 2rem;
            padding: 10px 20px;
            background-color: rgb(247, 247, 248);
            border: 2px solid #007bff;
            color: #007bff;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .prj-remove-btn{
            display: inline-block;
            margin-top: 2rem;
            padding: 10px 20px;
            background-color: rgb(247, 247, 248);
            border: 2px solid rgb(226, 13, 13);
            color:rgb(222, 26, 26);
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(213, 36, 36, 0.15);
            border-color: #0056b3;
            color: white;
        }

        .prj-remove-btn:hover{
            background-color:rgb(222, 26, 26);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            border-color:rgb(222, 26, 26);
            color: white;
        }
        @media (max-width: 768px) {
            .top-section { flex-direction: column; align-items: flex-start; }
            .top-left { margin-bottom: 20px; }
            .bottom-section { flex-direction: column; }
        }
        /* Modal styles */
        .prj-modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .prj-modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            width: 400px;
            text-align: left;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .prj-modal-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }
        .warning-icon {
            font-size: 24px;
            color: #dc3545;
            margin-right: 10px;
        }
        .prj-modal-header h3 {
            font-size: 18px;
            color: #333;
            margin: 0;
        }
        .modal-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }
        .bold { font-weight: bold; }
        .error-text { color: #dc3545; font-size: 10px; }
        .note-text { color: #ffc107; font-size: 10px; }
        .prj-modal-buttons {
            display: flex;
            justify-content: space-around;
        }
        .prj-yes-btn, .prj-no-btn {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .prj-yes-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }
        .prj-yes-btn:hover {
            background-color: #c82333;
        }
        .prj-no-btn {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }
        .prj-no-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>

<div class="main-wrapper">
    <?php if (isset($data['user'])): ?>
        <?php $user = $data['user']; ?>

        <!-- Top Section -->
        <div class="top-section">
            <div class="top-left">
                <?php if (!empty($user->image)): ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($user->image) ?>" alt="<?= htmlspecialchars($user->name) ?>">
                <?php else: ?>
                    <img src="<?= ROOT ?>/assets/img/default-avatar.png" alt="Default Avatar">
                <?php endif; ?>

                <div class="info">
                    <h2><?= htmlspecialchars($user->name) ?></h2>
                    <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($user->email) ?></p>
                </div>
            </div>

            <div>
                <button class="prj-remove-btn" onclick="confirmDelete('<?= htmlspecialchars($user->id) ?>', '<?= htmlspecialchars($user->name) ?>')">Remove</button>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete-modal" class="prj-modal">
            <div class="prj-modal-content">
                <div class="prj-modal-header">
                    <span class="warning-icon">&#9888;</span>
                    <h3>Delete Confirmation</h3>
                </div>
                <p class="modal-description">
                    Are you sure you want to delete <span class="bold" id="delete-name">[Item Name]</span>?
                    <br><br><br>
                    <span class="error-text">This action cannot be undone. Deleting this will permanently remove it from the system.</span>
                    <br>
                    <span class="note-text">Warning: This may cause issues if the user is actively involved in ongoing projects. Please proceed with caution.</span>
                </p>
                <div class="prj-modal-buttons">
                    <form action="<?= ROOT ?>/Admin/deleteUser" method="post">
                        <input type="hidden" id="edit-id" name="id">
                        <button class="prj-yes-btn" type="submit">Yes, Delete</button>
                        <button type="button" class="prj-no-btn" onclick="closeModal()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- Bottom Section -->
        <div class="bottom-section">
            <div class="info-box">
                <h3>User Details</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($user->name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user->email) ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($user->phone) ?></p>
                <p><strong>Joined On:</strong> <?= htmlspecialchars(date('F j, Y', strtotime($user->createdat))) ?></p>
            </div>

            <div class="info-box">
                <h3>Other Info</h3>
                <p><strong>Status:</strong> <?= $user->status == 1 ? "Active" : "Deactivated" ?></p>
                <p><strong>Joined On:</strong> <?= htmlspecialchars(date('F j, Y', strtotime($user->createdat))) ?></p>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">← Back to Dashboard</a>
        <a href="<?= ROOT ?>/Admin/otheruserlist" class="back-btn">← Back to Users</a>

    <?php endif; ?>
</div>

<script>
function confirmDelete(id, name = "this user") {
    document.getElementById('delete-name').textContent = name;
    document.getElementById('edit-id').value = id;
    document.getElementById('delete-modal').style.display = 'flex';
}
function closeModal() {
    document.getElementById('delete-modal').style.display = 'none';
}
</script>

</body>
