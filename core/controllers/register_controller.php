<?php

/**
 * Description of xhr_model
 *
 * @author Kawin Glomjai
 * create date :  Jun 09,2013
 */
class register_controller extends MainController {

    function __construct() {
        parent::__construct();
        $this->useModel('register');
        $this->setModuleName('register');
        $this->setFuncName('main');
        $this->view->setJs(array(
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
            ),
            'ajax.js' => array(
                'dir' => 'js',
                'type' => 'text/javascript'
            ),
            'register.js' => array(
                'dir' => 'js',
                'type' => 'text/javascript'
            )
        ));
        $this->view->setCss(array(
            'bootstrap-responsive.min.css' => array(
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

    /**
     * register member
     */
    function instransaction() {
        $RegCode = $this->model->save_register($_POST);
        $aConfMail = array(
            'FullnameTH' => $_POST['fullName'],
            'RegCode' => $RegCode,
            'TotalPrice' => 1800
        );

        $mail = new cMail();
        $mail->config()->sendTo = $_POST['email'];
        $mail->config()->templateFile = "index-register.html";
        $mail->config()->subject = "Register Confirmed.";
        $mail->create($aConfMail);
        if ($mail->send()) {
            echo json_encode(array('status' => true));
        }
        exit;
    }

    function run() {
        $this->view->render($this->getModuleName(), $this->getFuncName());
    }

}

?>
