<?php 
include_once('Model.php');

class ModuleCategoryManager extends Manager {
    
    public static function addModuleCategory($addData) {

        extract($addData);

        $sql = "INSERT INTO `ModuleCategories` (`moduleCategoryCode`, `name`, `picture`) VALUES ( :moduleCategoryCode, :name, NULL)";

        $query = Manager::getDatabase()->prepare($sql);

        $query->bindparam(':moduleCategoryCode' , $moduleCategoryCode);
        $query->bindparam(':name', $name);

        $query->execute();

        return true;
        
    }

    public static function deleteModuleCategoryByModuleCategoryCode($moduleCategory) {

        // TODO: aza adino !!!!

    }

    public static function getAllModuleCategory() {

        $result = Manager::getAll("ModuleCategories", "ModuleCategory");

        return $result;
    }
}