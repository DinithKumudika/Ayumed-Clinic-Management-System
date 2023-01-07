<!DOCTYPE html>
<html>

<head>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/medicines.css"> -->
    <script src="https://kit.fontawesome.com/3a188ddf79.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/medicines.css">
    <title>edit medicine page</title>
    <?php require APP_ROOT . '/views/layout/header.php' ?>
</head>

<body>
<?php require APP_ROOT . '/views/layout/pharmacistsidebar.php' ?>
<div class="main-container">
<div class="back-btn-container">
          <button class="back-btn">
          <i class="fa-solid fa-backward back-icon"></i><a class="back-link" href="<?php echo URL_ROOT?>/Medicine/index">Back</a>
          </button> 
     </div>
     <h2 class="add-h2">Edit Medicines</h2>
     <hr>   
<div class="form" >
     <form action="<?php echo URL_ROOT ?>/Medicine/edit" method="post" id="form">
               <label for="medicine_name" >Name:</label>
               <input type="text" id="name" class="input" name="name" >
               <p id="name_error"></p>
               
               <label for="weight" >Weight/Volume:</label>
               <input type="text" id="weight" class="input" name="weight">
               <p id="weight_error"></p>
               
               <label for="unit">Unit:</label>
               <input type="text" name="add-unit" id="add-unit" class="input">
               <!-- <select name="add-unit" id="add-unit" class="input">
                    <option value="default" disabled='disabled' selected>Choose a unit..</option>
                    <option value="miligram">mg</option>
                    <option value="gram">g</option>
                    <option value="mililletre">ml</option>
               </select> -->
               <p id="unit_error"></p>
               
               <label for="category" >Category:</label>
               <input type="text" name="add-category" id="add-category" class="input">
               <!-- <select name="add-category" id="add-category" class="input" >
                    <option value="deafault" disabled='disabled' selected>Choose medicine category..</option>
                    <option value="tablet">Tablet</option>
                    <option value="capsule">Capsule</option>
                    <option value="oil">Oil</option>
                    <option value="syrup">Syrup</option>
                    <option value="packets">Packets</option>
                    <option value="eeds">Seeds</option>
               </select> -->
               <p id="category_error"></p>
               
               <label for="quantity" >Quantity:</label>
               <input type="text" id="quantity" class="input" name="quantity">
               <p id="quantity_error"></p>
               <div class="submit-container">
                    <input type="submit" value="submit" class="submit-btn" onclick="validate()" >
               </div>
          </form>  
     </div>
</div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>   
     <script src="../public/js/medicines.js"></script>
</body>
</html>