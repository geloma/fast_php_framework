<?php
/*
 * @autor geloma
 */
class Db{
    /*
     * set insert, delete or update specified by MySQL Query
     */
    private $dbname = "";
    private $dbuser = "";
    private $dbpass = "";

    public function __construct(){
        $this->dbname = "test";
        $this->dbuser = "root";
        $this->dbpass = "";
    }

    public function command($strQry,$formatArray = null){

        $connection = new PDO("mysql:host=127.0.0.1;dbname={$this->dbname}","{$this->dbuser}","{$this->dbpass}",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $ans = 0;
        try{
            if(is_null($formatArray)){
                $affected_rows = $connection->prepare($strQry)->execute();
            }else{
                $affected_rows = $connection->prepare($strQry)->execute($formatArray);
            }
            if($affected_rows >= 1){
                $ans = $affected_rows;
            }else{
                $ans = $affected_rows;
            }
        } catch (PDOException $ex) {
            Log::db($ex->getMessage());
        } finally{
            return $ans;
        }
    }
    /*
     * set select, procedures and others specified by MySQL Query
     */
    public function adapter($strQry,$formatArray = null){
        $connection = new PDO("mysql:host=127.0.0.1;dbname={$this->dbname}","{$this->dbuser}","{$this->dbpass}",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $dataSet = NULL;
        try{
            if(is_bool($connection)){
                throw new Exception("Database error connection is Boolean");
            }
            if(is_null($formatArray)){
                $cbd = $connection->prepare($strQry);
                $exec = $cbd->execute();
                $dataSet = $cbd->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $cbd = $connection->prepare($strQry);
                $exec = $cbd->execute($formatArray);
                $dataSet = $cbd->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $ex) {

        }finally{
            return $dataSet;
        }
    }
}