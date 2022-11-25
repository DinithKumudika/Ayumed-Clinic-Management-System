const appointDate = document.getElementById("input-date");
const appointTime = document.getElementById("input-time");
const appointReason =  document.getElementById("input-reason");
const newAppointForm = document.getElementById("new-appoint-form");
const addAppointBtn = document.getElementById("new-appoint-btn");

const appointDateErr = document.getElementById("err-date");
const appointTimeErr = document.getElementById("err-time");


setDateLimit();

addAppointBtn.addEventListener('click', function () {
    if(isFormValid()){
        newAppointForm.submit();
    }
});

// add appointment form validation
function isFormValid(){
    const appointDateValid = Validate.isDateValid(appointDate, appointDateErr);
    const appointTimeValid = Validate.isTimeValid(appointTime, appointTimeErr);

    if(!appointTimeValid && !appointDateValid){
        return false;
    }
    else if(!appointDateValid){
        return false;
    }
    else if (!appointTimeValid) {
        return false;
    }
    else{
        return true;
    }
}

// set current date as the minimum value of date input
function setDateLimit() {
    const today = new Date();
    let date = today.getDate();
    let year = today.getFullYear();
    let month = today.getMonth() + 1;

    if (date < 10) {
        date = "0" + date;
    }

    if (month < 10) {
        month = "0" + month;
    }

    appointDate.setAttribute("min", year + "-" + month + "-" + date);
}