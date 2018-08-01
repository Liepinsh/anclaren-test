<?php 

session_start();

spl_autoload_register(function($class_name){
    include($class_name . '.php');
});

$sku = !empty($_POST['sku']) ? $_POST['sku'] : '';
$name = !empty($_POST['name']) ? $_POST['name'] : '';
$price = !empty($_POST['price']) ? $_POST['price'] : '';
$type = !empty($_POST['type']) ? $_POST['type'] : '';
$size = !empty($_POST['size']) ? $_POST['size'] : '';
$weight = !empty($_POST['weight']) ? $_POST['weight'] : '';
$height = !empty($_POST['height']) ? $_POST['height'] : '';
$width = !empty($_POST['width']) ? $_POST['width'] : '';
$lenght = !empty($_POST['lenght']) ? $_POST['lenght'] : '';

$_SESSION['sku'] = $sku;
$_SESSION['name'] = $name;
$_SESSION['price'] = $price;
$_SESSION['type'] = $type;
$_SESSION['size'] = $size;
$_SESSION['weight'] = $weight;
$_SESSION['height'] = $height;
$_SESSION['width'] = $width;
$_SESSION['lenght'] = $lenght;

class Validate extends Dbh {
    
    public function valid($sku, $name, $price, $type, $size, $weight, $height, $width, $lenght){

        $errors = [];
        $success = [];

        //if SKU is not a positive number
        if(!preg_match("/^0*?[1-9]+\d*/", $sku) || strlen($sku) == 0){
            $errors[] = 'Only positive numbers allowed in SKU field';
        }

        //if name is not a word
        if(!preg_match("/^[A-Za-z]+$/", $name) || strlen($name) == 0){
            $errors[] = 'Only letters from A-Z allowed in name field';
        }

        //if price is not a positive number
        if(!preg_match("/^0*?[1-9]+\d*/", $price) || strlen($price) == 0){
            $errors[] = 'Only positive numbers allowed in price field';
        }
        
        //if type is not selected
        if(empty($type)){
            $errors[] = 'Please select a type';

        //if type is selected
        } else {

            //if type is disc
            if($type == 'DVD-disc'){

                //if disc size is not a positive number
                if(!preg_match("/^0*?[1-9]+\d*/", $size) || strlen($size) == 0){
                    $errors[] = 'For Disc, only positive numbers allowed in size field';

                //if everything is correct with disc input
                } else {
                    $typeSpecificInput = 'Size: ' . $size . 'MB';
                    $newSKU = 'JKD' . $sku;

                    //checks if such SKU already exists in the DB
                    $sql = "SELECT * FROM products WHERE id = '".$newSKU."'";
                    $results = $this->connect()->query($sql);

                    if (($results->num_rows) > 0) {
                        $errors[] = 'Such SKU already exists';
                    }
                }
            }

            //if type is book
            if($type == 'Book'){

                //if weight is not a positive number
                if(!preg_match("/^0*?[1-9]+\d*/", $weight) || strlen($weight) == 0){
                    $errors[] = 'For Book, only positive numbers allowed in weight field';

                //if everything is correct with book input
                } else {
                    $typeSpecificInput = 'Weight: ' .$weight. 'Kg';
                    $newSKU = 'GGWP' . $sku;

                    //checks if such SKU already exists in the DB
                    $sql = "SELECT * FROM products WHERE id = '".$newSKU."'";
                    $results = $this->connect()->query($sql);

                    if (($results->num_rows) > 0) {
                        $errors[] = 'Such SKU already exists';
                    }
                }
            }

            //if type is furniture
            if($type == 'Furniture'){

                //if height is not a positive number
                if(!preg_match("/^0*?[1-9]+\d*/", $height) || strlen($height) == 0){
                    $errors[] = 'For Furniture, only positive numbers allowed in height field';
                }

                //if width is not a positive number
                if(!preg_match("/^0*?[1-9]+\d*/", $width) || strlen($width) == 0){
                    $errors[] = 'For Furniture, only positive numbers allowed in width field';
                }

                //if lenght is not a positive number
                if(!preg_match("/^0*?[1-9]+\d*/", $lenght) || strlen($lenght) == 0){
                    $errors[] = 'For Furniture, only positive numbers allowed in lenght field';
                }

                //if everything is correct with furniture input
                else{
                    $typeSpecificInput = 'Dimension: ' .$height. 'x' .$width. 'x' .$lenght. 'mm';
                    $newSKU = 'GKD' . $sku;

                    //checks if such SKU already exists in the DB
                    $sql = "SELECT * FROM products WHERE id = '".$newSKU."'";
                    $results = $this->connect()->query($sql);

                    if (($results->num_rows) > 0) {
                        $errors[] = 'Such SKU already exists';
                    }
                }
            }
        }

        //if there are no errors
        if(count($errors) == 0){
            session_destroy();
            session_start();
            $success[] = 'Item added';
            include_once 'insert.php';
        }

        //if there is an error or a successful information
        if (count($errors) > 0) {
            $_SESSION['flash']['errors'] = $errors;
            header('Location: index2.php');
        } else if (count($success) > 0) {
            $_SESSION['flash']['success'] = $success;
            header('Location: index2.php');
        } 
    }
}

$validation = new Validate;
$validation->valid($sku, $name, $price, $type, $size, $weight, $height, $width, $lenght);
