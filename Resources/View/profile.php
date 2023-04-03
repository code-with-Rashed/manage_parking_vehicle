<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo assets("css/style.css"); ?>">
    <link rel="stylesheet" href="<?php echo assets("css/vehicle-form-page.css"); ?>">
</head>

<body>
    <?php view("sidebar"); ?>
    <section class="home-section">
        <?php view("navbar"); ?>
        <div class="main-content">
            <div class="content-box">
                <div class="content-wrap">
                    <div class="content-status">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="vehicle-form">
                        <form action="<?= url('/profile/update'); ?>" method="post">
                            <?php $value = array_merge(...$data); ?>
                            <input type="hidden" name="csrf_token" value="<?= $value['CSRF']; ?>">
                            <input type="hidden" name="id" value="<?= $value['id']; ?>">
                            <div class="form-box">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" required maxlength="50" value="<?= $value['name']; ?>">
                            </div>
                            <div class="form-box">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" required maxlength="50" value="<?= $value['email']; ?>">
                            </div>
                            <div class="form-box">
                                <label for="phone">Phone Number</label>
                                <input type="number" name="phone" id="phone" placeholder="Phone Number" required maxlength="12" value="<?= $value['phone']; ?>">
                            </div>
                            <div class="form-box">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username" required maxlength="50" value="<?= $value['username']; ?>">
                            </div>
                            <div class="form-box">
                                <label for="password">Password &nbsp;&nbsp;<small>( Leave password empty if not change in password )</small></label>
                                <input type="password" name="password" id="password" maxlength="50">
                            </div>
                            <div class="form-submit-box">
                                <input type="submit" value="Update" name="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php view("footer"); ?>
</body>

</html>