<?php

/**
 * Description of payment
 *
 * @author Tong
 * @createDt Jun 09,2013
 */
class payment_controller extends MainController {

    function __construct() {

        parent::__construct();
        $this->useModel('payment');
        $this->setModuleName('payment');
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
            'payment.js' => array(
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

        /**
         * Call check mail
         * */
        if (isset($_GET['mail'])) {
            $this->_checkMailConfirm();
        }
    }

    public function getconfirmInformation() {
        $aTemp = array();
        if (!empty($this->view->ConfirmCode))
            $regCode = $this->view->ConfirmCode;
        else
            $regCode = $_POST['ConfirmCode'];

        // Check already confirm code
        $isChecked = $this->model->checkpaymentConfirm($regCode);

        if ($isChecked == 0) {
            $aTemp = $this->model->getconfirmInformation($regCode);
            if (count($aTemp) > 1) {
                $aTemp['status'] = true;
            } else {
                $aTemp['status'] = false;
            }
        } else {
            $aTemp['status'] = false;
        }
        echo json_encode($aTemp);
        exit;
    }

    private function _checkMailConfirm() {
        $this->view->ConfirmCode = "";
        if ($_GET['mail'] == 1 && !empty($_GET['confirmcode'])) {
            $this->view->ConfirmCode = trim($_GET['confirmcode']);
        }
    }

    public function payment_transaction() {

        $isCompleted = $this->model->save_payment($_POST);
        if ($isCompleted) {
            $aConfMail = array(
                'FullnameTH' => $_POST['FullName'],
                'RegCode' => $_POST['RegCode']
            );

            $mail = new cMail();
            $mail->config()->sendTo = $_POST['email'];
            $mail->config()->templateFile = "index-confirmpayment.html";
            $mail->config()->subject = "Payment Confirmed.";
            $mail->create($aConfMail);
            if ($mail->send()) {
                echo json_encode(array('status' => true));
            }
        }
        exit;
    }

    public function run() {
        $this->view->render($this->getModuleName(), $this->getFuncName());
    }

}

?>
