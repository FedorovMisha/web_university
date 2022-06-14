<?php


require 'application/controllers/BaseViewController.php';
require_once 'application/core/Models/BlogComment.php';
require_once 'application/core/Models/Blog.php';

class ApiViewController extends ViewController {

    function check_email() {
        if (!empty($_POST)) {
            $email = $_POST["email"];

            ApplicationUser::setupConnection();
            $user = ApplicationUser::findBy("email", $email);
            $response = new stdClass();
            $response->status = !$user ? "ok": "fail";
            
            ob_clean();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            exit;
        }
    }

    function createComment() {

        if (!empty($_POST)) {

            BlogComment::setupConnection();
            $blogComment = BlogComment::init($_POST["text"] , $_POST["blogId"], $_POST["userName"], $_POST["userId"], $_POST["login"]);

            $blogComment->save();

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($blogComment);
        }
    }

    function editBlog() {
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

    function editBlogAlpha() {

        parent::adminAuthenticate();

        Blog::setupConnection();

        $blog = Blog::find($_GET["blogId"]);

        return new View([
            'controller' => "BlogAdminViewController",
            'action' => "editBlog"
        ], $blog);
    }

    function updateBlog() {
        if(!empty($_POST)) {
            Blog::setupConnection();

            $id = $_POST["blogId"];
            $label = $_POST["label"];
            $desc = $_POST["desc"];
            $blog = Blog::find($id);
            $blog->label = $label;
            $blog->description = $desc;
            $blog->update();
            ob_clean();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($blog);
        }
    }
}