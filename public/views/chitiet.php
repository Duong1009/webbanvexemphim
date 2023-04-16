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

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['suacomment'])){
  $content = $_POST['suacomment'];
  $idcomment = (int)$_POST['idcomment'];
  $comment -> update($idcomment,$content);
  redirect('chitiet.php?id='.$id);
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
                      <?php if($_COOKIE['username'] == 'admin' or $cmt['username'] == $_COOKIE['username'] ) :?>
                        <span id='<?=$cmt['id']?>' class="text-dark xoacomment" > <i class="fa fa-trash" aria-hidden="true"></i></span>
                        <?php endif ?>
                        <?php if($cmt['username'] == $_COOKIE['username'] ) :?>
                          <span class="text-dark"><i class="fa fa-pencil suacomment" aria-hidden="true">
                          <form action="" method="POST" hidden class="formsua">
                            <div class="row">
                              <div class="col-11">
                                <input type="text" value='<?=$cmt['comment']?>' style="width:650px; height:40px" name="suacomment" class="border border-dark rounded-pill p-2">
                                <input type="text" value='<?=$cmt['id']?>' name="idcomment" hidden>
                              </div>
                              <div class="col-1">
                               <button style="border:none; background-color: transparent" type="submit"><i class="fa fa-arrow-circle-right mt-2" style="font-size:24px"></i></button>
                              </div>
                              
                            </div>
                          
                      </form>
                          </i></span>
                        <?php endif ?>
                      <p style="margin-bottom: 0px"><?=$cmt['comment']?></p>
                      
                      <i class="fa fa-thumbs-o-up mx-2 like"><data value= <?=$cmt['id']?>></data></i> 
                      <?php 
                      $numLike = $comment -> countLike($cmt['id']);
                      if ($numLike > 0) :
                        echo $numLike;
                      endif;
                      ?>

                      <i class="fa fa-thumbs-o-down mx-2 dislike"><data value= <?=$cmt['id']?>></data></i> 
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
                <?php if(isset($_COOKIE['username'])):?>
                <div class="d-grid gap-2 mb-4">                  
                  <a href="diadiem.php?movie=<?=$movie['title']?>" name="" id="" class="btn btn-dark text-white btn-addcart">Đặt vé ngay</a>                 
                </div>
                <div class="d-grid gap-2 mb-4">
                  <form action="" method="POST">
                    <input type="text" value="yes" name="cart" hidden>
                    <button type="submit" href="" name="" id="cart" class="btn btn-dark text-white btn-addcart"style="width:100%">Thêm vào giỏ hàng</button>
                  </form>
                </div>
                 <?php endif?>
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
    let cookie = $.cookie('username')
    console.log(cookie)
    if(cookie){
      let likes = document.querySelectorAll('.like')
      likes.forEach(like => {
        like.addEventListener('click',function(){
          let idComment = parseInt($(this).children().val(), 10)
          console.log(idComment)
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
      })
      let disLikes = document.querySelectorAll('.dislike')
      disLikes.forEach(dislike => {
        dislike.addEventListener('click',function(){
          let idComment = parseInt($(this).children().val(), 10)
          console.log(idComment)
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
      })    
  }

  let xoacomment = document.querySelectorAll('.xoacomment')
  xoacomment.forEach(xoa => {
    xoa.addEventListener('click', function(){
      let id = this.id
      console.log(id)
      $.ajax({
        type: 'POST',
        url: "xoacomment.php",
        data: {id:id},
        success: function(response) {
            console.log(response)
          }
      }).done(function(){
          location.reload()
      })
    })
  })

  let suacomment = document.querySelectorAll('.suacomment')
  suacomment.forEach(sua => {
    sua.addEventListener('click', function(){
      let form = this.querySelector('.formsua')
      form.removeAttribute('hidden')
    })
  })

})
</script>
