<?php
// الاتصال بقاعدة بيانات SQLite
$conn = new PDO('sqlite:/tmp/news_site.db');

// إنشاء جدول الأخبار إذا لم يكن موجودًا
$conn->exec("CREATE TABLE IF NOT EXISTS news (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    category TEXT NOT NULL,
    created_at TEXT DEFAULT CURRENT_TIMESTAMP
)");

echo "Database and table setup completed!";
?>
