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
    //ob_start();
?>

<!-- GET dữ liệu cán bộ theo id -->
    <?php 
        $id     = $_GET['myid'];
        $sql    = "SELECT * from tbl_coquan where id_coquan={$id}";
        $query  = mysqli_query($conn,$sql);
        $row    = mysqli_fetch_assoc($query);
    ?>


            <form method="POST" action="">

            <h2 style="margin-bottom: 30px;">Sửa thông tin cơ quan</h2>
                <table>
                    <tr>
                        <td>Tên đơn vị:</td>
                        <td>
                            <input style=" width: 200px;"type="text" name="txtOrganization" value="<?php echo $row['tendonvi']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Địa chỉ:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtAddress" value="<?php echo $row['diachi']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>SDT đơn vị:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtPhone" value="<?php echo $row['sdt']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 200px;">Email đơn vị:</td>
                        <td >
                            <input style="margin-top: 20px; width: 200px;" type="email" name="txtEmail" value="<?php echo $row['email_coquan']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Website:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtWebsite" value="<?php echo $row['website']; ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>ID trực thuộc:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtIdcha"  value="<?php echo $row['id_cha']; ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input style="margin-top: 30px;" type="submit" name="btnEditOrganization" value="Lưu thông tin đơn vị" class="btn btn-success">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php
                if(isset($_POST['btnEditOrganization'])){
                    $txtOrganization    = $_POST['txtOrganization'];
                    $txtAddress         = $_POST['txtAddress'];
                    $txtPhone           = $_POST['txtPhone'];
                    $txtEmail           = $_POST['txtEmail'];
                    $txtWebsite         = $_POST['txtWebsite'];
                    $txtIdcha           = $_POST['txtIdcha'];
                   // alert("1");có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Kiểm tra: Dữ liệu người dùng nhập 
                    //Bước 02: Thực hiện truy vấn

                    $sql = "UPDATE tbl_coquan SET tendonvi = '$txtOrganization', diachi = '$txtAddress', sdt = '$txtPhone', email_coquan = '$txtEmail', website ='$txtWebsite', id_cha = '$txtIdcha'
                            WHERE id_coquan = '$id'";
                    if(mysqli_query($conn,$sql)){
                        //echo '<script>alert("Incorrect username and/or password!")</script>';
                         echo '<script>window.location.replace("organization-management.php")</script>';
                        //header('location:../admin/users-management.php');
                    }
                }
            ?>
    </main>
</div>
<?php
    include("templates/footer.php");
    //ob_end_flush();
?>
   
