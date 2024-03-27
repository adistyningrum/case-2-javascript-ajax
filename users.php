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
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="img.jpg" alt=""> 
                    <div class="details">
                        <span>Park Jeongwoo</span>
                        <p>Active now</p>
                    </div>
                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <div class="search">
                <form action="#" method="get">
                <form action="#" method="get">
                    <input type="text" name="search" placeholder="Enter name to search...">
                    <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="user-list">
                <?php
                $users = array(
                    array("name" => "Jay Park", "message" => "This is test message"),
                    array("name" => "Jungwon", "message" => "This is test message"),
                    array("name" => "Sunoo", "message" => "This is test message"),
                    array("name" => "Heeseung", "message" => "This is test message")
                );

                // Display user list
                foreach ($users as $user) {
                    echo '<a href="#">';
                    echo '<div class="content">';
                    echo '<img src="img.jpg" alt="">';
                    echo '<div class="details">';
                    echo '<span>' . $user["name"] . '</span>';
                    echo '<p>' . $user["message"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="status-dot"><i class="fas fa-circle"></i></div>';
                    echo '</a>';
                }
                ?>
            </div>
        </section>
    </div>
    <script src="redirect.js" defer></script>
</body>
</html>
