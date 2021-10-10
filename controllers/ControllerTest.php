<?php 

class ControllerTest {

    private $_manager;

    public function __construct($url) {
        
        $data = array();

        if ($url[1] == null) {
            
            $view = new View('viewTest/testPage');
            $view->pageTitle = "Test";

            $navBar = new View("static/topNavBar");
            $view->topNavBar = $navBar->output();

            $foo = new testClass("Humm");
            $_SESSION['foo'] = serialize($foo);

            $view->render();

            $_SESSION['foo'] = new testClass("Humm");
            var_dump($_SESSION['foo']);

        } elseif ($url[1] == 'try') {

            header("location:http://localhost/phpFolder/mini-classroom/?url=test/success/");

        } elseif ($url[1] == 'success') {

            $view = new View('viewTest/successPage');
            $view->pageTitle = "Test";
            $view->topNavBar = "";

            /** 
             * @var testClass $foo
            */

            $foo = (unserialize($_SESSION['foo']));
            $foo->getFoo();

            $view->render();
        }
    }
}

class testClass {
    private $__foo;
    public function __construct($foo) {
        $this->__foo = $foo;
    }
    public function getFoo() {
        return $this->__foo;
    }
}