<?php
session_start();
//require_once('db.php');
if (!isset($_SESSION['username']) &&
    !isset($_SESSION['id'])){
    echo "You don't have access to this page";
    header("Location: login.php");}

$id = $_GET['id_task'];
$dsn = "mysql:host=localhost;dbname=notion";
$kunci = new PDO($dsn, "root", "");

$sql = "SELECT task, done FROM ". $_SESSION['username'] ." WHERE id_task = ?";

$stmt = $kunci->prepare($sql);
$data = [$id];
$stmt->execute($data);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$task = $row['task'];
$status = $row['done'];

$kunci = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary"  data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php echo $_SESSION['username'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                <a class="nav-link" href="about.php">About Us</a>
                <a class="nav-link" href="logout.php">Logout</a>
            </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="mt-4 mb-3"><b>Edit Task</b></h2>
        <form action="edit_proses.php" method="post">
            <input type="hidden" name="id_task" placeholder="id_task" value="<?= $id ?>"/>
            <input type="text" name="task" placeholder="task" value="<?= $task ?>" style="border: 2px solid #716bb0; border-radius: 4px; padding: 4px; padding-left: 10px; width: 100%; box-shadow: 4px 5px 5px #c2bfe7;"/><br/><br/>
            <select name="done" style="border: 2px solid #716bb0; border-radius: 4px; padding: 4px; width: 100%; box-shadow: 4px 5px 5px #c2bfe7;" require>
                <option value="not yet started">Not yet started</option>
                <option value="in progress">In progress</option>
                <option value="done">Done</option>
            </select><br/><br/>
            <button type="submit" style="padding: 1px 10px; border-radius: 4px; background-color: #867fd0; border: 4px solid #867fd0; color: white; box-shadow: 4px 5px 5px #c2bfe7;">Edit</button>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>