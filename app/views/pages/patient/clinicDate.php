<!DOCTYPE html>
<html lang="en">
<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/patientHome.css">
<title>Clinic Dates</title>
</head>
<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
    <?php require APP_ROOT . '/views/layout/navbar.php' ?>
    <div id="modal" class="modal">
        <div class="modal-content new-appoint-modal">
        </div>
    </div>
    <div class="home-container">

    </div>
</div>

<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script>
    const sideNavItems = document.querySelectorAll(".non-active-item");
    sideNavItems[1].classList.remove("non-active-item");
    sideNavItems[1].classList.add("active-item");
</script>
<script src="<?php echo URL_ROOT; ?>/js/patient.js"></script>
</body>

</html>
