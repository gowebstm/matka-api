<?php
require('database/config.php');

try {
    // SQL statements to create tables
    $sql1 = "CREATE TABLE IF NOT EXISTS market_list (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        open_time TIME,
        close_time TIME,
        status ENUM('0', '1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
    )";

    $sql2 = "CREATE TABLE IF NOT EXISTS market_result (
        id INT AUTO_INCREMENT PRIMARY KEY,
        game_id INT,
        open_patti VARCHAR(3),
        open_sd VARCHAR(1),
        open_update_time TIME,
        close_patti VARCHAR(3),
        close_sd VARCHAR(1),
        close_update_time TIME,
        jodi VARCHAR(5),
        date DATE,
        FOREIGN KEY (game_id) REFERENCES market_list(id) ON DELETE CASCADE ON UPDATE CASCADE
    )";

    $db->exec($sql1);
    $db->exec($sql2);

    echo "Tables created successfully.";
} catch (PDOException $e) {
    echo "Error creating tables: " . $e->getMessage();
}
?>