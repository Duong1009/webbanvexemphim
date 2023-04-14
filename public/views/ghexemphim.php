<?php
include '../controllers/connect.php';
include '../partials/header.php';
?>

<div class="container mt-4">
<div class="screen">Screen</div>
<div class="row">
    <div class="col-1">
        <div class="numSeat">A</div>
        <div class="numSeat">B</div>
        <div class="numSeat">D</div>
        <div class="numSeat">E</div>
        <div class="numSeat">F</div>
    </div>
    <div class="col-11">
        <div class="seats">
            <?php for($i=1; $i <= 85; $i++):?>
                <div class="seat" id=<?=$i?> name=<?=$i?>></div>
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
            <button class="btn btn-light" style="float:right">Đặt vé</button>
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
        seats.forEach(seat => {
            seat.addEventListener("click", function(){
                if (this.classList.contains('selected')){
                    this.classList.remove('selected');
                    count -= 1;
                }else{
                    this.classList.add('selected');
                    count += 1;
                }    
                let sumMoney = count * 75
                money.innerText = sumMoney
                if(pay.hasAttribute('hidden')){
                    pay.removeAttribute('hidden')
                }
            })
        })
    })
</script>