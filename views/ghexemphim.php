<?php
include '../controllers/connect.php';
include '../partials/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $chair = $_POST['numberchair'];
   $money = $_POST['money'];
   $prov = $_REQUEST['prov'];
   $district = $_REQUEST['dis'];
   $wards = $_REQUEST['wards'];
   $time = $_REQUEST['time'];
   $movie = $_REQUEST['movie'];
   if($_POST['money'] > 0){    
      header('Location: ' . 'thanhtoan.php?movie='.$movie.'&chair='.$chair.'&time='.$time.'&money='.$money.'&prov='.$prov.'&district='.$district.'&wards='.$wards);
   }else{
    $error = "Vui lòng chọn ghế";
   }
}

?>

<div class="container mt-4">
    <?php if(isset($error)):?>
        <span class="help-block text-danger">
				<strong><?= htmlspecialchars($error) ?></strong>
		</span>
    <?php endif ?>
<div class="screen">Screen</div>
<div class="row">
    <div class="col-1">
        <div class="numSeat">A</div>
        <div class="numSeat">B</div>
        <div class="numSeat">C</div>
        <div class="numSeat">D</div>
        <div class="numSeat">E</div>
    </div>
    <div class="col-11">
        <div class="seats">
            <?php for($i=1; $i <= 85; $i++):?>
                <div class="seat text-center white-text p-2" id=<?=$i?> name=<?=$i?>></div>
            <?php endfor?>
        </div>
    </div>
</div>
<div class="pay text-white p-2" hidden >   
    <div class="row">
        <div class="col">
            <p>Tổng số tiền: <span class="money"></span></p>
        </div>
        <div class="col" >
            <form action="" method="POST">
                <input type="text" name="numberchair" id="numberchair" hidden>
                <input type="text" name="money" id="money" hidden>
                <button class="btn btn-light" style="float:right">Đặt vé</button>
            </form>
        </div>
    </div>  
    
</div>
</div>

<script>
    $("document").ready(function(){
        let seats = document.querySelectorAll(".seat");
        let money = document.querySelector('.money')
        let pay = document.querySelector('.pay')
        let count = 0
        let row = ['A','B','C','D','E'] 
        let numChair = []
        seats.forEach(seat => {
            seat.addEventListener("click", function(){   
                let stt = $(this).attr('id')
                let num = stt % 17
                let numrow = (stt - num) / 17 
                let chair = row[numrow]+num                    
                if (this.classList.contains('selected')){
                    this.classList.remove('selected');
                    count -= 1;
                    numChair = numChair.filter(item => item != (chair))
                    $(this).text("")
                }else{
                    this.classList.add('selected');
                    count += 1;
                    numChair.push(chair)
                    $(this).text(chair)
                }    
                console.log(numChair)
                let sumMoney = count * 75
                money.innerText = sumMoney
                if(pay.hasAttribute('hidden')){
                    pay.removeAttribute('hidden')
                }
                let text = numChair.toString()
                $('#numberchair').val(text)
                $('#money').val(sumMoney)
            })
        })
    })
</script>