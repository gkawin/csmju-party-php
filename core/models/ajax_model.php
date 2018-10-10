<?php

/**
 * Description of xhr_model
 *
 * @author Tong
 * @createDt Jun 09,2013
 */
class ajax_model extends MainModel {

    public function __construct() {
        parent::__construct();
    }

    public function prefixStdCode() {
        $strSQL = "SELECT  
            SUBSTR(`stu_code`, 1, 2) AS prefixCode 
          FROM
            student_info 
          GROUP BY SUBSTR(`stu_code`, 1, 2)";
        $stm = $this->db->query($strSQL);
        return ($stm->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getStdData($q) {

        $strSQL = "SELECT 
  fullname,
  `stu_code`,
  nickname,
  company ,
  regis_code as regCode,
  status,
  net_amount as paid
FROM
  student_info 
WHERE SUBSTR(`stu_code`, 1, 2) = '" . $q . "'
GROUP BY `stu_code`";
        $stm = $this->db->query($strSQL);
        return ($stm->fetchAll(PDO::FETCH_ASSOC));
    }

}

?>
