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

            <h2 style="margin-bottom: 30px;">Thêm mới đơn vị</h2>
                <table>
                    <tr>
                        <td>Tên đơn vị:</td>
                        <td>
                            <input style=" width: 200px;"type="text" name="txtOrganization" placeholder="Điền tên đơn vị">
                        </td>
                    </tr>

                    <tr>
                        <td>Địa chỉ:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtAddress" placeholder="Điền Địa chỉ">
                        </td>
                    </tr>

                    <tr>
                        <td>SDT đơn vị:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtPhone" placeholder="Điền Số điện thoại">
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 200px;">Email đơn vị:</td>
                        <td >
                            <input style="margin-top: 20px; width: 200px;" type="email" name="txtEmail" placeholder="Điền email đơn vị">
                        </td>
                    </tr>

                    <tr>
                        <td>Website:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtWebsite" placeholder="Điền link Website">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>ID trực thuộc:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtIdcha" placeholder="Điền ID">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input style="margin-top: 30px;" type="submit" name="btnAddUser" value="Lưu thông tin đơn vị" class="btn btn-success">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php
                if(isset($_POST['btnAddUser'])){
                    $organization   = $_POST['txtOrganization'];
                    $diachi     = $_POST['txtAddress'];
                    $sdt        = $_POST['txtPhone'];
                    $email      = $_POST['txtEmail'];
                    $website    = $_POST['txtWebsite'];
                    $cha        = $_POST['txtIdcha'];

                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Bước 02: Thực hiện truy vấn
                    $sql = "INSERT INTO tbl_coquan (tendonvi, diachi, sdt, email_coquan, website, id_cha)
                            VALUES ('$organization', '$diachi','$sdt',' $email', '$website', '$cha')";
                    // echo $sql;
                    // $result = mysqli_query($conn,$sql);
                    if(mysqli_query($conn,$sql)){
                        echo '<script>window.location.replace("organization-management.php")</script>';
                    }
                }

            ?>
    </main>
</div>
<?php
    include("templates/footer.php");
?>
   
