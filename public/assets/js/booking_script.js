//Form change based on Labels
$( document ).ready(function() {
    let checkboxs = document.getElementsByClassName("tours");
	for(let i = 0; i < checkboxs.length ; i++) {
		checkboxs[i].checked = true;
    }
    $(document.body).delegate('.tours', 'click', function(e) {
        e.preventDefault();
    });
    $('#member_count').keydown(function(e) {
        e.preventDefault();
    });
});

$(".form-s1 .stages-s1 .label-s1").click(function () {
    var radioButtons = $(".form-s1 .radio-s1");
    $(radioButtons).attr("disabled", true);
});

$('#hotelbooking').change(function(){
    if ($(this).is(':checked')) {
       $('.hotel-details-div').css('display', 'block')
    } else {
       $('.hotel-details-div').css('display', 'none')
    }
  });

//Form change based on button
$(".form-s1 .button-s1-next").click(function () {
    var radioButtons = $('.form-s1 .radio-s1');
    var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
    var travel_type = "";
    console.log(selectedIndex)
    if(selectedIndex == 0){
        if(personal_details_check()){
            selectedIndex = selectedIndex + 2;
            $('.form-s1 .radio-s1:nth-of-type(' + selectedIndex + ')').prop('checked', true);
        }
    }else if(selectedIndex == 1){
        if(package_details()){
            selectedIndex = selectedIndex + 2;
            $('.form-s1 .radio-s1:nth-of-type(' + selectedIndex + ')').prop('checked', true);
            var count1=parseInt(document.registration.male_count.value);
			var count2=parseInt(document.registration.female_count.value);
            var count=count1+count2;
            $('#member_count').val(count);
            $(this).hide();
        }
    }else if(selectedIndex == 2){
        selectedIndex = selectedIndex + 2;
        $('.form-s1 .radio-s1:nth-of-type(' + selectedIndex + ')').prop('checked', true);
    }
});

// This function will validate Email.
function ValidateEmail(uemail, message, error_message) {
    var msg = document.getElementById(error_message);
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.value.match(mailformat)) {
        uemail.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("form-next-button").disabled = false;
        return true;
    } else {
        uemail.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        document.getElementById("form-next-button").disabled = true;
        uemail.focus();
        return false;
    }
}

// Function to Empty Fields
function ValidateEmptyField(emt_len, message,error_message) {
    var msg = document.getElementById(error_message);
    if (emt_len.value === "") {
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        emt_len.style.borderColor = "red";
        document.getElementById("form-next-button").disabled = true;
        emt_len.focus();
        return false;
    } else {
        emt_len.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("form-next-button").disabled = false;
        return true;
    }
}

// Function to Validate Empty Number Field
function ValidateEmptyNumberField(emt_len, message,error_message) {
    var msg = document.getElementById(error_message);
    if (isNaN(emt_len.value) || emt_len.value=="") {
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        emt_len.style.borderColor = "red";
        document.getElementById("form-next-button").disabled = true;
        emt_len.focus();
        return false;
    } else {
        emt_len.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("form-next-button").disabled = false;
        return true;
    }
}

// Function to validate Dropdowns
function ValidateDropdownfield(emt_len, message,error_message) {
    var msg = document.getElementById(error_message);
    if (emt_len.selectedIndex === 0) {
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        emt_len.style.borderColor = "red";
        document.getElementById("form-next-button").disabled = true;
        emt_len.focus();
        return false;
    } else {
        emt_len.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("form-next-button").disabled = false;
        return true;
    }
}

// Function to validate Contact
function ValidateContact1(cont, message,error_message) {
    var msg = document.getElementById(error_message);
    var contformat = /^\d{10}$/;
    if (cont.value.match(contformat)) {
        cont.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("form-next-button").disabled = false;
        return true;
    } else {
        cont.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        document.getElementById("form-next-button").disabled = true;
        cont.focus();
        return false;
    }
}

//Validate Date
function CheckSameDate(date_id,message,error_message) {
    var date = new Date();
    date.setDate(new Date().getDate()+1);
    var mydate = new Date(date_id.value);
    var msg = document.getElementById(error_message);
    var dateday1 = new Date(document.getElementById("travel_date1").value);
    var dateday2 = new Date(document.getElementById("travel_date2").value);
    var dateday3 = new Date(document.getElementById("travel_date3").value);
    var dateday4 = new Date(document.getElementById("travel_date4").value);
    if(!isNaN(dateday1.getDay()) && !isNaN(dateday2.getDay()) && !isNaN(dateday3.getDay()) && !isNaN(dateday4.getDay())){
        if (dateday1.getDay() === dateday2.getDay() || date > mydate || dateday1.getDay()===dateday3.getDay() || dateday1.getDay()===dateday4.getDay() || dateday2.getDay()===dateday3.getDay() || dateday2.getDay()===dateday4.getDay() || dateday3.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday1.getDay()) && !isNaN(dateday2.getDay()) && !isNaN(dateday3.getDay())){
        if (dateday1.getDay() === dateday2.getDay() || date > mydate || dateday1.getDay()===dateday3.getDay() || dateday2.getDay()===dateday3.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday1.getDay()) && !isNaN(dateday2.getDay()) && !isNaN(dateday4.getDay())){
        if (dateday1.getDay() === dateday2.getDay() || date > mydate || dateday1.getDay()===dateday4.getDay() || dateday2.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday1.getDay()) && !isNaN(dateday3.getDay()) && !isNaN(dateday4.getDay())){
        if (date > mydate || dateday1.getDay()===dateday3.getDay() || dateday1.getDay()===dateday4.getDay() || dateday3.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            document.getElementById("form-next-button").disabled = true;
            msg.innerHTML = message;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday1.getDay()) && !isNaN(dateday3.getDay()) && !isNaN(dateday4.getDay())){
        if (date > mydate || dateday1.getDay()===dateday3.getDay() || dateday1.getDay()===dateday4.getDay() || dateday3.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday2.getDay()) && !isNaN(dateday3.getDay()) && !isNaN(dateday4.getDay())){
        if (date > mydate || dateday2.getDay()===dateday3.getDay() || dateday2.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday1.getDay()) && !isNaN(dateday3.getDay())){
        if (date > mydate || dateday1.getDay()===dateday3.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday1.getDay()) && !isNaN(dateday2.getDay())){
        if (dateday1.getDay() === dateday2.getDay() || date > mydate) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            document.getElementById("form-next-button").disabled = true;
            msg.innerHTML = message;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }

    }else if(!isNaN(dateday1.getDay()) && !isNaN(dateday4.getDay())){
        if (date > mydate || dateday1.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            document.getElementById("form-next-button").disabled = true;
            msg.innerHTML = message;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday2.getDay()) && !isNaN(dateday3.getDay())){
        if (date > mydate || dateday2.getDay()===dateday3.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday2.getDay()) && !isNaN(dateday4.getDay())){
        if (date > mydate || dateday2.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            date_id.focus();
            document.getElementById("form-next-button").disabled = true;
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday3.getDay()) && !isNaN(dateday4.getDay())){
        if (date > mydate || dateday3.getDay()===dateday4.getDay()) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday2.getDay())){
        if (date > mydate) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday1.getDay())){
        if (date > mydate) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday3.getDay())){
        if (date > mydate) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }else if(!isNaN(dateday4.getDay())){
        if (date > mydate) {
            date_id.style.borderColor = "red";
            msg.style.display = "inline-block";
            msg.innerHTML = message;
            document.getElementById("form-next-button").disabled = true;
            date_id.focus();
            return false;
        } else {  
            date_id.style.borderColor = "#66afe9";
            msg.style.display = "none";
            document.getElementById("form-next-button").disabled = false;
            return true;
        }
    }
}

function personal_details_check() {
    var msg = document.getElementById("error_message");
    var name = document.getElementById("name1");
    var email = document.getElementById("email");
    var contact = document.getElementById("contact");
    var male = document.getElementById("b1");
	var female=document.getElementById("b2");
	var age = document.getElementById("age");
    var place = document.getElementById("place");
    if (name.value == "" || email.value == "" || contact.value=="" || (male.checked==false && female.checked==false) || age.value=="" || place.value=="" ) {
        msg.style.display = "inline-block";
        msg.innerHTML = "Fields are empty";
        return false;
    } else {
        msg.style.display = "none";
        return true;
    }
}

function package_details() {
    var dateday1 = new Date(document.getElementById("travel_date1").value);
    var dateday2 = new Date(document.getElementById("travel_date2").value);
    var msg = document.getElementById("error_message1");
    if (isNaN(dateday1.getDay()) || isNaN(dateday2.getDay())) {
        msg.style.display = "inline-block";
        msg.innerHTML = "Fields are empty";
        return false;
    } else {
        msg.style.display = "none";
        return true;
    }
}

//Function to select places when date3 is selected
function checkday3places(){
    var dateday3=new Date(document.getElementById('travel_date3').value);
    if(!isNaN(dateday3.getDay())){
        let checkboxs = document.getElementsByClassName("tour_extra3");
	    for(let i = 0; i < checkboxs.length ; i++) {
		    checkboxs[i].checked = true;
        }
        $(document.body).delegate('.tour_extra3', 'click', function(e) {
            e.preventDefault();
        });
    }
}
//Function to select places when date4 is selected
function checkday4places(){
    var dateday4=new Date(document.getElementById('travel_date4').value);
    if(!isNaN(dateday4.getDay())){
        let checkboxs = document.getElementsByClassName("tour_extra4");
	    for(let i = 0; i < checkboxs.length ; i++) {
		    checkboxs[i].checked = true;
        }
        $(document.body).delegate('.tour_extra4', 'click', function(e) {
            e.preventDefault();
        });
    }
}

//Checks if date is after 24 hours
function CheckDate_after(date_id,message,error_message) {
    var date = new Date();
    date.setDate(new Date().getDate()+1);
    var mydate = new Date(date_id.value);
    var msg = document.getElementById(error_message);
    if(date > mydate) {
        date_id.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        date_id.focus();
        return false;
    } else {  
        date_id.style.borderColor = "#66afe9";
        msg.style.display = "none";
        return true;
    }
}

//Checks if checkout_date is after 24 hours of check_in date
function Checkout_date_check(date_id,message,error_message) {
    check_in_date=document.getElementById("check_in").value;
    var check_out_date = new Date(date_id.value);
    var check_in_date = new Date(check_in_date);
    var msg = document.getElementById(error_message);
    if(check_out_date <= check_in_date) {
        date_id.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        date_id.focus();
        return false;
    } else {  
        date_id.style.borderColor = "#66afe9";
        msg.style.display = "none";
        return true;
    }
}