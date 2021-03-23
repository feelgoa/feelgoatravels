function myFunction() {
	var copyText = document.getElementById("myInput");
	copyText.select();
	copyText.setSelectionRange(0, 99999)
	document.execCommand("copy");
    $("#toast-message").click();
    $('.toast-message').text("Payment link copied : " + copyText.value);
  }

$(document).ready( function () {

    if ($("body").height() > $(window).height()) {
        //alert("Vertical Scrollbar");
        //remove position absolute
        //remove bottom 0px
        $(".app-wrapper-footer").css({"position": "","bottom": ""});
    } else {
        //alert("fix footer");
        //position absolute
        //bottom 0px
        $(".app-wrapper-footer").css({"position": "absolute","bottom": "0px"});
        //$(".app-wrapper-footer").css({"background-color": "yellow"});
    }
    /*
    $('#enquiry-table').DataTable({
        "columnDefs": [
            { "searchable": false, "targets": [3] },
            {'targets': [3],
                'orderable': false,
             }

          ],
        "order": [],
        "lengthChange": false
    });
    */
   $('#enquiry-table').DataTable({
    "columnDefs": [],
    "order": [],
    "lengthChange": false
});

    $('#tours-table').DataTable({
        "columnDefs": [
            { "searchable": true, "targets": [3] },
            {'targets': [1,2,4,6], /* column index */
                'orderable': false, /* true or false */
             }

          ],
        "order": [],
        "lengthChange": false
    });

    $("#myBtn").click(function(){
        var msg = document.getElementById("error_message");
        if ($("#resp-value").val() != "") {
            $.ajax({
                url: "/api/reply-admin-comment",
                type:"POST",
                data:{
                    message:$("#resp-value").val(),
                    link:$("#current_id").val()
                },
                success:function(response){
                    if (response['isSuccess'] == true) {
                        $("#error_message").addClass("label-success");	
                        $("#error_message").removeClass("label-danger");
                        msg.style.display = "inline-block";
                        //msg.innerHTML = response['message'];
                        $("#toast-message").click();
                        $('.toast-message').text(response['message']+" Page will be reloaded to display the newly added comment.");
                        setTimeout(function () {
                            location.reload(true);
                        }, 5000);
                    } else {
                        $("#error_message").addClass("label-danger");
                        $("#error_message").removeClass("label-success");	
                        msg.style.display = "inline-block";
                        //msg.innerHTML = response['message'];
                        $("#toast-message").click();
                        $('.toast-message').text(response['message']);
                    }
                }, error:function(response) {
                    $("#error_message").addClass("label-danger");
                    $("#error_message").removeClass("label-success");
                    msg.style.display = "inline-block";
                    msg.innerHTML = "Something went wrong. Please try again in some time.";
                    $("#toast-message").click();
                    $('.toast-message').text('Something went wrong. Please try again in some time.');
                },
            });
        } else {
            $("#toast-message").click();
            $('.toast-message').text('Please enter your comment and then click on Reply.');
        }
    });


    
    $("#myBtnlogin").click(function(){
        $.ajax({
            url: "/api/login-check",
            type:"POST",
            data:$('#resp_form').serialize(),
            success:function(response){
                console.log(response)
            }, error:function(response) {
                console.log(response)
            }
        });
    });


    $("#loginbtn").click(function(){
            $.ajax({
                url: "/api/reply-admin-comment",
                type:"POST",
                data:$('#resp_form').serialize(),
                success:function(response){
                    console.log(response)
                }, error:function(response) {
                    console.log(response)
                }
            });
    });

    $("#update_status_btn").click(function(){
        if ($("#status_dropdown").val() == $("#curstatus").val()) {
            $("#toast-message").click();
            $('.toast-message').text('New updating status cannot be same as the existing status.');
        } else {
            $.ajax({
                url: "/api/update-booking-status",
                type:"POST",
                data:{
                    booking_id:$("#bkngid").val(),
                    booking_type : $("#bkngtype").val(),
                    status : $("#status_dropdown").val(),
                    desc : $("#status_desc").val()
                },
                success:function(response){
                    $("#toast-message").click();
                    $('.toast-message').text(response['message']);
                    setTimeout(function () {
                        location.reload(true);
                    }, 5000);
                }, error:function(response) {
                    $("#toast-message").click();
                    $('.toast-message').text(response['message']);
                }
            });
        }

    });

    $("#gen_email").click(function(){
        if ($("#payment_amount").val == "") {
            $("#toast-message").click();
            $('.toast-message').text('Amount cannot be empty;');
        } else {
            $.ajax({
                url: "/api/get-payment-email-content",
                type:"POST",
                data:{
                    booking_type:1,
                    name: $('#booking_name').val(),
                    ref_id:$('#booking_refid').val(),
                    totalcount:$('#booking_count').val(),
                    pickuppoint:$('#booking_pickuppoint').val(),
                    pnr:$('#booking_pnr').val(),
                    amt:$('#payment_amount').val()
                },
                success:function(response){
                    $("#toast-message").click();
                    $('.toast-message').text('Amount link successfully loaded.');
                    //$( "#email-template" ).html(response['data']);
                    //$('#email_container').val(response['data']);
                    //console.log(response['data']['link']);
                    //auto_grow(document.getElementById("email_container"))
                    $('#myInput').val(response['data']['link']);
                    console.log(response['data']['link']);
                }, error:function(response) {
                    $("#toast-message").click();
                    $('.toast-message').text('There was some error while loading email content. Please try again in some time.');
                }
            });
        }
    });


    $("#payment-link-btn").click(function(){
        if($("#email_container").val() == "") {
            $("#toast-message").click();
            $('.toast-message').text('Cannot send email with empty content. You have to first generate payment email');
        }else {
            $.ajax({
                url: "/api/send-payment-email",
                type:"POST",
                data:{
                    content: $('#email_container').val(),
                    email:$('#booking_email').val(),
                    name:$('#booking_name').val(),
                    template:6
                },
                success:function(response){
                    $("#toast-message").click();
                    $('.toast-message').text('Email was sent.');
                    
                    $('#email_container').val(response['data']);
                    auto_grow(document.getElementById("email_container"))
                }, error:function(response) {
                    $("#toast-message").click();
                    $('.toast-message').text('There was some error while sending email content. Please try again in some time.');
                }
            });

            $("#toast-message").click();
            $('.toast-message').text('Sending Email.'); 
        }
    });

});

function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}