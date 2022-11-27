<div class="side-nav-container">
          <div class="logo-container">
               <div class="logo">
                    <img src="<?php echo URL_ROOT; ?>/images/logo.png" alt="">
               </div>
               <i class="fa-solid fa-bars menu-btn" id="menu-btn"></i>
          </div>
          <ul class="side-nav-list">
               <li class="side-nav-item">
                    <a href="#" title="Home">
                         <span class="nav-item-icon"><i class="fa-sharp fa-solid fa-house"></i></span>
                         <span class="nav-item-text">Home</span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="#" title="Orders">
                         <span class="nav-item-icon"><i class="fa-solid fa-file-lines"></i></span>
                         <span class="nav-item-text">Orders</span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="#" title="Medicines">
                         <span class="nav-item-icon"><i class="fa-solid fa-prescription-bottle-medical"></i></span>
                         <span class="nav-item-text">Medicines</span>
                    </a>
               </li>
               <form action="<?php echo URL_ROOT ?>/user/logout_pharm" method="post" id="logout">
               <li class="side-nav-item" id="logout-btn">
                    <a href="#" title="Log out">
                         <span class="nav-item-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                         <span class="nav-item-text">Logout</span>
                    </a>
               </li>
               </form>   
          </ul>
     </div>
     <script src="sidebar.js"></script>