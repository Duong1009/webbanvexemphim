<?php
include '../model/connectDB.php';
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
    public function all(){
        $cnt = "select * from movie";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([]);
        $list = array();
        while($row = $stmt -> fetch()){
            array_push($list, $row);
        }
        return $list;
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

    public function delete($id){
        $cnt = "DELETE FROM movie WHERE id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt->execute([$id]);
    }

    function findFilm ($id){
        $cnt = "SELECT * FROM movie WHERE id in (".implode(',', array_fill(0, count($id), '?')).")";
        $stmt = $this->connect() -> prepare($cnt);
        foreach ($id as $key => $i) {
            $stmt->bindValue(($key+1), $i);
        }
    
        $stmt->execute();
        $list = array();
        while($row = $stmt -> fetch()){
            array_push($list, $row);
        }
        return $list;
    }

    public function update($POST, $id){
        $cnt = "UPDATE movie SET title = ?, actor = ?, time = ?, year_release = ?, category = ?,country = ?,imgLink = ?,idVideoReview = ?,review = ?, type = ? WHERE id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt->execute([$POST['title'],$POST['actor'],$POST['time'],$POST['year_release'],$POST['category'],$POST['country'],$POST['imgLink'],$POST['idVideoReview'], $POST['review'],$POST['type'], $id]);
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

class Comment extends DB{
    public function getComment($id){
        $cnt = "SELECT * FROM comment WHERE idFilm = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        $list = array();
        while($row = $stmt -> fetch()){
            array_push($list, $row);
        }
        return $list;
    }

    public function count($id){
        $cnt = "SELECT * FROM comment WHERE idFilm = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        $count = 0;
        while($row = $stmt -> fetch()){
            $count += 1;
        }
        return $count;
    }

    public function save($username, $comment, $idVideo){
        $cnt = "INSERT INTO comment(username,comment,idFilm) VALUES (?,?,?)";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$username,$comment,$idVideo]);
    }

    public function increaseLike($id){
        $cnt = 'SELECT numLike FROM comment WHERE id = ?';
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        $arr = $stmt ->fetch();
        $count = $arr['numLike'];
        $count += 1;
        $cnt = "UPDATE comment SET numLike = ? WHERE id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$count,$id]);
    }

    public function countLike($id){
        $cnt = "SELECT numLike FROM comment WHERE id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        $arr = $stmt ->fetch();
        return $arr['numLike'];
    }

    public function countDislike($id){
        $cnt = "SELECT numDislike FROM comment WHERE id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        $arr = $stmt ->fetch();
        return $arr['numDislike'];
    }

    public function increaseDislike($id){
        $cnt = 'SELECT numDislike FROM comment WHERE id = ?';
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$id]);
        $arr = $stmt ->fetch();
        $count = $arr['numDislike'];
        $count += 1;
        $cnt = "UPDATE comment SET numDislike = ? WHERE id = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$count,$id]);
    }

}

class Cart extends DB{
    public function addFilmToCart($idFilm, $username){
        $cnt = "INSERT INTO cart(idFilm, username) VALUES (?, ?)";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$idFilm, $username]);
    }

    public function findCartFollowUsername($username){
        $cnt = "SELECT idFilm FROM cart WHERE username = ?";
        $stmt = $this->connect() -> prepare($cnt);
        $stmt -> execute([$username]);
        $list = array();
        while($row = $stmt -> fetch()){
            array_push($list, $row['idFilm']);
        }
        return $list;

    }
}

?>
