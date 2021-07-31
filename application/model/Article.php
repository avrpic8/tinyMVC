<?php


namespace Application\Model;


class Article extends Model {

    // return all articles from database
    public function all(){

        $query = "SELECT * FROM `articles`;";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }

    // find a article from database
    public function find($id){

        $query = "SELECT *, (SELECT `name` FROM `categories` WHERE `categories`.`id` = `articles`.`cat_id`) as `category` FROM 
                 `articles` WHERE id = ?";

        $result = $this->query($query, $id)->fetchAll();
        $this->closeConnection();
        return $result;
    }

    public function insert($values){

        $query = "INSERT INTO `articles` (`title`, `cat_id`, `body`, created_at) VALUES (?,?,?, now());";
        $this->execute($query, array_values($values));
    }

    public function update($id, $values){

        $query = "UPDATE `articles` SET `title` =?, `cat_id`=?, `body`=?, `update_at`= now() WHERE `id`=?;";
        $this->execute($query, array_merge(array_values($values), [$id]));
        $this->closeConnection();
    }

    public function delete($id){

        $query = "DELETE FROM `articles` WHERE `id`= ?;";
        $this->execute($query, [$id]);
        $this->closeConnection();
    }

}