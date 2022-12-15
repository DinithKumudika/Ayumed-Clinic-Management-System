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
                <p style="color: var(--info)">Appointments are only accepted from 09.00 AM to 7.00 PM</p>

                <form action="<?php echo URL_ROOT ?>/patient/index" method="post" class="form appointment-form" id="new-appoint-form">
                    <div class="form-group">
                        <h5>Date</h5>
                        <input type="date" id="appoint-date" name="date" class="form-input">
                    </div>
                    <p class="err" id="err-date"></p>
                    <div class="form-group">
                        <h5>Time</h5>
                        <input type="time" id="appoint-time" name="time" class="form-input">
                    </div>
                    <p class="err" id="err-time"></p>
                    <div class="form-group">
                        <h5>Reason</h5>
                        <textarea name="reason" id="appoint-reason" cols="30" rows="40" placeholder="Medical reason"></textarea>
                    </div>
                    <p class="err" id="err-reason"></p>
                    <!--                    <p class="err-appoint err">--><?php //echo $data['error']; 
                                                                            ?>
                    <!--</p>-->
                    <div class="btn appointment-btn" id="new-appoint-btn">
                        <i class="fa-solid fa-check-double"></i>
                        <span>Done</span>
                    </div>
                </form>
            </div>
        </div>
        <div class="home-container">
            <?php

            if ($data['success']) {
                echo "<script type='text/javascript'>
                document.getElementById('appoint-date').value = '';
                document.getElementById('appoint-time').value = '';
                document.getElementById('appoint-reason').value = '';
                notification('Appointment Scheduled!', 'you will receive an SMS before the appointment date', 'success');
            </script>";
            } else if ($data['error']) {
                echo "<script type='text/javascript'>
                notification('Time slot is not available', 'Try again with with different time', 'warning');
            </script>";
            }
            ?>

            <div class="btn-container">
                <button class="btn appointment-btn modal-active" id="myBtn">
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
                    <?php

                    if ($data['upcoming']) {
                        echo "<h3>Appointment No : " . $data['upcoming']->ref_no . "</h3>
                        <h3>Date : " . $data['upcoming']->date . "</h3>
                        <h3>Time : " . $data['upcoming']->time . "</h3>
                    ";
                    } else {
                        echo "<h3>No Upcoming Appointments</h3>";
                    }
                    ?>

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
            <form action="" id="search-form">
                <div class="search-container">
                    <input type="text" id="search" name="search" class="form-input search" placeholder="search by Ref No ...">
                    <div class="date-container"></div>
                    <div class="btn search-btn">Search</div>
                </div>
            </form>

            <?php 
            if(!isset($data['appointments'])){
                echo "<div>
                <h3>No past Appointments</h3>
                </div>";
            }
            else { ?>

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
                        <?php foreach ($data['appointments'] as $appointment) { ?>
                            <tr>
                                <td data-label="Ref No"><?php echo $appointment->ref_no ?></td>
                                <td data-label="Date"><?php echo $appointment->date ?></td>
                                <td data-label="Time"><?php echo $appointment->time ?></td>
                                <?php if ($appointment->status) { ?>
                                    <td data-label="Status" class="status"><span class="status-true">Visited</span></td>
                                <?php } else { ?>
                                    <td data-label="Status" class="status"><span class="status-false">Not Visited</span></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php require APP_ROOT . '/views/layout/footer.php' ?>
    <script>
        const sideNavItems = document.querySelectorAll(".non-active-item");
        sideNavItems[0].classList.remove("non-active-item");
        sideNavItems[0].classList.add("active-item");
    </script>
    <script src="<?php echo URL_ROOT; ?>/js/patient.js"></script>
</body>

</html>