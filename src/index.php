<?php
// الاتصال بقاعدة بيانات SQLite
$conn = new PDO('sqlite:/tmp/news_site.db');

// استرجاع الأخبار من قاعدة البيانات
$news = $conn->query("SELECT * FROM news ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Site</title>
</head>
<body>
    <h1>Latest News</h1>
    
    <a href="add_news.php">Add News</a>
    
    <?php foreach ($news as $article): ?>
        <h2><a href="view_news.php?id=<?php echo $article['id']; ?>"><?php echo htmlspecialchars($article['title']); ?></a></h2>
        <p><?php echo htmlspecialchars(substr($article['content'], 0, 100)); ?>...</p>
        <hr>
    <?php endforeach; ?>
</body>
</html>
