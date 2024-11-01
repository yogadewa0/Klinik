<?= $this->extend('admin/layout/template') ?>
<?= $this->Section('content') ?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 CRUD App Example - Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style> 
      .content-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="content-container">
        <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('/akun-form') ?>" class="btn btn-success mb-2">Tambah Akun</a>
        </div>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
        ?>
        <table class="table table-striped table-hover" id="akun-list">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($akun): ?>
                <?php foreach($akun as $user): ?>
                <tr>
                    <td><?php echo $user['role']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                        
                        <a href="<?php echo base_url('delete-user/'.$user['username']);?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#akun-list').DataTable();
    });
</script>
</body>
<?= $this->endSection(); ?>
</html>
