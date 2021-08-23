
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Danh bạ Đại học Thủy Lợi</title>
  </head>
  <body>
    <div class="container-fluid bg-dark">
        <header class="d-flex flex-wrap justify-content-center py-3 border-bottom">
        <a href="http://localhost/Project/admin/index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <h1 class="fs-2 text-white">Danh bạ Đại học Thủy Lợi</h1>
        </a>

        <ul class="nav ">
            <li class="nav-item"><a href="http://localhost/exam/admin/index.php" class="nav-link active el1 text-white" aria-current="page">Trang chủ</a></li>
            
            <li class="nav-item"><a href="http://localhost/exam/admin/logout.php" class="nav-link el1 text-white">Logout</a></li>
        </ul>
        
        </header>

    </div>

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
                                        <a href="http://localhost/exam/admin/" class="nav-link align-middle px-0">
                                            <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Trang chủ</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://localhost/exam/admin/filter.php" class="nav-link align-middle px-0">
                                            <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Danh sách cán bộ theo đơn vị</span>
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
                                                <a href="addUser.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Thêm mới cán bộ</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                            <i class="fs-4 bi-bootstrap text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Quản lý cơ quan</span>
                                        </a>
                                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                                            <li class="w-100">
                                                <a href="organization-management.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Danh sách cơ quan</span>
                                                </a>
                                            </li>
                                            <li class="w-100">
                                                <a href="addOrganization.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Thêm mới cơ quan</span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="dropdown py-5">
                                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                                    <span class="d-none d-sm-inline mx-1">
                                                        <?php echo $_SESSION['name'] ?>
                                                        
                                                    </span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                                <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                                <li>
                                                <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="http://localhost/exam/logout.php">Log out</a></li>
                                            </ul>
                                        
                                        </div>
                                    </li> 
                                </ul>
                                <hr>
                                </div>
                        </div>
