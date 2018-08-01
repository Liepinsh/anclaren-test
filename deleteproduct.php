<?php

session_start();

spl_autoload_register(function($class_name){
    include($class_name . '.php');
});

//explodes and implodes selected items to make them as individual strings
$idPOST = $_POST['data'];
$ids = explode(',',$idPOST);
$in = '("' . implode('","', $ids) .'")';

class DeleteProduct extends Dbh {
    
    public function del(){
        $errors = [];
        $success = [];
        global $in;

        //if there is something selected to delete
        if(strlen($in) > 4){
            $sql = 'DELETE FROM products WHERE id IN ' . $in;
            $results = $this->connect()->query($sql);
            $this->connect()->close();
            $success[] = 'Successful: Selected items deleted';

        //if there is nothing selected to delete 
        } else {
            header( "refresh:5;url=index.php" ); 
            $errors[] = 'ERROR: Please select items to delete!';
        }

        //if there is an error or a successful information
        if (count($errors) > 0) {
            $_SESSION['flash']['errors'] = $errors;
            header('Location: index.php');
        } else if (count($success) > 0) {
            $_SESSION['flash']['success'] = $success;
            header('Location: index.php');
        } 
    }
}
$delete = new DeleteProduct;
$delete->del(); 
