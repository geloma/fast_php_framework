<?php
/*
 * @autor geloma
 */
class Regex {
    /* Class constants
     * @return String USERNAME customized string
     * @return String FAIR_PASSWORD customized string
     * @return String EMAIL customized string
     */
    const USERNAME = "/^[a-zA-Z0-9\-_\+%&]{5,16}$/";
    const NAME = "/^[a-zA-ZáéíóúÁÉÍÓÚ\\s]{5,35}$/";
    const FAIR_PASSWORD = "/^[a-zA-Z0-9_@¿&%_\-\+\*=]{5,15}$/";
    const EMAIL = "/^[0-9a-zA-Z_+]+([-.]{0,1}[0-9a-zA-Z_+])*@([0-9a-zA-Z_]+[-.]+)+[0-9a-zA-Z_]{2,9}$/";

    public function __construct(){

    }

    public function username($string){
        $valid = preg_match(self::USERNAME,$string);
        return $valid;
    }
    public function name($string){
        $valid = preg_match(self::NAME,$string);
        return $valid;
    }

    public function password($string){
        $valid = preg_match(self::FAIR_PASSWORD,$string);
        return $valid;
    }

    public function email($var){
        $valid = preg_match(self::EMAIL, $var);
        return $valid;
    }

    public function null($var = [NULL]){
        foreach($var as $i){
            if(is_null($i))
                return TRUE;
        }
        return FALSE;
    }
}