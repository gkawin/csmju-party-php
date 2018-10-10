<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainModel
 *
 * @author TONG
 */
class MainModel {

    var $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function __destruct() {
        
    }

}

?>
