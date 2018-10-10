<?php

/**
 * Boot web application.
 * @author Tong
 * @createDt Jun 09,2013
 */
class Bootstrap {

    protected static $home;
    public static $config;

    public static function error($type) {
        switch ($type) {
            case "404":
                echo "no page display!!";
                break;
        }
    }

    /**
     * start app.
     * @return boolean
     */
    public static function run() {
        $prepareURL = (isset($_GET['url'])) ? $_GET['url'] : self::getHome();
        $url = explode("/", rtrim(trim(str_replace(".html", "", $prepareURL)), "/"));
        //print_r($url);
		
		/**
		* Plugin load area.
		**/
		PluginSystem::checkPluginSystem();
		


        $filename = "core/controllers/" . $url[0] . "_controller.php";
        if (file_exists($filename)) {
            require_once $filename;
            $controllerName = $url[0] . "_controller";
            $controller = new $controllerName();
        } else {
            self::error("404");
            return false;
        }

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
        $controller->run();
    }

    public static function setHome($sHome) {
        self::$home = $sHome;
    }

    public static function getHome() {
        return self::$home;
    }

}

?>
