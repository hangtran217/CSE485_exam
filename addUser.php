<?php
    // We need to use sessions, so you should always start sessions using the below code.
    include('connection.php');
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit;
    }
    include("templates/header.php");
?>
    <div id="main-main" class="container-fluid" >
        <main>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Họ và tên</td>
                        <td>
                            <input type="text" name="txtFullName" placeholder="Điền họ và tên">
                        </td>
                    </tr>
                    <tr>
                        <td>Mã chức vụ</td>
                        <td>
                            <input type="text" name="txtChucvu" placeholder="Điền Mã chức vụ">
                        </td>
                    </tr>
                    <tr>
                        <td>Mã Bộ môn</td>
                        <td>
                            <input type="text" name="txtBomon" placeholder="Điền Mã bộ môn">
                        </td>
                    </tr>
                    <tr>
                        <td>Số máy cơ quan</td>
                        <td>
                            <input type="text" name="txtCoquan" placeholder="Điền số điện thoại cơ quan">
                        </td>
                    </tr>
                    <tr>
                        <td>Điền Email</td>
                        <td>
                            <input type="email" name="txtEmail" placeholder="Điền Email">
                        </td>
                    </tr>
                    <tr>
                        <td>Số máy di động</td>
                        <td>
                            <input type="text" name="txtDidong" placeholder="Điền số điện thoại di động">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="btnAddUser" value="Save" class="btn btn-success">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php
                if(isset($_POST['btnAddUser'])){
                    $fullName   = $_POST['txtFullName'];
                    $chucvu   = $_POST['txtChucvu'];
                    $coquan      = $_POST['txtCoquan'];
                    $email   = $_POST['txtEmail'];
                    $didong      = $_POST['txtDidong'];
                    $bomon = $_POST['txtBomon'];

                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Bước 02: Thực hiện truy vấn
                    $sql = "INSERT INTO tbl_user (hoten, id_chucvu, id_bomon, dtcoquan, email, dtdidong)
                            VALUES ('$fullName','$chucvu','$bomon','$coquan',' $email', '$didong')";
                    // echo $sql;
                    // $result = mysqli_query($conn,$sql);
                    
                    // $count=mysqli_num_rows($result);
                    if(mysqli_query($conn,$sql)){
                        header('location:../exam/users-management.php');
                    }
                    
                }

            ?>
        </main>
    </div>
    <?php
    include("templates/footer.php");
?>
   
