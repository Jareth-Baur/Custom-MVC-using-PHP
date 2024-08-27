<?php
// core/Controller.php

class Controller
{
    protected $view;
    
    public function view($viewName, $data = [])
    {
        $this->view = $viewName;
        if (!empty($data)) {
            extract($data);
        }
        require 'app/views/template/header.php';
        require_once 'app/views/' . $viewName . '.php';
        require 'app/views/template/footer.php';
    }
}
?>