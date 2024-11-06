<?php
    session_start();
    $username_add = "";
    $password = "";
    $error = "";

    if (isset($_POST['username_add']) && isset($_POST['password'])) {
        $username_add = $_POST['username_add'];
        $password = $_POST['password'];

        if(empty($username_add)){
            $error = "Please enter your username_add!";
        }
        else if(empty($password)){
            $error = "Please enter your password!";
        }
        else{
					// Kết nối tới cơ sở dữ liệu

			// Lấy thông tin từ biểu mẫu đăng nhập
			$username_add = $_POST['username_add'];
			$password = $_POST['password'];

            $result = 0;
			// Lấy kết quả truy vấn
            if($username_add == 'admin' && $password == '123456'){

                $result = 1;
            }

			if ($result == 1) {
				// Đăng nhập thành công, chuyển hướng đến trang chủ hoặc trang người dùng
				header("Location: add_film.php");
			} else {
				// Đăng nhập thất bại, hiển thị thông báo lỗi
				$error = "Invalid username or password!";
			}


        }
		
    }
    $_SESSION['username_add'] = $username_add;

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Movie Admin Login Form</title>
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
	<!-- A container div for the login form -->
	<div class="container">
		<!-- A header for the login form -->
		<h1>ADMIN LOGIN</h1>
		<!-- A form for the login -->
		<form method="post" action="">
			<!-- A label and input field for the username -->
			<label for="username_add">Username</label>
			<input type="text" id="username_add" name="username_add" placeholder="Enter admin username" required>
			<!-- A label and input field for the password -->
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter admin password" required>
			<!-- A button to submit the form -->
			<button type="submit">Login</button>
			<!-- A PHP code to show an error message if there is any -->
			<?php
            if(!empty($error)){
                ?>
				<p class="error-message"> <?= $error; ?></p>
                <?php
            }
			?>
		</form>
	</div>
</body>

</html>
