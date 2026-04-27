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
  <input   class="form-control" type="text" name="username" placeholder="Username" required>
  <input class="form-control" type="text" name="email" placeholder="Email" required>
  <div class="form-group">  <input    class="form-password"  type="password" name="password" placeholder="Password" required>
  <input class="form-password" type="password" name="confirm_password" placeholder="Confirm Password" required></div>

  <button  class="btn"  type="submit">Sign In</button>
  <div>
<span>Forgot your password?</span>
<span class="form-text"> Reset Password</span>
  </div>
</form>
</div>
</body>
</html>