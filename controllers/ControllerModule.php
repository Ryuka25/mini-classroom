<?php 

class ControllerModule {

    private $_view;
    private $_manager;

    public function __construct($url){
        if ($url[1] == null) {

            $data = array();
            
            // ! SHOW DEFAULT PAGE
            $this->_view =new View('Module');

            $this->_manager = new ModuleManager();

            $innerData['allModule'] = $this->_manager->getAllModule();
            
            $content = $this->_view->generateFile('views/viewModule/showAllModule.php', $innerData);

            $data['content'] = $content;

            $this->_view->generate($data);

        } elseif ($url[1] == "add") {
            
            $data = array();
            
            // ! SHOW DEFAULT PAGE
            $this->_view =new View('Module');

            $this->_manager = new ModuleManager();

            $innerData = array();
            
            $content = $this->_view->generateFile('views/viewModule/addFormModule.php', $innerData);

            $data['content'] = $content;

            $this->_view->generate($data);
        }
    }
}