<?php

namespace App\Helpers;

class ResponseObject
{

    private $message = null;

    private $error = null;

    private $redirect = null;

    public function __construct($message, $args=null){
        $this->message = $message;
        $this->error = (isset($args['error'])) ? $args['error'] : null;
        $this->redirect = (isset($args['redirect'])) ? $args['redirect'] : null; 
    }

    public function get(){
        return [
            'message' => $this->message, 
            'error' => $this->error, 
            'redirect' => $this->redirect,
            'hasRedirect' => ($this->redirect == null) ? false : true,
            'hasError' => ($this->error == null) ? false : true,
        ];
    }

}