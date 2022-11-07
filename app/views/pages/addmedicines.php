<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/medicines.css"> 
    <title>login page</title>
</head>

<body>
     <?php
     include('header.php');
     ?>
     <?php
     include('sidebar.php');
     ?>
<div class="div-main">

          <form action="addmedicine.php" method="post">

               <label for="medicine_name" >Name:</label>
               <input type="text" id="name" class="input" >
               
               <label for="weight" >Weight:</label>
               <input type="text" id="weight" class="input">
               
               <label for="unit">Unit:</label>
               <select name="unit" id="unit" class="input">
                    <option value="deafault" disabled='disabled' selected>Choose a unit..</option>
                    <option value="miligram">mg</option>
                    <option value="gram">g</option>
                    <option value="mililletre">ml</option>
               </select>
               
               <label for="category" >Category:</label>
               <select name="category" id="category" class="input">
                    <option value="deafault" disabled='disabled' selected>Choose medicine category..</option>
                    <option value="tablet">Tablet</option>
                    <option value="capsule">Capsule</option>
                    <option value="oil">Oil</option>
                    <option value="syrup">Syrup</option>
               </select>
               
               <label for="quantity" >Quantity</label>
               <input type="text" id="quantity" class="input">
               
               <label for="availability" >Availability:</label>
               <select name="availability" id="availability" class="input">
                    <option value="deafault" disabled='disabled' selected>Choose availability..</option>
                    <option value="available">Available</option>
                    <option value="not-available">Not Available</option>
               </select>
              
               <input type="submit" value="submit" class="submit-btn" onclick="validate()" >
          </form>
     </div>
     
     <script src="../public/js/medicines.js"></script>
</body>
</html>