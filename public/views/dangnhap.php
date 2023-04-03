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
  <?php
include '../partials/footer.php';
?>

