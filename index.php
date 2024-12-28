<?php 
session_start();
require_once('db.php');
$errors = "";

if (!isset($_SESSION['username']) &&
    !isset($_SESSION['user_id'])){
    echo "You don't have access to this page";
    header("Location: login.php");}

if (isset($_POST['submit'])) {
    if (empty($_POST['task'])) {
        $errors = "You must fill in the task";
    }else{
        $task = $_POST['task'];
        $sql = "INSERT INTO ". $_SESSION['username'] ." (task) VALUES ('$task')";
        mysqli_query($dsn, $sql);
        header('location: index.php');
    }
}

if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];

    mysqli_query($dsn, "DELETE FROM ". $_SESSION['username'] ." WHERE id_task=".$id);
    header('location: index.php');
}
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php echo $_SESSION['username'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                <a class="nav-link" href="about.php">About Us</a>
                <a class="nav-link" href="logout.php">Logout</a>
            </div>
            </div>
        </div>
    </nav>
    <div class="container">
      <div class="heading mt-4 mb-4">
          <h2 style="font-style: 'Hervetica';"><b>ToDo List Application</b></h2>
      </div>
      <form method="post" action="index.php" class="input_form">
      <?php if (isset($errors)) { ?>
          <p style="color: red;"><?php echo $errors; ?></p>
      <?php } ?>
          <input type="text" name="task" style="border: 2px solid #716bb0; border-radius: 4px; padding: 4px; padding-left: 8px; width: 35%; box-shadow: 4px 5px 5px #c2bfe7;">
          <button type="submit" name="submit" id="add_btn" style="border-radius: 4px; background-color: #867fd0; border: 4px solid #867fd0; color: white; margin-left: 5px; box-shadow: 4px 5px 5px #c2bfe7;">Add Task</button>
      </form>
      <table border="1" class="table table-striped mt-4" style="box-shadow: 6px 8px 5px #c2bfe7;">
          <thead>
              <tr>
                  <th style="background-color: #c2bfe7;">Tasks</th>
                  <th style="width: 70px; background-color: #c2bfe7;">Edit</th>
                  <th style="width: 60px; background-color: #c2bfe7;">Done</th>
                  <th style="width: 15%; background-color: #c2bfe7;">Progress</th>
              </tr>
          </thead>
          <tbody>
              <?php 
              $data = mysqli_query($dsn, "SELECT * FROM ". $_SESSION['username']);

              $i = 1; while ($row = mysqli_fetch_array($data)) { ?>
                  <tr>
                      <td class="task"> <?php echo $row['task']; ?> </td>
                      <td class="edit">  
                        <a href="edit.php?id_task=<?= $row['id_task'] ?>">
                          <button class="btn btn-secondary mb-3">Edit</button>
                        </a>
                      </td>
                      <td class="delete" style="text-align: center;"> 
                          <a href="index.php?del_task=<?php echo $row['id_task'] ?>"><button type="button" style="padding: 10px 10px; border-width: 1px; border-style: solid;"></button></a> 
                      </td>
                      <td class="progess">
                          <select class="form-control" name="done" require>
                                <?php if($row['done']=="not yet started"){ ?>
                              <option value="not yet started">Not yet started</option>
                              <option value="in progress">In progress</option>
                              <option value="done">Done</option>
                                <?php }elseif($row['done']=="in progress"){?>
                              <option value="in progress">In progress</option>
                              <option value="not yet started">Not yet started</option>
                              <option value="done">Done</option>
                                <?php }else{?>
                              <option value="done">Done</option>
                              <option value="not yet started">Not yet started</option>
                              <option value="in progress">In progress</option>
                                <?php }?>
                          </select>
                      </td>
                  </tr>
              <?php $i++; } ?>  
          </tbody>
      </table>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>