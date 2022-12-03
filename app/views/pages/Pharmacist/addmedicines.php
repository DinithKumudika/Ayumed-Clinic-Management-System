<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/medicines.css"> -->
    <link rel="stylesheet" href="medicines.css">
    <title>add medicine page</title>
    <?php require APP_ROOT . '/views/layout/header.php' ?>
</head>

<body>
<?php require APP_ROOT . '/views/layout/pharmacistsidebar.php' ?>
     <h2 class="add-h2">Add Medicines</h2>
     <hr>   
<div class="form">
     
          <form action="addmedicine.php" method="post">
            <div id="form">
               <label for="medicine_name" >Name:</label>
               <input type="text" id="name" class="input" >
               <p id="name_error"></p>
               
               <label for="weight" >Weight:</label>
               <input type="text" id="weight" class="input">
               <p id="weight_error"></p>
               
               <label for="unit">Unit:</label>
               <select name="unit" id="add-unit" class="input">
                    <option value="deafault" disabled='disabled' selected>Choose a unit..</option>
                    <option value="miligram">mg</option>
                    <option value="gram">g</option>
                    <option value="mililletre">ml</option>
               </select>
               <p id="unit_error"></p>
               
               <label for="category" >Category:</label>
               <select name="category" id="add-category" class="input">
                    <option value="deafault" disabled='disabled' selected>Choose medicine category..</option>
                    <option value="tablet">Tablet</option>
                    <option value="capsule">Capsule</option>
                    <option value="oil">Oil</option>
                    <option value="syrup">Syrup</option>
               </select>
               <p id="category_error"></p>
               
               <label for="quantity" >Quantity:</label>
               <input type="text" id="quantity" class="input">
               <p id="quantity_error"></p>
               
               <label for="availability" >Availability:</label>
               <select name="availability" id="add-availability" class="input">
                    <option value="deafault" disabled='disabled' selected>Choose availability..</option>
                    <option value="available">Available</option>
                    <option value="not-available">Not Available</option>
               </select>
               <p id="availability_error"></p>
              
               <input type="submit" value="submit" class="submit-btn" onclick="validate()" >
          </form>
          </div>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>   
     <script src="../public/js/medicines.js"></script>
</body>
</html>