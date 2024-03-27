<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Chat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="index.js" defer></script>
</head>
<body>

<div class="chatbox">
        <div class="pop-up">
            <p> X </p>
        </div>
    <div class="wrapper">
        <section class="form Login">
            <header>Realtime Chat</header>
            <!-- Formulir menggunakan PHP -->
            <form method="post" action="chat.php">
                <div class="name-details">
                    <div class="field input">
                        <label>Username</label>
                        <!-- Menambahkan atribut 'name' untuk setiap input -->
                        <input type="text" placeholder="Username" name="username">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter your password" name="password" id="password">
                        <!-- Tambahkan ikon mata -->
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </div>                    
                    <div class="field button">
                        <input type="submit" value="Continue to chat" name="hasil">
                    </div>
                </div>
            </form>
            <div class="link">Not yet signed up? Sign up</div>
        </section>
    </div>
</body>
</html>
