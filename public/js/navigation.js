const navigation = {
    Patient :{
        home : {
            text : "Home",
            icon : "fa-house",
            link : "patient/index"
        },
        clinic_date : {
            text : "Clinic date",
            icon : "fa-calendar-plus",
            link : "patient/clinic_dates"
        },
        treatment_log : {
            text : "Treatment Log",
            icon : "fa-book-medical",
            link : "patient/treatment_log"
        },
        prescription : {
            text : "Prescription",
            icon : "fa-notes-medical",
            link : "patient/prescription"
        },
        recommendation : {
            text : "Recommendation",
            icon : "fa-user-pen",
            link : "patient/recommend"
        }
    },

    Doctor : {
        home : {
            text : "Home",
            icon : "fa-home"
        },
        prescription : {
            text : "Prescription",
            icon : ""
        },
        appointment : {
            text : "Appointment",
            icon : ""
        },
        clinic_date : {
            text : "Clinic Date",
            icon : ""
        },
        recommendation : {
            text : "Recommendation",
            icon : "fa-user-doctor-message"
        }
    },

    Admin : {
        home : {
            text : "Home",
            icon : "fa-house",
            link : "admin/index"
        },
        clinic_staff : {
            text : "Clinic Staff",
            icon : "fa-user-nurse",
            link : "admin/staff"
        },
        treatment_log : {
            text : "Treatment Log",
            icon : "fa-book-medical",
            link : "admin/treatment_log"
        },
        prescription : {
            text : "Prescription",
            icon : "fa-notes-medical",
            link : "admin/prescription"
        },
        recommendation : {
            text : "Recommendation",
            icon : "fa-user-pen",
            link : "admin/recommend"
        }
    }
}

const patientNav = navigation.Patient;
const doctorNav = navigation.Doctor;
const adminNav = navigation.Admin;

// set side navbar items
function setNavItem(element, link, icon, text){
    element.href = "http://localhost/ayumed/" + link;
    element.querySelector(".nav-item-icon i").classList.add(icon);
    element.querySelector(".nav-item-text").innerHTML = text;
}
