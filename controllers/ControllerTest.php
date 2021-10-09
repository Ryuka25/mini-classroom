<?php 

class ControllerTest {

    private $_view;
    private $_manager;

    public function __construct($url) {
        
        $data = array();

        if ($url[1] == null) {
            $this->_view = new View('Test');

            $data['pageContent'] = $this->_view->generateFile('views/viewTest/testPage.php', []);

            $this->_view->generate($data);

        } elseif ($url[1] == 'try') {

            header("location:http://localhost/phpFolder/mini-classroom/?url=test/success/");

        } elseif ($url[1] == 'success') {

            $this->_view = new View('Test');

            $data['pageContent'] = $this->_view->generateFile('views/viewTest/successPage.php', []);

            $this->_view->generate($data);
        } 
    }
}