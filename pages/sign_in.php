
<?php
session_start();

$name = "";
$email = "";
$password = "";
$confirmPassword = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
  $email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword =$_POST['confirmPassword'];

if(empty($email) || empty($password) || empty($name) || empty($confirmPassword)){
   $error = "Please fill all fields";
}
  elseif($password !== $confirmPassword){
     $error = "Passwords do not match";
  }
  else{

     $file = "../assets/DATE/DATE.JSON";

     $users = json_decode(file_get_contents($file), true);

     if(!$users){
        $users = [];
     }

     // 🔥 ندي ID جديد
     $id = count($users) + 1;

     // 🔥 نضيف المستخدم
     $users[] = [
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "password" => $password
     ];

     // 🔥 نحفظ
     file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

     header("Location: login_in.php");
     exit();
  }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
        <link rel="stylesheet" href="../assets/sign_in.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
      <div class="todo">
<div  class="form-todo">
       <div  class="header">

 <h1>Zync System</h1>
      <div class="line"></div>

       </div>       
<h2>SIGN IN</h2>
<p>Enter your credentials to access your account</p>   


</div>

<form action="" method="POST">
  <input   class="form-control" type="text" name="name" placeholder="Username" required>
  <input class="form-control" type="text" name="email" placeholder="Email" required>
  <div class="form-group">  <input    class="form-password"  type="password" name="password" placeholder="Password" required>
  <input class="form-password" type="password" name="confirm_password" placeholder="Confirm Password" required></div>

  <button  class="btn" name="sign_in" type="submit">Sign In</button>
  <div>
<span>Forgot your password?</span>
<span class="form-text"> Reset Password</span>
  </div>
</form>
</div>
</body>
</html>