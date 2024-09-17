<!DOCTYPE html>
<?php ob_start(); session_start()?>
<html lang="vi" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nền tảng - Kiến thức cơ bản về WEB | Bảng tin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../Project_2/StyleSheet/app.css" type="text/css">
    <link rel="stylesheet" href="../StyleSheet/ServicesPage/WarningAlertUser.css" type="text/css">
</head>

<body>
    <!-- header
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://nentang.vn">Nền tảng</a>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://nentang.vn">Quản trị</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên hệ</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0" method="get" action="search.html">
                    <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" aria-label="Search"
                        name="keyword_tensanpham">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="cart.html">Giỏ hàng</a>
                </li>
            </ul>
        </div>
    </nav> end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <form name="frmdangnhap" id="frmdangnhap" method="post" action="#">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card-group">
                            <div class="card p-4">
                                <div class="card-body">
                                    <h1>Đăng nhập</h1>
                                    <p class="text-muted">Nhập thông tin Tài khoản</p>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="text" name="username"
                                            placeholder="Tên đăng nhập">
                                    </div>
                                    <div class="input-group mb-4">
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Mật khẩu">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" name="btnDangNhap" onclick="loginpage()">Đăng nhập</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-link px-0" type="button">Quên mật khẩu?</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                                <div class="card-body text-center">
                                    <div>
                                        <h2>Đăng ký</h2>
                                        <p>Đăng ký để làm thành viên của Trang web bán hàng. Bạn sẽ được một số quyền
                                            lợi nhất
                                            định khi làm thành viên của Chúng tôi.</p>
                                        <a class="btn btn-primary active mt-3" href="Register.php">Đăng ký ngay!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End block content -->

        <!-- PHP Code Start -->
        <?php
        if(isset($_POST['btnDangNhap']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $announce = "";

            $sql_connect = mysqli_connect("Localhost", "root", "", "shopthethao");
            $sql_cmd = "select * from user where username = '$username'";
            $sql_query = mysqli_query($sql_connect, $sql_cmd) or die("Query Error!");
            $sql_assoc = mysqli_fetch_assoc($sql_query);
            $dem = mysqli_num_rows($sql_query);

            $account = $sql_assoc['username'];
            $pwd = $sql_assoc['password'];

            $type = $sql_assoc['LoaiUser'];

            if($dem <= 0)
            {
                ?>
                <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Tài Khoản không tồn tại
                </div>
                <?php
            }else{
                if($password != $pwd){
                    ?>
                    <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    Sai Mật khẩu!
                    </div>
                    <?php
                }else{
                    if($type == "Customer"){
                        header('location:product.php');
                    }elseif($type == "Administrator"){
                        // Command for Admin
                        $_SESSION['userkeys'] = $sql_assoc['HoTen'];
                        header("location:http://localhost/BT_PHP/Project_2/Pages/Admin/center.php");
                    }else{
                        ?>
                        <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        Vui Lòng Kiểm tra lại Kiểu Tài khoản
                        </div>
                        <?php
                    }
                    ob_end_flush();
                }
            }
        }
        ?>
        <!-- PHP Code End -->
    </main>

    <!-- footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span>Bản quyền © bởi <a href="https://nentang.vn">Nền Tảng</a> - <script>document.write(new Date().getFullYear());</script>.</span>
            <span class="text-muted">Hành trang tới Tương lai</span>

            <p class="float-right">
                <a href="#">Về đầu trang</a>
            </p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>
    <script src="../JS/Alerts.js"></script>
</body>

</html>