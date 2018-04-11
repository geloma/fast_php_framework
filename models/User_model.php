<?php

class User_model extends Model{

    public function __construct(){
        parent::__construct();
    }

    /*  PARA CREAR PARCIALMENTE
     *  $HASH = hash_hmac('sha256','2343','1234');
        $PASS = hash_hmac('sha256','test',$HASH);
        echo $HASH."<br>";
        echo $PASS;
     */
    public function getUser($user){
        $strQry = "select * from tbl_usuario where mail=? limit 1";
        $row = $this->db->adapter($strQry,[$user["mail"]]);
        if(!empty($row)){
            $hash = $row[0]["hash"];
            $pass = $row[0]["clave"];
            $web_pass = hash_hmac('sha256',$user["pass"],$hash);
            if($web_pass === $pass){
                return $row;
            }else{
                return [];
            }
        }else{
            return [];
        }
    }
}