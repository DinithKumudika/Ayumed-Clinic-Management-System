<!DOCTYPE html>
<html>

<head>
     <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
     <!-- <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/medicines.css"> -->
     <link rel="stylesheet" href="medicines.css">
     <script src="https://kit.fontawesome.com/3a188ddf79.js" crossorigin="anonymous"></script>
     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <title>view medicine page</title>
</head>

<body>
<?php require APP_ROOT . '/views/layout/pharmacistsidebar.php' ?>
     <div class="add-btn-container">
          <button class="add-btn btn">
               <i class="fa-solid fa-plus"></i><a href="<?php echo URL_ROOT?>/user/addmedicine">Add Medicines</a>
          </button>
     </div>
     <h2>Search Medicines</h2>
     <hr>
     <div class="search">
     <button type="submit" class="searchbtn searchbar"><i class="fa fa-search"></i></button>
     <input type="text" class="search-input searchbar" placeholder="Search Medicines.." name="search2">
     <h4>Filter by </h4>
     <select name="category" id="view-category" class="selection-bar">
          <option value="deafault" disabled='disabled' selected>category</option>
          <option value="tablet">Tablet</option>
          <option value="capsule">Capsule</option>
          <option value="oil">Oil</option>
          <option value="syrup">Syrup</option>
     </select>
     <select name="availability" id="view-availability" class="selection-bar">
          <option value="deafault" disabled='disabled' selected>availability</option>
          <option value="available">Available</option>
          <option value="not-available">Not Available</option>
     </select>
     <select name="unit" id="view-unit" class="selection-bar">
          <option value="deafault" disabled='disabled' selected>unit</option>
          <option value="miligram">mg</option>
          <option value="gram">g</option>
          <option value="mililletre">ml</option>
     </select>

     </div>
     <h2 class="list-text">Medicine List</h2>
     <hr>
     
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
                              <button class="edit-btn btn ">
                                   <i class="fa-solid fa-pen-to-square"></i><a href="editmedicine.php">Update</a>
                              </button>
                              <button class="delete-btn btn">
                                   <i class="fa-solid fa-trash-can"></i><a href="deletemedicine.php">Delete</a>
                              </button>
                         </div>
                    </td>
               </tr>

          </table>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>   
     <script src="../public/js/medicines.js"></script>
</body>

</html>