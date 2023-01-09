window.addEventListener('DOMContentLoaded',function () {

    const appointDate = document.getElementById("appoint-date");
    const appointTime = document.getElementById("appoint-time");
    const appointReason =  document.getElementById("appoint-reason");
    const newAppointForm = document.getElementById("new-appoint-form");
    const addAppointBtn = document.getElementById("new-appoint-btn");
    const modalCloseBtn = document.querySelector(".close");

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

    //full calendar
    const calendarEl = document.getElementById("calendar");
    const calendar =  new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        timeZone: 'local',
        editable: true,
        selectable: true,
        events: [],
        eventClick: function (info) {
            let reason;
            if(info.event.extendedProps.reason === ""){
                reason = "None";
            }
            else{
                reason = info.event.extendedProps.reason;
            }
            Swal.fire({
                title: 'appointment No: ' + info.event.title,
                html: `<h3>Reason: ${reason} </h3><h3>Time: ${info.event.extendedProps.time}</h3>`
            });
        }
    });
    calendar.render();

    let upcomingAppointments = [];

    function getUpcoming(calendar){
        const url = "http://localhost/ayumed/ajax/getAllUpcomingAppoint";
        const method = "GET";
        const responseType = "JSON";

        ajax(url, method, responseType).then(function (result){
            if(result.status === 200){
                result.response.forEach(function (item){
                    upcomingAppointments.push({
                        id: item.appointment_id,
                        title: item.ref_no,
                        start: item.date,
                        end: item.date,
                        time: item.time,
                        reason: item.reason
                    });
                });
            }
            calendar.addEventSource(upcomingAppointments);
        });
    }

    getUpcoming(calendar);

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




