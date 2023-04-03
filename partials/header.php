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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- font awesomes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                <a class="nav-link text-dark" href="quanly.php">Quản lý phim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="themphim.php">Thêm phim</a>
              </li>
              <?php endif?>
              </ul>
              <div class="col">
                <?php if(!isset($_COOKIE["username"])):?>
                <a href="dangky.php" class="btn btn-outline-dark me-2" id="signin">Đăng&nbspký</a>
                <a href="dangnhap.php" class="btn btn-dark" id="login">Đăng&nbspNhập</a>
                <?php else:?>
                  
                  <div class="nav-item dropdown">
                  <a class="nav-link  text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="float:right">
                  <b class="m-2 "> <?=htmlspecialchars($_COOKIE["username"])?></b> <img src="img/avt1.png" alt="" style="width:40px; height:40px; float:right" class="rounded">
                   </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Giỏ hàng của tôi</a></li>
                    <li><a class="dropdown-item" href="#" id="logout">Đăng xuất</a></li>
                  </ul>
                  </div>
                <?php endif ?>
              </div>
          </div>
        </div>
    </nav>
    
  </header>

  <script type="text/javascript"
src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $("document").ready(function(){
      $("#logout").click(function (){
        console.log("logged out");
        let setCookie = function (key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }
        setCookie("username","", -1);
        location.reload();
      })
    })
  </script>