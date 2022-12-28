<!DOCTYPE html>
<html lang="en">
<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/profile.css">
<title>Profile</title>
</head>

<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
    <div class="home-container">
        <div class="section-h">
            <div>
                <h2>Your Profile</h2>
                <h3 id="back"><i class="fa-solid fa-backward"></i>Go Back</h3>
            </div>
            <hr>
        </div>
        <form action="" class="profile-form">
            <div class="profile-container">
                <div class="profile-col-2">
                    <div class="img-container">
                        <input type="file" hidden id="avatar-upload" name="avatar-upload">
                        <img src="<?php echo $data['profile_img']; ?>" alt="" id="avatar">
                    </div>
                    <div class="username">
                        <h5><?php echo \helpers\Session::get('username') ?></h5>
                    </div>
                    <div class="notification-opt">
                        <h5>Receive notification via</h5>
                        <div class="toggle-container">
                            <div class="toggle-text">Whatsapp</div>
                            <?php if ($data['notification_methods']->whatsapp){ ?>
                                <input type="checkbox" name="notify-whatsapp" id="notify-whatsapp" checked readonly>
                            <?php }else { ?>
                                <input type="checkbox" name="notify-whatsapp" id="notify-whatsapp" readonly>
                            <?php } ?>
                            <div class="toggle" id="toggle-whatsapp">
                                <div class="toggle-button" id="toggle-btn-whatsapp"></div>
                            </div>
                        </div>
                        <div class="toggle-container">
                            <div class="toggle-text">SMS</div>
                            <?php if ($data['notification_methods']->sms){ ?>
                                <input type="checkbox" name="notify-sms" id="notify-sms" checked readonly>
                            <?php }else { ?>
                                <input type="checkbox" name="notify-sms" id="notify-sms" readonly>
                            <?php } ?>
                            <div class="toggle" id="toggle-sms">
                                <div class="toggle-button" id="toggle-btn-sms"></div>
                            </div>
                        </div>
                        <div class="toggle-container">
                            <div class="toggle-text">Email</div>
                            <?php if ($data['notification_methods']->email){ ?>
                                <input type="checkbox" name="notify-email" id="notify-email" checked readonly>
                            <?php }else { ?>
                                <input type="checkbox" name="notify-email" id="notify-email" readonly>
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
                        <input type="text" readonly value="<?php echo $data['user']->first_name ?>">
                    </div>
                    <div class="form-group">
                        <h5>Last Name</h5>
                        <input type="text" readonly value="<?php echo $data['user']->last_name ?>">
                    </div>
                    <div class="form-group">
                        <h5>DOB</h5>
                        <input type="text" readonly value="<?php echo $data['patient']->DOB ?>">
                    </div>
                    <div class="form-group">
                        <h5>Address</h5>
                        <input type="text" readonly value="<?php echo $data['patient']->address ?>">
                    </div>
                    <div class="form-group">
                        <h5>Email</h5>
                        <input type="text" readonly value="<?php echo $data['user']->email ?>">
                    </div>
                    <div class="form-group">
                        <h5>Phone</h5>
                        <input type="text" readonly value="<?php echo "0" . $data['patient']->phone_no ?>">
                    </div>
                    <div class="form-group">
                        <a href="<?php echo URL_ROOT ?>/profile/edit/<?php echo \helpers\Session::get('user_id') ?>">
                            <div class="btn edit-profile-btn">
                                <i class="fa-solid fa-pen"></i>
                                <span>Edit</span>
                            </div>
                        </a>
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
<script src="<?php echo URL_ROOT; ?>/js/patient.js"></script>
</body>

</html>
