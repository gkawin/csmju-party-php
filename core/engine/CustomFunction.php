<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Func
 *
 * @author XMOTION
 */
class CustomFunction {
    //put your code here

    /**
     * 
     * @param type $studentCode
     * @return type
     */
    public static function makeConfirmationCode($studentCode) {
        $date = date("YmdHis");
        $patternUpper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $patternLower = strtolower($patternUpper);
        $finalPattern = $patternUpper . $patternLower . $date . $studentCode;

        return(substr(str_shuffle($finalPattern), 0, 10));
    }

    /**
     * 
     * @return type
     */
    public static function getIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}

?>
