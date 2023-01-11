window.addEventListener('DOMContentLoaded', function (){
    const editBtn = document.querySelectorAll('.btn-edit');
    const avatarFileUpload = document.getElementById('avatar-upload');
    const updateAvatar = document.getElementById('avatar-upload-btn');
    const avatarImage = document.getElementById('avatar');

    const notAvailable = document.getElementById("not-available");
    const available = document.getElementById("available")
    const toggleAvailable = document.getElementById("toggle-available")
    const toggleBtnAvailable = document.getElementById("toggle-btn-available");

    function animateToggle (toggle){
        toggle.classList.toggle("toggle-active");
    }

    function toggleCheck(radio1, radio2, toggle){
        if(radio2.checked){
            toggle.classList.add("toggle-active");
        }

        if(radio1.checked){
            toggle.classList.remove("toggle-active");
        }
    }

    toggleCheck(notAvailable, available, toggleAvailable);

    toggleBtnAvailable.addEventListener('click', function () {
        animateToggle(toggleAvailable);

        if (available.checked) {
            notAvailable.checked = true;
            console.log("not available");
        }
        else{
            available.checked = true;
            console.log("available");
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

    editBtn.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            document.location.href = this.getAttribute('href');
        });
    });
});