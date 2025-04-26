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
            <div class="chat" id="chat-container"v>
                <!-- Message from another user -->

                <?php if(isset($data['messages'])): ?>
                    <?php foreach($data['messages'] as $message): ?>
                        <!-- Debugging to check the message user ID -->
                        <?php echo "<!-- Message User ID: {$message->userid}, Logged-in User ID: {$_SESSION['user_id']} -->"; ?>
                        
                        <?php if($message->userid == $_SESSION['user_id']): ?>
                            <div class="message blue sender">
                            <div class="sender name">You</div>
                                <div class="sender content">
                                    <?= htmlspecialchars($message->message, ENT_QUOTES, 'UTF-8') ?> 
                                </div>
                                <div class="avatar"></div>
                               
                            </div>
                        <?php endif; ?>
                        <?php if($message->userid != $_SESSION['user_id']): ?>
                            <div class="message receiver">
                                <div class="avatar"></div>
                                <div class="receiver name">Member 1</div>
                                <div class="receiver content">
                                    <?= htmlspecialchars($message->message, ENT_QUOTES, 'UTF-8') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>


                <!-- Message from the user -->
                
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
        <form action="sendMessage" method="post">
            <input type="text" placeholder="Type a message..." name="messagetext" required>
            <button type="submit">Send <i class="fas fa-paper-plane"></i></button>
        </form>

        </div>
    </div>
    <script>
        // Scroll to the bottom of the chat container
        window.onload = function() {
            var chatContainer = document.getElementById('chat-container');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        };
    </script>
</body>
</html>
