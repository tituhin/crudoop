<?php
session_start();
if(!$_SESSION['id']){
    header("location: http://localhost/crudoop/views/login.php");
   }