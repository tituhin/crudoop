<?php 
require_once '../session.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Admin Dashboard </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <style>
           
        </style>

    </head>
    <body >
        <div>
            <div class="row">

                <div class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse ">
                        <ul class="navbar-nav mr-auto">
                            <li class="crumb nav-item"><a class="nav-link" href="index.php">HOME </a></li>
                            <li class="crumb"><a class="nav-link" href="">Services </a></li>
                            <li class="crumb main_logout">
                                <a class="nav-link float-left btn-danger" href="http://localhost:8080/crudoop/views/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>            
                </div>

                <div class="container">
                    <div class="row">
                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light col-2">

                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="/crudoop/views/book/index.php" class="nav-link" aria-current="page">
                                        Book List
                                    </a>
                                </li>
                                <li>
                                    <a href="category.php" class="nav-link link-dark">
                                        Book Category
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark">
                                        Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark">
                                        Products
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link link-dark">
                                        Customers
                                    </a>
                                </li>
                            </ul>



                        </div>
                        <div class="col-8 mx-auto">

                            <!--main content--> 



