<?php
include '../controllers/connect.php';

$comment = new Comment;

$id = (int)$_POST['idComment'];
$comment -> increaseLike($id)

?>