<?php 

class ControllerLogin {

    private $_view;
    private $_manager;

    public function __construct($url) {

        /** Handle Data to sent in view */
        $data = array();
        $this->_view = new View('Login');

        if ($url[1] == null) {

            $this->_view->generate($data);

        } elseif ($url[1] == 'grantAccess') {

            $this->_manager = new AccountMinManager;
            
        }
    }
}