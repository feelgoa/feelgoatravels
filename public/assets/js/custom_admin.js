$(document).ready( function () {


    $('#enquiry-table').DataTable({
        "columnDefs": [
            { "searchable": false, "targets": [3] },
            {'targets': [3], /* column index */
                'orderable': false, /* true or false */
             }

          ],
        "order": [],
        "lengthChange": false
    });

    $('#tours-table').DataTable({
        "columnDefs": [
            { "searchable": true, "targets": [3] },
            {'targets': [1,3,5,6], /* column index */
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
                        $('.toast-message').text(response['message']);
                        setTimeout(function () {
                            alert('Reloading page to display newly added comment.');
                            location.reload(true);
                        }, 1000);
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


});

function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}