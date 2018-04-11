<?php
/*
 * @autor geloma
 */
class Other extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){

    }

    public function GetCustomer(){
        $x = new Db();
        $ds = $x->adapter("select * from customer");
        echo "The first user is :".$ds[0]["name"];
    }

    public function GetCustomerJSON(){
        $x = new Db();
        $ds = $x->adapter("select * from customer");
        $this->answer->json($ds, "Done", False);
    }

}