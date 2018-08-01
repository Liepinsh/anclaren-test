<?php

session_start();

spl_autoload_register(function($class_name){
    include($class_name . '.php');
});

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="row underline">
                <div class="col-xs-9">
                    <h1>Product List</h1>
                </div>
                <div class="col-xs-3">
                    <!-- Mass delete button -->
                    <div class="col-xs-8">
                        <form method="post">
                            <input type="button" id='clickAll' value="Mass delete action">
                        </form>  
                    </div>
                    <!-- Apply button -->
                    <div class="col-xs-4">
                        <form action="deleteproduct.php" method="post">
                            <input type="hidden" id="data" name="data" value="">
                            <input type="submit" value="Apply">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container" id="allCheckoxes">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row justify-content-around">

    <!-- Inserts information from DB with viewproduct.php -->
    <?php 
        $products = new DisplayProducts();
        $products->showAllProducts();
    ?>

                    </div>
                </div>
            </div>

            <!-- Includes flash messeges from errors and success arrays -->
            <div class="errors">
                <ul>

                    <?php
                        if (isset($_SESSION['flash']) && isset($_SESSION['flash']['errors'])){
                            foreach ($_SESSION['flash']['errors'] as $error){
                                echo "<li>$error</li>";
                            }
                            unset($_SESSION['flash']['errors']);
                        }
                        if (isset($_SESSION['flash']) && isset($_SESSION['flash']['success'])){
                            foreach ($_SESSION['flash']['success'] as $success){
                                echo "<li>$success</li>";
                            }
                            unset($_SESSION['flash']['success']);
                        }
                    ?>

                </ul>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>&copy Edgars. All rights reserved 2018.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
