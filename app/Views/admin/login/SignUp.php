<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="asset-admin/css/signup.css">
</head>
<body>
    <?php if (session()->getFlashdata('error')): ?>
        <div><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <div class="container">
        <div class="login-box">
            <div class="logo">
                <img src="asset-admin/img/logo.png" alt="Republik Mantri" srcset="">
            </div>
            <div class="judul" > 
                <label for="judul">
                    Republik <br> Mantri
                </label>
            </div>
            <form action="/login/authenticate" method="post">
                <div class="input-group">
                    <!-- <label for="username">Username</label> -->
                    <input type="text" id="username" name="username" placeholder="Username">
                </div>
                <div class="input-group">
                    <!-- <label for="password">Password</label> -->
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <input type="submit" class = "login-btn" value="Login">
            </form>            
        </div>
    </div>
</body>
</html>