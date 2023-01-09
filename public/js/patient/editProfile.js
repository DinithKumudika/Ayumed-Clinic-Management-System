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

    function animateToggle(toggle) {
        toggle.classList.toggle("toggle-active");
    }

    toggleBtnWhatsapp.addEventListener('click', function () {
        animateToggle(toggleWhatsapp);

        if (checkWhatsapp.checked) {
            checkWhatsapp.checked = false;
            //console.log("whatsapp not clicked");
        }
        else {
            checkWhatsapp.checked = true;
            //console.log("whatsapp clicked");
        }
    });


    toggleBtnSms.addEventListener('click', function () {
        animateToggle(toggleSms);

        if (checkSms.checked) {
            checkSms.checked = false;
            //console.log("sms not clicked");
        }
        else {
            checkSms.checked = true;
            //console.log("sms clicked");
        }
    });

    toggleBtnEmail.addEventListener('click', function () {
        animateToggle(toggleEmail);
        if (checkEmail.checked) {
            checkEmail.checked = false;
            //console.log("email not clicked");
        }
        else {
            checkEmail.checked = true;
            //console.log("email clicked");
        }
    });
});