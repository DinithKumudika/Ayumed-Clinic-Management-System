<html lang="en">
<head>
    <?php require APP_ROOT . '/views/layout/header.php' ?>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/admin/manageStaff.css">
    <title>Admin | Clinic Staff</title>
<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
    <?php require APP_ROOT . '/views/layout/navbar.php' ?>
    <div class="home-container">
        <?php
        if(!empty($data['success'])){
            if($data['success']){
                echo \utils\Alert::Notification('Success','New staff member added!',\utils\Alert::MESSAGE_SUCCESS);
            }
            else {
                echo \utils\Alert::Notification('Error', 'New staff member cannot be added!', \utils\Alert::MESSAGE_WARNING);
            }
        }
        ?>
        <?php echo \utils\Flash::flash('mail_sent'); ?>
        <?php echo \utils\Flash::flash('staff_delete') ?>
        <div class="section-h">
            <h2>Manage Clinic Staff</h2>
            <hr>
        </div>
        <div class="add-staff-container">
            <div class="form-title">Add new Staff Member</div>
            <form action="<?php echo URL_ROOT?>/admin/manage_staff" id="staff-add-form" method="post">
                <div class="staff-details">
                    <div class="form-row">
                        <div class="form-group">
                            <span class="input-name">First Name</span>
                            <input type="text" id="input-fName" name="fist-name" class="form-input" placeholder="first name" value="<?php echo $data['first_name']; ?>">
                            <p class="err" id="err-first-name"></p>
                        </div>
                        <div class="form-group">
                            <span class="input-name">Last Name</span>
                            <input type="text" id="input-lName" name="last-name" class="form-input" placeholder="last name" value="<?php echo $data['last_name']; ?>">
                            <p class="err" id="err-last-name"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <span class="input-name">Registration No</span>
                            <input type="text" id="input-regNo" name="reg-no" class="form-input" placeholder="staff registration no" value="<?php echo $data['reg_no'] ?>">
                            <p class="err" id="err-reg-no"></p>
                        </div>
                        <div class="form-group">
                            <span class="input-name">Email</span>
                            <input type="email" id="input-email" name="email" class="form-input" placeholder="email" value="<?php echo $data['email'] ?>">
                            <p class="err" id="err-email"><?php echo $data['error_email'] ?></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <span class="input-name">Username</span>
                            <input type="text" id="input-uname" name="username" class="form-input" placeholder="username" value="<?php echo $data['username'] ?>">
                            <p class="err" id="err-uname"><?php echo $data['error_uname'] ?></p>
                        </div>
                        <div class="form-group">
                            <span class="input-name">Password</span>
                            <input type="password" id="input-pwd" name="password" class="form-input" placeholder="password">
                            <p class="err" id="err-pwd"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" value="Add" class="btn submit-btn" id="staff-add-btn">
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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['staff'] as $staff) { ?>
                    <tr>
                        <td data-label="Reg No"><?php echo $staff->staff_reg_no ?></td>
                        <td data-label="Name"><?php echo $staff->first_name ." " . $staff->last_name ?></td>
                        <td data-label="Email"><?php echo $staff->email ?></td>
                        <td data-label="Username"><?php echo $staff->username ?></td>
                            <?php if ($staff->status) { ?>
                                <td data-label="Status" class="status"><span style="color: var(--success)">Available</span></td>
                            <?php  } else{ ?>
                                <td data-label="Status" class="status"><span style="color: var(--danger)">Not available</span></td>
                            <?php } ?>
                        <td data-label="Action">
                            <span class="action-icon">
                                <a class="btn-edit" href="<?php echo URL_ROOT ?>/admin/edit/staff/<?php echo $staff->user_id ?>">
                                    <i class="fa-solid fa-pen-to-square" style="color: var(--primary)"></i>
                                </a>
                            </span>
                            <span class="action-icon">
                                <a class="btn-delete" href="<?php echo URL_ROOT ?>/admin/delete/staff/<?php echo $staff->user_id ?>">
                                    <i class="fa-solid fa-trash-can" style="color: var(--danger)"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
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
<script src="<?php echo URL_ROOT; ?>/js/admin/admin.js" type="text/javascript"></script>
<script src="<?php echo URL_ROOT; ?>/js/admin/addStaff.js" type="text/javascript"></script>
<script src="<?php echo URL_ROOT; ?>/js/admin/deleteStaff.js" type="text/javascript"></script>
<script src="<?php echo URL_ROOT; ?>/js/admin/editStaff.js" type="text/javascript"></script>
</body>
</html>
