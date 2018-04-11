<?php
/*
 * @autor geloma
 */
class Index extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->show("example/index");
    }

}