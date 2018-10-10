/**
* Payment javascript
* create date : 2013-07-23 17.21
* Author : Tong
**/
$(document).ready(function(){

	$("#frmVerifyConfirmCode").submit(function(e){
		var oInput = $(this).serializeArray(); 
		
		$.ajax({
			url : "payment/getconfirmInformation.html",
			data : oInput,
			dataType : 'json',
			type : 'POST',
			cache : false
		}).done(function(callback){
			if(callback.status){
				$("#lblRegisterID").html(callback.RegisterCode);
				$("#RegCode").val(callback.RegisterCode);
				$("#lblFullNamePost").html(callback.FullName);
				$("#email").val(callback.email);
				$("#FullName").val(callback.FullName);
				$("#frmConfirmCode").fadeIn('slow');
			}else{
				alert("Please check confirmation code!!");
			}
		});
		e.preventDefault();
	});


	/**
	* SEND CONFIRM.
	**/
	$("#frmConfirmCode").submit(function(e){
		var oInput = $(this).serializeArray(); 
		
		$.ajax({
			url : "payment/payment_transaction.html",
			data : oInput,
			dataType : 'json',
			type : 'POST',
			cache : false
		}).done(function(callback){
			if(callback.status){
				alert("Thank you. We already sent confirmation to your Inbox.Please keep to use a dividaile in front.");
				window.location = "payment.html";
			}
		});
		e.preventDefault();
	});

	/**
	* Auto checking
	* check mail link handle.
	*/
	if($("#txtConfirmCode").val() != ""){
		$.ajax({
			url : "payment/getconfirmInformation.html",
			data : {'ConfirmCode':$("#txtConfirmCode").val()},
			dataType : 'json',
			type : 'POST',
			cache : false
		}).done(function(callback){
			if(callback.status){
				$("#lblRegisterID").html(callback.RegisterCode);
				$("#RegCode").val(callback.RegisterCode);
				$("#lblFullNamePost").html(callback.FullName);
				$("#email").val(callback.email);
				$("#FullName").val(callback.FullName);
				$("#frmConfirmCode").fadeIn('slow');
			}else{
				alert("Please check confirmation code!!");
			}
		});
	}
});