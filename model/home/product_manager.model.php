<?php


class HomeProductManagerModel extends Model{

    public function addProduct($info){

        $name           = $info['name'];
        $price          = $info['price'];
        $stock          = $info['stock'];
        $description    = $info['dexcription'];
        $date           = $info['date'];
        $image          = $info['image'];

        $query = <<<QUERY
        INSERT INTO `G7DB2`.`product`
            (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image`)
        VALUES
            (NULL, '$name', '$price', '$stock', '$description', '$date', '$image');
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

}