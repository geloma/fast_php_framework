<?php
/*
 * @autor geloma
 */
class Checker{

    public static function logged(){
        $Session = new Session();
        $View = new View();
        $Tokenizer = new Token();
        if($Session::Get('user_type') !== FALSE){
            $data = ["ver" => "none","msj" => "", "token" => $Tokenizer->Create()];
            $View->show('dashboard/view_login',$data);
        }else{
            $View->show('dashboard/view_dashboard');
        }
    }

    public static function canView(){
        $Session = new Session();
        $View = new View();
        if($Session::Get('user_type') == 1){
            //ADMIN ALLOW ALL
        }else if($Session::Get('user_type') == 2){
            $module = MODULE;
            $controller = CONTROLLER;
            $method = METHOD;
        }else{
            header("HTTP/1.0 404 Not Found");
            $View->show('error/view_dashboard');
        }
    }

}