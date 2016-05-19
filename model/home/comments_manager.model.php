<?php


class HomeCommentsManagerModel extends Model{

    public function addComment($id_src, $id_dst, $comment){

        $comment = addslashes($comment);

        $date = (new \DateTime())->format('Y-m-d H:i:s');

        $query = <<<QUERY
        INSERT INTO `G7DB2`.`comments`
            (`id`, `id_usr_src`, `id_usr_dst`, `comment`, `date`)
        VALUES
            (NULL, '$id_src', '$id_dst', '$comment', '$date');
QUERY;

        $this->execute($query);

    }

    public function ValidateComment($id_src, $id_dst){

        $query = <<<QUERY
        SELECT * FROM `comments` WHERE `id_usr_dst` = '$id_dst' AND `id_usr_src` = '$id_src'
QUERY;

        $comments = $this->getAll($query);

        if (empty($comments)){
            return true;
        } else {
            return false;
        }


    }

    public function getUserComments($id_dst){
        $query = <<<QUERY
        SELECT * FROM `comments` WHERE `id_usr_dst` = '$id_dst'
QUERY;

        $comments = $this->getAll($query);

        return $comments;
    }

    public function getUserCommentsSrc($id_src){
        $query = <<<QUERY
        SELECT * FROM `comments` WHERE `id_usr_src` = '$id_src'
QUERY;

        $comments = $this->getAll($query);

        return $comments;
    }

    public function getComment($id){
        $query = <<<QUERY
        SELECT * FROM `comments` WHERE `id` = '$id'
QUERY;

        $comments = $this->getAll($query);

        return $comments[0];
    }

    public function editComment($comm_id, $comment){
        $comment = addslashes($comment);

        $query = <<<QUERY
        UPDATE `G7DB2`.`comments`
            SET `comment` = '$comment'
        WHERE `comments`.`id` = $comm_id
QUERY;

        $this->execute($query);
    }

    public function removeComment($comm_id){
        $query = <<<QUERY
        DELETE FROM `comments` WHERE `id` = '$comm_id'
QUERY;

        $this->execute($query);
    }
}