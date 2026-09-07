<?php
require __DIR__ . '/inc/bootstrap.php';
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS rate_limits (
        bucket_key CHAR(64) PRIMARY KEY,
        attempts INT UNSIGNED NOT NULL DEFAULT 0,
        window_started_at DATETIME NOT NULL,
        blocked_until DATETIME NULL,
        updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
    echo "Table rate_limits checked/created.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
