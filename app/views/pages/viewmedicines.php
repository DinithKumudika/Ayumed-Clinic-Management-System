<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/medicines.css"> -->
    <link rel="stylesheet" href="medicines.css">
    <title>view medicine page</title>
</head>

<body>
<h2>Medicine List</h2>
<hr>
<div class="div-main">

<table class="medicine-table">
     <thead>
          <tr>
               <th>Name</th>
               <th>Weight</th>
               <th>Unit</th>
               <th>Category</th>
               <th>Quantity</th>
               <th>Availability</th>
               <th>Action</th>
          </tr>
     </thead>

     <?php foreach ($datas as $data) ?>
          <tr>
               <td class="td-1">
                    <?= $data['name']; ?>
               </td>
               <td class="td-1">
                    <?= $data['weight']; ?>
               </td>
               <td class="td-2">
                    <?= $data['unit']; ?>
               </td>
               <td class="td-3">
                    <?= $data['category']; ?>
               </td>
               <td class="td-3">
                    <?= $data['quantity']; ?>
               </td>
               <td class="td-4">
                    <?= $data['availability']; ?>     
               </td>
               <td class="td-5">
                    <div class="btn-container">
                         <button class="add-btn btn1">
                             <a href="editmedicine.php">Update</a>
                         </button>
                         <button class="add-btn btn2">
                             <a href="deletemedicine.php">Delete</a>
                         </button>   
                    </div>
               </td>
          </tr>
    
</table>
</div>

<script src="../public/js/medicines.js"></script>
</body>
</html>