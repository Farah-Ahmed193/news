<?php
// الاتصال بقاعدة بيانات SQLite
$conn = new PDO('sqlite:/tmp/news_site.db');

// عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    
    // إضافة بيانات بدون تحقق، ثغرة "Sensitive Data Exposure"
    $conn->exec("INSERT INTO news (title, content, category) VALUES ('$title', '$content', '$category')");
    
    // إعادة توجيه إلى الصفحة الرئيسية
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add News</title>
</head>
<body>
    <h1>Add a News Article</h1>
    
    <form method="POST">
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="content">Content:</label><br>
        <textarea name="content" id="content" required></textarea><br><br>
        
        <label for="category">Category:</label><br>
        <input type="text" name="category" id="category" required><br><br>

        <button type="submit">Add News</button>
    </form>
</body>
</html>
