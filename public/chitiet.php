<?php
include '../src/connect.php';
$contact = new exec();
$movie -> $contact.getMovie();
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
                
                <a href="dangky.html"><button class="btn btn-outline-dark me-2" id="signin">Đăng&nbspký</button></a>
                <a href="dangnhap.html"><button class="btn btn-dark" id="login">Đăng&nbspNhập</button></a>
            </form>
          </div>
        </div>
    </nav>
    
  </header>
  <main>
    <div class="container-fluid">
      <div class="container">
        <div class="row justify-content-center align-items-start g-2">
          <div class="col-lg-8">
            <div class="container my-5 p-5 border">
              <div class="row justify-content-center">
                <img src="../img/endgame.jpg" height="400" width="100">
              </div>
            </div>              
          </div>
          <div class="ctkh-dathang col-lg-4 my-5">
            <div class="ctkh-dathang-container container ms-5 w-75 p-0">
              <div class="container-fluid">
                <h2 class="my-3">
                  Biệt Đội Siêu anh Hùng 4: Hồi Kết
                </h2>
                
                <div class="ctkh-dathang-info">
                  <p class="fw-bold">Avengers: End game</p>
                  <span class="d-block ps-1">
                    <i class="fa-solid "></i>
                    <p class="d-inline-block ms-1">Đạo diễn: Anthony Russo, Joe Russo</p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1">Thời lượng: 180 phút</p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1">Năm phát hành: 2019</p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1">Quốc gia: Âu Mỹ</p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1">Thể loại: Phiêu Lưu - Hành Động</p>
                  </span>
                </div>
                <div class="d-grid gap-2 mb-4">
                  <button type="button" name="" id="" class="btn btn-dark text-white btn-addcart">Đặt vé ngay</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center align-items-start g-2">
          <div class="col-lg-8">
            <div class="container my-5 p-5 border">
              <div class="row justify-content-center">
                <h2 class="my-3">
                  Nội dung phim: 
                </h2>
                <p class="d-inline-block ms-1">
                  <b>Biệt Đội Siêu Anh Hùng 4: Hồi Kết - Avengers: Endgame:</b> Cú búng tay của Thanos đã khiến toàn bộ dân số biến mất một nửa. 
                  Các siêu anh hùng đánh mất bạn bè, người thân và đánh mất cả chính mình. Bộ sáu Avengers đầu tiên tứ tán. Iron Man kẹt lại ngoài không gian, 
                  Hawkeye mất tích. Thor, Captain America, Hulk và Black Widow đều chìm trong nỗi đau vô tận vì mất đi những người thân yêu. Họ phải làm gì 
                  để cứu vãn mọi chuyện ở Avengers: Hồi Kết? Điều khán giả quan tâm nhất hiện nay chính là ai sẽ còn sống và ai sẽ ra đi khi Avengers: Endgame kết thúc. 
                </p>
              </div>

            </div>
            <div class="card">   
              <div class="row">    
                <div class="col-2">
                  <img src="" width="70" class="rounded-circle mt-2">
                </div>
                  
                <div class="col-10">    
                  <div class="comment-box ml-2">     
                    <h4>Thêm bình luận</h4>      
                    <div class="rating"> 
                      <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                      <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                      <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                      <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                      <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                          
                    <div class="comment-area">          
                      <textarea class="form-control" placeholder="Nhập bình luận" rows="4"></textarea>
                    </div>
                    <div class="comment-btns mt-2">
                      <div class="row">
                        <div class="col-6">
                          <div class="pull-left">
                            <button class="btn btn-outline-dark btn-sm">Đóng</button>      
                          </div>
                        </div>
                                  
                        <div class="col-6">
                          <div class="pull-right">
                            <button class="btn btn-dark send btn-sm">Bình luận<i class="fa fa-long-arrow-right ml-1"></i></button>      
                          </div>
                        </div>
                              
                      </div>  
                    </div>
                      
                      
                  </div>
                  
                </div>
              
              
              </div>
    
            </div>             
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- FOOTER -->
  <footer>
    <!-- place footer here -->
    <div class="container-fluid bg-dark text-white p-5">
      <div class="row justify-content-center align-items-center g-1 w-50">
        
        
      </div>
    </div>
  </footer>


</body>

</html>