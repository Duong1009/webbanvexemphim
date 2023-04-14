<?php
    include '../partials/header.php';
    include '../controllers/connect.php';

    $movie = new Movie;
    $moviesDeleted = $movie->getMovieDeleted();
    function redirect($location)
    {
      header('Location: ' . $location);
      exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_REQUEST['id'])){
        $movie -> undo($_REQUEST['id']);
        redirect('thungrac.php');
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $movie -> delete($_POST['id']);
        redirect('thungrac.php');
    }
?>

<div class="container category-items mt-4">
        <div class="row justify-content-center align-items-center g-2">
        <?php if(count($moviesDeleted) > 0):?>
        <?php foreach ($moviesDeleted as $movie): ?>
          <div class="col-lg-3 col-md-6">
            <div class="container course-item" style="position: relative; width: 200px">      
            <button type="button" class="btn-close btn-close-white" data-bs-toggle="modal" data-bs-target="#confirm"
            data-bs-whatever="<?=$movie['id']?>" style=" position: absolute; top:0; right:0; "></button>
            <a href="thungrac.php?id=<?=$movie['id']?>" class="btn btn-dark"  style=" position: absolute; top:0; left:0; "><i class="fa fa-undo" aria-hidden="true"></i></a>
              <a href="chitiet.php?id=<?=$movie['id']?>" class="text-decoration-none text-dark">
                <img src="<?=$movie['imgLink']?>" height="300">
                <div class="container course-detail p-0 mt-3">
                  <h5 class="course-detail-title font-weight-bold text-center"><?=htmlspecialchars($movie['title'])?></h5>
                </div>
              </a>
            </div>
          </div>  
          <?php endforeach?>   
          <?php else: ?>
            <h2 class="text-center">Chưa có phim nào đã xoá</h2>
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
                    Sau khi xoá phim này sẽ không thể khôi phục lại dc
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
