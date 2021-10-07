<?php
session_start(); 
require_once('views/View.php');

class Router {

    /** Handle the corresponding controller according to the URL request */
    private $_ctrl;
    /** Handle the corresponding view according to the URL request */
    private $_view;

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

                // // Handle the controller file in the request
                // $controller = 'Login';
                // $controllerClass = 'Controller'.$controller;
                // $controllerFile = 'controllers/'.$controllerClass.'.php';

                // require_once($controllerFile);

                // $url = '?url=login/';
                // $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));

                // // Action corresponding to the controller will be send to the constructor
                // $this->_ctrl = new $controllerClass($url);

            // Make sure that our URL is a URL (Mety hoe tsy azo fa ze fazahonareo azy)
            if (isset($_GET['url']) || isset($_POST['url'])) {
                if (isset($_GET['url'])) {
                    $url = $_GET['url'];
                } elseif (isset($_POST['url'])) {
                    $url = $_POST['url'];
                }
        
                $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));

                // Handle the controller file in the request
                $controller = Ucfirst($url[0]);
                $controllerClass = 'Controller'.$controller;
                $controllerFile = 'controllers/'.$controllerClass.'.php';

                // Test if the file exist (Never Trust User Input)
                if (file_exists($controllerFile)) {
                
                    require_once($controllerFile);

                    // Action corresponding to the controller will be send to the constructor
                    $this->_ctrl = new $controllerClass($url);

                } else {

                    pageNotFound();
                    
                }

            } else {
                $url = SERVER_URL.'?url=home/';
                header("location:$url");
            }
            
        // ! IF AN ERROR OCCURED WHILE TRYING TO HANDLE THE REQUESTED URL
        // ! THE FOLLOWING BLOCK WILL BE EXECUTED

        } catch (Exception $e) {

            $errorMessage = $e->getMessage(); // Get the error message of the corresponding exception
            $this->_view = new View('Error');

            $data = array(
                'errorMessage'=>$errorMessage
            );

            $this->_view->generate($data);
        }
    }

}