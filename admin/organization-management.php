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
    
                        <div class="col py-4">
                            <h2 class="text-align-center">Thống kê</h2>
                            <div class="row main-content d-flex justify-content-center">
                                <div class="col col-md-2 mx-3 bg-white border border-3">
                                    <h5 >Số lượng đơn vị</h5>
                                    <h3 class=" d-flex justify-content-center">
                                    <?php
                                                
                                        // Bước 02: Thực thi truy vấn
                                        $sql1 = "SELECT * FROM tbl_coquan";
                                        $result = mysqli_query($conn,$sql1);
                                        // Bước 03: Xử lý kết quả: Lấy ra số bản ghi
                                        $count_organization = mysqli_num_rows($result);
                                        echo $count_organization;
                                        // // Bước 04: Đóng kết nối
                                        // mysqli_close($conn);
                                    ?>
                                    </h3>
                                        
                                </div>

                                

                            </div>
                            <br>

                            <h2 style="margin-top: 30px;">Danh sách đơn vị</h2>
                            
                            
                            <div align="center">
                                <ul class="nav d-flex justify-content-center">
                                    
                                    
                                    <li class="nav-item" style="margin-left: 20px; height: 20px;">
                                        <input style="height: 38px; width: 500px;" class="" type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm theo tên đơn vị" title="Type in a name">
                                    </li>
                                    <li>
                                        <a href="addOrganization.php" class="btn btn-success" style = "margin-left: 30px;">Thêm đơn vị</a>
                                        
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
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Tên đơn vị</th>
                                                    <th scope="col" style="width: 100px; overflow: hidden; text-align: center;">Địa chỉ</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Số điện thoại</th>
                                                    <th scope="col" style="width: 50px; overflow: hidden; text-align: center;">Email</th>
                                                    <th scope="col" style="width: 70px; overflow: hidden; text-align: center;">Website</th>
                                                    <th scope="col"style="overflow: hidden; text-align: center; width: 100px;">Cập nhật</th>
                                                    <th scope="col"style="overflow: hidden; text-align: center; width: 100px;">Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    //Lặp lấy dữ liệu và hiển thị ra bảng
                                                    //Bước 02: Thực hiện Truy vấn
                                                    $sql = "SELECT * FROM tbl_coquan ";
                                                    $result = mysqli_query($conn,$sql);
                                                    if(mysqli_num_rows($result)>0){
                                                        $i=1;
                                                        while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <tr>
                                                    <td style="width: 30px; overflow: hidden; text-align: center;"><?php echo $i; ?></td>
                                                    
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"><?php echo $row['tendonvi']; ?></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"><?php echo $row['diachi']; ?></td>
                                                    <td style="width: 70px; overflow: hidden; text-align: center;"><?php echo $row['sdt']; ?></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"><?php echo $row['email_coquan']; ?></td>
                                                    <td style="width: 130px; overflow: hidden; text-align: center;"> <?php echo $row['website']; ?></td>
                                                    <td style="width: 30px; overflow: hidden; text-align: center;"><a href="editUser.php?myid=<?php echo $row['id_coquan']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                                    <td style="width: 30px; overflow: hidden; text-align: center;"><a href="deleteUser.php?myid=<?php echo $row['id_coquan']; ?>"><i class="bi bi-archive-fill"></i></a></td>
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
                                                    td = tr[i].getElementsByTagName("td")[1];
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

