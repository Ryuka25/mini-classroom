<?php 

class ControllerHome {

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
        if (isset($_SESSION['account'])) {
            $topNav->setValue('accountID',unserialize($_SESSION['account'])->getAccountID());
        }
        $view->topNavBar = $topNav->output();
        
        $view->render();
    }
}