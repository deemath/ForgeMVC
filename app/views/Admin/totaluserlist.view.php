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

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .back-btn {
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .back-btn:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .button-group {
        display: flex;
        gap: 10px;
    }

    .filter-btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .filter-btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .containerT{
        max-width: 1200px;
        margin: auto;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        padding: 2rem;
        margin-top: 20px;
        overflow-x: auto;
    }

    h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 1rem;
        border-bottom: 2px solid #e0e0e0;
        padding-bottom: 0.5rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        font-size: 0.95rem;
        color: #444;
    }

    thead {
        background-color: #eaf6f6;
    }

    th, td {
        padding: 14px 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    tr:nth-child(even) {
        background-color: #fafafa;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="bb">

<div class="header">
    <a href="<?= ROOT ?>/Admin/dashboard" class="back-btn">← Back to Dashboard</a>
    <div class="button-group">
        <button onclick="showAllUsers()" class="filter-btn">All Users</button>
        <button onclick="showCoordinator()" class="filter-btn">Coordinator</button>
        <button onclick="showUsers()" class="filter-btn">User</button>
    </div>
</div>

<!-- Coordinator Table -->
<div class="containerT" id="coordinatortable" style="display: none;">
    <h2>Coordinators List</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Institute</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['coordinators'])): ?>
                <?php foreach ($data['coordinators'] as $coordinator): ?>
                    <tr>
                        <td><?= $coordinator->id ?></td>
                        <td><?= htmlspecialchars($coordinator->name ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($coordinator->email ?? 'N/A') ?></td>
                        <td><?= $coordinator->institute ?? '—' ?></td>
                        <td><?= $coordinator->role ?? '' ?></td>
                        <td><?= isset($coordinator->status) && $coordinator->status == 1 ? 'Deactivated' : 'Active' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Regular Users Table -->
<div class="containerT" id="usertable" style="display: none;">
    <h2>All Registered Regular Users List</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Institute</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['users'])): ?>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= htmlspecialchars($user->name ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($user->email ?? 'N/A') ?></td>
                        <td><?= $user->institute ?? '—' ?></td>
                        <td><?= $user->role ?? '' ?></td>
                        <td><?= isset($user->status) && $user->status == 1 ? 'Deactivated' : 'Active' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- All Users Table -->
<div class="containerT" id="allusertable" style="display: block;">
    <h2>All Users List</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Institute</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['coordinators'])): ?>
                <?php foreach ($data['coordinators'] as $coordinator): ?>
                    <tr>
                        <td><?= $coordinator->id ?></td>
                        <td><?= htmlspecialchars($coordinator->name ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($coordinator->email ?? 'N/A') ?></td>
                        <td><?= $coordinator->institute ?? '—' ?></td>
                        <td><?= $coordinator->role ?? '' ?></td>
                        <td><?= isset($coordinator->status) && $coordinator->status == 1 ? 'Deactivated' : 'Active' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($data['users'])): ?>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= htmlspecialchars($user->name ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($user->email ?? 'N/A') ?></td>
                        <td><?= $user->institute ?? '—' ?></td>
                        <td><?= $user->role ?? '' ?></td>
                        <td><?= isset($user->status) && $user->status == 1 ? 'Deactivated' : 'Active' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>


<script>
function showCoordinator() {
    document.getElementById('coordinatortable').style.display = "block";
    document.getElementById('usertable').style.display = "none";
    document.getElementById('allusertable').style.display = "none";
}

function showUsers() {
    document.getElementById('coordinatortable').style.display = "none";
    document.getElementById('usertable').style.display = "block";
    document.getElementById('allusertable').style.display = "none";
}

function showAllUsers() {
    document.getElementById('coordinatortable').style.display = "none";
    document.getElementById('usertable').style.display = "none";
    document.getElementById('allusertable').style.display = "block";
}
</script>
