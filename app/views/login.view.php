
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Forge</title>
    <link href="<?=ROOT?>/assets/css/login.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
       
        <h1>Forge</h1>
        <h2>Student Project Management System</h2>
        <form id="loginForm" action="<?=ROOT?>/Login/Login" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (!empty($data)) : ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error)
                                 echo htmlspecialchars($error) . "<br>";
                            ?>
                            
                            
                            <!-- <php print_r( $data) ?> -->
                        </div> 
            <?php endif; ?>
            <button type="submit">Login</button>
            <div class="footer">
                <p><a href="#">Forgot Password?</a></p>
                <p>Don't have an account? <a href="#">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>
</html>

