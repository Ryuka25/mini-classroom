<?php 

class ControllerLogin {

    private $_manager;

    public function __construct($url) {
        /** Handle Data to sent in view */
        $data = array();

        if ($url[1] == null) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = array(
                    "accountID"=>$_POST['accountID'],
                    "accountIDError"=>"",
                    "passwordError"=>"",
                );
    
                $this->_manager = new AccountManager;
    
                $_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
                $accountID = $_POST['accountID'];
                $account = $this->_manager->getAccountByUsername($accountID);
                // Search if the username is in the database

                // TODO: @Ryuka25 -> CREATE A FUNCTION TO DO THIS

                // Comparaison of the password in database with the user password
                if ($account->getPassword() == $_POST['password']) {
                    $_SESSION['account'] = serialize($account);
                    $url = SERVER_URL.'?url=home/';
                    header("location:$url");
                } else {
                    $data['passwordError'] = "Wrong Password, please verify your password";
                }

                if (!empty($data['passwordError'])) {
                    $view = new View('viewLogin/login');
                    $view->setValue("accountIDError","");
                    $view->setValue("passwordError",$data['passwordError']);
                    $view->setValue("accountID",$data['accountID']);

                    $view->pageTitle="Login Error";
                    $view->topNavBar="";

                    $view->render();
                }
            } else {
                $view = new View('viewLogin/login');
                $view->setValue("accountIDError","");
                $view->setValue("passwordError","");
                $view->setValue("accountID","");

                $view->topNavBar = "";
                $view->pageTitle = "Login Page";

                $view->render();
            }
        } elseif ($url[1] == 'logout') {
            session_destroy();
            $url = SERVER_URL.'?url=login/';
            header("location:$url");
        }
    }
}