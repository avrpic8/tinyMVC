<?php


namespace Application\Controllers;

use Application\Model\Category;
use Application\Model\Article;

class Home extends Controller {

    public function index(){

        $category = new Category();
        $article  = new Article();
        $categories = $category->all();
        $articles   = $article->all();
        return $this->view('app.index', compact('categories', 'articles'));
    }

    public function category($id){

        $obj_category = new Category();
        $categories = $obj_category->all();
        $obj_category = new Category();
        $category = $obj_category->find($id);
        $obj_category = new Category();
        $articles = $obj_category->articles($id);
        return $this->view('app.category', compact('categories', 'articles', 'category'));
    }

    public function show($id){

        $category = new Category();
        $categories = $category->all();
        $article  = new Article();
        $article = $article->find($id);
        return $this->view('app.show', compact('categories', 'article'));
    }
}