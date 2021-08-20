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
                <div class="row flex-nowrap ">
                    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-3 bg-dark" style="margin: 0 auto;">
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                    <span class="fs-5 d-none d-sm-inline">Dashboard</span>
                                </a>
                                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link align-middle px-0">
                                            <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Trang chủ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                            <i class="fs-4 bi-bootstrap text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Quản lý danh bạ</span>
                                        </a>
                                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                            <li class="w-100">
                                                <a href="users-management.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Danh sách cán bộ</span>
                                                </a>
                                            </li>
                                            <li class="w-100">
                                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Thêm mới cán bộ</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Sửa thông tin cán bộ</span></a>
                                            </li>
                                            <li>
                                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Xóa cán bộ</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                                <hr>
                                <div class="dropdown py-5">
                                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                            <span class="d-none d-sm-inline mx-1">
                                                Admin
                                            </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                        <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="http://localhost/project-cuoi-ky/admin/logout.php">Log out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col py-4">
                            <h2 class="text-align-center">Thống kê</h2>
                            <div class="row main-content d-flex justify-content-center">
                                <div class="col col-md-2 mx-3 bg-white border border-3">
                                    <h5 >Số lượng cán bộ</h5>
                                    <h3 class=" d-flex justify-content-center">
                                    <?php
                                                
                                        // Bước 02: Thực thi truy vấn
                                        $sql1 = "SELECT * FROM tbl_user";
                                        $result = mysqli_query($conn,$sql1);
                                        // Bước 03: Xử lý kết quả: Lấy ra số bản ghi
                                        $count_user = mysqli_num_rows($result);
                                        echo $count_user;
                                        // // Bước 04: Đóng kết nối
                                        // mysqli_close($conn);
                                    ?>
                                    </h3>
                                        
                                </div>

                                

                            </div>
                            <br>

                            <h2 style="margin-top: 30px;">Danh sách cán bộ</h2>
                            
                            <div class="row main-content d-flex justify-content-center">
                                
                                <div class=" m-2 mx-3 bg-white border border-3">
                                    <h5 >Danh sách cán bộ</h5>
                                    <div id=" list-content">
                                        <table class="table table-striped table-sm table-bordered" >
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 30px; overflow: hidden; text-align: center;">#</th>
                                                    <th scope="col" style="width: 10px; overflow: hidden; text-align: center;">Họ và tên</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Khoa</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Bộ Môn</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Chức vụ</th>
                                                    <th scope="col" style="width: 70px; overflow: hidden; text-align: center;">Điện thoại cơ quan</th>
                                                    <th scope="col" style="width: 10px;  text-align: center;">Điện thoại di động</th>
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
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['hoten']; ?></td>
                                                    <td><?php echo $row['khoa']; ?></td>
                                                    <td><?php echo $row['bomon']; ?></td>
                                                    <td><?php echo $row['chucvu']; ?></td>
                                                    <td><?php echo $row['dtcoquan']; ?></td>
                                                    <td><?php echo $row['dtdidong']; ?></td>
                                                <?php
                                                    $i++;
                                                    }
                                                }
                                                ?>
                                            
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                

                            </div>
                        </div>

                    </div>

                </div>
        </main>

    </div>
    <?php
    include("templates/footer.php");
?>
   