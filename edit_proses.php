<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    echo "You don't have access to this page";
    header("Location: edit.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_task']; 
    $task = $_POST['task'];
    $status = $_POST['done']; 

    $dsn = "mysql:host=localhost;dbname=notion";

    try {
        $kunci = new PDO($dsn, "root", "");
        $kunci->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE ".$_SESSION['username']." SET task = ?, done = ? WHERE id_task = ?";
        $stmt = $kunci->prepare($sql);
        $stmt->bindParam(1, $task);
        $stmt->bindParam(2, $status);
        $stmt->bindParam(3, $id);
        $stmt->execute();

        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
