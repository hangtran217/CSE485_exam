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
    <div id="main-main" class="container-fluid" style="padding: 0;">
        <main>
            <h2 class="d-flex justify-content-center">Quản lý cán bộ</h2>
            <div style="margin-left: 46%;">
                <form action="" method="post" style="margin-left: -3%; margin-bottom: 20px;">
                    <input type="text" name="search">
                    <?php  
                        if(isset($_GET['search'])){
                            echo $_GET["search"];
                        }

                    ?>
                    <input type="submit" name="submit" value="Search">

                </form>
                <a href="addUser.php" class="btn btn-success" style = "margin-bottom: 20px;">Thêm cán bộ</a>
            </div>
            <div class="row main-content" style="margin-left: 10%; margin-right: 10%;">
            <table class="table table-bordered ">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" style="width: 30px; overflow: hidden; text-align: center;">#</th>
                    <th scope="col" style="width: 100px; overflow: hidden; text-align: center;">Họ và tên</th>
                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Khoa</th>
                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Bộ Môn</th>
                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Chức vụ</th>
                    <th scope="col" style="width: 70px; overflow: hidden; text-align: center;">Điện thoại cơ quan</th>
                    <th scope="col" style="width: 50px;  text-align: center;">Điện thoại di động</th>
                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Sửa thông tin</th>
                    <th scope="col" style="width: 10px;  text-align: center;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Lặp lấy dữ liệu và hiển thị ra bảng
                        //Bước 02: Thực hiện Truy vấn
                        $sql = "SELECT * FROM tbl_user,tbl_bomon,tbl_khoa, tbl_chucvu where tbl_user.id_bomon = tbl_bomon.id_bomon and tbl_khoa.id = tbl_bomon.id_khoa and tbl_user.id_chucvu = tbl_chucvu.id_chucvu";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            $i=1;
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row['hoten']; ?></td>
                                    <td><?php echo $row['khoa']; ?></td>
                                    <td><?php echo $row['bomon']; ?></td>
                                    <td><?php echo $row['chucvu']; ?></td>
                                    <td><?php echo $row['dtcoquan']; ?></td>
                                    <td><?php echo $row['dtdidong']; ?></td>
                                    <td><a href="editUser.php?myid=<?php echo $row['id_user']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a href="deleteUser.php?myid=<?php echo $row['id_user']; ?>"><i class="bi bi-archive-fill"></i></a></td>
                                </tr>
                    <?php
                            $i++;
                            }
                        }

                        
                    ?>
                    
                    
                </tbody>
                </table>

            </div>
        </main>
    </div>
    <?php
    include("templates/footer.php");
?>