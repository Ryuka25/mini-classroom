<?php 

class ControllerLogin {

    private $_manager;

    public function __construct($url) {
        /** Handle Data to sent in view */
        $data = array();

        if (count($url) == 1) {
            $url = SERVER_URL.'/?url=login/';
            header("location:$url");
        }

        if ($url[1] == null) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->__login($_POST['accountID'], $_POST['password']);
            } else {
                $data = [
                    "accountID" => "",
                    "error" => "",
                ];

                $this->__displayForm($data, "Login Page");
            }

        } elseif ($url[1] == 'logout') {
            $this->__logout();
        }
    }
    /** Login Function */
    private function __login($accountID, $password) {
        $this->_manager = new AccountManager;

        $_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

        $data['accountID']=$accountID;
        $data['error'] = " Denied Authentification ! Verify Username or Password";

        $account = $this->_manager->getAccountByUsername($accountID);
        // Search if the username is in the database
        if ($account) {
            // Comparaison of the password in database with the user password
            if ($account->getPassword() == $password) {
                $_SESSION['account'] = serialize($account);
                $url = SERVER_URL.'/?url=home/';
                header("location:$url");
            }
        }
        $this->__displayForm($data,"Login Error");
    }
    /** Login out function */
    private function __logout() {
        session_destroy();
        $url = SERVER_URL.'/?url=login/';
        header("location:$url");
    }
    /** Display form with Error Message */
    private function __displayForm($data,$title) {
        $view = new View('viewLogin/login');

        $view->setValue("error",$data['error']);
        $view->setValue("accountID",$data['accountID']);

        $view->pageTitle=$title;
        $view->topNavBar="";

        $view->render();
    }
}