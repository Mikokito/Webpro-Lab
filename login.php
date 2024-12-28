<?php
session_start();
require_once('db.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user
        WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        echo "User not found";
    }else{
        echo "USERNAME ada di database<br/>";
        echo "Password yang diinput di form login: ".$password;
        echo "<br/>Password yang tersimpan di database: ".$row['password'];
        if(!password_verify($password,$row['password'])){
            echo "Wrong password";
        }else{
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('location: index.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elgato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary"  data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="login.php">Home</a>
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
            <a class="nav-link" href="register.php">Signup</a>
            <a class="nav-link" href="about.php">About Us</a>
        </div>
        </div>
    </div>
    </nav>
    <div class="container">
        <h1 class="mt-4 mb-3">Login</h1>
        <form action="login.php" method="post">
            <input class="form-control" type="text" name="username" placeholder="Username" style="border: 2px solid #716bb0; border-radius: 4px; padding: 4px; padding-left: 10px; width: 100%; box-shadow: 4px 5px 5px #c2bfe7;"/><br/>
            <input class="form-control" type="password" name="password" placeholder="Password" style="border: 2px solid #716bb0; border-radius: 4px; padding: 4px; padding-left: 10px; width: 100%; box-shadow: 4px 5px 5px #c2bfe7;"/><br/>
            <button class="btn btn-dark mb-3" type="submit" style="padding: 1px 10px; border-radius: 4px; background-color: #867fd0; border: 4px solid #867fd0; color: white; box-shadow: 4px 5px 5px #c2bfe7;">Login</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>
</html>