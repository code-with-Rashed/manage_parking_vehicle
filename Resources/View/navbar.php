<nav>
    <div class="sidebar-button">
        <img src="<?php echo stored_file("image/menu.png"); ?>" alt="##">
    </div>
    <div class="profile-details">
        <img src="<?php echo stored_file("image/user.jpg"); ?>" alt="profile-image">
        <span class="admin-name">Hi, <?= Management\Classes\Session::get('admin_name'); ?></span>
        <div class="profile-options">
            <a href="<?= url("/profile"); ?>" class="profile-link">My Profile</a>
            <a href="<?= url("/logout"); ?>" class="profile-link">Logout</a>
        </div>
    </div>
</nav>