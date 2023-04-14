<?php
    include '../partials/header.php';
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-4 my-3">
            <select class="provinces" aria-label="Default select example" name="type" >
                <option selected><b>Tỉnh/Thành Phố</b></option>                
            </select>
        </div>
        <div class="col-4 my-3">
            <select class="districts" aria-label="Default select example" name="type" >
                <option selected><b>Quận/Huyện</b></option>                
            </select>
        </div>

        <div class="col-4 my-3">
            <select class="wards" aria-label="Default select example" name="type" >
                <option selected><b>Xã/Phường</b></option>                
            </select>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../libraries/jquery-3.6.4.js"></script>
<script>
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
            })
           
        })    
        
        
        
    }})
</script>