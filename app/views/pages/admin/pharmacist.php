<html lang="en">

<head>
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/admin/manageStaff.css">
     <title>Admin | Pharmacists</title>

<body>
     <?php require APP_ROOT . '/views/layout/sidebar.php' ?>
     <div class="main-container">
          <?php require APP_ROOT . '/views/layout/navbar.php' ?>
          <div class="home-container">
              <?php
              if(!empty($data['success'])){
                  if($data['success']){
                      echo \utils\Alert::Notification('Success','New pharmacist added!',\utils\Alert::MESSAGE_SUCCESS);
                  }
                  else {
                      echo \utils\Alert::Notification('Error', 'New pharmacist cannot be added!', \utils\Alert::MESSAGE_WARNING);
                  }
              }
              ?>
              <?php echo \utils\Flash::flash('mail_sent'); ?>
               <div class="section-h">
                    <h2>Manage Pharmacists</h2>
                    <hr>
               </div>
               <div class="add-staff-container">
                    <div class="form-title">Add new Pharmacist</div>
                    <form action="<?php echo URL_ROOT ?>/admin/manage_staff" id="staff-add-form">
                         <div class="staff-details">
                              <div class="form-row">
                                   <div class="form-group">
                                        <span class="input-name">First Name</span>
                                        <input type="text" id="input-fName" name="fist-name" class="form-input" placeholder="first name">
                                        <p class="err" id="err-first-name"></p>
                                   </div>
                                   <div class="form-group">
                                        <span class="input-name">Last Name</span>
                                        <input type="text" id="input-lName" name="last-name" class="form-input" placeholder="last name">
                                        <p class="err" id="err-last-name"></p>
                                   </div>
                              </div>
                              <div class="form-row">
                                   <div class="form-group">
                                        <span class="input-name">Phone No</span>
                                        <input type="tel" id="input-phone" name="phone-no" class="form-input" placeholder="phone number">
                                        <p class="err" id="err-phone-no"></p>
                                   </div>
                                   <div class="form-group">
                                        <span class="input-name">Email</span>
                                        <input type="email" id="input-email" name="email" class="form-input" placeholder="email">
                                        <p class="err" id="err-email"></p>
                                   </div>
                              </div>
                              <div class="form-row">
                                   <div class="form-group">
                                        <span class="input-name">Username</span>
                                        <input type="text" id="input-uname" name="username" class="form-input" placeholder="username">
                                        <p class="err" id="err-uname"></p>
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
                              <?php foreach ($data['pharmacists'] as $pharmacist) { ?>
                                   <tr>
                                        <td data-label="Reg No"><?php echo '0' . $pharmacist->Phone_No ?></td>
                                        <td data-label="Name"><?php echo $pharmacist->first_name . " " . $pharmacist->last_name ?></td>
                                        <td data-label="Email"><?php echo $pharmacist->email ?></td>
                                        <td data-label="Username"><?php echo $pharmacist->username ?></td>
                                        <?php if ($pharmacist->status) { ?>
                                             <td data-label="Status" class="status"><span style="color: var(--success)">Available</span></td>
                                        <?php } else { ?>
                                             <td data-label="Status" class="status"><span style="color: var(--danger)">Not Available</span></td>
                                        <?php } ?>
                                        <td data-label="Action">
                                             <span class="action-icon">
                                                  <a href="">
                                                       <i class="fa-solid fa-pen-to-square" style="color: var(--primary)"></i>
                                                  </a>
                                             </span>
                                             <span class="action-icon">
                                                  <a href="">
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
          sideNavItems[2].classList.remove("non-active-item");
          sideNavItems[2].classList.add("active-item");
     </script>
     <script src="<?php echo URL_ROOT; ?>/js/admin/admin.js" type="text/javascript"></script>
     <script src="<?php echo URL_ROOT; ?>/js/admin/addPharmacist.js" type="text/javascript"></script>
</body>

</html>