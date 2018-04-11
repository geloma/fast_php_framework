<?php
/*
 * @autor geloma
 */
class View{

    public function __construct(){

    }

    public function show($view_name,$data = NULL){
        require_once VIE_PATH.$view_name.'.php';
    }

    public function show_error($number){
        header("HTTP/1.0 404 Not Found");
        require_once VIE_PATH.'/error/'.$number.'.html';
    }

    public function clean(){
        ob_clean();
    }

}