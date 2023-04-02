<?php

?>

<!doctype html>
<html lang="en">
<head>
    <title>Chi tiết</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- font awesomes -->
    <script src="https://kit.fontawesome.com/46bb43dd6b.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md bg-light">
        <div class="container-fluid pb-2" id="navContainer">
          <a href="trangchu.php" class="navbar-brand">
            <img src="img/logo.jpg" alt="" height="80px" width="500px">
          </a>
          <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse row" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto col">
              <?php if(isset($_COOKIE["username"]) && $_COOKIE["username"] == "admin"):?>
              <li class="nav-item">
                <a class="nav-link" href="#">Quản lý phim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Thêm phim</a>
              </li>
              <?php endif?>
              </ul>
              <div class="col">
                <?php if(!isset($_COOKIE["username"])):?>
                <a href="dangky.php" class="btn btn-outline-dark me-2" id="signin">Đăng&nbspký</a>
                <a href="dangnhap.php" class="btn btn-dark" id="login">Đăng&nbspNhập</a>
                <?php else:?>
                  <a class="text-dark " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="float:right">
                  <b class="m-2"> <?=htmlspecialchars($_COOKIE["username"])?></b> <img src="img/avt1.png" alt="" style="width:40px; height:40px; float:right" class="rounded">
                  
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Giỏ hàng của tôi</a></li>
                    <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                  </ul>
                  
                <?php endif ?>
              </div>
          </div>
        </div>
    </nav>
    
  </header>