<?php
    // We need to use sessions, so you should always start sessions using the below code.
    include('connection.php');
    
    include("templates/header.php");
?>

<div id="main-main" class="container-fluid" >
        <main>
                <div class="row flex-nowrap ">
                    
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
                                    <form action="" method="post" style="margin-left: -3%; margin-bottom: 20px;">
                    <input type="text" name="search">
                    <?php  
                        if(isset($_GET['search'])){
                            echo $_GET["search"];
                        }

                    ?>
                    <input type="submit" name="submit" value="Search">

                </form>
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
   