<!DOCTYPE html>
<html lang="en">
<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/patientHome.css">
<title>Home</title>
</head>

<body>
     <?php require APP_ROOT . '/views/layout/sidebar.php' ?>
     <div class="main-container">
          <?php require APP_ROOT . '/views/layout/navbar.php' ?>
         <div id="modal" class="modal">
             <div class="modal-content new-appoint-modal">
                 <span class="close"><i class="fa-solid fa-xmark"></i></span>
                 <h2>New Appointment</h2>
                 <hr>
                 <form action="<?php echo URL_ROOT ?>/patient/index" method="post" class="form appointment-form" id="new-appoint-form">
                     <div class="form-group">
                         <h5>Date</h5>
                         <input type="date" id="input-date" name="date" class="form-input">
                     </div>
                     <p class="err" id="err-date"></p>
                     <div class="form-group">
                         <h5>Time</h5>
                         <input type="time" id="input-time" name="time" min="09:00" max="18:00" class="form-input">
                     </div>
                     <p class="err" id="err-time"></p>
                     <div class="form-group">
                         <h5>Reason</h5>
                         <textarea name="reason" id="input-reason" cols="30" rows="40"  placeholder="Medical reason"></textarea>
                     </div>
                     <p class="err" id="err-reason"></p>
                     <div class="btn appointment-btn" id="new-appoint-btn">
                         <i class="fa-solid fa-check-double"></i>
                         <span>Done</span>
                     </div>
                 </form>
             </div>
         </div>
          <div class="home-container">
              <?php require APP_ROOT . '/views/layout/modal.php' ?>
               <div class="btn-container">
                    <button class="btn appointment-btn" id="myBtn">
                         <i class="fa-solid fa-circle-plus"></i>
                         <span>New Appointment</span>
                    </button>
               </div>
               <div class="section-h">
                    <h2>Upcoming Appointment</h2>
                    <hr>
               </div>
               <div class="appointment-container">
                    <div class="card appointment-details">
                         <h3>Appointment No : 456677</h3>
                         <h3>Date : 2022/11/28</h3>
                         <h3>Time : 09.30 AM</h3>
                    </div>
                    <div class="btn-group">
                         <button class="btn download-btn">
                              <i class="fa-solid fa-download"></i>
                              <span>Download</span>
                         </button>
                         <button class="btn cancel-btn">
                              <i class="fa-solid fa-circle-xmark"></i>
                              <span>Cancel</span>
                         </button>
                    </div>
               </div>
               <div class="section-h">
                    <h2>Previous Appointments</h2>
                    <hr>
               </div>
               <div class="table-container">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>Ref No</th>
                                   <th>Date</th>
                                   <th>Time</th>
                                   <th>Status</th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                                   <td data-label="Ref No">4567</td>
                                   <td data-label="Date">Dinesh</td>
                                   <td data-label="Time">34</td>
                                   <td data-label="Status">Visited</td>
                              </tr>

                              <tr>
                                   <td data-label="Ref No">4568</td>
                                   <td data-label="Date">Kamal</td>
                                   <td data-label="Time">23</td>
                                   <td data-label="Status">Not Visited</td>
                              </tr>

                              <tr>
                                   <td data-label="Ref No">4569</td>
                                   <td data-label="Date">Neha</td>
                                   <td data-label="Time">20</td>
                                  <td data-label="Status">Visited</td>
                              </tr>

                              <tr>
                                   <td data-label="Ref No">4570</td>
                                   <td data-label="Date">Priya</td>
                                   <td data-label="Time">30</td>
                                  <td data-label="Status">Visited</td>
                              </tr>
                              <tr>
                                   <td data-label="Ref No">4571</td>
                                   <td data-label="Date">Priya</td>
                                   <td data-label="Time">30</td>
                                  <td data-label="Status">Not Visited</td>
                              </tr>
                         </tbody>
                    </table>
                    <div class="table-nav">
                         <div>
                              <button class="prev-btn">
                                   <i class="fa-solid fa-angle-left"></i>
                              </button>
                         </div>
                         <div class="number"><span>1</span></div>
                         <div>
                              <button class="next-btn">
                                   <i class="fa-solid fa-angle-right"></i> 
                              </button>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <script>
          const sideNavItems = document.querySelectorAll(".non-active-item");
          sideNavItems[0].classList.remove("non-active-item");
          sideNavItems[0].classList.add("active-item");
     </script>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
     <script src="<?php echo URL_ROOT; ?>/js/patient.js"></script>
</body>

</html>