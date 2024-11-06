<?php
include('API/conn.php');
$username = "";
$password = "";
$error = "";

session_start(); // Bắt đầu session ở đầu file

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        $error = "Please enter your username!";
    }
    else if(empty($password)){
        $error = "Please enter your password!";
    }
    else{
        if (login($username,$password)) {
            // Đăng nhập thành công, thiết lập session
            $_SESSION['username'] = $username;

            // Kiểm tra xem có đường dẫn redirect trong session không
            if (isset($_SESSION['redirect_url'])) {
                $redirectUrl = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']); // Xóa khỏi session
                header("Location: $redirectUrl"); // Chuyển hướng đến URL đã lưu
            } else {
                header("Location: index.php"); // Chuyển hướng đến trang chủ nếu không có URL đã lưu
            }
            exit(); // Dừng script sau khi chuyển hướng
        } else {
            // Đăng nhập thất bại, hiển thị thông báo lỗi
            $error = "Invalid username or password!";
        }
    }
}

// Kiểm tra xem có tham số redirect trong URL không và lưu vào session
if (isset($_GET['redirect'])) {
    $_SESSION['redirect_url'] = $_GET['redirect'];
}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Movie Login Form</title>
	<style type="text/css">
		body {
			background-color: #F4F8FB;
			font-family: Arial, sans-serif;
		}
		.container {
			margin: 50px auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #ccc;
			width: 400px;
		}
		h1 {
			text-align: center;
			color: #5A98D6;
		}
		label {
			display: block;
			margin: 10px 0;
			color: #636363;
    	}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 16px;
		}
		button {
			background-color: #5A98D6;
			color: #fff;
			padding: 12px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			width: 100%;
		}
		button:hover {
			background-color: #3D71B3;
		}
		.error-message {
			color: #5A98D6;
			font-size: 14px;
			margin-top: 10px;
		}
        .register{
            margin-top:10px;
            color: #5A98D6;
            text-align:right;
			font-size: 14px;
        }

		
        .register a{
            top: 0;
            transition: top linear 0.2s;
            cursor: pointer;
            position: relative;
            font-weight: bold;
            text-decoration: underline;
        }
        .register a:hover{
            top:-2px;
            padding:5px;
        }
	</style>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form method="post" action="login.php">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Enter your username" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter your password" required>
			<button type="submit">Login</button>
			<?php
            if(!empty($error)){
                ?>
				<p class="error-message"> <?= $error; ?></p>
                <?php
            }
			?>
            <div class="register">Do not have account? Click here <a href="register.php">Register</a></div>
		</form>
	</div>
</body>
</html>
