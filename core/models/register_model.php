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
class register_model extends MainModel {

    protected $RegCode;

    function save_register($aPOST) {

        $this->RegCode = CustomFunction::makeConfirmationCode($aPOST['studentID']);
        if (isset($aPOST['inp-follow']) && isset($aPOST['inp-follow-cell'])) {
            foreach ($aPOST['inp-follow'] as $key => $item) {
                $this->db->insert("guest_info", array(
                    "stu_code" => $aPOST['studentID'],
                    "g_name" => $item,
                    "g_telno" => $aPOST['inp-follow-cell'][$key],
                        )
                );
            }
        }

        $this->db->update("student_info", array(
            "value" => array(
                "regis_code" => $this->RegCode,
                "nickname" => $aPOST['nickname'],
                "email" => $aPOST['email'],
                "size_type" => $aPOST['size_type'],
                "size_code" => $aPOST['size_code'],
                "telno" => $aPOST['mobile'],
                "net_amount" => 0,
                "status" => 1,
                "regis_date" => date("Y-m-d H:i:s")
            ),
            "where" => array(
                "stu_code" => $aPOST['studentID']
            )
                )
        );
        return $this->RegCode;
    }

}

?>
