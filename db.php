<?php
/**
 * اتصال PDO به MySQL
 * اگر db.php فعلی شما کار می‌کند، آن را جایگزین نکنید؛ فقط مطمئن شوید
 * متغیر اتصال نامش $pdo است و همین گزینه‌های PDO را دارد.
 */
$host = 'localhost';
$dbname = 'construction_accounts';
$username = 'root';
$password = ''; // رمز واقعی MySQL خود را در صورت نیاز وارد کنید.

try {
    $pdo = new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('اتصال به دیتابیس برقرار نشد. تنظیمات db.php را بررسی کنید.');
}
