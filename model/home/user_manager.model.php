<?php

/**
 * Mail Manager Model: Model that manages the users.
 */
class HomeUserManagerModel extends Model{

    public function createUser($username,$email,$twitter,$password,$image){
        $query = <<<QUERY
            INSERT INTO user VALUES ($username, $email, $twitter, $password, $image)
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
            `id_user` = $id
QUERY;
        $user = $this->getAll($query);

        return $user;
    }

    public function validateUser($id){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `user`
        WHERE `id_user` = $id
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

    public function deleteUser($id){
        $query = <<<QUERY
        DELETE FROM `user` WHERE `id`=$id
QUERY;
        $this->execute($query);
    }

}
