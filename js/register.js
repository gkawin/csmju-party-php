/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    /**
     * Open form register
     * 
     */
    $(document).on('click', '.btn-openPopup', function(e) {

        $("input[type=text]").each(function(k, v) {
            v.value = "";
        });

        var stdID = $(this).parents().eq(1).children().eq(0).html();
        var fullName = $(this).parents().eq(1).children().eq(1).html();

        $("#r-box-StudentID").html(stdID);
        $("#r-box-StudentID_box").val(stdID);
        $("#r-box-Fullname").html(fullName);
        $("#r-box-Fullname_box").val(fullName);
    });

    /**
     * register
     */
    $("#btn-addGuest").click(function() {
        var strHTML = '<div class="container-guest">'+
                        '<div class="control-group"  >'+
                            '<label class="control-label" for="section-guest" id="lbl-secguest">ผู้ติดตาม #</label>'+
                            '<div class="controls">'+
                                '<input type="text" name="inp-follow[]" placeholder="ชื่อ-นามสกุล" required>'+
                            '</div>'+
                            '<div class="controls">'+
                                '<input type="text"  name="inp-follow-cell[]" placeholder="หมายเลขโทรศัพท์" required>'+
                                '<a href="#" class="btn btn-small btn-danger btn-del"><i class="icon-minus-sign icon-white"></i></a>'+
                                '<span class="help-block">ผู้ติดตามจะไม่ได้รับเสื้อที่ระลึก</span>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
		$("#guess").after(strHTML);
    });

	/**
	* DEL GuEST
	*/
	$(document).on("click",".btn-del",function(e){
		$(this).parent().parent().eq(0).remove();
	});
    
    /**
     * submit form.
     */
    $("#frmRegister").submit(function(e) {
		var $this = $(this);
        $.ajax({
            url: 'register/instransaction.html',
            data: $("#frmRegister").serializeArray(),
            dataType: 'json',
            type: 'POST'
        }).done(function(callback) {
			if(callback.status){
				alert("Register completed. Please confirm payment in your E-mail.");
				window.location = "register.html";
			}
        });
        e.preventDefault();
    });

    /**
     * guest controll
     */

});

