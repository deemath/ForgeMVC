

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Interface</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .logout-container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
            border: 1px solid #e0e0e0;
        }

        .logout-icon {
            width: 60px;
            height: 60px;
            background-color: #2a75ff;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-icon svg {
            width: 30px;
            height: 30px;
            fill: #ffffff;
        }

        h2 {
            color: #1a237e;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        p {
            color: #455a64;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .btn {
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-logout {
            background-color: #2a75ff;
            color: #ffffff;
        }

        .btn-logout:hover {
            background-color: #1a4db3;
            transform: translateY(-1px);
        }

        .btn-cancel {
            background-color: transparent;
            border: 2px solid #2a75ff;
            color: #2a75ff;
        }

        .btn-cancel:hover {
            background-color: #f0f5ff;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logout-icon">
            <svg viewBox="0 0 24 24">
                <path d="M16 17v-3H9v-4h7V7l5 5-5 5M14 2a2 2 0 0 1 2 2v2h-2V4H5v16h9v-2h2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9z"/>
            </svg>
        </div>
        <h2>Log Out</h2>
        <p>Are you sure you want to log out? Any unsaved changes might be lost.</p>
        <div class="button-group">
            <button class="btn btn-logout" onclick="performLogout()">Log Out</button>
            <button class="btn btn-cancel" onclick="cancelLogout()">Cancel</button>
        </div>
    </div>

    <script>
        function performLogout() {
            // Add your logout logic here
            alert('Logging out...');
            window.location.href = 'http://localhost/testmvc/public/logout';
        }

        function cancelLogout() {
            // Add cancel logic or redirect back
            window.history.back();
        }
    </script>
</body>
</html>