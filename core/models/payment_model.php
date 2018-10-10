<?php

/**
 * Description of register_model
 *
 * @author Tong
 */
class payment_model extends MainModel {

    public function getconfirmInformation($ConfirmCode) {
        $regis_code = mysql_escape_string($ConfirmCode);
        $strSQL = "SELECT 
		  regis_code AS RegisterCode,
		  `fullname` AS FullName,
		  email
		FROM
		  `student_info` 
		WHERE regis_code = '" . $regis_code . "' LIMIT 1";

        $stm = $this->db->query($strSQL);
        return ($stm->fetch(PDO::FETCH_ASSOC));
    }

    public function save_payment($aPOST) {
        $isInsert = $this->db->insert("payment", array(
            "regis_code" => $aPOST['RegCode'],
            "bank" => $aPOST['bankID'],
            "paid_amount" => $aPOST['txtPaid'],
            "tranfer_date" => $aPOST['txtPaidDate'],
                )
        );
        return $isInsert;
    }

    public function checkpaymentConfirm($confirmcode) {
        $strSQL = "SELECT count(*) as cnt FROM payment WHERE regis_code = :confCode";
        $stmt = $this->db->prepare($strSQL);
        $stmt->execute(array(":confCode" => $confirmcode));
        $f = $stmt->fetch(PDO::FETCH_ASSOC);
        return $f['cnt'];
    }

}

?>