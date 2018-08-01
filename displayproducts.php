<?php 

class DisplayProducts extends GetProducts {

    public function showAllProducts() {

        //takes information from DB thanks to product.php file.
        //creates each product a html format to further display in index.php
        $datas = $this->getAllProducts();
        foreach ($datas as $data) {
            echo "<div class='col-xs-3 item'>
                <form action='/action_page.php' method='get' class='check'>
                    <input class='item-checkbox' type='checkbox' data-itemID=".$data['id'].">
                </form>
                    <ul class='liste'>
                        <li>" . $data['id'] . "</li>
                        <li>" . $data['productname'] . "</li>
                        <li>" . $data['price'] . " $</li>
                        <li>" . $data['typeinput'] . "</li>
                    </ul>
                </div>";
        }
    }
}