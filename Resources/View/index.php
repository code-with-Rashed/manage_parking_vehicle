<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Parking</title>
    <link rel="stylesheet" href="<?php echo assets("css/index.css");?>">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <div class="title">
                Login
            </div>
            <form action="<?php echo url("/login");?>" method="post">
                <input type="hidden" name="csrf_token" value="<?php echo $data[0]['CSRF'];?>">
                <div class="login-box">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" required maxlength="50" autofocus>
                </div>
                <div class="login-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required maxlength="50">
                </div>
                <div class="login-box">
                    <input type="submit" value="Login">
                </div>

            </form>
        </div>
    </div>
</body>
</html>