<?php require APP_ROOT . '/views/layout/header.php' ?>
<!-- Sweet Alert CDN -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Patient Login</title>
</head>
<body>
<?php echo \utils\Flash::flash('verify'); ?>
<h1>This is the Patient Login</h1>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
</body>
</html>