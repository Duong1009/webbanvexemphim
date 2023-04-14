<?php
    include '../partials/header.php';
    include '../controllers/connect.php';

    $id = isset($_REQUEST['id']) ? filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
    $contact = new Movie;
    $movie = $contact->getMovie($id);

    function redirect($location)
    {
        header('Location: ' . $location);
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $contact->update($_POST, $id);
        redirect('chinhsua.php?id='.$id);
    }
?>

<div class="container mt-3">
<form method="POST">
    <div class="row">
        <div class="col">
            <label for="title"><b>Tiêu đề phim:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào tiêu đề phim" aria-label="title" id="title" name="title" value='<?=$movie['title']?>'>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label for="actor"><b>Tác giả:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào tác giả" aria-label="actor" id="actor" name="actor" value='<?=$movie['actor']?>'>
             
        </div>
        <div class="col-3">
            <label for="time"><b>Thời lượng phim:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào thời lượng phim" aria-label="time" id="time" name="time" value='<?=$movie['time']?>'>
            
        </div>
        <div class="col-3">
            <label for="year_release"><b>Năm phát hành:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào thời lượng phim" aria-label="year_release" id="year_release" name="year_release" value='<?=$movie['year_release']?>'>
           
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4">
            <label for="category"><b>Thể loại:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào thể loại phim" aria-label="category" id="category" name="category" value='<?=$movie['category']?>'>
           
        </div>
        <div class="col-3">
            <label for="country"><b>Quốc gia:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào quốc gia sản xuất" aria-label="country" id="country" name="country" value='<?=$movie['country']?>'>
           
        </div>
        <div class="col-3">
            <label for="idVideoReview"><b>idVideoReview:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào id của video review" aria-label="idVideoReview" id="idVideoReview" name="idVideoReview" value='<?=$movie['idVideoReview']?>'>
           
        </div>
        <div class="col-2 ">
            <label for="type" ><b>Loại phim:</b></label>
            <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào loại phim" aria-label="type" id="type" name="type" value='<?=$movie['type']?>'>
            
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="imgLink"><b>Link poster:</b></label>
                <input type="text" class="form-control border border-dark rounded-pill" placeholder="Nhập vào id của video review" aria-label="imgLink" id="imgLink" name="imgLink" value='<?=$movie['imgLink']?>'>
                
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
            <label for="review" ><b>Review:</b></label>
            <textarea class="form-control" placeholder="Review" id="review" name="review"><?=$movie['review']?></textarea>
            
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-dark mt-3 ">Submit</button>
  
</form>
</div>