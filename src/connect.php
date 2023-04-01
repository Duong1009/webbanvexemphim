<?php
include 'connectDB.php';
class Exec extends DB{
    public function getMovie($id){
        $cnt = "select * from movie where id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        while($row = $stmt -> fetch()){
            return $row;
        }
    }
    
}
?>
