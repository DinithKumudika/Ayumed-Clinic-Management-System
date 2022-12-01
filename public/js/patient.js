window.addEventListener('DOMContentLoaded',function () {

    const appointDate = document.getElementById("appoint-date");
    const appointTime = document.getElementById("appoint-time");
    const appointReason =  document.getElementById("appoint-reason");
    const newAppointForm = document.getElementById("new-appoint-form");
    const addAppointBtn = document.getElementById("new-appoint-btn");

    const appointDateErr = document.getElementById("err-date");
    const appointTimeErr = document.getElementById("err-time");

    const sideNavLinks = document.querySelectorAll(".side-nav-link");
    const homeLink = sideNavLinks[0];
    const clinicDateLink = sideNavLinks[1];
    const treatmentLogLink =  sideNavLinks[2];
    const prescriptionLink = sideNavLinks[3];
    const recommendationLink = sideNavLinks[4];

    setDateLimit();

    setNavItem(homeLink, patientNav.home.link, patientNav.home.icon, patientNav.home.text);
    setNavItem(clinicDateLink, patientNav.clinic_date.link, patientNav.clinic_date.icon, patientNav.clinic_date.text);
    setNavItem(treatmentLogLink, patientNav.treatment_log.link, patientNav.treatment_log.icon, patientNav.treatment_log.text);
    setNavItem(prescriptionLink, patientNav.prescription.link, patientNav.prescription.icon, patientNav.prescription.text);
    setNavItem(recommendationLink, patientNav.recommendation.link, patientNav.recommendation.icon, patientNav.recommendation.text);

    // using jQuery
    // $(document).ready(function () {
    //     $('#new-appoint-btn').on('click', function (e) {
    //         e.preventDefault();
    //         if(isFormValid()){
    //             $.ajax({
    //                 method: "POST",
    //                 url: "http://localhost/ayumed/patient/index",
    //                 data: {
    //                     date: appointDate.value,
    //                     time: appointTime.value,
    //                     reason: appointReason.value
    //                 },
    //                 success: function (res) {
    //                     // console.log(data);
    //                     console.log(res);
    //                 }
    //             });
    //             const xhr = new XMLHttpRequest();
    //
    //         }
    //     })
    // });

    // using XML http request
    // addAppointBtn.addEventListener('click', function (e) {
    //     e.preventDefault();
    //     if(isFormValid()){
    //         // initialize XMLHttpRequest object
    //         const xhr = new XMLHttpRequest();
    //         const method = "POST";
    //         const url = "http://localhost/ayumed/patient/index";
    //         const date = appointDate.value;
    //         const time = appointTime.value;
    //         const reason = appointReason.value;
    //
    //         const form = new FormData();
    //         form.append("date", date);
    //         form.append("time", time);
    //         form.append("reason", reason);
    //         const params = new URLSearchParams(form);
    //
    //         // establish connection with the server
    //         xhr.open(method, url);
    //         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //
    //         // callback
    //         xhr.onload = function () {
    //             if(this.status === 200){
    //                 const res = this.responseText;
    //                 console.log(res);
    //                 // const json = JSON.parse(res);
    //                 // console.log(json);
    //             }
    //         }
    //
    //         // send request
    //         xhr.send(params);
    //     }
    // });
    
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
})



