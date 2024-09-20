<?php
// Start the session at the very beginning of the file
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Broken Authentication</title>
</head>
<body>
    <h1>Login Page (Broken Authentication)</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" /><br />
        <label>Password:</label>
        <input type="password" name="password" /><br />
        <button type="submit">Login</button>
    </form>

    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // No session management or security
        $_SESSION['loggedin'] = true;
        echo "Logged in without session protection!";
    }
    ?>
</body>
</html>
