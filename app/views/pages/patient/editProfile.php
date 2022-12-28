<!DOCTYPE html>
<html lang="en">
<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/profile.css">
<title>Edit Profile</title>
</head>

<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
    <div class="home-container">
        <div class="section-h">
            <div>
                <h2>Edit Profile</h2>
                <h3 id="back"><i class="fa-solid fa-backward"></i>Go Back</h3>
            </div>
            <hr>
        </div>
        <form action="<?php echo URL_ROOT ?>/profile/edit/<?php echo \helpers\Session::get("user_id"); ?>" class="profile-form" method="POST" id="edit-profile" enctype="multipart/form-data">
            <div class="profile-container">
                <div class="profile-col-2">
                    <div class="img-container">
                        <input type="file" hidden id="avatar-upload" name="avatar-upload">
                        <img src="<?php echo $data['profile_img']; ?>" alt="" id="avatar">
                        <div class="img-overlay" id="avatar-upload-btn">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>
                    <div class="notification-opt">
                        <h5>Receive notification via</h5>
                        <div class="toggle-container">
                            <div class="toggle-text">Whatsapp</div>
                            <?php if ($data['notification_methods']->whatsapp){ ?>
                                <input type="checkbox" name="notify_opt[]" id="notify-whatsapp" checked value="opt_whatsapp">
                            <?php }else { ?>
                                <input type="checkbox" name="notify_opt[]" id="notify-whatsapp" value="opt_whatsapp">
                            <?php } ?>
                            <div class="toggle" id="toggle-whatsapp">
                                <div class="toggle-button" id="toggle-btn-whatsapp"></div>
                            </div>
                        </div>
                        <div class="toggle-container">
                            <div class="toggle-text">SMS</div>
                            <?php if ($data['notification_methods']->sms){ ?>
                                <input type="checkbox" name="notify_opt[]" id="notify-sms" checked value="opt_sms">
                            <?php }else { ?>
                                <input type="checkbox" name="notify_opt[]" id="notify-sms" value="opt_sms">
                            <?php } ?>
                            <div class="toggle" id="toggle-sms">
                                <div class="toggle-button" id="toggle-btn-sms"></div>
                            </div>
                        </div>
                        <div class="toggle-container">
                            <div class="toggle-text">Email</div>
                            <?php if ($data['notification_methods']->email){ ?>
                                <input type="checkbox" name="notify_opt[]" id="notify-email" checked value="opt_email">
                            <?php }else { ?>
                                <input type="checkbox" name="notify_opt[]" id="notify-email" value="opt_email">
                            <?php } ?>
                            <div class="toggle" id="toggle-email">
                                <div class="toggle-button" id="toggle-btn-email"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-col-1">
                    <div class="form-group">
                        <h5>First Name</h5>
                        <input type="text" value="<?php echo $data['user']->first_name ?>" name="first-name">
                    </div>
                    <span class="err fname-err"></span>
                    <div class="form-group">
                        <h5>Last Name</h5>
                        <input type="text" value="<?php echo $data['user']->last_name ?>" name="last-name">
                    </div>
                    <span class="err lname-err"></span>
                    <div class="form-group">
                        <h5>DOB</h5>
                        <input type="date" value="<?php echo $data['patient']->DOB ?>" name="dob">
                    </div>
                    <span class="err dob-err"></span>
                    <div class="form-group">
                        <h5>Address</h5>
                        <input type="text" value="<?php echo $data['patient']->address ?>" name="address">
                    </div>
                    <span class="err address-err"></span>
                    <div class="form-group">
                        <h5>Email</h5>
                        <input type="text" value="<?php echo $data['user']->email ?>" name="email">
                    </div>
                    <span class="err email-err"></span>
                    <div class="form-group">
                        <h5>Phone</h5>
                        <input type="tel" value="<?php echo "0" . $data['patient']->phone_no ?>" name="phone-no">
                    </div>
                    <span class="err phone-err"></span>
                    <div class="form-group">
                        <h5>Username</h5>
                        <input type="text" value="<?php echo $data['user']->username ?>" name="username">
                    </div>
                    <span class="err uname-err"></span>
                    <div class="form-group">
                        <div class="btn edit-profile-btn" id="edit-profile-btn">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Done</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<script src="<?php echo URL_ROOT; ?>/js/editProfile.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/patient.js"></script>
</body>

</html>
