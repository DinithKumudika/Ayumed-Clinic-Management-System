document.addEventListener('DOMContentLoaded', function () {
    const avatarFileUpload = document.getElementById('avatar-upload');
    const updateAvatar = document.getElementById('avatar-upload-btn');
    const avatarImage = document.getElementById('avatar');

    const editProfileForm = document.getElementById('edit-profile');
    const updateProfileBtn = document.getElementById('edit-profile-btn');

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