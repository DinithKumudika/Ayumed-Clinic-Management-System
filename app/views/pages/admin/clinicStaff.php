<html lang="en">
<head>
    <?php require APP_ROOT . '/views/layout/header.php' ?>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/adminManageStaff.css">
    <title>Admin Home</title>
<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
    <?php require APP_ROOT . '/views/layout/navbar.php' ?>
    <div class="home-container">
        <div class="section-h">
            <h2>Manage Clinic Staff</h2>
            <hr>
        </div>
        <div class="add-staff-container">
            <div class="form-title">Add new Staff Member</div>
            <form action="<?php echo URL_ROOT?>/admin/manage_staff" id="add-staff">
                <div class="staff-details">
                    <div class="form-row">
                        <div class="form-group">
                            <span class="input-name">First Name</span>
                            <input type="text" id="input-fname" name="fist-name" class="form-input" placeholder="first name">
                            <p class="err" id=""></p>
                        </div>
                        <div class="form-group">
                            <span class="input-name">Last Name</span>
                            <input type="text" id="input-lname" name="last-name" class="form-input" placeholder="last name">
                            <p class="err" id=""></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <span class="input-name">Registration No</span>
                            <input type="text" id="input-regNo" name="reg-no" class="form-input" placeholder="staff registration no">
                            <p class="err" id=""></p>
                        </div>
                        <div class="form-group">
                            <span class="input-name">Email</span>
                            <input type="email" id="input-email" name="email" class="form-input" placeholder="email">
                            <p class="err" id=""></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <span class="input-name">Username</span>
                            <input type="text" id="input-uname" name="username" class="form-input" placeholder="username">
                            <p class="err" id=""></p>
                        </div>
                        <div class="form-group">
                            <span class="input-name">Password</span>
                            <input type="password" id="input-pwd" name="password" class="form-input" placeholder="password">
                            <p class="err" id=""></p>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" value="Add" class="btn submit-btn" id="btn-submit">
                </div>
            </form>
        </div>
        <form action="" id="search-form">
            <div class="search-container">
                <input type="text" id="search" name="search" class="form-input search" placeholder="search by name or registration no ...">
                <div class="date-container"></div>
                <div class="btn search-btn">Search</div>
            </div>
        </form>
        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>Reg No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script>
    const sideNavItems = document.querySelectorAll(".non-active-item");
    sideNavItems[1].classList.remove("non-active-item");
    sideNavItems[1].classList.add("active-item");
</script>
<script src="<?php echo URL_ROOT; ?>/js/admin.js" type="text/javascript"></script>
<script src="<?php echo URL_ROOT; ?>/js/addStaff.js" type="text/javascript"></script>
</body>
</html>
