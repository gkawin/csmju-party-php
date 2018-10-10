<?php
/**
* Remove when finished or new place argumnet.
**/
$ConfCode = (isset($_GET['confirmcode'])) ? $_GET['confirmcode'] : "";
?>
<div class="container">
    <div class="pageheader">
        <img src="../img/csmjuparty_logo.png" alt="">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li><a href='/'>CSMJU Party 2013</a></li>
                        <li><a href='register.html'>ลงทะเบียน</a></li>
                        <li class="active"><a href='payment.html'>ยืนยันการชำระเงิน</a></li>
                        <li><a href='backoffice/auth.html'>ผู้ดูแลระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <form class="form-inline" id="frmVerifyConfirmCode">
            <fieldset>
                <legend>ยืนยันการชำระเงิน</legend>
                <label>รหัสลงทะเบียนจาก Email</label>
                <input type="text" name="ConfirmCode" id="txtConfirmCode" required value="<?=$ConfCode?>">
                <button type="submit" class='btn' >Go</button>
            </fieldset>
        </form>
        <hr>
        <form class="form-horizontal" style="display:none;" id="frmConfirmCode" method="POST">
            <div class="control-group">    
                <label class="control-label" for="input-nick">รหัสลงทะเบียน</label>
                <div class="controls" id="lblRegisterID"></div>
                <input type="hidden" name="RegCode" id="RegCode" value=""/>
                <input type="hidden" name="email" id="email" value=""/>
                <input type="hidden" name="FullName" id="FullName" value=""/>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-nick">ชื่อผู้ลงทะเบียน</label>
                <div class="controls"  id="lblFullNamePost"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-nick">ชื่อธนาคารที่โอน</label>
                <div class="controls">
                    <select name="bankID" class="dropdownlist" required><option value="">โปรดเลือก</option>
                        <option value="0">ธนาคาร กสิกรไทย จำกัด (มหาชน)</option>
                        <option value="2">ธนาคาร กรุงเทพ จำกัด (มหาชน)</option>
                        <option value="4">ธนาคาร กรุงไทย จำกัด (มหาชน)</option>
                        <option value="19">ธนาคาร กรุงศรีอยุธยา จำกัด (มหาชน)</option>
                        <option value="22">ธนาคาร คาลิยง</option>
                        <option value="6">ธนาคาร เจพีมอร์แกน เชส สาขากรุงเทพฯ</option>
                        <option value="12">ธนาคาร ซิตี้แบ้งค์</option>
                        <option value="17">ธนาคาร ซีไอเอ็มบี ไทย จำกัด (มหาชน)</option>
                        <option value="31">ธนาคาร ซูมิโตโม มิตซุย แบงกิ้ง คอร์ปอเรชั่น</option>
                        <option value="26">ธนาคาร ดอยซ์แบงก็</option>
                        <option value="8">ธนาคาร ทหารไทย จำกัด (มหาชน)</option>
                        <option value="100">ธนาคาร ทิสโก้ จำกัด (มหาชน)</option>
                        <option value="104">ธนาคาร ไทยเครดิต เพื่อรายย่อย</option>
                        <option value="10">ธนาคาร ไทยพาณิชย์ จำกัด (มหาชน)</option>
                        <option value="106">ธนาคาร ธนชาต จำกัด (มหาชน)</option>
                        <option value="28">ธนาคาร มิซูโฮ คอร์ปอเรต จำกัด สาขากรุงเทพฯ</option>
                        <option value="20">ธนาคาร  เมกะ สากลพาณิชย์ จำกัด (มหาชน)</option>
                        <option value="18">ธนาคาร ยูโอบี จำักด (มหาชน)</option>
                        <option value="111">ธนาคาร แลนด์ แอนด์ เฮ้าส์</option>
                        <option value="15">ธนาคาร สแตนดาร์ดชาร์เตอร์ด (ไทย) จำกัด (มหาชน)</option>
                        <option value="102">ธนาคาร แห่งโตเกียว-มิตซูบิชิ ยูเอฟเจ จำกัด สาขากรุงเทพฯ</option>
                        <option value="21">ธนาคาร แห่งอเมริกาฯ</option>
                        <option value="24">ธนาคาร ออมสิน</option>
                        <option value="27">ธนาคาร อาคารสงเคราะห์</option>
                        <option value="3">ธนาคาร เอบีเอ็น แอมโร เอ็น.วี.</option>
                        <option value="105">ธนาคาร ไอซีบีซี (ไทย) จำกัด (มหาชน)</option>
                        <option value="25">ธนาคาร ฮ่องกงและเซี่ยงไฮ้ จำกัด</option></select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-nick">จำนวนเงินที่โอน</label>
                <div class="controls">
                    <input type="text" name="txtPaid" value="1800.00" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input-nick">วันที่เวลาที่โอน</label>
                <div class="controls">
                    <div id="input-date" class="input-append date">
                        <input data-format="yyyy-MM-dd hh:mm" type="text" name="txtPaidDate" required>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="control-group">

                <div class="controls">
                    <button type="submit" id="submit-payment" class="btn btn-success">ยืนยันการชำระเงิน</button>
                </div>
            </div>
			<hr>
        </form>

    </div>
    
    <div class="footer">
        <p>&COPY; 2013 Computer Science 11th - Maejo University</p>
    </div>

</div>