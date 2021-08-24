<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>

		<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Form đăng nhập</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Tên đăng nhập:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mật khẩu:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="col col form-group">
                                <label for="remember-me" class="text-info"><span>Lưu thông tin tài khoản</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" style="margin-left: 40%;" value="Đăng nhập">
                            </div>
                            <div id="register-link" class="col col text-right">
                                <a href="#" class="text-info">Chưa có tài khoản. Đăng ký ngay!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
