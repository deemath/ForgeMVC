
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Forge</title>
    <link href="<?=ROOT?>/assets/css/login.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 370px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .switch-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .switch-buttons button {
            flex: 1;
            margin: 0 5px;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #e0e0e0;
            transition: background-color 0.3s;
        }

        .switch-buttons button.active {
            background-color: #4facfe;
            color: white;
        }

        form {
            display: none;
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #4facfe;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4facfe;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #00f2fe;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .footer a {
            color: #4facfe;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 14px;
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forge</h1>
        <h2>Student Project Management System</h2>

        <!-- Switch Buttons -->
        <div class="switch-buttons">
            <button id="btnUser" onclick="showForm('user')" class="active">Regular User</button>
            <button id="btnCoord" onclick="showForm('coordinator')">Coordinator</button>
        </div>

        <!-- User Login Form -->
        <form id="formUser" action="<?=ROOT?>/Login/Login" method="post">
            <input type="hidden" name="role" value="user">
            <div class="form-group">
                <label for="usernameUser">Username</label>
                <input type="text" id="usernameUser" name="username" required>
            </div>
            <div class="form-group">
                <label for="passwordUser">Password</label>
                <input type="password" id="passwordUser" name="password" required>
            </div>
            <?php if (!empty($data) && $_POST['role'] === 'user') : ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error) echo htmlspecialchars($error) . "<br>"; ?>
                </div> 
            <?php endif; ?>
            <button type="submit">Login</button>
            <div class="footer">
                <p><a href="#">Forgot Password?</a></p>
                <p>Don't have an account? <a href="#">Sign Up</a></p>
            </div>
        </form>

        <!-- Coordinator Login Form -->
        <form id="formCoord" action="<?=ROOT?>/Login/Login" method="post">
            <input type="hidden" name="role" value="coordinator">
            <div class="form-group">
                <label for="usernameCoord">Username</label>
                <input type="text" id="usernameCoord" name="username" required>
            </div>
            <div class="form-group">
                <label for="passwordCoord">Password</label>
                <input type="password" id="passwordCoord" name="password" required>
            </div>
            <?php if (!empty($data['errors']) && $_POST['role'] ?? '' === 'coordinator') : ?>
                <div class="alert alert-danger">
                    <?php foreach($data['errors'] as $error): ?>
                    <?= htmlspecialchars($error) . "<br>"; ?>
                    <?php endforeach; ?>
                </div> 
            <?php endif; ?>
            <button type="submit">Login</button>
            <div class="footer">
                <p><a href="#">Forgot Password?</a></p>
                <p>Don't have an account? <a href="#">Sign Up</a></p>
            </div>
        </form>
    </div>

    <script>
        function showForm(role) {
            document.getElementById('formUser').style.display = (role === 'user') ? 'block' : 'none';
            document.getElementById('formCoord').style.display = (role === 'coordinator') ? 'block' : 'none';
            document.getElementById('btnUser').classList.toggle('active', role === 'user');
            document.getElementById('btnCoord').classList.toggle('active', role === 'coordinator');
        }

        // Default: show user form
        showForm('coordinator');
    </script>
</body>
</html>


