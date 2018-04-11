<?php
/*
 * @autor geloma
 */
class Input {

    public function __construct(){

    }

    public function Get($name){
        if(!is_null($name)){ /* Verify if param was initialized */
            if(isset($_GET[$name])){ /* Verify if exist */
                if(!is_array($_GET[$name])){ /* Verifiy id[]=value */
                    return $_GET[$name];
                }else{
                    return NULL;
                }
            }else{
                return NULL;
            }
        }else{
            return NULL;
        }
    }

    public function Post($name){
        if(!is_null($name)){ /* Verify if param was initialized */
            if(isset($_POST[$name])){ /* Verify if exist */
                if(!is_array($_POST[$name])){ /* Verifiy id[]=value */
                    return $_POST[$name];
                }else{
                    return NULL;
                }
            }else{
                return NULL;
            }
        }else{
            return NULL;
        }
    }

    public function test(){
        echo "yes";
    }
}
