document.addEventListener('DOMContentLoaded', function () {
    const avatarFileUpload = document.getElementById('avatar-upload');
    const updateAvatar = document.getElementById('avatar-upload-btn');
    const avatarImage = document.getElementById('avatar');

    const editProfileForm = document.getElementById('edit-profile');
    const updateProfileBtn = document.getElementById('edit-profile-btn');

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

    // edit profile
    updateAvatar.addEventListener('click', function () {
        avatarFileUpload.click();
    });

    avatarFileUpload.addEventListener('change', function () {
        const avatar = this.files[0];

        if (avatar) {
            const fileReader = new FileReader();
            fileReader.addEventListener('load', function () {
                avatarImage.src = fileReader.result;
                console.log(fileReader.result);
            });
            fileReader.readAsDataURL(avatar);
        }
    });

    // form inputs
    const firstName = editProfileForm.elements['first-name'];
    const lastName = editProfileForm.elements['last-name'];
    const  dob = editProfileForm.elements['dob'];
    const address = editProfileForm.elements['address'];
    const email =  editProfileForm.elements['email'];
    const phoneNo = editProfileForm.elements['phone-no'];
    const username = editProfileForm.elements['username'];

    // set current date as the maximum value of date input
    function setCurrentDate() {
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

        dob.setAttribute("max", year + "-" + month + "-" + date);
    }

    setCurrentDate();

    updateProfileBtn.addEventListener('click', function () {
        console.log("clicked");
        editProfileForm.submit();
    });
});