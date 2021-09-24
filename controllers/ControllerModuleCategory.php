<?php 

class ControllerModuleCategory {

    private $_view;
    private $_manager;

    public function __construct($url){
        $data = array();

        if ($url[1] == null) {
            $data['changeSuccess'] = "";

            $this->_view = new View('ModuleCategory');
            $this->_manager = new ModuleCategoryManager();

            $data['allModuleCategory'] = $this->_manager->getAllModuleCategory();

            $this->_view->generate($data);
        } elseif ($url[1] == "add") {
            $this->_view = new View('ModuleCategory');
            $this->_manager = new ModuleCategoryManager();

            $addData = [
                'moduleCategoryCode'=>$_POST['moduleCategoryCode'],
                'name'=>$_POST['name']
            ];

            $this->_manager->addModuleCategory($addData);

            $data['changeSuccess'] = $this->_view->generateFile('views/changeSuccess.php', array());

            $data['allModuleCategory'] = $this->_manager->getAllModuleCategory();

            $this->_view->generate($data);
        } elseif ($url[1] == "delete") {
            $this->_view = new View('ModuleCategory');
            $this->_manager = new ModuleCategoryManager();

            $data['changeSuccess'] = $this->_view->generateFile('views/changeSuccess.php', array());

            $data['allModuleCategory'] = $this->_manager->getAllModuleCategory();

            $this->_view->generate($data);

        }


    }
}