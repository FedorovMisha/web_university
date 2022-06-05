<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/core/Models/Blog.php';
require_once 'application/views/core/AdminView.php';
require_once 'application/views/core/View.php';


class BlogAdminViewController extends ViewController {


    function index() {
        parent::dropToLoginIfNotAdmin();
        return new AdminView($this->route);
    }

    function create() {
        parent::dropToLoginIfNotAdmin();

        if(!empty($_POST) && !empty($_FILES)) {
            $label = $_POST["label"];
            $desc = $_POST["desc"];
            $imgPath = 'public/'.$_FILES["image"]["name"].".jpg";
            $blog = Blog::init($label, $imgPath, $desc);
            move_uploaded_file($_FILES["image"]["tmp_name"], $imgPath);
            $blog->save();
            $pageCount = ceil(Blog::count() / 10);
            return new View([
                'controller' => "BlogAdminViewController",
                'action' => "Blogs"
            ], [
                'blogs' => Blog::getPage($pageCount, 10),
                'currentPage' => $pageCount,
                'pageCount' => $pageCount
            ]);
        }
    }

    function blogs() {
        Blog::setupConnection();
        return new View([
            'controller' => "BlogAdminViewController",
            'action' => "blogs"
        ], [
            'blogs' => Blog::getPage($_GET["p"] ?? 1, 10),
            'currentPage' => $_GET["p"] ?? 1,
            'pageCount' => ceil(Blog::count() / 10)
        ]);
    }
}