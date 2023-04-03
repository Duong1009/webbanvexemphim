<?php include '../partials/header.php';?>
<div class="container mt-3">
<form>
    <div class="row">
        <div class="col">
            <label for="title"><b>Tiêu đề phim:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào tiêu đề phim" aria-label="title" id="title" name="title">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="actor"><b>Tác giả</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào tác giả" aria-label="actor" id="actor" name="actor">
        </div>
        <div class="col-3">
            <label for="time"><b>Thời lượng phim</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào thời lượng phim" aria-label="time" id="time" name="time">
        </div>
        <div class="col-3">
            <label for="year_release"><b>Năm phát hành</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào thời lượng phim" aria-label="year_release" id="year_release" name="year_release">
        </div>
    </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
</div>