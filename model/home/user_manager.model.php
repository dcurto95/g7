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
        SELECT * FROM user WHERE activation_code = '$activation_code'
QUERY;
        $temp = $this->getAll($query);

        //Controlem que realment existeixi l'usuari
        if($temp[0]!=null && !$temp[0]['valid']){
            $query = <<<QUERY
        UPDATE
                `user`
        SET
            `valid` = true;
        WHERE activation_code = '$activation_code'
QUERY;
            $this->execute($query);
            return true;
        }else{
            return false;
        }
    }

    public function deleteUser($id){
        $query = <<<QUERY
        DELETE FROM `user` WHERE `id` = '$id'
QUERY;
        $this->execute($query);
    }

    //Retorna true si el nom d'usuari és vàlid
    public function validateUserNameAndMail($name,$mail){
        $query = <<<QUERY
        SELECT * FROM `user` WHERE 'username' = '$name' OR 'mail'='$mail'
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
        SELECT * FROM `user` WHERE (username = '$name' OR mail='$name') AND password = '$pw' AND valid = true
QUERY;
        $temp = $this->getAll($query);

        //comprova que hi hagi una correspondència amb user i pw
        if(sizeof($temp) == 1){
            return $temp[0]['id_user'];
        } else {
            return (-1);
        }
    }

    //inserir pasta(id, quantitat)
    public function insertMoney($id, $quantitat){
        $money = $this->getMoney($id);
        $money+=$quantitat;

        $query = <<<QUERY
        UPDATE user SET saldo = '$money' WHERE id='$id'
QUERY;
        $this->execute($query);
    }


    //veure quantitat de saldo(id) retorn:quantitat
    public function getMoney($id){

        $query = <<<QUERY
        SELECT saldo FROM `user` WHERE id = '$id'
QUERY;

        $temp = $this->getAll($query);
        return $temp[0]['saldo'];
    }

    //Restar saldo(id, quantitat): true/false
    public function pay($id, $quantitat){
        $money = $this->getMoney($id);
        if($money >= $quantitat){

            $money-=$quantitat;

            $query = <<<QUERY
        UPDATE user SET 'saldo' = '$money' WHERE 'id'='$id'
QUERY;
            $this->execute($query);

            return true;
        }else{
            return false;
        }

    }
}
