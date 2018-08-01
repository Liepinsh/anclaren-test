<?php 

spl_autoload_register(function($class_name){
    include($class_name . '.php');
});

class Insert extends Validate {
    
    public function inserts($newSKU, $name, $price, $type, $typeSpecificInput){

        //inserts product information into DB
        $sql = "INSERT INTO products (id, productname, price, producttype, typeinput)
        VALUES ('$newSKU ', '$name ', '$price ', '$type ', '$typeSpecificInput ')";
        $result = $this->connect()->query($sql);

    }
}
$insertItem = new Insert;
$insertItem->inserts($newSKU, $name, $price, $type, $typeSpecificInput);
