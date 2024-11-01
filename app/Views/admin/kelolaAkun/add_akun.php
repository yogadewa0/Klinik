<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter 4 CRUD - Add User Demo</title>
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
    <form method="post" id="add_create" name="add_create" 
    action="<?= site_url('/submit-user-form') ?>">
        <div class="form-group">
            <label>Role</label>
            <input type="text" name="role" class="form-control">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
        </div>
        <div class="form-group">
        <a href="<?= site_url('pengguna') ?>" class="btn btn-danger btn-block">Kembali</a>
      </div>
    </form>
</div>
</body>
</html>
