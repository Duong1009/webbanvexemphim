<?php
    include '../partials/header.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        function redirect($location)
        {
          header('Location: ' . $location);
          exit();
        }
        $title = $_REQUEST['movie'];
        redirect('ghexemphim.php?prov='.$_POST['provinces'].'&dis='.$_POST['districts'].'&wards='.$_POST['wards'].'&time='.$_POST['time'].'&movie='.$title);
    }
?>


<div class="container mt-5">
    <h2 class="text-center">Chọn thời gian và địa điểm</h2>
    <form action="" class="mt-5" method="POST">
        <div class="row">
            <div class="col ">
                <select class="provinces" aria-label="Default select example" name="provinces" style="width:250px; height:30px" >
                    <option selected><b>Tỉnh/Thành Phố</b></option>                
                </select>
            </div>
            <div class="col ">
                <select class="districts" aria-label="Default select example" name="districts" style="width:250px; height:30px">
                    <option selected><b>Quận/Huyện</b></option>                
                </select>
            </div>

            <div class="col ">
                <select class="wards" aria-label="Default select example" name="wards" style="width:250px; height:30px">
                    <option selected><b>Xã/Phường</b></option>                
                </select>
            </div>
            <div class="col">
                <input type="time" id="appt" name="time"
                    min="07:00" max="21:00" >
            </div>
        </div>
        <div class="row mt-4 justify-content-center align-items-center submit" hidden>
            <button type="submit" class="btn btn-dark" style="width:100px">
                Chọn ghế
            </button>
        </div>
    </form>
</div>
<script type="text/javascript" src="../../libraries/jquery-3.6.4.js"></script>
<script>
    console.log($('input').val())
    $.ajax({
        type: 'GET',
        url: "https://provinces.open-api.vn/api/?depth=3" , 
        success: function (data, status, xhr) {
        for(var i=0; i<data.length; i++){
            $('.provinces').append(`<option selected value = ${i}><b>${data[i].name}</b></option>`)
        }  
        $('.provinces').change(function(){
            let index = $(this).val()
            let districts = data[index].districts
            for(i = 0; i < districts.length; i++) {
                $('.districts').append(`<option selected value = ${i}><b>${districts[i].name}</b></option>`)
            }
            $('.districts').change(function(){
                let j = $(this).val()
                let wards = data[index].districts[j].wards
                for(i = 0; i < wards.length; i++) {
                    $('.wards').append(`<option selected value = ${i}><b>${wards[i].name}</b></option>`)
                }
                let submit = document.querySelector('.submit')
                if(submit.hasAttribute('hidden')){
                    submit.removeAttribute('hidden')
                }
            })           
        })       
    }})
</script>