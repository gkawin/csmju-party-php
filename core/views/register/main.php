<!--
To change this template, choose Tools | Templates
and open the template in the editor.
MAIN REGISTER
-->
<div class="container">
    <div class="pageheader">
        <img src="../img/csmjuparty_logo.png" alt="">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li><a href='/'>CSMJU Party 2013</a></li>
                        <li class="active"><a href='register.html'>ลงทะเบียน</a></li>
                        <li><a href='payment.html'>ยืนยันการชำระเงิน</a></li>
                        <li><a href='check.html'>ตรวจสอบข้อมูล</a></li>
                        <li><a href='backoffice/auth.html'>ผู้ดูแลระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <!--modal-->
        <div id="regis-modal" class="modal hide fade" 
             tabindex="-1" role="dialog" 
             aria-labelledby="regis-modal-label"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h3>ลงทะเบียน</h3>
            </div>
            <form class="form-horizontal" id="frmRegister">
                <div class="modal-body">
                    <div class="alert alert-error notice-autohide">
                        <strong>Error!</strong> Please insert require field.
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="input-nick">รหัสนักศึกษา</label>
                        <div class="controls" id="r-box-StudentID"></div>
                        <input type="hidden" name="studentID" id="r-box-StudentID_box"/>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-nick">ชื่อ-นามสกุล</label>
                        <div class="controls" id="r-box-Fullname"></div>
                        <input type="hidden" name="fullName" id="r-box-Fullname_box"/>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-nick">ชื่อเล่น</label>
                        <div class="controls">
                            <input type="text" id="input-nick" name="nickname" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-company">บริษัท</label>
                        <div class="controls">
                            <input type="text" id="input-company" name="company" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-mobile">หมายเลขโทรศัพท์</label>
                        <div class="controls">
                            <input type="text" id="input-mobile" name="mobile" placeholder="08xxxxxxxx" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input-email">Email</label>
                        <div class="controls">
                            <input type="text" id="input-email" name="email" placeholder="example@example.com" required>
                            <span class="help-block">โปรดใส่ Email จริง เพราะมีการยืนยันตัวผ่านทาง Email</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select-size">Size</label>
                        <div class="controls">
                            <select id="select-gen" class="span1" name="size_type">
                                <option value="M">ชาย</option>
                                <option value="F">หญิง</option>
                            </select>
                            <select id="select-size" class="span2"  name="size_code">
                                <option value="SSS">SSS</option>
                                <option value="SS">SS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                <option value="XXXL">XXXL</option>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="control-group" id="guess" >
                        <label class="control-label" for="label-guest">ข้อมูลผู้ติดตาม</label>
                        <div class="controls">
                            <a href="#" class="btn btn-small btn-success " id="btn-addGuest"><i class="icon-plus-sign icon-white" ></i></a>
                        </div>
                    </div>


                    <hr>
                    <div class="control-group">
                        <label class="control-label" for="label-guest">จำนวนเงินทั้งหมด</label>
                        <div class="controls">
                            <p><strong>800</strong> บาท</p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="label-guest">ข้อมูลการชำระงเิน</label>
                        <div class="controls">
                            ธนาคารกสิกรไทย สาขาซีคอนสแควร์ 2 เลขที่บัญชี 635-2-25006-4 ชื่อบัญชี ปิยะวรรณ พรมสีดา
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <input type="submit" class="btn btn-primary" id="btnReg" value="ลงทะเบียน"/>
                </div>
            </form>
        </div>
        <form class="form-inline">
            <fieldset>
                <legend>ลงทะเบียน</legend>
                <label>รหัสนักศึกษา</label>
                <select id="cboPrefixCode">
                    <option>-- กรุณาเลือก ---</option>
                </select>
                <button type="submit" class='btn' id="selectStdList">Go</button>
            </fieldset>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        รหัสนักศึกษา
                    </th>
                    <th>
                        ชื่อ-นามสกุล
                    </th>
                    <th>
                        ชื่อเล่น
                    </th>
                    <th>
                        บริษัท
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody id="tbody-listLanding">

            </tbody>
        </table>
    </div>
    <hr>
    <div class="footer">
        <p>&COPY; 2013 Computer Science 11th - Maejo University</p>
    </div>

</div>
