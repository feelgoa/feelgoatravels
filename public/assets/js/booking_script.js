//Form change based on Labels
$(".fm-booking .stages-s1 .label-s1").click(function () {
    var radioButtons = $(".fm-booking .radio-s1");
    $(radioButtons).attr("disabled", true);
});

//Form change based on button
$(".fm-booking .button-s1-next").click(function () {
	if(personal_details_check()){
		var radioButtons = $('.fm-booking .radio-s1');
		var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
		selectedIndex = selectedIndex + 2;
		if(selectedIndex < 4){
			$('.fm-booking .radio-s1:nth-of-type(' + selectedIndex + ')').prop('checked', true);
		}
		if (selectedIndex == 3) {
			$(this).hide();
		}
		if(selectedIndex == 2){
			var count1=parseInt(document.registration.male_count.value);
			var count2=parseInt(document.registration.female_count.value);
			var count=count1+count2;
			if(count<=10){
				let checkboxs = document.getElementsByClassName("tours");
				for(let i = 0; i < checkboxs.length ; i++) {
					checkboxs[i].checked = true;
				}
				checkbox1=document.getElementById("customCheckBox5");
				checkbox1.disabled=true;
                $(document.body).delegate('.tours', 'click', function(e) {
					e.preventDefault();
			    });
			}
			$(document.body).delegate('.tours', 'click', function(e) {
                checkbox1=document.getElementById("customCheckBox5");
				checkbox1.checked=false;
        });

		}
	}
});

// Control to select and deselect all checkboxs based on checkbox select
function eventCheckBox() {
    let checkboxs = document.getElementsByClassName("tours");
    for (let i = 0; i < checkboxs.length; i++) {
        checkboxs[i].checked = true;
    }
}

// This function will validate Email.
function ValidateEmail(uemail, message) {
    var msg = document.getElementById("error_message");
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.value.match(mailformat)) {
        uemail.style.borderColor = "#66afe9";
        msg.style.display = "none";
        return true;
    } else {
        uemail.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        uemail.focus();
        return false;
    }
}

// Function to validate Emails
function ValidateEmptyField(emt_len, message) {
    var msg = document.getElementById("error_message");
    if (emt_len.value === "") {
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        emt_len.style.borderColor = "red";
        emt_len.focus();
        return false;
    } else {
        emt_len.style.borderColor = "#66afe9";
        msg.style.display = "none";
        return true;
    }
}

// Function to validate Contact
function ValidateContact(cont, message) {
    var msg = document.getElementById("error_message");
    var contformat = /^\d{10}$/;
    if (cont.value.match(contformat)) {
        cont.style.borderColor = "#66afe9";
        msg.style.display = "none";
        return true;
    } else {
        cont.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        cont.focus();
        return false;
    }
}

//Date Validation
function CheckDate(date_id, message) {
    var date = new Date();
    var mydate = new Date(date_id.value);
    var msg = document.getElementById("error_message1");

    if (date < mydate) {
        date_id.style.borderColor = "#66afe9";
        msg.style.display = "none";
        return true;
    } else {
        date_id.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        date_id.focus();
        return false;
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
