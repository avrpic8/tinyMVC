<?php


namespace Application\Model;


class Category extends Model {

    // return all categories from database
    public function all(){

        $query = "SELECT * FROM `categories`;";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }

    public function articles($cat_id){

        $query = "SELECT * FROM `articles` WHERE  cat_id =?";
        $result = $this->query($query, array($cat_id))->fetchAll();
        $this->closeConnection();
        return $result;
    }

    // find a category from database
    public function find($id){

        $query = "SELECT * FROM `categories` WHERE  id =?;";
        $result = $this->query($query, array($id))->fetch();
        $this->closeConnection();
        return $result;
    }

    public function insert($values){

        $query = "INSERT INTO `categories` (`name`, `description`, created_at) VALUES (?,?, now());";
        $this->execute($query, array_values($values));
    }

    public function update($id, $values){

        $query = "UPDATE `categories` SET `name` =?, `description`=?, `update_at`= now() WHERE `id`=?;";
        $this->execute($query, array_merge(array_values($values), [$id]));
        $this->closeConnection();
    }

    public function delete($id){

        $query = "DELETE FROM `categories` WHERE `id`= ?;";
        $this->execute($query, [$id]);
        $this->closeConnection();
    }

}