<!DOCTYPE html>
<html lang="en">
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <title>Doctor Home</title>
</head>
<body>
<?php require APP_ROOT . '/views/layout/sidebar.php' ?>
<div class="main-container">
     <h1>This is the Home Page</h1>
     <h2><?php echo $data['title'] ?></h2>
     <h2><?php echo APP_ROOT ?></h2>
</div>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
</body>
</html>