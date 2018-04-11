<?php
/*
 * @autor geloma
 */
class Token {

    private $session = NULL;

    public function __construct(){
        $this->session = new Session();
    }

    public function Create(){
        $value = base64_encode(bin2hex(openssl_random_pseudo_bytes(10)));
        $this->session->Set('Token',$value);
        return $value;
    }

    public function Get(){
        return $tkn = $this->session->Get('Token');
    }

    public function Compare(){
        $Input = new Input();
        $tkn = $this->session->Get('Token');
        $web = $Input->Post('tokn');

        if($tkn === $web){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}