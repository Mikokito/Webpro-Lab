<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $en_pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $result = $db->prepare($sql);
    $result->execute([$username, $en_pass]);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS $username (
        id_task INT AUTO_INCREMENT PRIMARY KEY,
        task VARCHAR(255) NOT NULL,
        done enum('not yet started','in progress','done','') NOT NULL DEFAULT 'not yet started'
    )";
    $db->exec($createTableQuery);

    header('Location: login.php');
}
?>
