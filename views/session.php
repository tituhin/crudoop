<?php
session_start();
if(!$_SESSION['id']){
    header("location: http://localhost:8080/crudoop/views/login.php");
   }