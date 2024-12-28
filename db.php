<?php
//db.php
//DB Credentials
define('DSN', 'mysql:host=localhost;dbname=notion');
define('DBUSER', 'root');
define('DBPASS', '');

$db = new PDO(DSN, DBUSER, DBPASS);
$dsn = mysqli_connect("localhost", "root", "", "notion");
