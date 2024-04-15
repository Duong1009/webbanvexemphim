<?php
    include '../partials/header.php';
    include '../controllers/connect.php';

    $cart = new Cart;
    $movie = new Movie;
    function redirect($location)
    {
      header('Location: ' . $location);
      exit();
    }
    if(isset($_COOKIE['username'])){
      $arr = $cart -> findCartFollowUsername($_COOKIE['username']);
      if(count($arr) > 0){
        $movies = $movie -> findFilm($arr);
      }
  
    }    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $id = $_POST['id'];
      echo $id;
      $cart -> deleteCart($id);
      redirect('cart.php');
    }
?>
<main>
<?php if(isset($_COOKIE['username'])): ?>
<h2 class="text-center mt-2">Giỏ hàng của <?=$_COOKIE['username']?></h2>

<div class="container category-items mt-4">
        <div class="row justify-content-center align-items-center g-2">
        <?php if(count($arr) > 0):?>
        <?php foreach ($movies as $movie): ?>
          <div class="col-lg-3 col-md-6">
            <div class="container course-item" style="position: relative; width: 200px">      
            <button type="button" class="btn-close btn-close-white" data-bs-toggle="modal" data-bs-target="#confirm"
            data-bs-whatever="<?=$movie['id']?>" style="float:right; position: absolute; top:0; right:0; "></button>
              <a href="chitiet.php?id=<?=$movie['id']?>" class="text-decoration-none text-dark">
                <img src="<?=$movie['imgLink']?>" height="300">
                <div class="container course-detail p-0 mt-3">
                  <h5 class="course-detail-title font-weight-bold text-center"><?=htmlspecialchars($movie['title'])?></h5>
                </div>
                <div class="d-grid gap-2 mb-4">                  
                  <a href="ghexemphim.php" name="" id="" class="btn btn-dark text-white btn-addcart">Đặt vé ngay</a>                 
                </div>
              </a>
            </div>
          </div>  
          <?php endforeach?>   
          <?php else: ?>
            <h2 class="text-center">Giỏ hàng của bạn đang trống</h2>
          <?php endif ?>     
        </div>
      </div>

      <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận xoá</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xoá
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">Xoá</button>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="formDelete" hidden method="POST">
        <input type="text" name="id" id="sendId">
    </form>
    <script>
        addEventListener('DOMContentLoaded', (e) => {
            const confirm = document.getElementById('confirm_delete')
            const formDelete = document.getElementById('formDelete')
            var exampleModal = document.getElementById('confirm')
            var sendId = document.getElementById('sendId')
            exampleModal.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                var button = event.relatedTarget
                // Extract info from data-bs-* attributes
                var recipient = button.getAttribute('data-bs-whatever')
                console.log(confirm)
                confirm.onclick = () => {
                    console.log(recipient)
                    sendId.setAttribute('value', recipient);
                    formDelete.submit()
                }
            })
        })
    </script>
  <?php else: ?>
    <h2 class="text-center mt-3">Đăng nhập để xem giỏ hàng</h2>
  <?php endif ?>
</main>