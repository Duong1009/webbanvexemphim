<?php
include '../partials/header.php';
include '../controllers/connect.php';

$user = new User;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $error = $user -> validateSignin($_POST);
  function redirect($location)
  {
    header('Location: ' . $location);
    exit();
  }
  if(count($error) == 0){
    setcookie('username',$_POST['username'], time() + 7200);
    redirect('trangchu.php');
  }
}
?>
  <main>
    <div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-dark">Đăng nhập</h2>
        <form method="POST">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
            <input type="username" class="form-control border border-dark" id="username" aria-describedby="user" name="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control border border-dark" id="password" name="password1">
          </div>
          <div class="d-grid">
            <button class="btn btn-dark" type="submit">Đăng nhập</button>
          </div>
        </form>
        <div class="mt-3">
          <p class="mb-0  text-center">Không có tài khoản? 
            <a href="dangky.php" class="text-dark fw-bold">Đăng ký</a>
          </p>
        </div>
        
      </div>
    </div>
  </main>
  <?php
include '../partials/footer.php';
?>

