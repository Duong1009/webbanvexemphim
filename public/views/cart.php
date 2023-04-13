<?php
    include '../partials/header.php';
    include '../controllers/connect.php';

    $cart = new Cart;
    $movie = new Movie;

    $arr = $cart -> findCartFollowUsername($_COOKIE['username']);
    $movies = $movie -> findFilm($arr);
    print_r($movies);


?>
<main>
<div class="container category-items">
        <div class="row justify-content-center align-items-center g-2">
        <!-- <?php foreach ($allMovieShowing as $movie): ?>
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
          <?php endforeach?>         -->
        </div>
      </div>
</main>