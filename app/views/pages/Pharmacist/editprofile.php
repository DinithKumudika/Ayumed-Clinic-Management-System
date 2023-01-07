<!DOCTYPE html>
<html lang="en">
<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/profile.css">
<title>Edit Profile</title>
</head>

<body>
<?php require APP_ROOT . '/views/layout/pharmacistsidebar.php' ?>
<div class="main-container">
    <div class="home-container">
        <div class="section-h">
            <div>
                <h2>Edit Profile</h2>
                <h3 id="back"><i class="fa-solid fa-backward"></i>Go Back</h3>
            </div>
            <hr>
        </div>
        <div class="profile-container">
            <div class="profile-col-2">
                <div class="img-container">
                    <input type="file" hidden id="avatar-upload">
                    <img src="<?php echo URL_ROOT ?>/images/profile.jpg" alt="" id="avatar">
                    <div class="img-overlay" id="avatar-upload-btn">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
            </div>
            <div class="profile-col-1">
                <form action="<?php echo URL_ROOT?>/profile/edit" class="profile-form" method="POST" id="edit-profile">
                    <div class="form-group">
                        <h5>First Name</h5>
                        <input type="text" value="<?php echo $data['user']->first_name ?>" name="first-name">
                    </div>
                    <p class="err fname-err"></p>
                    <div class="form-group">
                        <h5>Last Name</h5>
                        <input type="text" value="<?php echo $data['user']->last_name ?>" name="last-name">
                    </div>
                    <p class="err lname-err"></p>
                    <div class="form-group">
                        <h5>DOB</h5>
                        <input type="date" value="<?php echo $data['patient']->DOB ?>" name="dob">
                    </div>
                    <p class="err dob-err"></p>
                    <div class="form-group">
                        <h5>Address</h5>
                        <input type="text" value="<?php echo $data['patient']->address ?>" name="address">
                    </div>
                    <p class="err address-err"></p>
                    <div class="form-group">
                        <h5>Email</h5>
                        <input type="text" value="<?php echo $data['user']->email ?>" name="email">
                    </div>
                    <p class="err email-err"></p>
                    <div class="form-group">
                        <h5>Phone</h5>
                        <input type="tel" value="<?php echo "0" . $data['patient']->phone_no ?>" name="phone-no">
                    </div>
                    <p class="err phone-err"></p>
                    <div class="form-group">
                        <h5>Username</h5>
                        <input type="text" value="<?php echo $data['user']->username ?>" name="username">
                    </div>
                    <p class="err uname-err"></p>
                    <div class="form-group">
                        <div class="btn edit-profile-btn">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Done</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script>
    const backBtn = document.getElementById("back");
    backBtn.addEventListener('click', function () {
        history.back();
    })
</script>
<script src="<?php echo URL_ROOT; ?>/js/profile.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/patient.js"></script>
</body>

</html>