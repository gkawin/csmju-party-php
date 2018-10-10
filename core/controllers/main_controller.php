<?php

/**
 * Description of xhr_model
 *
 * @author Tong
 * @createDt Jun 09,2013
 */
class main_controller extends MainController {

    function __construct() {
        parent::__construct();
        $this->useModel('main');
        $this->setModuleName('index');
        $this->setFuncName('main');
        $this->view->setJs(array(
            'jquery.min.js' => array(
                'dir' => 'js/libs/jquery-1.9.0',
                'type' => 'text/javascript'
            ),
            'bootstrap.min.js' => array(
                'dir' => 'js',
                'type' => 'text/javascript'
            ),
            'bootstrap-datetimepicker.min.js' => array(
                'dir' => 'js',
                'type' => 'text/javascript'
            ),
            'jquery-ui.js' => array(
                'dir' => 'js/libs/jquery-ui-1.10.3',
                'type' => 'text/javascript'
            )
        ));
        $this->view->setCss(array(
            'bootstrap-responsive.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet',
                'media' => 'screen'
            ),
            'bootstrap.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet',
                'media' => 'screen'
            ),
            'main.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet',
                'media' => 'screen'
            ),
            'bootstrap-datetimepicker.min.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet',
                'media' => 'screen'
            ),
            'jquery-ui.css' => array(
                'dir' => 'js/libs/jquery-ui-1.10.3',
                'type' => 'text/css',
                'rel' => 'stylesheet'
            )
        ));
    }

    public function test() {
        $this->setFuncName('test');
        $this->loadModel('main');
        echo Hash::getHash('MD5', "TEST", "OH YEAD");
        $this->model->memberList();
    }

    function run() {
        $this->view->render($this->getModuleName(), $this->getFuncName());
    }

}

?>
