<?php

/**
 * Description of xhr_model
 *
 * @author Tong
 * @createDt Jun 09,2013
 */
class backoffice_controller extends MainController {

    function __construct() {
        parent::__construct();
        $this->setModuleName('backoffice');
        $this->setFuncName('main');
        $this->view->setJs(array(
            'xhrMember.js' => array(
                'dir' => 'js',
                'type' => 'text/javascript'
            )
        ));
        $this->view->setCss(array(
            'mainBackOffice.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet'
            ),
            'backoffice_profile.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet'
            ),
            'backoffice_dropdown.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet'
            ),
            'backoffice_header.css' => array(
                'dir' => 'css',
                'type' => 'text/css',
                'rel' => 'stylesheet'
            )
        ));
    }

    public function auth() {
        $this->setFuncName('test');
        $this->useModel('xhr_model');
        //$this->model->memberList();
    }

    function run() {
        $this->view->render($this->getModuleName(), $this->getFuncName());
    }

}

?>
