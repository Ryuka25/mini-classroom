<?php 

class ControllerLogin {

    private $_view;
    private $_manager;

    public function __construct($url) {

        /** Handle Data to sent in view */
        $data = array();
        $this->_view = new View('Login');

        if ($url[1] == null) {
            
            $data = array(
                'accountID'=>"",
                'password'=>"",
                'accountIDError'=>'',
                'passwordError'=>'',
            );

            $this->_view->generate($data);

        } elseif ($url[1] == 'grantAccess') {

            $this->_manager = new AccountManager;
            $data = array(
                'accountID'=>$_POST['accountID'],
                'password'=>"",
                'accountIDError'=>'',
                'passwordError'=>'',
            );

            if ($_SERVER['REQUEST_METHOD'] = 'POST') {
                $_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
                $accountID = $_POST['accountID'];
                $account = $this->_manager->getAccountByUsername($accountID);
                // Search if the username is in the database

                // TODO: @Ryuka25 -> CREATE A FUNCTION TO DO THIS

                // Comparaison of the password in database with the user password
                if ($account->getPassword() == $_POST['password']) {
                    $_SESSION['account'] = $account;
                    $_SESSION['accountID'] = $account->getAccountID();
                    $url = SERVER_URL.'?url=home/';
                    header("location:$url");
                } else {
                    $data['errorPassword'] = "Wrong Password, please verify your password";
                }

                if (!empty($data['errorPassword'])) {
                    $this->_view->generate($data);
                }
            }
        } elseif ($url[1] == 'logout') {
            session_destroy();
            $url = SERVER_URL.'?url=login/';
            header("location:$url");
        }
    }
}