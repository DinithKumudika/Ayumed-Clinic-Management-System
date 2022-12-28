document.addEventListener('DOMContentLoaded', function () {

    // toggle buttons
    const toggleWhatsapp = document.getElementById("toggle-whatsapp")
    const toggleBtnWhatsapp = document.getElementById("toggle-btn-whatsapp");

    const toggleSms = document.getElementById("toggle-sms")
    const toggleBtnSms = document.getElementById("toggle-btn-sms");

    const toggleEmail = document.getElementById("toggle-email")
    const toggleBtnEmail = document.getElementById("toggle-btn-email");

    const checkWhatsapp = document.getElementById("notify-whatsapp");
    const checkSms = document.getElementById("notify-sms");
    const checkEmail = document.getElementById("notify-email");

    function animateToggle (toggle){
        toggle.classList.toggle("toggle-active");
    }

    function toggleCheck(checkbox, toggle){
        if(checkbox.checked){
            toggle.classList.add("toggle-active");
        }
        else{
            toggle.classList.remove("toggle-active");
        }
    }

    toggleCheck(checkWhatsapp, toggleWhatsapp);
    toggleCheck(checkSms, toggleSms);
    toggleCheck(checkEmail, toggleEmail);

});

