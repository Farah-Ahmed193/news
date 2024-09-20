
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cross-Site Scripting (XSS)</title>
</head>
<body>
    <h1>Cross-Site Scripting (XSS) Example</h1>
    <form method="GET">
        <label for="name">Enter your name:</label>
        <input type="text" name="name" id="name" />
        <button type="submit">Submit</button>
    </form>

    <p>
        <?php
        if (isset($_GET['name'])) {
            // Vulnerable to XSS attack
            echo "Hello, " . $_GET['name'] . "!";
        }
        ?>
    </p>
</body>
</html>
