<html lang="en">
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .settings-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        .settings-section:hover {
            transform: scale(1.01);
        }
        .settings-title {
            font-size: 24px;
            margin-bottom: 30px;
            margin-top: 80px;
            color: #1e3a8a;
            text-align: center;
        }
        .settings-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .settings-section {
            transition: transform 0.3s ease;
            background-color: #e6f0ff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        .settings-section h3 {
            margin-bottom: 15px;
            color: #1e3a8a;
        }

        .settings-section label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 500;
        }

        .settings-section input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .save-btn {
            margin-top: 15px;
            background-color: #1e3a8a;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .save-btn:hover {
            background-color: #3356c1;
        }

        .flash-message {
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: bold;
            animation: fadein 0.5s ease-in-out;
            position: relative;
            z-index: 999;
        }
        .flash-message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .flash-message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @keyframes fadeout {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        .fade-out {
            animation: fadeout 1s forwards;
        }
    </style>
</head>

<?php require_once 'navbar.php'; ?>



<div class="settings-container">
    <h2 class="settings-title">Settings</h2>
    <div class="settings-grid">
        <div class="settings-section">
            <h3>Profile</h3>
            <form method="POST" enctype="multipart/form-data" action="<?=ROOT?>/Coordinator/updateProfile">
                <input type="hidden" name="id" value="<?= $_SESSION['coordinator_id'] ?>">
                
                <label for="image">Profile Image</label>
                <?php if(!empty($data[0]->image)): ?>
                    <img src="<?=ROOT?>/public/upload/profile_images/<?= htmlspecialchars($data[0]->image) ?>" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 10px;">
                <?php elseif (!empty($_SESSION['coordinator_image'])): ?>
                    <img src="<?= ROOT ?>/public/upload/profile_images/<?= htmlspecialchars($_SESSION['coordinator_image']) ?>" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 10px;">
                <?php else: ?>
                    <img src="<?= ROOT ?>/public/assets/images/profileplaceholder.jpg" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 10px;">
                <?php endif; ?>
                <input type="file" name="image" accept="image/*">

                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="name" value="<?= $data[0]->name ?? '' ?>" />

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $data[0]->email ?? '' ?>" />

                <button class="save-btn">Save Changes</button>
            </form>
        </div>

        <?php if (!empty($flash)): ?>
    <div class="flash-message <?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php elseif (!empty($_SESSION['flash'])): ?>
    <div class="flash-message <?= htmlspecialchars($_SESSION['flash']['type']) ?>">
        <?= htmlspecialchars($_SESSION['flash']['message']) ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

        <div class="settings-section">
            <h3>Change Password</h3>
            <form method="POST" action="<?=ROOT?>/Coordinator/updatePassword">
                <input type="hidden" name="id" value="<?= $_SESSION['coordinator_id'] ?>">

                <label for="currentPassword">Current Password</label>
                <input type="password" id="currentPassword" name="currentPassword"/>

                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="newPassword"/>

                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword"/>

                <button class="save-btn">Update Password</button>
            </form>
        </div>  
    </div>
</div>

<script>
    setTimeout(() => {
        const flash = document.querySelector('.flash-message');
        if (flash) {
            flash.classList.add('fade-out');
            setTimeout(() => flash.remove(), 1000);
        }
    }, 2000);
</script>

</body>
</html>





