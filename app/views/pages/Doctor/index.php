<!DOCTYPE html>
<html lang="en">
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <title>Doctor Home</title>
</head>
<body>
     <?php require APP_ROOT . '/views/layout/sidebar.php' ?>
     <div class="main-container">
         <?php echo \utils\Flash::flash('login_success') ?>
          <h1>This is the Home Page of the doctor</h1>
     </div>    
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
</body>
</html>