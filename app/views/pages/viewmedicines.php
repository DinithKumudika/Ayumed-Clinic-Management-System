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

<table>
     <thead>
          <tr>
               <th>Name</th>
               <th>Weight</th>
               <th>Unit</th>
               <th>Category</th>
               <th>Quantity</th>
               <th>Availability</th>
          </tr>
     </thead>

     <?php foreach ($datas as $data) { ?>
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
          </tr>
          <?php } ?>
</table>
</div>

<script src="../public/js/medicines.js"></script>
</body>
</html>