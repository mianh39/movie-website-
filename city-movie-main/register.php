<?php
    include('API/conn.php');
    $username = "";
    $password = "";
    $password1 = "";
    $email = "";
    $error = "";
    $success ="";
    session_start(); // Bắt đầu session ở đầu file
  if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password1']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    

    if(empty($username)){
        $error = "Please enter your username!";
    }
    else if(empty($password)){
        $error = "Please enter your password!";
    }
    else if(empty($email)){
      $error = "Please enter your email!";
    }
    else if($password != $password1){
      $error = "Password does not match!";
    }
    if(signup($username, $email, $password, $password1)){
      $success = "Register successfully!";
      $_SESSION['username'] = $username;
    }else{
      $error = "Register failed! Username or email already exists.";
    }
   }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Form đăng ký</title>
  <style>
    body {
      background-color: #F4F8FB;
			font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
			color: #5A98D6;
    }
    .container {
      margin: 50px auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #ccc;
			width: 400px;
    }
    label {
			display: block;
			margin: 10px 0;
			color: #636363;
    	}
    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 16px;
    }
    input[type="submit"] {
      background-color: #5A98D6;
			color: #fff;
			padding: 12px 20px;
			margin: 20px 0 10px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			width: 100%;
    }
    input[type="submit"]:hover {
      background-color: #3D71B3;
    }
    .error-message {
			color: #5A98D6;
			font-size: 14px;
			margin-top: 10px;
		}
  </style>
</head>
<body>
    <div class="container">
      <h1>Register</h1>
      <form action="register.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <label for="password">Confirm Password</label>
        <input type="password" id="password" name="password1" placeholder="Confirm your password" required>
        <input type="submit" value="Okey">
        <?php
            if(!empty($error)){
              ?>
				    <p class="error-message"> <?= $error; ?></p>
              <?php
            }else if(!empty($success)){ ?>
            <p class="error-message"> <?= $success; ?> <a href="index.php">Go to main page</a></p> 
              <?php
            }
			  ?>
      </form>
    </div>
</body>
</html>
