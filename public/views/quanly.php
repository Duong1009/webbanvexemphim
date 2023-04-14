<?php include '../partials/header.php';
    include '../controllers/connect.php';
    $movie = new Movie;
    function redirect($location)
    {
      header('Location: ' . $location);
      exit();
    }
    $movies = $movie->all();

    $countMovieDeleted = $movie -> countMovieDeleted();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $movie -> deleteSorf($_POST['id']);
        redirect('quanly.php');
    }
?>
<div class="container mt-4">
    <a href="thungrac.php" class="text-dark text-decoration-none">
        <i class="fa fa-trash" aria-hidden="true"></i> <?= $countMovieDeleted?>
    </a>
    <h1 class="text-center">Danh sách các bộ phim</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Tiêu đề</th>
      <th scope="col">Loại</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
   
  <?php foreach ($movies as $movie1): ?>
    <tr>
  
      <td><?= htmlspecialchars($movie1['title'])?></td>
      <td><?= htmlspecialchars($movie1['type'])?></td>
      <td>
        <a href="chinhsua.php?id=<?=$movie1['id']?>" class="btn btn-dark"> Sửa</a>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#confirm"
            data-bs-whatever="<?=$movie1['id']?>">Xoá</button>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

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
</div>