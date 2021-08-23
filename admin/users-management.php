<?php
    // We need to use sessions, so you should always start sessions using the below code.
    include('connection.php');
    include 'DBController.php';
    $db_handle = new DBController();
    $tendonviResult = $db_handle->runQuery("SELECT DISTINCT tendonvi FROM tbl_coquan ORDER BY tendonvi ASC");
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit;
    }
    include("templates/header.php");
?>
    
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
                            
                            
                            <div align="center">
                                <ul class="nav d-flex justify-content-center">
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Tìm kiếm theo đơn vị
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                                    <?php
                                                        //Lặp lấy dữ liệu và hiển thị ra bảng
                                                        //Bước 02: Thực hiện Truy vấn
                                                        $sql = "SELECT DISTINCT tendonvi FROM tbl_coquan";
                                                        $result = mysqli_query($conn,$sql);
                                                        //while($row = mysqli_fetch_array($result)){
                                                            ?>

                                                        <li>


                                                            <select id="Place" name="tendonvi[]" class="form-select" aria-label="Default select example" style="height: 60px; width: 800px;">
                            <option selected>Chọn đơn vị</option>
                            <?php
                                if (! empty($tendonviResult)) {
                                    foreach ($tendonviResult as $key => $value) {
                                        echo '<option value="' . $tendonviResult[$key]['tendonvi'] . '">' . $tendonviResult[$key]['tendonvi'] . '</option>';
                                    }
                                }
                            ?>
                        </select>

                                                            <!-- <a class="dropdown-item" href="index.php?donvi=<?php echo $row['tendonvi']; ?>"><i class=""></i><?php echo $row['tendonvi']; ?>
                                                    </a> -->
                                                        </li><br>

                                                    <?php
                                                        //}

                                                        
                                                    ?>

                                            </ul>
                                        </div>

                                    </li>
                                    
                                    <li class="nav-item" style="margin-left: 20px; height: 20px;">
                                        <input style="height: 38px; width: 500px;" class="" type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm theo tên cán bộ" title="Type in a name">
                                    </li>
                                    <li>
                                        <a href="addUser.php" class="btn btn-success" style = "margin-left: 30px;">Thêm cán bộ</a>
                                        
                                    </li>
                                </ul>

                                                            
                            <br>
                        </div>

                            <div class="row main-content" style="margin-left: 1%; margin-right: 1%;">
                                
                                <div class=" bg-white">
                                    <div id=" list-content">
                                        <table class="table table-striped table-sm table-bordered" style="" align="center" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 30px; overflow: hidden; text-align: center;">#</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Ảnh</th>
                                                    <th scope="col" style="width: 100px; overflow: hidden; text-align: center;">Họ và tên</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Tên đơn vị</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Chức vụ</th>
                                                    <th scope="col" style="width: 70px; overflow: hidden; text-align: center;">Điện thoại cơ quan</th>
                                                    <th scope="col" style="width: 90px;  text-align: center;">Điện thoại di động</th>
                                                    <th scope="col" style="width: 90px;  text-align: center;">Email</th>
                                                    <th scope="col"style="overflow: hidden; text-align: center; width: 100px;">Cập nhật</th>
                                                    <th scope="col"style="overflow: hidden; text-align: center; width: 100px;">Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    //Lặp lấy dữ liệu và hiển thị ra bảng
                                                    //Bước 02: Thực hiện Truy vấn
                                                    $sql = "SELECT * FROM tbl_user,tbl_coquan where tbl_user.id_coquan = tbl_coquan.id_coquan";
                                                    $result = mysqli_query($conn,$sql);
                                                    if(mysqli_num_rows($result)>0){
                                                        $i=1;
                                                        while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <tr>
                                                    <td style="width: 30px; overflow: hidden; text-align: center;"><?php echo $i; ?></td>
                                                    <td align="center" ><img  style="width: 150px; border-radius: 100%;" src="http://localhost/exam/<?php echo $row['image']; ?>" alt=""></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"><?php echo $row['hoten']; ?></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"><?php echo $row['tendonvi']; ?></td>
                                                    <td style="width: 70px; overflow: hidden; text-align: center;"><?php echo $row['chucvu']; ?></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"><?php echo $row['dtcoquan']; ?></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"> <?php echo $row['dtdidong']; ?></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"> <?php echo $row['email']; ?></td>
                                                    <td style="width: 30px; overflow: hidden; text-align: center;"><a href="editUser.php?myid=<?php echo $row['id_user']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                                    <td style="width: 30px; overflow: hidden; text-align: center;"><a href="deleteUser.php?myid=<?php echo $row['id_user']; ?>"><i class="bi bi-archive-fill"></i></a></td>
                                                <?php
                                                    $i++;
                                                    }
                                                }
                                                ?>
                                            <script>
                                                function myFunction() {
                                                  var input, filter, table, tr, td, i, txtValue;
                                                  input = document.getElementById("myInput");
                                                  filter = input.value.toUpperCase();
                                                  table = document.getElementById("myTable");
                                                  tr = table.getElementsByTagName("tr");
                                                  for (i = 0; i < tr.length; i++) {
                                                    td = tr[i].getElementsByTagName("td")[2];
                                                    if (td) {
                                                      txtValue = td.textContent || td.innerText;
                                                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                      } else {
                                                        tr[i].style.display = "none";
                                                      }
                                                    }       
                                                  }
                                                }
                                            </script>
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

