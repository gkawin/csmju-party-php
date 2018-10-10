/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    /**
     * LOAD PREFIX 
     * PAGE :: register.html
     */
    var cboPrefixCode = $("#cboPrefixCode");
    $.ajax({
        url: 'ajax/prefixStdCode.html',
        data: {t: new Date().getTime()},
        dataType: 'json',
        type: 'POST',
        cache: true,
        success: function(o) {
            for (i = 0; i < o.numRows; i++) {
                cboPrefixCode.append(new Option(o.data[i]['prefixCode'], o.data[i]['prefixCode']));
            }
        }
    });

    $("button#selectStdList").on('click', function(e) {
        $.ajax({
            url: 'ajax/getStdData.html',
            data: {q: cboPrefixCode.val(), t: new Date().getTime()},
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(o) {
                var strHTML = "";
                var strTag = "";
                for (i = 0; i < o.numRows; i++) {
                    if (o.data[i]['regCode'] == null && o.data[i]['paid'] == 0) {
                        strTag = "<a class='btn btn-mini btn-primary btn-openPopup' id='q_" + o.data[i]['stu_code'] + "' href='#regis-modal' data-toggle='modal'><i class='icon-pencil icon-white'></i> Register</a>";
                    } else if (o.data[i]['regCode'] != null) {
                        if (o.data[i]['paid'] == 0) {
                            strTag = " <a class='btn btn-mini btn-primary disabled' href='#'><i class='icon-ok icon-white'></i> Registered</a> <a class='btn btn-mini btn-warning disabled' href='#payment-modal' data-toggle='modal'><i class='icon-time icon-white'></i> Wait payment</a>";
                        }
                    }
                    strHTML += "<tr><td class='stdID'>" + o.data[i]['stu_code'] + "</td>" +
                            "<td class='fname'>" + o.data[i]['fullname'] + "</td>" +
                            "<td>" + o.data[i]['nickname'] + "</td>" +
                            "<td>" + o.data[i]['company'] + "</td>" +
                            " <td>" + strTag +
                            "</td></tr>";
                }

                $("#tbody-listLanding").html(strHTML);
            }

        });
        e.preventDefault();
    });

   
});