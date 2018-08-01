<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product add</title>
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
                    <h1>Product Add</h1>
                </div>
                <!-- Save button -->
                <div class="col-xs-3 save">
                    <input type="submit" name="save" id="data2" value="Save" form="product-form">
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 item-form">
                    <form id="product-form" method="post" action="validate.php">

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

                        <!-- SKU input field -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SKU</label>
                            <div class="col-sm-9">
                                <input value="<?php echo isset($_SESSION['sku']) ? $_SESSION['sku'] : '';?>" type="text" name="sku" class="form-control item-field" id="inputSKU" placeholder="SKU number">
                            </div>
                        </div>

                        <!-- Name input field -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" type="text" name="name" class="form-control item-field" id="inputName" placeholder="Product name">
                            </div>
                        </div>

                        <!-- Price input field -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input value="<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : ''; ?>" type="text" name="price" class="form-control item-field" id="inputPrice" placeholder="Product price in dollars">
                            </div>
                        </div>

                        <!-- Type switcher -->
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type switcher</label>
                            <div class="col-sm-7">
                                <select id="type-selector" name="type">
                                    <option selected disabled hidden>Select a type</option>
                                    <option data-type="gold">Gold</option>
                                    <option data-type="purse">Purse</option>
                                    <option data-type="shirt">Shirt</option>
                                </select>
                            </div>
                        </div>

                        <!-- Type switcher hidden fields -->
                        <form id="type-switcher" method="post">

                            <!-- Gold weight input field -->
                            <div class="form-group row switcher hidden" id="gold-input">
                                <label class="col-md-4 col-form-label">Weight</label>
                                <div class="col-md-8">
                                    <input value="<?php echo isset($_SESSION['weight']) ? $_SESSION['weight'] : ''; ?>" type="text" name="weight" class="form-control" id="inputWeight" placeholder="Weight in Kg">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium, nisl vel cursus rutrum, urna augue eleifend justo, ac fringilla ligula enim sed metus. </p>
                            </div>

                            <!-- Purse inputs -->
                            <div class="form-group row switcher hidden" id="purse-input">

                                <!-- Height input field -->
                                <label class="col-sm-12 col-md-4 col-form-label">Height</label>
                                <div class="col-sm-12 col-md-8">
                                    <input value="<?php echo isset($_SESSION['height']) ? $_SESSION['height'] : ''; ?>" type="text" name="height" class="form-control" id="inputHeight" placeholder="Height in mm">
                                </div>

                                <!-- Width input field -->
                                <label class="col-sm-12 col-md-4 col-form-label">Width</label>
                                <div class="col-sm-12 col-md-8">
                                    <input value="<?php echo isset($_SESSION['width']) ? $_SESSION['width'] : ''; ?>" type="text" name="width" class="form-control" id="inputWidth" placeholder="Width in mm">
                                </div>
                                
                                <!-- Lenght input field -->
                                <label class="col-sm-12 col-md-4 col-form-label">Lenght</label>
                                <div class="col-sm-12 col-md-8">
                                    <input value="<?php echo isset($_SESSION['lenght']) ? $_SESSION['lenght'] : ''; ?>" type="text" name="lenght" class="form-control" id="inputLenght" placeholder="Lenght in mm">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium, nisl vel cursus rutrum, urna augue eleifend justo, ac fringilla ligula enim sed metus. </p>
                            </div>
                            
                            <!-- Shirt inputs -->
                            <div class="form-group row switcher hidden" id="shirt-input">

                                <!-- Shirt size hidden fields -->
                                <label class="col-md-4 col-form-label">Size</label>
                                <div class="col-md-8">
                                    <select id="type-selector-shirt" name="shirt-type">
                                        <option selected disabled hidden>Select a size</option>
                                        <option data-type="s">S</option>
                                        <option data-type="m">M</option>
                                        <option data-type="l">L</option>
                                        <option data-type="xl">XL</option>
                                    </select>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium, nisl vel cursus rutrum, urna augue eleifend justo, ac fringilla ligula enim sed metus. </p>
                            </div>
                        </form>     
                    </form>
                </div>
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
    <script type="text/javascript" src="main2.js"></script>
</body>
</html>
