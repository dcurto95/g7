<?php

/**
 * Mail Manager Model: Model that manages the users.
 */
class HomeUserManagerModel extends Model{

    public function createUser($id,$username,$email,$twitter,$password,$image){
        $query = <<<QUERY
            INSERT INTO user VALUES ($id,$username, $email, $twitter, $password, $image)
QUERY;
        $this->execute($query);
    }

    public function getUser($id){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `users`
        WHERE
            `users.id_user` = $id
QUERY;
        $user = $this->getAll($query);

        return $user;
    }

    public function validateUser($id){
        $query = <<<QUERY
        SELECT
                *
        FROM
                `users`
        WHERE `users.id_user` = $id
QUERY;
        $temp = $this->getAll($query);

        //Controlem que realment existeixi l'usuari
        if($temp[0]!=null && !$temp[0]['valid']){
            $query = <<<QUERY
        UPDATE
                `user`
        SET
            `user.valid` = true;
QUERY;
            $this->execute($query);
            return true;
        }else{
            return false;
        }
    }

    public function deleteUser($id){
        $query = <<<QUERY
        DELETE FROM `users` WHERE `user.id`=$id
QUERY;
        $this->execute($query);
    }

    //Retorna true si el nom d'usuari és vàlid
    public function validateUserName($name){
        $query = <<<QUERY
        SELECT * FROM `users` WHERE username = $name
QUERY;
        $temp = $this->getAll($query);
        if(empty($temp[0])){
            return true;
        }else{
            return false;
        }
    }



    /*
     * TO DO:
     * Afegir usuaris, des del formulari i feedback de si tota la info esta correcte. VALDAR FORMULARI
     * Si falla, indicar quins camps fallen
     * Si és tot correcte, redirigir a la home (secundari)
     */

}
