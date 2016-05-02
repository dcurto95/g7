<?php


class HomeProductManagerModel extends Model{


    /*
     * Ojo! -> Les STRINGS estan escapades (\*), cal desescaparles per llegir-les!
     *
     * Revisar funcions:
     *      addslashes (...);
     *      stripcslashes(...);
     *
     * */

    public function addProduct($info){

        $name           = addslashes($info['name']);
        $price          = $info['price'];
        $stock          = $info['stock'];
        $description    = addslashes($info['description']);
        $date           = addslashes($info['date']);
        $image          = $info['image'];

        $query = <<<QUERY
        INSERT INTO `G7DB2`.`product`
            (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image`)
        VALUES
            (NULL, '$name', '$price', '$stock', "$description", '$date', '$image');
QUERY;

        $this->execute($query);

    }

    public function getProduct($id){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_product` = '$id'
QUERY;

        $product = $this->getAll($query);

        return $product;

    }

    public function getProductFromName($productName){
        $query = <<<QUERY
        SELECT `id_product` FROM `product` WHERE `name` = '$productName'
QUERY;

        $product = $this->getAll($query);

        return $product[0]['id_product'];
    }

}