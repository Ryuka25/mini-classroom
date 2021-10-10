<?php 

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

        $view = new View('viewHome/home');
        $view->pageTitle = "Homepage";
        
        $topNav = new View('static/topNavBar');
        $view->topNavBar = $topNav->output();

        /** @var account $account */
        $account = unserialize($_SESSION['account']);
        $view->setValue("accountID", $account->getAccountID());

        $view->render();
    }
}