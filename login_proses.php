<?php
session_start();
require_once('db.php');

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
