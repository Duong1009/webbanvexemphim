<?php
    include '../controllers/connect.php';
    $comment = new Comment;
    $id =$_POST['id'];
    $comment -> delete($id);
?>