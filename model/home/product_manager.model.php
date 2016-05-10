<?php


class HomeProductManagerModel extends Model{

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
        $ventes         = 0;

        $query = <<<QUERY
        INSERT INTO `G7DB2`.`product`
            (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image_small`, `image_big`, `views`, `id_user`, `ventes`)
        VALUES
            (NULL, '$name', '$price', '$stock', "$description", '$date', '$image_small', '$image_big', '$views', $id_user, $ventes);
QUERY;

        $this->execute($query);

    }

    public function getLastInsertID(){

        $query = <<<QUERY
        SELECT LAST_INSERT_ID() FROM `product`;
QUERY;

        return ($this->getAll($query)[0]['LAST_INSERT_ID()']);

    }

    public function increaseView($id_product){

        $product = $this->getProduct($id_product);

        $views = $product['views'];
        $views = $views+1;

        $query = <<<QUERY
        UPDATE `product` SET views = '$views' WHERE id_product = '$id_product';
QUERY;

        $this->execute($query);

    }

    public function getProduct($id){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_product` = '$id'
QUERY;

        $product = $this->getAll($query);


        return $product[0];
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

        if(empty($product)){

            $query2 = <<<QUERY
        SELECT `id_product` FROM `url_old_new` WHERE `old_name` = '$productName'
QUERY;

            $names_product = $this->getAll($query2);

            $id_product = $names_product[0]['id_product'];

        } else {
            $id_product = $product[0]['id_product'];
        }

        return $id_product;
    }

    public function checkNameInURL($id_product, $old_name){
        $query = <<<QUERY
        SELECT `id_product` FROM `url_old_new` WHERE `old_name` = '$old_name' AND `id_product`= '$id_product'
QUERY;

        $names_product = $this->getAll($query);

        $id_product = $names_product[0]['id_product'];

        return $id_product;

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
        return $product[0];
    }

    public function getMostViewedProducts($max)
    {
        if ($max == 0){
            $query = <<<QUERY
        SELECT * FROM `product` ORDER BY `views` desc
QUERY;

        }else{
            $query = <<<QUERY
        SELECT * FROM `product` ORDER BY `views` desc limit 4
QUERY;

        }
        $product = $this->getAll($query);
        return $product;
    }


    public function getTotalViews(){
        $query = <<<QUERY
        SELECT sum(views) as total FROM `product`
QUERY;

        $product = $this->getAll($query);
        return $product[0]['total'];
    }


    public function getLastInsertImages(){
        $query = <<<QUERY
        SELECT id_user,image_small FROM `product` ORDER BY `id_product` DESC LIMIT 4
QUERY;

        $images = $this->getAll($query);
        return $images;
    }



    public function deleteProduct($id_product){
        $query = <<<QUERY
        DELETE FROM `product` WHERE `id_product` = '$id_product'
QUERY;

        $this->execute($query);
    }

    public function editProduct($info){

        $id_product     = $info['id_product'];
        $name           = addslashes($info['name']);
        $price          = $info['price'];
        $stock          = $info['stock'];
        $description    = addslashes($info['description']);
        $date           = addslashes($info['date']);
        $image_small    = $info['image_small'];
        $image_big      = $info['image_big'];
        $views          = $info['views'];
        $id_user        = $info['id_user'];

        $old_product = $this->getProduct($id_product);
        $old_name = $old_product['name'];
        $diferentNames = strcmp($name, $old_name) != 0;

        if ($diferentNames == true){
            $this->addProductURLChange($id_product, $name, $old_name);
        }

        $query = <<<QUERY
        UPDATE `product` SET
            `name` = '$name',
            `price` = '$price',
            `stock` = '$stock',
            `description` = '$description',
            `date` = '$date',
            `image_small` = '$image_small',
            `image_big` = '$image_big',
            `views` = '$views',
            `id_user` = '$id_user'
        WHERE `id_product` = '$id_product';
QUERY;

        $this->execute($query);

    }

    private function addProductURLChange($id_product, $new_name, $old_name){
        $query = <<<QUERY
        INSERT INTO `G7DB2`.`url_old_new`
            (`id`, `id_product`, `new_name`, `old_name`)
        VALUES
            (NULL, '$id_product', '$new_name', '$old_name');
QUERY;

        $this->execute($query);
    }

    public function getUserProducts($user_id){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_user` = '$user_id'
QUERY;

        $product = $this->getAll($query);

        return $product;
    }

    public function getProductURL($id_product){

        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_product` = '$id_product'
QUERY;

        $aux_product = $this->getAll($query);
        $product = $aux_product[0];

        $product_name = $this->productNameToURL($product['name']);

        if(sizeof($this->getAllProductsFromName($product['name'])) > 1){
            $product_ending = '/'.$product['id_product'];
        } else {
            $product_ending = '';
        }

        $productURL = '/p/'.$product_name.$product_ending;

        return $productURL;
    }

    public function productNameToURL($product_name){
        return preg_replace('/[\s_]/', '-', $product_name);
    }

    public function productURLToName($product_url_name){
        return preg_replace('/-/', ' ', $product_url_name);
    }

    public function checkDateAndStock($id_product){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_product` = '$id_product'
QUERY;
        $product = $this->getAll($query);
        $dataProducte = new DateTime($product[0]['date']);
        $dataActual = new DateTime();
        $data_ok = ($dataProducte >= $dataActual);

        if ($data_ok && $product[0]['stock'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function searchProduct($search){

        $query = <<<QUERY
        SELECT * FROM `product` WHERE `name` LIKE '%$search%'
QUERY;
            $product = $this->getAll($query);
        return $product;
    }

    public function getBoughtProducts($user){
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_venedor`= '$user'
QUERY;

        $product = $this->getAll($query);
        return $product;
    }

    public function getCompres($id_user){
        $query = <<<QUERY
        SELECT * FROM `compres` WHERE `comprador`= '$id_user'
QUERY;
        $products = $this->getAll($query);
        return $products;
    }

    public function addCompra($comprador, $producte){
        $query = <<<QUERY
        INSERT INTO `compres`(`comprador`, `producte`) VALUES ('$comprador', '$producte')
QUERY;
        $this->execute($query);
    }

}