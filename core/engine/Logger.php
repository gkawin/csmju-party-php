<?php

class Logger {

    private static $conf = NULL;

	public $_dir = "/log";
	public $_log_file = "logger.log";
	public $_err_file = "logger_err.log";
	public $_saveTo = 1; // 1 = Database , 0 = file 

	public $_log_mode = "system";

    private function __construct() {}


	public static function config() {
       if (!self::$conf) {
           self::$conf = new Logger;
       }
       return self::$conf;
    }

    public static function write($message, $file = null, $line = null) {
		switch(strtoupper(self::$conf->_log_mode)){
			case "SYSTEM":
				
				break;
			case "DB":
				
				break;
			case "MAIL":
				
				break;
			default :
				throw new Excention("Error can\'t write file.");
				break;
		}
		$message = time() . ' - ' . $message;
		$message .= is_null($file) ? '' : " in $file";
		$message .= is_null($line) ? '' : " on line $line";
		$message .= "\n";
		return file_put_contents($this->logfile, $message, FILE_APPEND);
	}

    private function __clone() {
        
    }
}
?>