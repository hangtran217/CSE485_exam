<?php
    // We need to use sessions, so you should always start sessions using the below code.
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

                        
            <form method="POST" name="search" action="" style="max-width: 1441px;">
                
                <div id="demo-grid">

                    <div class="search d-flex justify-content-center">
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
                        <button id="Filter" style="height: 60px; width: 150px; border-radius: 10px; margin-top: 12px;">Tra cứu</button>
                    </div>
                    
                        <?php
                        if (! empty($_POST['tendonvi'])) {
                            ?>
                            <table cellpadding="10" cellspacing="1" class="table table-striped table-sm table-bordered">

                        <thead>
                            <tr>
                                <th scope="col" style="width: 30px; overflow: hidden; text-align: center;">#</th>
                                    <th scope="col" style="width: 70px; overflow: hidden; text-align: center;">Ảnh</th>
                                    <th scope="col" style="width: 150px; overflow: hidden; text-align: center;">Họ và tên</th>
                                    <th scope="col" style="width: 100px; overflow: hidden; text-align: center;">Tên đơn vị</th>
                                    <th scope="col" style="width: 100px; overflow: hidden; text-align: center;">Chức vụ</th>
                                    <th scope="col" style="width: 100px; overflow: hidden; text-align: center;">Điện thoại cơ quan</th>
                                    <th scope="col" style="width: 100px;  text-align: center;">Điện thoại di động</th>
                                    <th scope="col" style="width: 90px;  text-align: center;">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * from tbl_user inner join tbl_coquan on tbl_user.id_coquan = tbl_coquan.id_coquan";
                            $i = 0;
                            $selectedOptionCount = count($_POST['tendonvi']);
                            $selectedOption = "";
                            while ($i < $selectedOptionCount) {
                                $selectedOption = $selectedOption . "'" . $_POST['tendonvi'][$i] . "'";
                                if ($i < $selectedOptionCount - 1) {
                                    $selectedOption = $selectedOption . ", ";
                                }
                                
                                $i ++;
                            }
                            $query = $query . " WHERE tendonvi in (" . $selectedOption . ")";
                            
                            $result = $db_handle->runQuery($query);
                        }
                        if (! empty($result)) {
                            $i=1;
                            foreach ($result as $key => $value) {
                                ?>
                        <tr>
                            <td><div class="col" id="user_data_1"><?php echo $i; ?></div></td>
                            <td align="center"><div class="col" id="user_data_2"><img  style="width: 150px; border-radius: 100%;" src="http://localhost/exam/<?php echo $result[$key]['image']; ?>" alt=""></div></td>
                            <td><div class="col" id="user_data_3"><?php echo $result[$key]['hoten']; ?> </div></td>
                            <td><div class="col" id="user_data_4"><?php echo $result[$key]['tendonvi']; ?> </div></td>
                            <td><div class="col" id="user_data_5"><?php echo $result[$key]['chucvu']; ?> </div></td>
                            <td><div class="col" id="user_data_6"><?php echo $result[$key]['dtcoquan']; ?> </div></td>
                            <td><div class="col" id="user_data_7"><?php echo $result[$key]['dtdidong']; ?> </div></td>
                            <td><div class="col" id="user_data_8"><?php echo $result[$key]['email']; ?> </div></td>
                        </tr>
                        <?php
                            $i++;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <?php
                        }
                        ?>  
                </div>
            </form>

        </main>

    </div>
    <?php
    include("templates/footer.php");
?>
   