<?php
// الاتصال بقاعدة بيانات SQLite
$conn = new PDO('sqlite:/tmp/news_site.db');

// ثغرة SQL Injection: استخدام المتغير مباشرة في الاستعلام بدون استخدام استعلامات مهيأة
$id = $_GET['id'];
$article = $conn->query("SELECT * FROM news WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $article['title']; ?></title>
</head>
<body>
    <h1><?php echo $article['title']; ?></h1>
    <p><?php echo $article['content']; ?></p>
    
    <!-- ثغرة XSS: عرض البيانات بدون تنظيف -->
    <p>Category: <?php echo $article['category']; ?></p>
    
    <hr>
    <a href="index.php">Back to News List</a>
</body>
</html>
