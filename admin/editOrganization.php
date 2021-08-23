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
    ob_start();
?>

<!-- GET dữ liệu cán bộ theo id -->
    <?php 
        $id     = $_GET['myid'];
        $sql    = "SELECT * from tbl_user where id_user={$id}";
        $query  = mysqli_query($conn,$sql);
        $row    = mysqli_fetch_assoc($query);
    ?>


            <form method="POST" action="">

            <h2 style="margin-bottom: 30px;">Sửa thông tin cán bộ</h2>
                <table>
                    <tr>
                        <td>Họ và tên:</td>
                        <td>
                            <input style=" width: 200px;"type="text" name="txtHoten" value="<?php echo $row['hoten']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Mã đơn vị:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtIdDonvi" value="<?php echo $row['id_coquan']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Chức vụ:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtChucvu" value="<?php echo $row['chucvu']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px;">Số máy cơ quan:</td>
                        <td >
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtDTCoquan" value="<?php echo $row['dtcoquan']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Số máy di động:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="text" name="txtDidong" value="<?php echo $row['dtdidong']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input style="margin-top: 20px; width: 200px;" type="email" name="txtEmail" value="<?php echo $row['email']; ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input style="margin-top: 30px;" type="submit" name="btnEditUser" value="Lưu thông tin cán bộ" class="btn btn-success">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php

                if(isset($_POST['btnAddUser'])){
                    

                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Bước 02: Thực hiện truy vấn
                    $sql = "UPDATE tbl_user SET hoten = '".$_POST['txtHoten']."', id_coquan = '".$_POST['txtIdDonvi']."' chucvu = '".$_POST['txtChucvu']."', dtcoquan = '".$_POST['txtDTCoquan']."', email = '".$_POST['txtEmail']."', dtdidong = '".$_POST['txtDidong']."' 
                            WHERE id_user = '$id'";

                    // echo $sql;
                    // $result = mysqli_query($conn,$sql);
                    mysqli_close($conn);

               
                    
                    
                    
                }

            ?>
    </main>
</div>
<?php
    include("templates/footer.php");
    ob_end_flush();
?>
   
