<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login" name="submit">
				<ul class="nav">
		            <li class="nav-item"><a href="http://localhost/exam/register.php" class="nav-link active" aria-current="page">Chưa có tài khoản. Đăng ký ngay!</a></li>
		            <li class="nav-item"><a href="http://localhost/exam/forgotpassword.php" class="nav-link">Quên mật khẩu?</a></li>
		        </ul>
			</form>

		</div>

   <?php  
		session_start();
		include("connection.php");
	   	if ( !isset($_POST['username'], $_POST['password']) ) {
		// Could not get the data that should have been sent.
		exit('');
		}

		// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
		if ($stmt = $conn->prepare('SELECT id_admin, password FROM tbl_admin WHERE username = ?')) {
			// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
			$stmt->bind_param('s', $_POST['username']);
			$stmt->execute();
			// Store the result so we can check if the account exists in the database.
			$stmt->store_result();
			if ($stmt->num_rows > 0) {
			$stmt->bind_result($id, $password);
			$stmt->fetch();
			// Account exists, now we verify the password.
			// Note: remember to use password_hash in your registration file to store the hashed passwords.
			if ($_POST['password'] === $password) {
				// Verification success! User has logged-in!
				// Khởi tạo sessions, ta biết được user đã đăng nhập, nó hoạt động như cookies nhưng lưu dữ liệu trên server.
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE; //Tạo SESSION, nếu kết quả trả về là TRUE thì đã log in
				$_SESSION['name'] = $_POST['username'];
				$_SESSION['id'] = $id;
				header('Location:'.SITEURL.'/admin/index.php');
			} else {
				// Incorrect password
				echo '<script>alert("Incorrect username and/or password!")</script>';
			}
		} else {
			// Incorrect username
			echo '<script>alert("Incorrect username and/or password!")</script>';
		}

			$stmt->close();
		}
   ?>
	</body>
</html>
