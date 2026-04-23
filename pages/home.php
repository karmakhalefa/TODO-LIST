
<?php
session_start();
if (isset($_POST['todo'])) {
      if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }
     if (empty($_POST['todo'])) {
header('Location: ' . $_SERVER['PHP_SELF']); exit();
     }
      $tasks = $_SESSION['tasks'];
         $task = $_POST['todo'];
             $tasks[] = $task;
               $_SESSION['tasks'] = $tasks;
               header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
if (isset($_POST['delete'])) {
    $index = $_POST['delete'];

    if (isset($_SESSION['tasks'][$index])) {
        unset($_SESSION['tasks'][$index]);
    }

    // نعيد ترتيب الarray
    $_SESSION['tasks'] = array_values($_SESSION['tasks']);

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

 if (isset($_POST['checkbox'])) {

    $index = $_POST['checkbox'];

    if(!isset($_SESSION['checked'])){
        $_SESSION['checked'] = [];
    }

    if(isset($_SESSION['checked'][$index])){
        unset($_SESSION['checked'][$index]);
    }else{
        $_SESSION['checked'][$index] = true;
    }

    header('Location: '.$_SERVER['PHP_SELF']);
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
<!-- دي لاضافه -->
<form  method="post" >
    <input type="text"   class="form-control" name="todo" placeholder="Add a new task...">
    <button type="submit" class="btn">To create</button>
    </div>
    </form>
    <div class="text">  
           <div class="num">
        <span class="created">Tasks created</span>
        <span class="created_number"><?= count($_SESSION['tasks'] ?? []) ?></span>
    </div>
 <div class="nums">
    <span class="Completed">Completed</span>
    <span class="Completed_number"><?= count($_SESSION['checked'] ?? []) ?> de <span ><?= count($_SESSION['tasks'] ?? []) ?></span></span>
</div>

</div>

    

<?php if (!empty($_SESSION['tasks'])): ?>
    <ul>
<?php foreach ($_SESSION['tasks'] as $index => $task): ?>
<li>
 
   <!-- ده للعلامه -->
  <form method="post"  style="display:inline;">

<button type="submit"
        name="checkbox"
        value="<?= $index ?>"
        class="circle <?= isset($_SESSION['checked'][$index]) ? 'active' : '' ?>">
</button>
    </form>

        <span class="task-text">
   <?= htmlspecialchars($task) ?>
</span>
<!-- دي للحذف -->
    <form method="post" style="display:inline;">
        <button type="submit" name="delete" value="<?= $index ?>" class="delete-btn">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</li>
<?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>مفيش tasks لحد دلوقتي</p>
<?php endif; ?>



</body>
</html>