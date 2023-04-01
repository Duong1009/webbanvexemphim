<!doctype html>
<html lang="en">

<head>
    <title>Đăng ký</title>
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
          <a href="trangchu.php" class="navbar-brand">
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
                <a href="dangnhap.php"><button class="btn btn-dark me-2" id="signin">Đăng&nbspNhập</button></a>
                <a href="dangky.php"><button class="btn btn-outline-dark" id="login">Đăng&nbspKý</button></a>
            </form>
          </div>
        </div>
    </nav>
    
  </header>
  <main>
    <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-dark">Đăng ký</h2>
        <form>
          <div class="mb-3">
            <label for="username1" class="form-label">Tên tài khoản</label>
            <input type="username1" class="form-control border border-dark" id="username1" aria-describedby="user1">
          </div>
          <div class="mb-3">
            <label for="password1" class="form-label">Mật khẩu</label>
            <input type="password1" class="form-control border border-dark" id="password1">
          </div>
          <div class="mb-3">
            <label for="password2" class="form-label">Nhập lại mật khẩu</label>
            <input type="password2" class="form-control border border-dark" id="password2">
          </div>
          <div class="d-grid">
            <button class="btn btn-dark" type="submit">Đăng ký</button>
          </div>
        </form>
        <div class="mt-3">
          <p class="mb-0  text-center">Bạn đã có tài khoản? 
            <a href="dangnhap.php" class="text-dark fw-bold">Đăng nhập</a>
          </p>
        </div>
        <div class="mt-3">
          
          <p class="mb-0  text-center">Đăng nhập với:
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
          </p>
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