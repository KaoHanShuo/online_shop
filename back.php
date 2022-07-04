<!-- 主頁 -->
<?php include_once "base.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>online_shop</title>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- <style type="text/css">
        .bg-secondary {
            background-color: #EDF1FF;
        }
    </style> -->

    <link href="./css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--回首頁 | 最新消息 | 購物流程 | 購物車 | 會員登入 | 管理登入 -->
    <!-- 上半部 -->
    <div class="container-fluid">
        <div class="row py-2 px-lg-5">
            <div class="col d-flex justify-content-end px-lg-5 gy-1">
                <a class="text-dark px-2" href="?do=admin">
                    <i class=" bi bi bi-person-workspace">管理員</i>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row py-2">
            <div class="d-lg-flex justify-content-center">
                <h1 class="text-dark">Online_shop</h1>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <div class="container-fluid">
            <div class="">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a id="testb" class="nav-link text-light" href="?do=admin" style="margin-left: 100px;">管理權限設置</a>
                    </li>
                    <li class="nav-item">
                        <a id="testb" class="nav-link text-light" href="?do=th">商品分類與管理</a>
                    </li>
                    <li class="nav-item">
                        <a id="testb" class="nav-link text-light" href="?do=order">訂單管理</a>
                    </li>
                    <li class="nav-item">
                        <a id="testb" class="nav-link text-light" href="?do=men">會員管理</a>
                    </li>
                    <li class="nav-item">
                        <a id="testb" class="nav-link text-light" href="?">最新消息管理</a>
                    </li>
                   
                    <li class="nav-item">
                        <a id="testb" class="nav-link  text-light" href="?do=logout">登出</a>
                    </li>

                </ul>
            </div>
            
        </div>

    </nav>

    <!-- Navbar Start --><!-- 左邊商品及右邊欄位 -->
    <div><h1></div>
    
                <!-- <div id="left" class="ct" style="margin-left: 100px;">
                    <div style="min-height:400px;">
                        <a href="?do=admin">管理權限設置</a>
                        <a href="?do=th">商品分類與管理</a>
                        <a href="?do=order">訂單管理</a>
                        <a href="?do=mem">會員管理</a>
                        <a href="?do=news">最新消息管理</a>
                        <a href="?do=logout" style="color:#f00;">登出</a>
                    </div>
                </div> -->
              
               
                <div style="width:80%; border:5px #FFAC55 solid;"  id="header-carousel" class="carousel slide middle" data-ride="carousel">
                <!-- 檔案引入 -->
                    <?php
                        $do = $_GET['do'] ?? 'main';
                        $file = 'back/' . $do . ".php";
                        if (file_exists($file)) {
                            include $file;
                        } else {
                            // echo "檔案不存在";
                            include "back/admin.php";
                        }
                    ?>
                <!-- 檔案引入 -->
                </div>
            
    <!-- Navbar End -->

    <!-- Footer Start --><!-- 底部資訊 -->
    <div class="container-fluid bg-grey text-dark mt-5 pt-5 ">
        <div class="row px-xl-5 ">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-md-12 mb-5 pr-3 pr-xl-5 text-center">
                <a class="text-dark" href="#top">返回頂部</a>
                <p class="mb-2 pt-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <p class="mb-md-0 text-center  text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                </p>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <!-- Footer End -->


    <i class="bi bi-cart-check" style="font-size: 60px"></i>


</body>

</html>