<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register_model
 *
 * @author Tong
 */
class backoffice_model extends MainModel {
	public function __construct(){
		Session::init();
	}
   function checkAuth(){
		
   }

}

?>
