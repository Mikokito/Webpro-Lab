<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['user_id'])) {
    echo "You don't have access to this page";
    header("Location: login.php");
    exit;
}

try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

$task = isset($_POST['task']) ? $_POST['task'] : '';

if (!empty($task)) {
    $sql = "INSERT INTO " . $_SESSION['username'] . " (task) VALUES (:task)";

    $statement = $db->prepare($sql);

    $statement->bindParam(':task', $task, PDO::PARAM_STR);

    try {
        $statement->execute();
        echo "Data berhasil disimpan ke database.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Data tidak boleh kosong.";
}

header("Location: index.php");
?>
