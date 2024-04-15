<?php
    include '../partials/header.php';
    include '../controllers/connect.php';
    
    $chair = $_REQUEST['chair'];
   $money = $_REQUEST['money'];
   $prov = $_REQUEST['prov'];
   $district = $_REQUEST['district'];
   $wards = $_REQUEST['wards'];
   $time = $_REQUEST['time'];
   $movie = $_REQUEST['movie'];
   
?>

<?php if(isset($_COOKIE['username'])):?>
<div class="container mt-3">
    <h2 class="text-center">Thông tin đơn hàng của bạn</h2>
    <div class="mt-4" style="padding-left: 300px">
    <p><b>Tên phim: </b> <?=$movie?></p>
    <p><b>Vị trí ghế: </b> <?=$chair?></p>
    <p><b>Thời gian: </b> <?=$time?></p> 
    <p><b>Địa điểm: </b> <span class="place"></span> </p>
    <p><b>Tổng số tiền: </b> <?=$money?>000đ</p>
    <input type="text" class="prov" value='<?=$prov?>' hidden >
    <input type="text" class="dis" value='<?=$district?>' hidden >
    <input type="text" class="wards" value='<?=$wards?>' hidden >

    <button class="btn btn-dark pay" style="width:200px"> Thanh Toán</button>
    </div>
</div>
<?php endif?>
<script>
    $.ajax({
        type: 'GET',
        url: "https://provinces.open-api.vn/api/?depth=3" , 
        success: function (data, status, xhr) {
            let numProv = $('.prov').val()
            let numDis = $('.dis').val()
            let numWard =  $('.wards').val()
            let text = data[numProv].districts[numDis].wards[numWard].name + ' ' + data[numProv].districts[numDis].name + ' ' +  data[numProv].name 
            $('.place').text(text)
        } 
      })
    $('.pay').click(function(){
            alert("Thanh toán thành công")
    })
</script>

