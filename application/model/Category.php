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
        
    }

    // find a category from database
    public function find($id){
        
    }

    public function insert($values){
        
    }

    public function update($id, $values){

    }

    public function delete($id){

    }

}