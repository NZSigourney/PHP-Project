<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping-cart</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../StyleSheet/Content.css"/>
    <link rel="stylesheet" href="../StyleSheet/Footer.css"/>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sport</a>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="https://nentang.vn">Quản trị</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/about.php">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/contact.php">Liên hệ</a>
                    </li>
                </ul>
                <!--<form class="form-inline mt-2 mt-md-0" method="get" action="Pages/search.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" aria-label="Search"
                        name="keyword_tensanpham">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>-->
            </div>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="../Pages/Cart.php">Giỏ hàng</a>
                </li>
                <li class="nav-item text-nowrap">
                    <!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
                    <a class="nav-link" href="../Pages/Login.php">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end header -->
    
    <!-- PHP code Start -->
    <?php
    $sql_connect = mysqli_connect("localhost", "root", "", "shopthethao");
    $sql_cmd = "select * from sanpham";
    $sql_query = mysqli_query($sql_connect, $sql_cmd);
    $i = 1;

    ?>
    <!-- PHP code End -->

    <!-- content -->
    <section class="wrapper">
        <div class="products">
            <ul>
                <?php
                while($sql_row = mysqli_fetch_assoc($sql_query))
                {
                    ?>
                    <li class="main-product">
                        <div class="content-product">
                            <div class="img-product">
                                <img class="img-prd" src="<?php echo $sql_row['HinhAnh'] ?>" alt="">
                            </div>
                            <h3 class="content-product-h3"><?php echo $sql_row['TenHH'] ?></h3>
                            <div class="content-product-deltals">
                                <div class="price">
                                    <span class="money"><?php echo $sql_row['Giatien'] ?> VND</span>
                                </div>
                                <form action="" method="post">
                                    <button type="button" class="btn btn-cart" name="btn-buy">Thêm Vào Giỏ</button>
                                </form>
                                <?php
                                if(isset($_POST['btn-buy']))
                                {
                                    header("location:Cart.php?");
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <?php
                    $i++;
                }

                //$sql_assoc = mysqli_fetch_assoc($sql_query);

                /**while($sql_row = mysqli_fetch_assoc($sql_query))
                {
                    ?>
                    <li class="main-product no-margin">
                    <div class="img-product">
                        <img class="img-prd" src="<?php echo $sql_row['HinhAnh'] ?>" alt="">
                    </div>
                    <div class="content-product">
                        <h3 class="content-product-h3"><?php echo $sql_row['TenHH'] ?></h3>
                        <div class="content-product-deltals">
                            <div class="price">
                                <span class="money"><?php echo $sql_row['Giatien'] ?> VND</span>
                            </div>
                            <button type="button" class="btn btn-cart">Thêm Vào Giỏ</button>
                        </div>
                    </div>
                    </li>
                    <?php
                    $i++;
                }*/
                ?>
            </ul>
        </div>
    </section>

     <!-- footer -->
     <footer>
        <div class="footer-item">
            <div class="img-footer">
                <img src="img/logo.png" alt="" />
            </div>
            <div class="social-footer">
                <li><a target="_blank" href="https://www.facebook.com/tobi.kun.0304">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    </a></li>
                <li><a target="_blank" href="https://github.com/NZSigourney">
                        <i class="fa fa-github-square" aria-hidden="true"></i>
                    </a></li>
            </div>
        </div>
    </footer>
</body>
</html>