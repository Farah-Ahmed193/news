<?php
session_start();
$conn = new PDO('sqlite:/var/www/html/db/news_site.db');

// إنشاء جدول المستخدمين إذا لم يكن موجودًا
$conn->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL,
    password TEXT NOT NULL
)");

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Vulnerable to broken authentication
    $username = $_POST['username'];
    $password = $_POST['password'];

    // عدم وجود حماية مناسبة في المصادقة
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result && $result->fetch()) {
        $_SESSION['loggedin'] = true;
        echo "Logged in successfully!";
    } else {
        echo "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
