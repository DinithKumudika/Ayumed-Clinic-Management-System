<!DOCTYPE html>
<html>
<head>
     <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
     <!-- <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/medicines.css"> -->
     <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/medicines.css">
     <script src="https://kit.fontawesome.com/3a188ddf79.js" crossorigin="anonymous"></script>
     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <title>view medicine page</title>
</head>

<body>
<?php require APP_ROOT . '/views/layout/pharmacistsidebar.php' ?>
<div class="main-container">
<?php require APP_ROOT . '/views/layout/navbar.php' ?>
<div class="home-container">
     <div class="add-btn-container">
          <button class="add-btn btn ">
               <i class="fa-solid fa-plus"></i><a class="a-tag" href="<?php echo URL_ROOT?>/Medicine/add">Add Medicine</a>
          </button>
     </div>
     <h2>Search Medicines</h2>
     <hr>
     <div class="search">
          <div class="searchbar">
          <button type="submit" class="searchbtn "><i class="fa fa-search"></i></button>
          <input type="text" class="search-input " placeholder="Search Medicines.." name="search2">
          </div>
          <div class="filter">
          <h4>Filter by </h4>
          <select name="category" id="view-category" class="selection-bar">
               <option value="deafault" disabled='disabled' selected>category</option>
               <option value="tablet">Tablet</option>
               <option value="capsule">Capsule</option>
               <option value="oil">Oil</option>
               <option value="syrup">Syrup</option>
          </select>
          <!-- <select name="availability" id="view-availability" class="selection-bar">
               <option value="deafault" disabled='disabled' selected>availability</option>
               <option value="available">Available</option>
               <option value="not-available">Not Available</option>
          </select> -->
          <select name="unit" id="view-unit" class="selection-bar">
               <option value="deafault" disabled='disabled' selected>unit</option>
               <option value="miligram">mg</option>
               <option value="gram">g</option>
               <option value="mililletre">ml</option>
          </select>
</div>
     </div>

     
     <h2 class="list-text">Medicine List</h2>
     <hr>
     
     <div class="div-main">

          <table>
               <thead>
                    <tr>
                         <th>Name</th>
                         <th>Weight/Volume</th>
                         <th>Unit</th>
                         <th>Category</th>
                         <th>Quantity</th>
                         <th>Action</th>
                    </tr>
               </thead>

               <tbody>
               <?php foreach ($data['medicines'] as $medicine){ ?> 
               <tr>
                    <td class="td-1">
                         <?php echo $medicine->name ?>
                    </td>
                    <td class="td-2">
                         <?php echo $medicine->weight ?>
                    </td>
                    <td class="td-3">
                         <?php echo $medicine->unit ?>
                    </td>
                    <td class="td-4">
                         <?php echo $medicine->category ?>
                    </td>
                    <td class="td-5">
                         <?php echo $medicine->quantity ?>
                    </td>
                    <td class="td-6">
                         <div class="btn-container">
                              <button class="edit-btn btn">
                                   <i class="fa-solid fa-pen-to-square"></i><a class="a-tag" href="<?php echo URL_ROOT?>/Medicine/edit">Update</a>
                              </button>
                              <button class="delete-btn btn">
                                   <i class="fa-solid fa-trash-can"></i><a class="a-tag" href="deletemedicine.php">Delete</a>
                              </button>
                         </div>
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