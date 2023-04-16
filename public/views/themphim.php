<?php include '../partials/header.php';
    include '../controllers/connect.php';
    $movie = new Movie;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = $movie->validate($_POST);
        if(count($error) == 0){
            $movie->save($_POST);
        }
    }
?>
<div class="container mt-3">
<form method="POST">
    <div class="row">
        <div class="col">
            <label for="title"><b>Tiêu đề phim:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào tiêu đề phim" aria-label="title" id="title" name="title">
            <?php if(isset($error['title'])): ?>
              <span class="help-block text-danger">
				<strong><?= htmlspecialchars($error['title']) ?></strong>
			    </span>
              <?php endif ?>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label for="actor"><b>Tác giả:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào tác giả" aria-label="actor" id="actor" name="actor">
            <?php if(isset($error['actor'])): ?>
              <span class="help-block text-danger">
				<strong><?= htmlspecialchars($error['actor']) ?></strong>
				</span>
              <?php endif ?>   
        </div>
        <div class="col-3">
            <label for="time"><b>Thời lượng phim:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào thời lượng phim" aria-label="time" id="time" name="time">
            <?php if(isset($error['time'])): ?>
              <span class="help-block text-danger">
					<strong><?= htmlspecialchars($error['time']) ?></strong>
				</span>
              <?php endif ?>
        </div>
        <div class="col-3">
            <label for="year_release"><b>Năm phát hành:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào năm phát hành phim phim" aria-label="year_release" id="year_release" name="year_release">
            <?php if(isset($error['year_release'])): ?>
              <span class="help-block text-danger">
					<strong><?= htmlspecialchars($error['year_release']) ?></strong>
			</span>
              <?php endif ?>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4">
            <label for="category"><b>Thể loại:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào thể loại phim" aria-label="category" id="category" name="category">
            <?php if(isset($error['category'])): ?>
              <span class="help-block text-danger">
					<strong><?= htmlspecialchars($error['category']) ?></strong>
			</span>
              <?php endif ?>
        </div>
        <div class="col-3">
            <label for="country"><b>Quốc gia:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào quốc gia sản xuất" aria-label="country" id="country" name="country">
            <?php if(isset($error['country'])): ?>
              <span class="help-block text-danger">
					<strong><?= htmlspecialchars($error['country']) ?></strong>
			</span>
              <?php endif ?>
        </div>
        <div class="col-3">
            <label for="idVideoReview"><b>idVideoReview:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào id của video review" aria-label="idVideoReview" id="idVideoReview" name="idVideoReview">
            <?php if(isset($error['idVideoReview'])): ?>
              <span class="help-block text-danger">
					<strong><?= htmlspecialchars($error['idVideoReview']) ?></strong>
			</span>
              <?php endif ?>
        </div>
        <div class="col-2 ">
            <label for="type" ><b>Loại phim:</b></label>
            <select class="form-select" aria-label="Default select example" name="type" id="type">
                <option selected><b>Loại phim</b></option>
                <option value="1">đang chiếu</option>
                <option value="0">sắp chiếu</option>
            </select>
            <?php if(isset($error['type'])): ?>
              <span class="help-block text-danger">
					<strong><?= htmlspecialchars($error['type']) ?></strong>
			</span>
              <?php endif ?>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="imgLink"><b>Link poster:</b></label>
                <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào link của poster" aria-label="imgLink" id="imgLink" name="imgLink">
                <?php if(isset($error['imgLink'])): ?>
                <span class="help-block text-danger">
                        <strong><?= htmlspecialchars($error['imgLink']) ?></strong>
                </span>
              <?php endif ?>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
            <label for="review" ><b>Review:</b></label>
            <textarea class="form-control" placeholder="Review" id="review" name="review"></textarea>
            <?php if(isset($error['review'])): ?>
              <span class="help-block text-danger">
					<strong><?= htmlspecialchars($error['review']) ?></strong>
			</span>
              <?php endif ?>
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-dark mt-3 ">Submit</button>
  
</form>
</div>