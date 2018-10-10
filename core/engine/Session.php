<?php

/**
 * Session Class
 * Author :: Tong
 * Create Date :: 2013-06-08
 */
class Session {

    /**
     * initlize session.
     */
    public static function init() {
        session_start();
    }

    /**
     * set operating session.
     * @param string $Name
     * @param mixed $val
     */
    public static function set($Name, $val) {
        $_SESSION[$Name] = $val;
    }

    /**
     * getting value from session
     * @param type $Name
     * @return mixed
     */
    public static function get($Name) {
        if (array_key_exists($Name, $_SESSION) && !empty($_SESSION[$Name])) {
            return $_SESSION[$Name];
        } else {
            echo 'Set and not empty, and no undefined index error!';
            exit;
        }
    }

    /**
     * destroy session.
     */
    public static function destroy() {
        session_destroy();
    }

}

?>
