<?php
    // We need to use sessions, so you should always start sessions using the below code.
    include('admin/connection.php');
    
    include("templates/header.php");
?>

<div id="main-main" class="container-fluid" >
        <main>
            <h2 style="margin-top: 30px;">Danh sách cán bộ</h2>
                            
                            
                            <div align="center">
                                <ul class="nav d-flex justify-content-center">
                                    
                                    
                                    <li class="nav-item" style="margin-left: 30px; height: 20px;">
                                        <input style="height: 38px; width: 500px;" class="" type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm theo tên cán bộ" title="Type in a name">
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
   