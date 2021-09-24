<?php 
require_once('views/View.php');

class ControllerHome {

    /** Handle the view for the curent controller */
    protected $_view;

    public function __construct($url) {
        
        if (!empty($url)) {
            
            if ($url[1] != null) {

                pageNotFound();
            
            } else {

                $this->showHomepage();

            }
        } else {

            $this->showHomepage();

        }
    }

    private function showHomepage() {

        $this->_view = new View('Home');
        $data = array();
        $this->_view->generate($data);

    }
}