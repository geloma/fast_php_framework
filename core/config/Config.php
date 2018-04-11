<?php
/*
 * Framework Core Config
 * @author geloma
 */
require 'core/config/Routes.php';

function load($path){
    $directorio = opendir($path);
    while ($archivo = readdir($directorio)){
        if (!is_dir($archivo)){
            require $path.$archivo;
        }
    }
}

function exist($route,$controller){
    foreach($route as $i){
       if($i === $controller){
            return 1;
        }
    }
    return 0;
}

function makeRoute($route){
    $input = new Input();
    $url = $input->Get('url');
    $View = new View();
    if($url === NULL){ //DEFAULT ROUTING FIRST URL IN Routes.php
        if(empty($route["controllers"])){
            die("No routes defined");
        }else{
            //Index is the default method
            $method = "index";
            //extract controller
            $default_route = $route["controllers"][0];
            $module = explode("/", $default_route)[0];
            $controller = explode("/", $default_route)[1];
            require CTL_PATH . $module . "/" . $controller . '.php';
            $OBJ_Controller = new $controller();
            $ClassObj = new ReflectionMethod($controller, strtolower($method));
            if (!$ClassObj->isPublic()) {
                $View->show_error(403); //Checking form encapsulation
            } else {
                $OBJ_Controller->$method();
            }
        }
    }else {
        /* Check URL format */
        if (!preg_match('/^[A-Z]{1}[a-z]{3,40}\/[A-Z]{1}[a-z]{3,40}\/[A-Z]{1}[a-z]{3,40}(\/?[a-zA-Z0-9]{0,40})?\/?$/', $url)) {
            $View->show_error(404);
        } else {
            /* exploding url components */
            $vurl = explode('/', $url);
            $module = $vurl[0];
            $controller = $vurl[1];
            $method = $vurl[2];
            $param = NULL;
            $View = new View();
            if (count($vurl) === 4)
                $param = $vurl[3];
            /* check if exist file equal to path */
            if (!exist($route["controllers"], $module . "/" . $controller)) {
                $View->show_error(404);
            } else {
                /* call context controller */
                require CTL_PATH . $module . "/" . $controller . '.php';
                $OBJ_Controller = new $controller();
                if (!method_exists($controller, strtolower($method))) {
                    /* custom error if not exist */
                    $View->show_error(404);
                } else {
                    $ClassObj = new ReflectionMethod($controller, strtolower($method));
                    if (!$ClassObj->isPublic()) {
                        /* Identify encapsulation */
                        $View->show_error(403);
                    } else {
                        $OBJ_Controller->$method();
                    }
                }
            }
        }
    }
}