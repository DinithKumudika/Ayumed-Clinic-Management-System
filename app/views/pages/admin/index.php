<html lang="en">
<head>
    <?php require APP_ROOT . '/views/layout/header.php' ?>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/admin/home.css">
    <title>Admin | Home</title>
<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
    <?php require APP_ROOT . '/views/layout/navbar.php' ?>
    <div class="home-container">
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1>3</h1>
                    <span>Patients registered today</span>
                </div>
                <div>
                    <i class="fa-solid fa-hospital-user"></i>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>10</h1>
                    <span>Appointments made today</span>
                </div>
                <div>
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>3</h1>
                    <span>Prescriptions issued today</span>
                </div>
                <div>
                    <i class="fa-solid fa-clipboard"></i>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>2</h1>
                    <span>Orders completed today</span>
                </div>
                <div>
                    <i class="fa-solid fa-solid fa-pills"></i>
                </div>
            </div>
        </div>
        <div class="stats">
            <div class="user-container">
                <div class="section-h">
                    <h2>Users</h2>
                    <hr>
                </div>
                <div class="users">
                    <div class="total">
                        <h3>Total Users</h3>
                        <p id="total-users-count"></p>
                        <div class="chart-wrapper">
                            <canvas id="chart-total-users" class="chart-users"></canvas>
                        </div>
                    </div>
                    <div class="active">
                        <h3>Active Users</h3>
                        <p id="active-users-count"></p>
                        <div class="chart-wrapper">
                            <canvas id="chart-active-users" class="chart-users"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overall-stat-container">
                <div class="section-h">
                    <h2>Overall Stats</h2>
                    <hr>
                </div>
                <div class="overall-stats">
                    <div class="details-wrapper">
                        <div class="card-single">
                            <div>
                                <h1><?php echo $data['total_appointments']; ?></h1>
                                <span>Total Appointments</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                        </div>
                        <div class="card-single">
                            <div>
                                <h1><?php echo $data['total_prescriptions']; ?></h1>
                                <span>Total Prescriptions</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-clipboard"></i>
                            </div>
                        </div>
                        <div class="card-single">
                            <div>
                                <h1><?php echo $data['total_orders']; ?></h1>
                                <span>Completed Orders</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-solid fa-pills"></i>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                            <canvas id="chart-stats-overall" class="chart-stats"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script>
    const sideNavItems = document.querySelectorAll(".non-active-item");
    sideNavItems[0].classList.remove("non-active-item");
    sideNavItems[0].classList.add("active-item");
</script>
<script src="<?php echo URL_ROOT; ?>/js/admin/admin.js" type="text/javascript"></script>
</body>
</html>