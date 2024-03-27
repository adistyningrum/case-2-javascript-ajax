<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Define valid username-password combinations
    $validCredentials = array(
        array('jeongwoo', 'jongu'),
        array('jay', 'jayjay')
    );

    // Check if username and password match any valid combination
    $validLogin = false;
    foreach ($validCredentials as $credential) {
        if ($username === $credential[0] && $password === $credential[1]) {
            $validLogin = true;
            break;
        }
    }

    // Redirect to users.php if login is successful
    if ($validLogin) {
        header('Location: chat.php');
        exit;
    } else {
        // Display error message if login fails
        $error = "Invalid username or password!";
    }
}
?>
