<?php

/**
 * Description of xhr_model
 * call by main.js
 * use for ajax load data only.
 * @author Tong
 * @createDt Jun 09,2013
 */
class ajax_controller extends MainController {

    function __construct() {
        parent::__construct();
        $this->useModel('ajax');
        $this->setModuleName('ajax');
        $this->setFuncName('main');
        $this->view->setJs(array(
            'jquery.min.js' => array(
                'dir' => 'js/libs/jquery-1.9.0',
                'type' => 'text/javascript'
            )
        ));
    }

    function prefixStdCode() {
        if (isset($_POST)) {
            $aTempResult = $this->model->prefixStdCode();
            $result['numRows'] = count($aTempResult);
            $result['data'] = $aTempResult;
            echo json_encode($result);
        }
        exit;
    }

    function getStdData() {
        if (isset($_POST)) {
            $q = $_POST['q'];
            $aTempResult = $this->model->getStdData($q);
            $result['numRows'] = count($aTempResult);
            $result['data'] = $aTempResult;
            echo json_encode($result);
        }
        exit;
    }

    function run() {
        $this->view->render($this->getModuleName(), $this->getFuncName());
    }

}

?>
