<?php
session_start(); 
require_once('views/View.php');

class Router {

    /** Handle the corresponding controller according to the URL request */
    private $_ctrl;

    /**
     * This function will hande the url entered by the users
     * All web-site logic shall be here!
     */
    public function routeRequest() {
        try {

            /** 
             * With this function, class will be autoload
             * In condition that class name is same as the php file!
             */

            spl_autoload_register(function($class){
                $classFile = $class.'.php';
                $classURL = 'models/'.$classFile;

                require_once($classURL);
            });

            // Make sure that our URL is a URL (Mety hoe tsy azo fa ze fazahonareo azy)
            if (isset($_GET['url'])) {
                if (isset($_GET['url'])) {
                    $url = $_GET['url'];
                } elseif (isset($_POST['url'])) {
                    $url = $_POST['url'];
                }

                $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));

                // Handle the controller file in the request
                $controller = Ucfirst($url[0]);

                /** Checking session */
                $login_url = ($controller == "Login");
                $login_url_logout = ($url[1] == "logout");

                if (isset($_SESSION['account'])) {
                    if ($login_url && !$login_url_logout) {
                        $link = SERVER_URL.'/?url=home/';
                        header("location:$link");
                    }
                } else {
                    if (!$this->__guestAllowedReq($controller)) {
                        $link = SERVER_URL.'/?url=login/';
                        header("location:$link");
                    }
                }

                $controllerClass = 'Controller'.$controller;
                $controllerFile = 'controllers/'.$controllerClass.'.php';

                // Test if the file exist (Never Trust User Input)
                if (file_exists($controllerFile)) {
                
                    require_once($controllerFile);
                    // Action corresponding to the controller will be send to the constructor
                    $ctrl = new $controllerClass($url);
                } else {
                    pageNotFound();
                }

            } else {
                $link = SERVER_URL.'/?url=home/';
                header("location:$link");
            }
            
        // ! IF AN ERROR OCCURED WHILE TRYING TO HANDLE THE REQUESTED URL
        // ! THE FOLLOWING BLOCK WILL BE EXECUTED

        } catch (Exception $e) {

            $errorMessage = $e->getMessage(); // Get the error message of the corresponding exception
            $view = new View('viewError/error');
            $view->setValue('errorMessage',$errorMessage);

            $view->pageTitle = "Error";

            $topNavBar = new View("static/top_navigation");
            $view->topNavBar = $topNavBar->output();

            $view->render($data);
        }
    }

    private function __guestAllowedReq($controller) {
        $guestUrl = ["Login","Home"];

        foreach ($guestUrl as $allowedUrl) {
            if ($controller == $allowedUrl) {
                return true;
            }
        }
    }

}