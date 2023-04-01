<!doctype html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md bg-light">
        <div class="container-fluid pb-2" id="navContainer">
          <a href="trangchu.html" class="navbar-brand">
            <img src="../img/logo.jpg" alt="" height="80px" width="500px">
          </a>
          <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Đặt vé xem phim</a>
              </li> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Danh mục phim</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Người Sắt (Iron man)</a></li>
                  <li><a class="dropdown-item" href="#">Captain America: Kẻ báo thù đầu tiên</a></li>
                  <li><a class="dropdown-item" href="#">Thần Sấm (Thor)</a></li>
                  <li><a class="dropdown-item" href="#">Biệt đội siêu anh hùng (Avenger)</a></li>
                </ul>
              </li>
            </ul>
            <form action="" class="d-flex">
                <div class="input-group me-1">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Tìm phim">
                </div>
                <a class="dangnhap.html"></a><button class="btn btn-dark me-2" id="signin">Đăng&nbspNhập</button>
                <button class="btn btn-outline-dark" id="login">Đăng&nbspKý</button>
            </form>
          </div>
        </div>
    </nav>
    
  </header>
  <main>
    <!-- Banner -->
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="../img/Avengers3-poster.jpg" class="w-100 d-block" alt="First slide" height="400"> <!--Poster quang cao phim-->
        </div>
        <div class="carousel-item">
          <img src="../img/civil_war.jpg" class="w-100 d-block" alt="Second slide" height="400">  <!--Poster quang cao phim-->
        </div>
        <div class="carousel-item">
          <img src="../img/endgame.jpg" class="w-100 d-block" alt="Third slide" height="400">  <!--Poster quang cao phim-->
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
    <!-- Phim đang chiếu -->
    <div class="container-fluid">
      <div class="container courses-slogan mt-3">
        <h2>Phim đang chiếu</h2>
        <p>phim được xem nhiều nhất</p>
      </div>
      <div class="container category-items">
        <div class="row justify-content-center align-items-center g-2">
          <div class="col-lg-3 col-md-6">
            <div class="container course-item">
              <a href="#" class="text-decoration-none text-dark">
                <img src="../img/avengers.jpg" width="270" height="400">  <!--poster phim-->
                <div class="container course-detail p-0 mt-3">
                  <h6 class="course-detail-title font-weight-bold">AVENGERS</h6>
                </div>
              </a>
            </div>
          </div>          
        </div>
      </div>
    </div>
    <!-- Phim sắp chiếu -->
    <div class="container-fluid">
      <div class="container courses-slogan mt-3">
        <h2>Phim sắp chiếu</h2>
      </div>
      <div class="container category-items">
        <div class="row justify-content-center align-items-center g-2">
          <div class="col-lg-3 col-md-6">
            <div class="container course-item">
              <a href="#" class="text-decoration-none text-dark">
                <img src="../img/guardian3.jpg" width="270" height="400">  <!--poster phim-->
                <div class="container course-detail p-0 mt-3">
                  <h6 class="course-detail-title font-weight-bold">Biệt đội giải ngân hà 3</h6>
                </div>
              </a>
            </div>
          </div>         
        </div>
      </div>
    </div>
    
  </main>
  <footer>
    <!-- place footer here -->
    <div class="container-fluid bg-dark text-white p-5">
      <div class="row justify-content-center align-items-center g-1 w-50">
        
        
      </div>
    </div>
  </footer>
</body>

</html>