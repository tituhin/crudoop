<?php

require_once '../../classes/Book.php';

$id = $_GET['id'];
$objBook = new Book();
$result = $objBook->delete('books', ['id'=>$id]);

if($result){
    header('location: index.php');
}  else {
    $_SESSION['failed'] = "Can not detete book!";
    header('location: index.php');
}

