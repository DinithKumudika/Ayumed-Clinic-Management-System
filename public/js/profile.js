document.addEventListener('DOMContentLoaded', function () {
    const avatarFileUpload = document.getElementById('avatar-upload');
    const updateAvatar = document.getElementById('avatar-upload-btn');
    const avatarImage = document.getElementById('avatar');

    const editProfileForm = document.getElementById('edit-profile');
    const updateProfileBtn = document.getElementById('edit-profile-btn');

    // form inputs
    const firstName = editProfileForm.elements['first-name'];
    const lastName = editProfileForm.elements['last-name'];

    //error boxes

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


});