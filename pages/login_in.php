
<?php
session_start();
$email = "";
$password = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)){
   $error = "Please fill all fields";
}
else{

   $users = json_decode(file_get_contents("users.json"), true);

   $found = false;

   foreach($users as $user){

      if(
         $user["email"] === $email &&
         $user["password"] === $password
      ){
         $found = true;
         break;
      }

   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login in </title>
       <link rel="stylesheet" href="../assets/login.css">
</head>
<body>
    <div class="todo">
<div  class="form-todo">
       <div  class="header">

 <h1>Zync System</h1>
      <div class="line"></div>

       </div>       
<h2> Log In</h2>
<p>Enter your credentials to access your account</p>   
</div>

<form action=""  method="POST">
    <p>Email</p>
<input type="text" name="email" placeholder="Confirm email">
<p>password</p>
<input type="password"  name="password" placeholder="Confirm Password">
  <button  class="btn"  type="submit">Log In </button>
    <div class="text">
<span>Forgot your password?</span>
<span class="form-text"> Reset Password</span>
  </div>
</form>
</div>
</body>
</html>