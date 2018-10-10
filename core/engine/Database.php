<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author TONG
 */
class Database extends PDO {

    function __construct() {
        parent::__construct('mysql:host=' . Conf::_DB_SERVER . ';dbname=' . Conf::_DB_NAME . ';charset=utf8', Conf::_DB_USERNAME, Conf::_DB_PASSWORD, array(PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
                )
        );
        $this->beginTransaction();
		$dbGlo = $this;
		global $dbGlo;
    }

    /**
     * Insert Data into base.
     * @param type $tblname
     * @param type $aIns
     * @return type
     * Format array
     * [0]=>array(
     *     'col1'=>'val1',
     *     'col2'=>'val2'
     * )
     */
    public function insert($tblname = "", $aIns = array()) {
        try {
            if (!array_key_exists(0, $aIns))
                $aIns = array($aIns);
            foreach ($aIns as $item) {
                $strSQLCol = "";
                $strSQLVal = "";
                $i = 0;
                foreach ($item as $colName => $value) {
                    $strSQLCol .= $colName . ",";
                    $strSQLVal .= ":" . $colName . ",";
                    $aPrepareData[":" . $colName] = $value;
                    $i++;
                }

                $strSQL = "INSERT INTO " . $tblname . "(" . substr($strSQLCol, 0, -1) . ") VALUES (" . substr($strSQLVal, 0, -1) . ")";

                $q = $this->prepare($strSQL);
                return $q->execute($aPrepareData);
            }//end foreach
            $this->commit();
        } catch (PDOException $e) {
            echo "START ROLLBACK INSERT\n";
            $this->rollback();
            echo "ERROR !!!";
            echo "FATAL ERROR Code " . $e->getCode() . " :: " . $e->getMessage();
            exit;
        }
    }

    /**
     * Update data into base.
     * @param type $tblname
     * @param type $aUpd
     * @return type
     * Format array
     * ["value"]=>array(
      "val1"=>"updateVal1",
      "val2"=>"updateVal2"
      ["where"]=>array(
      "where1"=>"whereVal1",
      "where2"=>"whereVal2"
      ["condition"]=>"StringVal" Beta0.1
     */
    public function update($tblname = "", $aUpd = array()) {
        try {
            if (is_array($aUpd)) {
                $aPrepare = array();
                $strSQL = "UPDATE " . $tblname . " SET ";
                foreach ($aUpd as $key => $item) {
                    switch (strtoupper(trim($key))) {
                        case "VALUE":
                        case "WHERE":
                            if (is_array($item)) {
                                foreach ($item as $k_sub => $sub) {
                                    $strSQL .= $k_sub . "=? ,";
                                    array_push($aPrepare, $sub);
                                }
                                $strSQL = substr($strSQL, 0, -1);
                                if (strtoupper($key) == "VALUE")
                                    $strSQL .= "WHERE ";
                            }
                            break;
                        case "CONDITION":
                            break;
                    }
                }
                $q = $this->prepare($strSQL);
                return $q->execute($aPrepare);
            }
            $this->commit();
        } catch (PDOException $e) {
            echo "START ROLLBACK UPDATE\n";
            $this->rollback();
            echo "ERROR !!!";
            echo "FATAL ERROR Code " . $e->getCode() . " :: " . $e->getMessage();
            exit;
        }
    }

    
    public function delete(){
        
    }
    
    /**
     * Parent from PDO Class.
     * @param type $name
     */
    public function getlastInsertId($name = null) {
        parent::lastInsertId($name);
    }
    public function __destruct() {
        
    }

}

?>
