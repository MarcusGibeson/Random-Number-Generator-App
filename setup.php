<?php
require_once __DIR__ . 'includes/dbh.inc.php';
try {
    $result = $pdo->query("SHOW TABLES LIKE 'rolls'");

    if ($result->rowCount() == 0) {
        $sql = file_get_contents(__DIR__ . '/database/d20_rolls.sql');
        $pdo-> exec($sql);
        echo "Database imported successfully!";
    } else {
        echo "Database already exists.";
    }
} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}