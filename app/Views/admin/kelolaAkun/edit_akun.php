<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter 4 CRUD - Edit User Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
        }

        .error {
            display: block;
            padding-top: 5px;
            font-size: 14px;
            color: red;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update-user') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">

        <div class="form-group">
            <label>Role</label>
            <input type="text" name="role" class="form-control" value="<?php echo $user_obj['role']; ?>">
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $user_obj['username']; ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
    </form>
</div>
</body>
</html>
