<?php
include 'connectDB.php';
class Exec extends DB{
    public function getMovie(){
        $cnt = "select * from movie where id = 1";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute();
        $list = array();
        while($row = $stmt -> fetch()){
            print_r( $row);
        }
    }
    
}
$test = new Exec();
$test -> getMovie();
?>
