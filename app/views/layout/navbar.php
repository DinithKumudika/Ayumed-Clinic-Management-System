<div class="nav-container">
    <ul class="navbar">
        <li><i class="fa-solid fa-bell"></i></li>
        <li><a href="#" class="username"><?php echo \helpers\Session::get('username') ?></a></li>
        <li>
            <a href="<?php echo URL_ROOT ?>/profile/index/<?php echo \helpers\Session::get('user_id') ?>">
                <div class="profile-img-container">
                    <img src="<?php echo \helpers\Session::get('avatar_url') ?>" alt="" class="profile-img">
                </div>
            </a>
        </li>
    </ul>
</div>