<?php

/**
 * Author: https://github.com/davinder17s
 * Email: davinder17s@gmail.com
 * Repository: https://github.com/davinder17s/codeigniter-middleware
 */

class LoggedInMiddleware {

    protected $controller;
    protected $ci;
    protected $session;
    
    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;
        
        $this->session     = $this->ci->session->userdata('logged_in');
    }

    public function run() 
    {
        if (! $this->session) {
            show_error('Not Logged In: You are not allowed to perform this operation');
        }
    }
}
