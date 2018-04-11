<?php
/*
 * @autor geloma
 */
class Session {
    /*
    * Stop session an redirect to index
    */
    public static function Stop(){
        $cookie = session_get_cookie_params();
        $_SESSION = [];
        $NAME = session_name();
        $VALUE = '';
        $EXPIRE = time() - 42000;
        $PATH = $cookie['path'];
        $DOMAIN = $cookie['domain'];
        $SECURE = FALSE;
        $HTTP_ONLY = TRUE;
        setcookie($NAME,$VALUE,$EXPIRE,$PATH,$DOMAIN,$SECURE,$HTTP_ONLY);
        session_unset();
        session_destroy();
        header('location: /fast/');
    }
    /*
     * Set value to session var on global array $_SESSION
     * @param $name name of variable to set
     * @param $value value to set into variable
     */
    public static function Set($name ,$value){
        $_SESSION[$name]=$value;
    }
    /*
     * get value from global array $_SESSION
     * @param $name name of variable to get
     * @return Misc value into variable
     */
    public static function Get($name){
        return (isset($_SESSION[$name])? $_SESSION[$name]: NULL);
    }
    /*
     * Destroy and clean the value of global array $_SESSION
     * @param $name name of variable to destroy
     */
    public static function Destroy($name){
        unset($_SESSION[$name]);
    }

}

