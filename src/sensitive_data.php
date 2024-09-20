
<!-- src/sensitive_data.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sensitive Data Exposure</title>
</head>
<body>
    <h1>Credit Card Information (Sensitive Data Exposure)</h1>
    <form method="POST">
        <label>Credit Card Number:</label>
        <input type="text" name="cc_number" /><br />
        <label>Expiration Date:</label>
        <input type="text" name="cc_expiry" /><br />
        <button type="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['cc_number']) && isset($_POST['cc_expiry'])) {
        // No encryption, storing sensitive data as plain text
        echo "Credit Card Number: " . $_POST['cc_number'] . "<br />";
        echo "Expiration Date: " . $_POST['cc_expiry'] . "<br />";
    }
    ?>
</body>
</html>