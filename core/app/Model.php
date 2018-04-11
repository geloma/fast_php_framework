<?php
/*
 * @autor geloma
 */
class Model {

    public $db = NULL;

    public function __construct(){
        $this->db = new Db();
    }

}