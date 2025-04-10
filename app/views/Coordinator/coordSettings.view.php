<?php require_once 'navbar.php'; ?>

<div class="settings-container">
    <h2 class="settings-title">Settings</h2>
    <div class="settings-grid">
        <div class="settings-section">
            <h3>Profile</h3>
            <form method="POST" action="<?=ROOT?>/Coordinator/updateProfile">
                <input type="hidden" name="id" value="<?= $_SESSION['coordinator_id'] ?>">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="name" value="<?= $data[0]->name ?? '' ?>" />

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $data[0]->email ?? '' ?>" />

                <button class="save-btn">Save Changes</button>
            </form>
        </div>

        <div class="settings-section">
            <h3>Change Password</h3>
            <label for="currentPassword">Current Password</label>
            <input type="password" id="currentPassword" />

            <label for="newPassword">New Password</label>
            <input type="password" id="newPassword" />

            <label for="confirmPassword">Confirm New Password</label>
            <input type="password" id="confirmPassword" />

            <button class="save-btn">Update Password</button>
        </div>  
    </div>
</div>
</body>
</html>





