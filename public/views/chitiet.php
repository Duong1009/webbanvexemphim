<?php
include '../controllers/connect.php';
include '../partials/header.php';

$id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
$contact = new Movie;
$movie = $contact->getMovie($id);
?>


  <main>
    <div class="container-fluid">
      <div class="container">
        <div class="row justify-content-center align-items-start g-2">
          <div class="col-lg-8">
            <div class="container my-5 p-5 border">
              <div class="row justify-content-center">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$movie['idVideoReview']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
                  <a href="" name="" id="" class="btn btn-dark text-white btn-addcart">Đặt vé ngay</a>
                </div>
                <div class="d-grid gap-2 mb-4">
                  <a href="" name="" id="" class="btn btn-dark text-white btn-addcart">Thêm vào giỏ hàng</a>
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
                  <b><?=$movie['title']?></b> <?=$movie['review']?> 
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
<?php
include '../partials/footer.php';
?>