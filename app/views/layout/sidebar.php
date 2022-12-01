<div class="side-nav-container">
          <div class="logo-container">
               <div class="logo">
                    <img src="<?php echo URL_ROOT; ?>/images/logo.png" alt="">
               </div>
               <i class="fa-solid fa-bars menu-btn" id="menu-btn"></i>
          </div>
          <ul class="side-nav-list">
               <li class="side-nav-item">
                    <a href="" class="non-active-item side-nav-link">
                         <span class="nav-item-icon"><i class="fa-solid"></i></span>
                         <span class="nav-item-text"></span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="" class="non-active-item side-nav-link">
                         <span class="nav-item-icon"><i class="fa-solid"></i></span>
                         <span class="nav-item-text"></span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="" class="non-active-item side-nav-link">
                         <span class="nav-item-icon"><i class="fa-solid"></i></i></i></span>
                         <span class="nav-item-text"></span>
                    </a>
               </li>
               <li class="side-nav-item">
                    <a href="" class="non-active-item side-nav-link">
                         <span class="nav-item-icon"><i class="fa-solid"></i></span>
                         <span class="nav-item-text"></span>
                    </a>
               </li>
              <li class="side-nav-item">
                  <a href="" class="non-active-item side-nav-link">
                      <span class="nav-item-icon"><i class="fa-solid"></i></span>
                      <span class="nav-item-text"></span>
                  </a>
              </li>
               <form action="<?php echo URL_ROOT ?>/user/logout/<?php echo \helpers\Session::get('user_id') ?>" method="post" id="logout">
               <li class="side-nav-item" id="logout-btn">
                    <a href="" title="Log out" class="non-active-item logout">
                         <span class="nav-item-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                         <span class="nav-item-text">Logout</span>
                    </a>
               </li>
               </form>   
          </ul>
     </div>