<?php
/*
 * @autor geloma
 */
class Controller{

    public $input = NULL;
    public $regex = NULL;
    public $view = NULL;
    public $answer = NULL;
    public $session = NULL;
    public $token = NULL;

    public function __construct(){
        $this->input = new Input();
        $this->regex = new Regex();
        $this->view = new View();
        $this->answer = new Answer();
        $this->session = new Session();
        $this->token = new Token();
    }

}