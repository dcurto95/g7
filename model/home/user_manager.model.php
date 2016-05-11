<?php


class HomeUserManagerModel extends Model{

    public function createUser($username,$email,$twitter,$password,$image,$activation_code){
        $query = <<<QUERY
            INSERT INTO user
                (username, email, twitter, password, image, activation_code)
            VALUES
                ('$username', '$email', '$twitter', '$password', '$image', '$activation_code')
QUERY;
        $this->execute($query);
    }

    public function getUser($id){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `user`
        WHERE
            `id_user` = '$id'
QUERY;
        $user = $this->getAll($query);

        return $user[0];
    }

    public function validateUser($activation_code){
        $query = <<<QUERY
        SELECT * FROM user WHERE `activation_code` = '$activation_code'
QUERY;
        $temp = $this->getAll($query);

        //Controlem que realment existeixi l'usuari
        if(!empty($temp) && !$temp[0]['valid']){
            $query = <<<QUERY
            UPDATE user SET valid = true WHERE `activation_code`='$activation_code'
QUERY;
            $this->execute($query);
            return true;
        }else{
            return false;
        }
    }

    public function deleteUser($id){
        $query = <<<QUERY
        DELETE FROM `user` WHERE `id_user` = '$id'
QUERY;
        $this->execute($query);
    }

    //Retorna true si el nom d'usuari és vàlid
    public function validateUserNameAndMail($name,$mail){
        $query = <<<QUERY
        SELECT * FROM `user` WHERE `username` = '$name' OR `email`='$mail'
QUERY;
        $temp = $this->getAll($query);

        if(empty($temp[0])){
            return true;
        }else{
            return false;
        }
    }

    public function login($name, $pw){

        $query = <<<QUERY
        SELECT * FROM `user` WHERE (`username` = '$name' OR `email`='$name') AND `password` = '$pw' AND `valid` = 1
QUERY;
        $temp = $this->getAll($query);

        //comprova que hi hagi una correspondència amb user i pw
        if(!empty($temp)){
            return $temp[0]['id_user'];
        } else {
            return (-1);
        }
    }

    //inserir pasta(id, quantitat)
    public function insertMoney($id, $quantitat){
        $money = $this->getMoney($id);
        $money = $money + $quantitat;

        $query = <<<QUERY
        UPDATE user SET saldo = '$money' WHERE `id_user`='$id'
QUERY;
        $this->execute($query);
    }


    //veure quantitat de saldo(id) retorn:quantitat
    public function getMoney($id){

        $query = <<<QUERY
        SELECT * FROM `user` WHERE `id_user` = '$id'
QUERY;

        $usuari = $this->getAll($query);
        //print_r($usuari);
        return $usuari[0]['saldo'];
    }

    //Restar saldo(id, quantitat): true/false
    public function pay($id, $quantitat){
        $money = $this->getMoney($id);
        if ($money >= $quantitat){

            $money=$money-$quantitat;

            $query = <<<QUERY
        UPDATE user SET saldo = '$money' WHERE `id_user`='$id'
QUERY;
            $this->execute($query);

            return true;
        } else {
            return false;
        }
    }

    public function buy($id_user, $id_product){

        //Calculem i actualitzem els diners que tindrà el comprador
        $query = <<<QUERY
        SELECT * FROM `product` WHERE `id_product` = '$id_product'
QUERY;

        $product = $this->getAll($query);

        $price = $product[0]['price'];

        $money = $this->getMoney($id_user);

        $total_money = $money - $price;

        $query = <<<QUERY
        UPDATE user SET saldo = '$total_money' WHERE `id_user`='$id_user'
QUERY;
            $this->execute($query);

        //Calculem i actualitzem els diners que tindrè el venedor.
        $id_venedor = $product[0]['id_user'];
        $money = $this->getMoney($id_venedor);
        $total_money = $money + $price;

        $query = <<<QUERY
        UPDATE user SET saldo = '$total_money' WHERE `id_user` = '$id_venedor'
QUERY;
        $this->execute($query);

        //Incrementem el contador de productes venuts per l'usuari

        $query = <<<QUERY
        SELECT * FROM `user` WHERE `id_user` = '$id_venedor'
QUERY;

        $venedor = $this->getAll($query);

        $sold_products = $venedor[0]['sold_products'];
        $sold_products = $sold_products + 1;

        $query = <<<QUERY
        UPDATE user SET sold_products = '$sold_products' WHERE `id_user` = '$id_venedor'
QUERY;
        $this->execute($query);

        //mirem l'estock que queda i calculem el que quedarà
        $stock = $product[0]['stock'];
        $stock = $stock - 1;

        //Baixem en 1 l'stock del producte
        $query = <<<QUERY
        UPDATE product SET stock = '$stock' WHERE `id_product` = '$id_product'
QUERY;
        $this->execute($query);

        //Actualitzem les ventes del producte
        $ventes = $product[0]['ventes'];
        $ventes = $ventes + 1;

        //Pujem en 1 les ventes del producte
        $query = <<<QUERY
        UPDATE product SET `ventes` = '$ventes' WHERE `id_product` = '$id_product'
QUERY;
        $this->execute($query);

    }

    public function countVisits(){
        $query = <<<QUERY
        SELECT * FROM `Visit`
QUERY;
        $count = $this->getAll($query);

        $num =  $count[0]['visitas'];
        $new = $num +1;

        echo $new;

        $query = <<<QUERY
        UPDATE Visit SET visitas = '$new'
QUERY;
        $this->execute($query);

    }

    // No esta feta!!!
    public function getUserFromName($userName){
        $query = <<<QUERY
        SELECT `id_product` FROM `product` WHERE `name` = '$userName'
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

    // No esta feta!!!
    public function userNameToURL($user_name){
        return preg_replace('/[\s_]/', '-', $user_name);
    }

    // No esta feta!!!
    public function userURLToName($user_url_name){
        return preg_replace('/-/', ' ', $user_url_name);
    }

}