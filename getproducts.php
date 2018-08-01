<?php 

class GetProducts extends Dbh {
    
    protected function getAllProducts() {

        //requests all products from DB
        $sql = "SELECT * FROM products";
        $results = $this->connect()->query($sql);
        $numRows = $results->num_rows;

        if ($numRows > 0) {
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
}
