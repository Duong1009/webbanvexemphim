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
	private $error = [];

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

    public function validate($POST) {
        if($POST['title'] == ''){
            $this->error['title'] = 'Tiêu đề được yêu cầu';
        }
        if($POST['actor'] == ''){
            $this->error['actor'] = 'Đạo diễn được yêu cầu';
        }
        if($POST['time'] == ''){
            $this->error['time'] = 'Thời gian chiếu được yêu cầu';
        }
        if($POST['year_release'] == ''){
            $this->error['year_release'] = 'Năm phát hành được yêu cầu';
        }
        if($POST['country'] == ''){
            $this->error['country'] = 'Quốc gia được yêu cầu';
        }
        if($POST['category'] == ''){
            $this->error['category'] = 'Thể loại được yêu cầu';
        }
        if($POST['imgLink'] == ''){
            $this->error['imgLink'] = 'Link poster được yêu cầu';
        }
        if($POST['idVideoReview'] == ''){
            $this->error['idVideoReview'] = 'Id video được yêu cầu';
        }
        if($POST['type'] == ''){
            $this->error['type'] = 'Loại phim được yêu cầu';
        }
        if($POST['review'] == ''){
            $this->error['review'] = 'Review phim được yêu cầu';
        }
        return $this->error;
    }

    public function save($POST){
        $cnt = "INSERT INTO movie(title,actor,time,year_release, category, country, imgLink, idVideoReview, review, type) VALUES(?,?,?,?,?,?,?,?,?,?);";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt->execute([$POST['title'],$POST['actor'],$POST['time'],$POST['year_release'],$POST['category'],$POST['country'],$POST['imgLink'],$POST['idVideoReview'], $POST['review'],$POST['type']]);
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
            $this->error['username'] = "Tên người dùng được yêu cầu";
        }
        $cnt = "SELECT username FROM user where username = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$POST['username']]);
        while ($row = $stmt -> fetch() ) {
            if($row){
                $this->error['username'] = "Người dùng đã tồn tại";
            }
        }
        if(($POST['password1']) == ''){
            $this->error['password1'] = "Mật khẩu được yêu cầu";
        }
        if(($POST['password1']) != $POST['password2']){
            $this->error['password2'] = "Mật khẩu xác nhận không khớp";
        }
        return $this->error;
    }

    public function validateSignin($POST){
        if(($POST['username']) == ''){
            $this->error['username'] = "Tên người dùng được yêu cầu";
        }
        if(($POST['password1']) == ''){
            $this->error['password1'] = "Mật khẩu được yêu cầu";
        }
        $cnt = "SELECT username FROM user WHERE username = ? AND password = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$POST['username'], $POST['password1']]);
        while ( $row = $stmt->fetch()){
            if(!$row){
                $this->error['check'] = "Tài khoản không tồn tại";
            }
        }
        return $this->error;

    }

}

?>
