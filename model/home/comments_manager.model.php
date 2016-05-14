<?php


class HomeCommentsManagerModel extends Model{

    public function addComment($id_src, $id_dst, $comment){

        $comment = addslashes($comment);

        $query = <<<QUERY
        INSERT INTO `G7DB2`.`comments`
            (`id`, `id_usr_src`, `id_usr_dst`, `comment`)
        VALUES
            (NULL, '$id_src', '$id_dst', '$comment');
QUERY;

        $this->execute($query);

    }

    public function getUserComments(){

    }

}