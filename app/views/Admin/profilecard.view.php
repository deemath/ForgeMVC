<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 1.5rem;
            width: 100%;
            max-width: 64rem;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .profile {
            display: flex;
            align-items: center;
        }
        .profile img {
            border-radius: 50%;
            margin-right: 1rem;
        }
        .profile h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0;
        }
        .profile p {
            color: #4b5563;
            margin: 0;
        }
        .profile p i {
            margin-right: 0.5rem;
        }
        .disable-btn {
            background-color: #ef4444;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        @media (min-width: 768px) {
            .grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        .card {
            background-color: #f3f4f6;
            padding: 1rem;
            border-radius: 0.5rem;
        }
        .card h3 {
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .card p {
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <div class="container">
   
        <div class="header">
            <div class="profile">
                <img src="https://placehold.co/100x100" alt="Profile picture placeholder" width="100" height="100">
                <div>
                    <h2>John Doe</h2>
                    <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
                </div>
            </div>
            <button class="disable-btn">Disable</button>
        </div>
        <div class="grid">
            <div class="card">
                <h3>Coordinator Details</h3>
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Email:</strong> john.doe@example.com</p>
                <p><strong>Phone:</strong> (123) 456-7890</p>
            </div>
            <div class="card">
                <h3>Number of Projects Assigned</h3>
                <p>5</p>
                <p>Project Alpha: Website Redesign</p>
                <p>Project Beta: Mobile App Development</p>
                <p>Project Gamma: Marketing Campaign</p>
                <p>Project Delta: Data Migration</p>
                <p>Project Epsilon: Cloud Integration</p>
            </div>
            <div class="card">
                <h3>Upcoming Meetings</h3>
                <p>Meeting with Team A on 10/12/2023</p>
                <p>Meeting with Client X on 10/15/2023</p>
            </div>
            <div class="card">
                <h3>Scheduled Meetings</h3>
                <p>Weekly Sync on 10/05/2023</p>
                <p>Monthly Review on 10/25/2023</p>
                <p>Strategy Meeting on 10/30/2023</p>
            </div>
        </div>
    </div>
</body>
</html>