<html lang="en">
<head>
    <?php require APP_ROOT . '/views/layout/header.php' ?>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/admin/editStaff.css">
    <title>Admin | Edit Clinic Staff</title>
<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
    <?php require APP_ROOT . '/views/layout/navbar.php' ?>
    <div class="home-container">
        <div class="section-h">
            <h2>Edit Clinic Staff</h2>
            <hr>
        </div>
        <div class="edit-staff-container">
            <form action="<?php echo URL_ROOT ?>/admin/edit/staff/<?php echo $data['id']?>" method="post" class="form edit-staff-form" id="edit-staff-form" enctype="multipart/form-data">
                <div class="img-container">
                    <input type="file" hidden id="avatar-upload" name="avatar-upload">
                    <img src="<?php echo $data['staff_member']->avatar ?>" alt="" id="avatar">
                    <div class="img-overlay" id="avatar-upload-btn">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
                <div class="staff-details">
                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <span class="input-name">First Name</span>
                            </div>
                            <div>
                                <input type="text" id="input-fName" name="fist-name" class="form-input" placeholder="first name" value="<?php echo $data['staff_member']->first_name ?>">
                            </div>
                            <p class="err" id="err-first-name"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <span class="input-name">Last Name</span>
                            </div>
                            <div>
                                <input type="text" id="input-lName" name="last-name" class="form-input" placeholder="last name" value="<?php echo $data['staff_member']->last_name ?>">
                            </div>
                            <p class="err" id="err-last-name"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <span class="input-name">Registration No</span>
                            </div>
                            <div>
                                <input type="text" id="input-regNo" name="reg-no" class="form-input" placeholder="staff registration no" value="<?php echo $data['staff_member']->staff_reg_no ?>">
                            </div>
                            <p class="err" id="err-reg-no"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <span class="input-name">Email</span>
                            </div>
                            <div>
                                <input type="email" id="input-email" name="email" class="form-input" placeholder="email" value="<?php echo $data['staff_member']->email ?>">
                            </div>
                            <p class="err" id="err-email"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <span class="input-name">Username</span>
                            </div>
                            <div>
                                <input type="text" id="input-uname" name="username" class="form-input" placeholder="username" value="<?php echo $data['staff_member']->username ?>">
                            </div>
                            <p class="err" id="err-uname"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <span class="input-name">Availability</span>
                            </div>
                            <div class="toggle-container">
                                <?php if($data['staff_member']->status){ ?>
                                    <input type="radio" name="availability" value="not available" id="not-available">
                                    <input type="radio" name="availability" value="available" id="available" checked>
                                <?php }else{ ?>
                                    <input type="radio" name="availability" value="not available" id="not-available" checked>
                                    <input type="radio" name="availability" value="available" id="available">
                                <?php } ?>
                                <div class="toggle" id="toggle-available">
                                    <div class="toggle-button" id="toggle-btn-available"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn submit-btn" id="new-appoint-btn" type="submit">
                        <i class="fa-solid fa-check-double"></i>
                        <span>Done</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script>
    const sideNavItems = document.querySelectorAll(".non-active-item");
    sideNavItems[1].classList.remove("non-active-item");
    sideNavItems[1].classList.add("active-item");
</script>
<script src="<?php echo URL_ROOT; ?>/js/admin/admin.js" type="text/javascript"></script>
<script src="<?php echo URL_ROOT; ?>/js/admin/editStaff.js" type="text/javascript"></script>
</body>
</html>
