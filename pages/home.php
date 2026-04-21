
<?php
session_start();
if (isset($_POST['todo'])) {
      if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }
      $tasks = $_SESSION['tasks'];
         $task = $_POST['todo'];
             $tasks[] = $task;
               $_SESSION['tasks'] = $tasks;
               header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="form-todo">
        <h1>Todo list</h1>

<form  method="post" >
    <input type="text"   class="form-control" name="todo" placeholder="Add a new task...">
    <button type="submit" class="btn">To create  </button>
    </div>
<?php if (!empty($_SESSION['tasks'])): ?>
    <ul>
        <?php foreach ($_SESSION['tasks'] as $task): ?>
           
<li>
    <div class="task-content">
        <span class="circle"></span>
        <span><?= htmlspecialchars($task) ?></span>
    </div>

    <i class="fa-solid fa-trash delete-icon"></i>
</li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>مفيش tasks لحد دلوقتي</p>
<?php endif; ?>
</form>


</body>
</html>