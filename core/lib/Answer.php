<?php
/*
 * @autor geloma
 */
class Answer {

    public function __construct(){

    }

    public function json($answer, $value = '', $error = FALSE){
        header('Content-Type', 'application/json');
        die(json_encode(['answer' => $answer, 'value' => $value, 'error' => TRUE]));
    }

    public function AResponse($answer ,$value, $error = FALSE){
        return (['answer' => $answer, 'value' => $value, 'error' => TRUE]);
    }

}
?>