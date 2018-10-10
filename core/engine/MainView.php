<?php

/**
 * Description of MainView
 *
 * @author Kawin Glomjai
 */
class MainView {

    private $aScriptTag = array();
    private $aCssTag = array();

    /**
     * 
     * @param type $module
     * @param type $page
     * @param type $noInclude
     */
    public function render($module, $page, $noInclude = false) {
        if ($noInclude === true) {
            require_once 'core/views/' . $module . '/' . $page . '.php';
        } else {
            require_once 'core/views/_header.php';
            require_once 'core/views/' . $module . '/' . $page . '.php';
            require_once 'core/views/_footer.php';
        }
    }

    /**
     * 
     * @param type $aJsList.
     */
    public function setJs($aJsList = array()) {
        if (count($aJsList) > 0) {
            foreach ($aJsList as $filename => $item) {
                if (count($filename) > 0) {
                    $this->aScriptTag[] = "<script src='" . Conf::_URL . "/" . $item['dir'] . "/" . $filename . "' type='" . $item['type'] . "'></script>\n";
                } else {
                    $this->aScriptTag[] = "<script src='" . Conf::_URL . "/js/" . $filename . "' type='text/javascript'></script>\n";
                }
            }
        }
    }

    /**
     * 
     * @return type
     */
    public function getJs() {
        return $this->aScriptTag;
    }

    /**
     * 
     * @param type $aCssList
     */
    public function setCss($aCssList = array()) {
        if (count($aCssList) > 0) {
            foreach ($aCssList as $filename => $item) {
                if (count($filename) > 0) {
                    $this->aCssTag[] = "<link href='" . Conf::_URL . "/" . $item['dir'] . "/" . $filename . "' type='" . $item['type'] . "' rel='" . $item['rel'] . "'/>\n";
                } else {
                    $this->aCssTag[] = "<link href='" . Conf::_URL . "/css/" . $filename . "type='text/css' rel='stylesheet'/>\n";
                }
            }
        }
    }

    /**
     * 
     * @return type
     */
    public function getCss() {
        return $this->aCssTag;
    }

}

?>
