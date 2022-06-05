<?php

require 'application/controllers/BaseViewController.php';
require_once 'application/views/core/AdminView.php';
require_once 'application/core/Models/ViewStatistic.php';

class AdminViewController extends ViewController {

    function views() {
        ViewStatistic::setupConnection();
        return new AdminView([
            'controller' => "AdminViewController",
            'action' => "views"
        ], [
            'views' => ViewStatistic::getPage($_GET["p"] ?? 1, 10),
            'currentPage' => $_GET["p"] ?? 1,
            'pageCount' => ceil(ViewStatistic::count() / 10)
        ]);
    }
}