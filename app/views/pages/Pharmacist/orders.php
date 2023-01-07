<!DOCTYPE html>
<html>
<head>
     <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
     <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/orders.css">
     <script src="https://kit.fontawesome.com/3a188ddf79.js" crossorigin="anonymous"></script>
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <title>orders page</title>
</head>

<body>
<?php require APP_ROOT . '/views/layout/pharmacistsidebar.php' ?>
<div class="main-container">
<?php require APP_ROOT . '/views/layout/navbar.php' ?>
<div class="home-container">
    <div class="search">
        <div class="searchbar">
        <button type="submit" class="searchbtn "><i class="fa fa-search"></i></button>
        <input type="text" class="search-input " placeholder="Search orders by ref no.." name="search2">
        </div>
        <div class="filter">
        <h4>Filter by </h4>
        <select name="date" id="view-date" class="selection-bar">
             <option value="deafault" disabled='disabled' selected>Date</option>
             <option value="tablet">Tablet</option>
             <option value="capsule">Capsule</option>
             <option value="oil">Oil</option>
             <option value="syrup">Syrup</option>
        </select> 
        </div>
    </div>

    <div class="div-main-table1">
     <h2>Remaining orders</h2>
     <hr>

     <table>
        <thead>
             <tr>
                  <th>Ref No</th>
                  <th>Date</th>
                  <th>Time</th>
             </tr>
        </thead>

        <tbody>
        <?php foreach ($data['orders'] as $order){ ?> 
        <tr>
             <td class="td-1">
                  <?php echo $order->refno ?>
             </td>
             <td class="td-2">
                  <?php echo $order->date ?>
             </td>
             <td class="td-3">
                  <?php echo $order->time ?>
             </td>
        </tr> 
        <?php } ?>
        </tbody>
    </table>
    </div>

     <div class="div-main-table2">
     <h2 class="list-text">Completed Orders</h2>
     <hr>

          <table>
               <thead>
                    <tr>
                        <th>Ref No</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Completed at</th>
                    </tr>
               </thead>

               <tbody>
               <?php foreach ($data['orders'] as $order){ ?> 
               <tr>
                    <td class="td-1">
                        <?php echo $order->refno ?>
                    </td>
                    <td class="td-2">
                        <?php echo $order->date ?>
                    </td>
                    <td class="td-3">
                        <?php echo $order->time ?>
                    </td>
                    <td class="td-4">
                         <?php echo $order->completedat?>
                    </td>
               </tr> 
               <?php } ?>
               </tbody>
          </table>
     </div>
</div>
</div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>   
     <script src="../public/js/medicines.js"></script>
</body>

</html>