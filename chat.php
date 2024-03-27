<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<?php
if (isset($_POST['hasil'])){
            $nama = $_POST['username'];
            $password = $_POST['password'];
}
?>

<div class="chatbox">
        <div class="pop-up">
            <p> X </p>
        </div>

    <div class="wrapper">
        <section class="chat-area">
        <header>
            <a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <div class="content">
                <img src="img.jpg" alt=""> 
                <div class="details">
                    <span id="username"><?php echo $nama; ?></span>
                    <p>Active now</p>
                </div>
            </div>
            
        </header>

            <div class="chat-box" id="chatBox">
                <!-- Chat messages will be displayed here -->
            </div>
            <form id="messageForm" class="typing-area">
                <input type="text" id="messageInput" placeholder="Type a message here...">
                <button type="submit"><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    
    

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include JavaScript file -->
    <script src="script.js"></script>

</body>
</html>
