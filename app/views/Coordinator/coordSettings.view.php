<?php require_once 'navbar.php'; ?>

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
</body>
</html>





