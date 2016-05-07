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
        $image_small    = $info['image_small'];
        $image_big      = $info['image_big'];
        $views          = 0;
        $id_user        = $info['id_user'];

        $query = <<<QUERY
        INSERT INTO `G7DB2`.`product`
            (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image_small`, `image_big`, `views`, `id_user`)
        VALUES
            (NULL, '$name', '$price', '$stock', "$description", '$date', '$image_small', '$image_big', '$views', $id_user);
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

    public function getAllProductsFromName($productName){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `name` = '$productName' ORDER BY `id_product`
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

    public function getPrice($productId){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_product` = '$productId'
QUERY;

        $product = $this->getAll($query);

        return $product[0]['price'];
    }

    public function getStock($productId){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_product` = '$productId'
QUERY;
        $product = $this->getAll($query);

        return $product[0]['stock'];
    }

    public function getProductDescription($id){

        $query = <<<QUERY
        SELECT LEFT(`description`,50) as 'description' FROM `product` WHERE `id_product` = '$id'
QUERY;

        $description = $this->getAll($query);
        $description =  $description[0]['description'];

        return $description;

    }

    public function getLatestProduct(){
        $query = <<<QUERY
        SELECT * FROM `product` ORDER BY `id_product` DESC LIMIT 1
QUERY;
        $product = $this->getAll($query);

        return $product;
    }

    public function getMostViewedProducts($max)
    {
        /*
        Es mostrarà un llistat dels 5 producte més visionats (vegeu següent apartat).
        Per cadascun d’ells es mostrarà el títol, els 50 primers caràcters de la descripcio
        ́, la data de caducitat i el preu de venda. El títol ha de ser un link cap al visionat
        públic d’aquest producte

        */
        if ($max == 0){
            $query = <<<QUERY
        SELECT * FROM `product` ORDER BY `views` desc
QUERY;
        }else{
            $query = <<<QUERY
        SELECT * FROM `product` ORDER BY `views` desc limit 5
QUERY;
        }



        $product = $this->getAll($query);

        return $product;
    }

}