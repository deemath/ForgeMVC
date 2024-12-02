<?php
require_once "navigationbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/chatbox.css">
</head>
<body>
    <div class="container">
        <div class="header">Chat Box</div>
        <div class="content">
            <div class="chat">
                <!-- Message from another user -->
                <div class="message">
                    <div class="avatar"></div>
                    <div class="name">Member 1</div>
                    <div class="content">
                        This is a sample message from another user. It gives you an idea of how messages appear in the chatbox.
                    </div>
                </div>

                <!-- Message from the user -->
                <div class="message blue">
                    <div class="content">
                        This is a response message from the user. It is highlighted in blue to indicate it's from you.
                    </div>
                    <div class="avatar"></div>
                    <div class="name">You</div>
                </div>
            </div>

            <!-- Members Section -->
            <div class="members">
                <div class="member">
                    <div class="avatar"></div>
                    <div class="info">
                        <div class="name">John Doe</div>
                        <div class="email">john@example.com</div>
                    </div>
                </div>
                <div class="member">
                    <div class="avatar"></div>
                    <div class="info">
                        <div class="name">Jane Smith</div>
                        <div class="email">jane@example.com</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <input type="text" placeholder="Type a message...">
            <button>Send <i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</body>
</html>
