<?php
include '../controllers/connect.php';
include '../partials/header.php';

$movie = new Movie;
$allMovieShowing = $movie -> getMovieShowing();
$allMovieShowSoon = $movie -> getMovieShowSoon();

?>

  <main>
    <!-- Banner -->
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="../img/Avengers3-poster.jpg" class="w-100 d-block" alt="First slide" height="400"> <!--Poster quang cao phim-->
        </div>
        <div class="carousel-item">
          <img src="../img/civil_war.jpg" class="w-100 d-block" alt="Second slide" height="400">  <!--Poster quang cao phim-->
        </div>
        <div class="carousel-item">
          <img src="../img/endgame.jpg" class="w-100 d-block" alt="Third slide" height="400">  <!--Poster quang cao phim-->
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
    <!-- Phim đang chiếu -->
    <div class="container-fluid">
      <div class="container courses-slogan mt-3">
        <h2>Phim đang chiếu</h2>
        <p>phim được xem nhiều nhất</p>
      </div>
      <div class="container category-items">
        <div class="row justify-content-center align-items-center g-2">
        <?php foreach ($allMovieShowing as $movie): ?>
          <div class="col-lg-3 col-md-6">
            <div class="container course-item">
              <a href="chitiet.php?id=<?=$movie['id']?>" class="text-decoration-none text-dark">
                <img src="<?=$movie['imgLink']?>" width="270" height="400">  <!--poster phim-->
                <div class="container course-detail p-0 mt-3">
                  <h6 class="course-detail-title font-weight-bold"><?=htmlspecialchars($movie['title'])?></h6>
                </div>
              </a>
            </div>
          </div>  
          <?php endforeach?>        
        </div>
      </div>
    </div>
    <!-- Phim sắp chiếu -->
    <div class="container-fluid">
      <div class="container courses-slogan mt-3">
        <h2>Phim sắp chiếu</h2>
      </div>
      <div class="container category-items">
        <div class="row justify-content-center align-items-center g-2">
        <?php foreach ($allMovieShowSoon as $movie): ?>
          <div class="col-lg-3 col-md-6">
            <div class="container course-item">
              <a href="chitiet.php?id=<?=$movie['id']?>" class="text-decoration-none text-dark">
                <img src="<?=$movie['imgLink']?>" width="270" height="400">  <!--poster phim-->
                <div class="container course-detail p-0 mt-3">
                  <h6 class="course-detail-title font-weight-bold"><?=htmlspecialchars($movie['title'])?></h6>
                </div>
              </a>
            </div>
          </div> 
          <?php endforeach?>            
        </div>
      </div>
    </div>
    
  </main>
<?php
include '../partials/footer.php';
?>