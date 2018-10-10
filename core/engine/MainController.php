<?php

class MainController {

    var $view;
    var $model;
    private $moduleName;
    private $funcName;

    function __construct() {
        $this->view = new MainView();
    }

    public function setModuleName($moduleName) {
        $this->moduleName = $moduleName;
    }

    public function getModuleName() {
        return $this->moduleName;
    }

    public function setFuncName($funcName) {
        $this->funcName = $funcName;
    }

    public function getFuncName() {
        return $this->funcName;
    }

    public function useModel($name) {
        $path = 'core/models/' . $name . '_model.php';
        if (file_exists($path)) {
            require $path;
            $modelname = $name . '_model';
            $this->model = new $modelname();
        }
    }

}

?>
