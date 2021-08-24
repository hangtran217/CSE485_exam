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

            <form method="POST" action="">

            <h2 style="margin-bottom: 30px;">Thêm mới cán bộ</h2>
                <table>
                    <tr>
                        <td>Họ và tên:</td>
                        <td>
                            <input style=" width: 200px;"type="text" name="txtFullName" placeholder="Điền họ và tên">
                        </td>
                    </tr>

                    <tr>
                        <td>Mã đơn vị:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtIdDonvi" placeholder="Điền Mã đơn vị">
                        </td>
                    </tr>

                    <tr>
                        <td>Chức vụ:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtChucvu" placeholder="Điền Chức vụ">
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 200px;">Số máy cơ quan:</td>
                        <td >
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtDTCoquan" placeholder="Điền số điện thoại cơ quan">
                        </td>
                    </tr>

                    <tr>
                        <td>Số máy di động:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtDidong" placeholder="Điền số điện thoại di động">
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="email" name="txtEmail" placeholder="Điền Email">
                        </td>
                    </tr>
                    <tr>
                        <td>Đường dẫn ảnh:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtImage" placeholder="/image/hangtl.png">
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input style="margin-top: 30px;" type="submit" name="btnAddUser" value="Lưu thông tin cán bộ" class="btn btn-success">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php
                if(isset($_POST['btnAddUser'])){
                    $fullName   = $_POST['txtFullName'];
                    $iddonvi    = $_POST['txtIdDonvi'];
                    $chucvu     = $_POST['txtChucvu'];
                    $dtcoquan   = $_POST['txtDTCoquan'];
                    $email      = $_POST['txtEmail'];
                    $didong     = $_POST['txtDidong'];
                    $anh        = $_POST['txtImage'];

                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Bước 02: Thực hiện truy vấn
                    $sql = "INSERT INTO tbl_user (hoten, id_coquan, chucvu, dtcoquan, email, dtdidong, image)
                            VALUES ('$fullName', '$iddonvi', '$chucvu','$dtcoquan',' $email', '$didong', '$anh')";
                    // echo $sql;
                    // $result = mysqli_query($conn,$sql);
                    if(mysqli_query($conn,$sql)){
                        echo '<script>window.location.replace("users-management.php")</script>';
                    }
                }

            ?>
    </main>
</div>
<?php
    include("templates/footer.php");
?>
   
