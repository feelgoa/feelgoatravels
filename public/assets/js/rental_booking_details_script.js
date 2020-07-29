new Drift(document.querySelector('.drift-demo-trigger'), {
    paneContainer: document.querySelector('.details'),
    inlinePane: 769,
    inlineOffsetY: -85,
    containInline: true,
    hoverBoundingBox: true
});

function caltotal(no_of_days, rate) {
    var days = parseInt(no_of_days.value);
    var total = days * parseInt(rate);
    var msg = document.getElementById("total_amount");
    msg.value = total;
}

// Function to Validate Empty Number Field
function ValidateEmptyNumberField(emt_len, message, error_message) {
    var msg = document.getElementById(error_message);
    if (isNaN(emt_len.value) || emt_len.value == "") {
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        emt_len.style.borderColor = "red";
        document.getElementById("submit_btn").disabled = true;
        emt_len.focus();
        return false;
    } else {
        emt_len.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("submit_btn").disabled = false;
        return true;
    }
}

//Checks if date is after 24 hours
function CheckDate_after(date_id, message, error_message) {
    var date = new Date();
    date.setDate(new Date().getDate() + 1);
    var mydate = new Date(date_id.value);
    var msg = document.getElementById(error_message);
    if (date > mydate) {
        date_id.style.borderColor = "red";
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        date_id.focus();
        document.getElementById("submit_btn").disabled = true;
        return false;
    } else {
        date_id.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("submit_btn").disabled = false;
        return true;
    }
}

$('#selectlocation').change(function() {
    if ($(this).is(':checked')) {
        $('.pickup_point').css('display', 'block');
        $('.pickup_location1').css('display', 'none');
    } else {
        $('.pickup_point').css('display', 'none');
        $('.pickup_location1').css('display', 'block');
    }
});

// Function to validate Dropdowns
function ValidateDropdownfield(emt_len, message, error_message) {
    var msg = document.getElementById(error_message);
    if (emt_len.selectedIndex === 0) {
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        emt_len.style.borderColor = "red";
        document.getElementById("submit_btn").disabled = true;
        emt_len.focus();
        return false;
    } else {
        emt_len.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("submit_btn").disabled = false;
        return true;
    }
}

// Function to Empty Fields
function ValidateEmptyField(emt_len, message, error_message) {
    var msg = document.getElementById(error_message);
    if (emt_len.value === "") {
        msg.style.display = "inline-block";
        msg.innerHTML = message;
        emt_len.style.borderColor = "red";
        document.getElementById("submit_btn").disabled = true;
        emt_len.focus();
        return false;
    } else {
        emt_len.style.borderColor = "#66afe9";
        msg.style.display = "none";
        document.getElementById("submit_btn").disabled = false;
        return true;
    }
}

jQuery.validator.addMethod("time", function(value, element) {
    var hour = parseInt(value.substring(0, 2));
    return hour > 7 && hour < 23;
}, "Invalid time");