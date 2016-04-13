<?php

/**
 * Mail Manager Model: Model that manages the users.
 */
class HomeUserManagerModel extends Model{

    public function createUser($username,$email,$twitter,$password,$image,$activation_code){
        $query = <<<QUERY
            INSERT INTO user(username, email, twitter, password, image, activation_code) VALUES ('$username', '$email', '$twitter', '$password', '$image', '$activation_code')
QUERY;
        $this->execute($query);
    }

    public function getUser($id_user){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `user`
        WHERE
            `id_user` = '$id_user'
QUERY;
        $user = $this->getAll($query);

        return $user[0];
    }

    public function validateUser($id_user){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `user`
        WHERE `id_user` = '$id_user'
QUERY;
        $temp = $this->getAll($query);

        //Controlem que realment existeixi l'usuari
        if($temp[0]!=null && !$temp[0]['valid']){
            $query = <<<QUERY
        UPDATE
                `user`
        SET
            `valid` = true;
QUERY;
            $this->execute($query);
            return true;
        }else{
            return false;
        }
    }

    public function deleteUser($id_user){
        $query = <<<QUERY
        DELETE FROM `user` WHERE `id_user` = '$id_user'
QUERY;
        $this->execute($query);
    }

    //Retorna true si el nom d'usuari és vàlid_user
    public function validateUserName($name){
        $query = <<<QUERY
        SELECT * FROM `user` WHERE username = '$name'
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
        SELECT * FROM `user` WHERE username = '$name' AND password = '$pw' AND valid = true
QUERY;
        $temp = $this->getAll($query);

        //comprova que hi hagi una correspondència amb user i pw
        if(sizeof($temp) == 1){
            return $temp[0]['id_user'];
        } else {
            return (-1);
        }
    }

    //inserir pasta(id_user_user, quantitat)
    public function insertMoney($id_user, $quantitat){
        $money = $this->getMoney($id_user);
        echo($money);
        $money= $money + $quantitat;

        $query = <<<QUERY
        UPDATE user SET saldo = '$money' WHERE 'id_user'='$id_user'
QUERY;
        $this->execute($query);
    }


    //veure quantitat de saldo(id_user) retorn:quantitat
    public function getMoney($id_user){

        $query = <<<QUERY
        SELECT saldo FROM `user` WHERE 'id_user' = '$id_user'
QUERY;

        $temp = $this->getAll($query);
        return $temp;
    }

    //Restar saldo(id_user, quantitat): true/false
    public function pay($id_user, $quantitat){
        $money = $this->getMoney($id_user);
        if($money >= $quantitat){

            $money-=$quantitat;

            $query = <<<QUERY
        UPDATE user SET saldo = '$money' WHERE 'id_user'='$id_user'
QUERY;
            $this->execute($query);

            return true;
        }else{
            return false;
        }

    }
}
