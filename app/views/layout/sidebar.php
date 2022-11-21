<div class="side-nav-container">
          <div class="logo-container">
               <div class="logo">
                    <img src="<?php echo URL_ROOT; ?>/images/logo.png" alt="">
               </div>
               <i class="fa-solid fa-bars menu-btn" id="menu-btn"></i>
          </div>
          <ul class="side-nav-list">
               <li class="side-nav-item">
                    <a href="#" title="Home" class="non-active-item">
                         <span class="nav-item-icon"><i class="fa-sharp fa-solid fa-house"></i></span>
                         <span class="nav-item-text">Home</span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="#" title="Prescription" class="non-active-item">
                         <span class="nav-item-icon"><i class="fa-solid fa-file-lines"></i></span>
                         <span class="nav-item-text">Prescription</span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="#" title="Appointment" class="non-active-item">
                         <span class="nav-item-icon"><i class="fa-solid fa-address-card"></i></i></i></span>
                         <span class="nav-item-text">Appointment</span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="#" title="Recommendation" class="non-active-item">
                         <span class="nav-item-icon"><i class="fa-solid fa-user-pen"></i></span>
                         <span class="nav-item-text">Recommendation</span>
                    </a>
               </li>
               <form action="<?php echo URL_ROOT ?>/user/logout" method="post" id="logout">
               <li class="side-nav-item" id="logout-btn">
                    <a href="#" title="Log out" class="logout">
                         <span class="nav-item-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                         <span class="nav-item-text">Logout</span>
                    </a>
               </li>
               </form>   
          </ul>
     </div>
     <script src="sidebar.js"></script>