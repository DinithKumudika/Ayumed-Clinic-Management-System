<!DOCTYPE html>
<html lang="en">
<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/patientHome.css">
<title>Pharmacist Home</title>
</head>

<body>
<?php require APP_ROOT . '/views/layout/pharmacistsidebar.php' ?>
<div class="main-container">
    <?php require APP_ROOT . '/views/layout/navbar.php' ?>
    
    <div class="home-container">
        <!-- <?php

        if ($data['success']) {
            echo "<script type='text/javascript'>
                document.getElementById('appoint-date').value = '';
                document.getElementById('appoint-time').value = '';
                document.getElementById('appoint-reason').value = '';
                notification('Appointment Scheduled!', 'you will receive an SMS before the appointment date', 'success');
            </script>";
        }
        else if ($data['error']) {
            echo "<script type='text/javascript'>
                notification('Time slot is not available', 'Try again with with different time', 'warning');
            </script>";
        }
       ?> -->

        <div class="section-h">
            <h2>Remaining Orders</h2>
            <hr>
        </div>
        <div class="appointment-container">
            <div class="card appointment-details">
                <?php

                if(isset($data['upcoming'])){
                    echo "<h3>Appointment No : " . $data['upcoming']->ref_no . "</h3>
                           <h3>Date : " . $data['upcoming']->date . "</h3>
                           <h3>Time : " . $data['upcoming']->time . "</h3>
                    ";
                }
                else{
                    echo "<h3>No remaining orders</h3>";
                }
                ?>

            </div>
           
        </div>
       
        <div class="section-h">
            <h2>Completed orders</h2>
            <hr>
        </div>
       

        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>Ref No</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                         <td>1200</td>
                         <td>1 st April 2022</td>
                         <td>1.20pm</td>
                    </tr>
                    <tr>
                         <td>1201</td>
                         <td>21 st May 2022</td>
                         <td>6.30pm</td>
                    </tr>
                    <tr>
                         <td>1203</td>
                         <td>6 st April 2022</td>
                         <td>5.15pm</td>
                    </tr>
                    <tr>
                         <td>1204</td>
                         <td>3o th May 2022</td>
                         <td>7.25am</td>
                    </tr>
                    <tr>
                         <td>1205</td>
                         <td>3 rd September 2022</td>
                         <td>11.10am</td>
                    </tr>
               
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APP_ROOT . '/views/layout/footer.php' ?>

<script src="<?php echo URL_ROOT; ?>/js/patient.js"></script>
</body>

</html>