<?php
include '../controllers/connect.php';
include '../partials/header.php';

$id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
$contact = new Movie;
$movie = $contact->getMovie($id);

$comment = new Comment;
$comments = $comment -> getComment($id);
$count = $comment->count($id);

$cart = new Cart;
function redirect($location)
  {
    header('Location: ' . $location);
    exit();
  }

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['comment'])){
  $cmt = $_POST['comment'];
  $username = $_COOKIE["username"];
  $idVideo = $id;
  $comment -> save($username,$cmt,$idVideo);
  redirect('chitiet.php?id='.$id);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['cart'])){
  $cart -> addFilmToCart($id, $_COOKIE['username']);
}
?>


  <main>
    <div class="container-fluid">
      <div class="container">
        <div class="row justify-content-center align-items-start g-2">
          <div class="col-lg-8">
            <div class="container my-5 ">
              <div class="row justify-content-center">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$movie['idVideoReview']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
              <div class="row  align-items-start ">
          <div class="col">
            <div class="container ">
              <div class="row ">
                <h2 class="my-3">
                  Nội dung phim: 
                </h2>
                <p class="d-inline-block ms-1">
                  <b><?=$movie['title']?></b> <?=$movie['review']?> 
                </p>
              </div>
            </div>
              <div class="row">           
                 
                  <div class="p-3">  
                  <p><?=$count?> bình luận</p>
                  <?php if(isset($_COOKIE['username'])): ?>
                  <img src="../img/avt1.png" alt="" style="width:40px; height:40px" class="rounded"> <b class="m-2 "> <?=htmlspecialchars($_COOKIE["username"])?></b>                  
                  <form action="" class='mt-2' method="POST">
                    <div class="row">
                      <div class="col-11">
                        <input type="text" placeholder="Nhập vào bình luận của bạn" class="border border-dark rounded-pill p-2" style="width:650px; height:40px" name="comment">
                        <input type="text" value='<?=$time?>' name='date' hidden>
                      </div>
                      <div class="col-1">
                      <button style="border:none; background-color: transparent" type="submit"><i class="fa fa-arrow-circle-right mt-2" style="font-size:24px"></i></button>
                      </div>
                    </div>
                  </form>      
                  <?php else: ?>
                    <h2>Đăng nhập để bình luận</h2>
                  <?php endif?>    
                  <?php if(count($comments) > 0):?>                    
                  <?php foreach ($comments as $cmt): ?>
                    <div class="comment mt-3">
                      <b> <?=$cmt['username']?></b> <?= $cmt['timeCreated']?>
                      <p style="margin-bottom: 0px"><?=$cmt['comment']?></p>
                      <i class="fa fa-thumbs-o-up mx-2" id="like"><data value= <?=$cmt['id']?>></data></i> 
                      <?php 
                      $numLike = $comment -> countLike($cmt['id']);
                      if ($numLike > 0) :
                        echo $numLike;
                      endif;
                      ?>

                      <i class="fa fa-thumbs-o-down mx-2" id="dislike"><data value= <?=$cmt['id']?>></data></i> 
                      <?php 
                      $numDislike = $comment -> countDislike($cmt['id']);
                      if ($numDislike > 0) :
                        echo $numDislike;
                      endif;
                      ?>
                    </div>
                  <?php endforeach?> 
                  <?php endif?>
                  </div>             
              </div>         
          </div>
        </div>
            </div>              
          </div>
          <div class="ctkh-dathang col-lg-4 my-5">
            <div class="ctkh-dathang-container container ms-5 w-75 p-0">
              <div class="container-fluid">
                <h2 class="my-3">
                  <?=$movie['title']?>
                </h2>
                
                <div class="ctkh-dathang-info">
                  <span class="d-block ps-1">
                    <i class="fa-solid "></i>
                    <p class="d-inline-block ms-1"><b>Đạo diễn: </b><?=$movie['actor']?></p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1"><b>Thời gian: </b><?=$movie['time']?></p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1"><b>Năm phát hành: </b><?=$movie['year_release']?></p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1"><b>Thể loại: </b><?=$movie['category']?></p>
                  </span>
                  <span class="d-block ps-1">
                    <i class="fa-solid"></i>
                    <p class="d-inline-block ms-1"><b>Quốc gia: </b><?=$movie['country']?></p>
                  </span>
                </div>
                <div class="d-grid gap-2 mb-4">
                  <a href="ghexemphim.php" name="" id="" class="btn btn-dark text-white btn-addcart">Đặt vé ngay</a>
                </div>
                <div class="d-grid gap-2 mb-4">
                  <form action="" method="POST">
                    <input type="text" value="yes" name="cart" hidden>
                    <button type="submit" href="" name="" id="cart" class="btn btn-dark text-white btn-addcart"style="width:100%">Thêm vào giỏ hàng</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </main>
  <!-- FOOTER -->
<?php
include '../partials/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
  $(document).ready(function() {
    $('#like').click(function(){
      let idComment = parseInt($('#like data').val(), 10)
      console.log(typeof(idComment))
      $.ajax({
        type: "POST",
        url:"like.php",
        data: {idComment:idComment},
        success: function(response) {
					console.log(response);
        }
      }).done(function(){
        location.reload();
      })
      
    })

    $('#dislike').click(function(){
      let idComment = parseInt($('#dislike data').val(), 10)
      console.log(typeof(idComment))
      $.ajax({
        type: "POST",
        url:"dislike.php",
        data: {idComment:idComment},
        success: function(response) {
					console.log(response);
        }
      }).done(function(){
        location.reload();
      })
      
    })

    $("#cart").click(function(){
      
    })
  })
</script>
