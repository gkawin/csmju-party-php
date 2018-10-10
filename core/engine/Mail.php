<?php

/**
 * custom mail class.
 * Author By : Kawin Glomjai
 */
class cMail {

    private static $conf = NULL;
    var $sendTo = "dummy@dummy.com";
    var $sendFrom = "no-replay@csmju.com";
    var $templateFile = "mail.html";
    var $subject = "Hello World";
    protected static $openTag = "{";
    protected static $closeTag = "}";
    protected static $strHTML = "";

    public function __construct() {
        
    }

    /**
     * call config mail class
     * @return object
     */
    public function config() {
        if (!self::$conf) {
            self::$conf = new cMail();
        }
        return self::$conf;
    }

    /**
     * create mail pattern and replace dynamic data to custom template.
     * @param array $aConf
     */
    public function create($aConf = array()) {
        if (is_array($aConf)) {
            $fileName = $_SERVER['DOCUMENT_ROOT'] . "/core/views/_thirdparty/mail/" . self::$conf->templateFile;
            $fHandle = fopen($fileName, 'r');
            $strHTML = fread($fHandle, filesize($fileName));
            fclose($fHandle);

            if (!array_key_exists(0, $aConf))
                $aConf = array($aConf);

            foreach ($aConf as $aPattern) {
                foreach ($aPattern as $key => $val) {
                    $strHTML = str_replace(self::$openTag . $key . self::$closeTag, $val, $strHTML);
                }
            }
            self::$strHTML = $strHTML;
        }
    }

    /**
     * send mail to receiver
     * NOTE :: Please make sure, your mail server has been config.
     * @return boolean
     */
    public function send() {
        $headers = "From: " . strip_tags(self::$conf->sendFrom) . "\r\n";
        $headers .= "Reply-To: " . strip_tags(self::$conf->sendTo) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        if (mail(self::$conf->sendTo, self::$conf->subject, self::$strHTML, $headers)) {
            return true;
        } else {
            return false;
        }
        /**
         * SAVE MAIL LOG.
         * */
    }

    public function __destruct() {
        
    }

}

?>