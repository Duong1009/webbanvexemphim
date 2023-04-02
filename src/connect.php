<?php
include 'connectDB.php';
class Movie extends DB{

    private $db;
	private $id = -1;
	public $title;
	public $actor;
	public $time;
	public $year_release;
	public $category;
    public $country;
    public $review;
    public $imgLink;
    public $idVideoReview;
	private $errors = [];

    public function getMovie($id){
        $cnt = "select * from movie where id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        while($row = $stmt -> fetch()){
            return $row;
        }
    }
    public function getMovieShowing(){
        $cnt = "select * from movie where type = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([1]);
        $list = array();
        while($row = $stmt -> fetch()){
            array_push($list, $row);
        }
        return $list;
    }

    public function getMovieShowSoon(){
        $cnt = "select * from movie where type = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([0]);
        $list = array();
        while($row = $stmt -> fetch()){
            array_push($list, $row);
        }
        return $list;
    }

}

class User extends DB{
    public $error = [];
    public function save($username, $password){
        $cnt = "INSERT INTO USER(username, password) VALUES(?,?)";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$username,$password]);
    }

    public function validate($POST) {
        if(($POST['username']) == ''){
            $this->error['username'] = "username is required";
        }
        $cnt = "SELECT username FROM user where username = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$POST['username']]);
        while ($row = $stmt -> fetch() ) {
            if($row){
                $this->error['username'] = "The username already exists";
            }
        }
        if(($POST['password1']) == ''){
            $this->error['password1'] = "password is required";
        }
        if(($POST['password1']) != $POST['password2']){
            $this->error['password2'] = "password comfirm is not correct";
        }
        return $this->error;
    }

    public function validateSignin($POST){
        if(($POST['username']) == ''){
            $this->error['username'] = "username is required";
        }
        if(($POST['password1']) == ''){
            $this->error['password1'] = "password is required";
        }
        $cnt = "SELECT username FROM user WHERE username = ? AND password = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$POST['username'], $POST['password1']]);
        while ( $row = $stmt->fetch()){
            if(!$row){
                $this->error['check'] = "The account does not exist";
            }
        }
        return $this->error;

    }

}
?>
