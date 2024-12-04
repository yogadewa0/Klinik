<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 CRUD App Example - positronx.io</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?= $this->extend('admin/layout/template') ?>
    <?= $this->Section('content') ?>
    <style>
        .content-container {
            background-color: white;
            border-radius: 2px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5 p-4 rounded">
    <div class="content-container">
        <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('/user-form') ?>" class="btn btn-success mb-2">Tambah Pasien</a>
        </div>
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['msg']; ?>
            </div>
        <?php endif; ?>
        <div class="mt-3">
            <table class="table table-striped table-hover" id="users-list">
                <thead>
                    <tr>
                        <th>Pasien Id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Golongan Darah</th>
                        <th>Alergi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($pasien): ?>
                        <?php foreach($pasien as $user): ?>
                            <tr>
                                <td><?php echo $user['id_pasien']; ?></td>
                                <td><?php echo $user['nama']; ?></td>
                                <td><?php echo $user['alamat']; ?></td>
                                <td><?php echo $user['notelpon']; ?></td>
                                <td><?php echo date('d-m-Y ', strtotime($user['tanggal_lahir'])); ?></td>
                                <td><?php echo $user['jeniskelamin']; ?></td>
                                <td><?php echo $user['golongan_darah']; ?></td>
                                <td><?php echo $user['alergi']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <a href="<?php echo base_url('edit-view/'.$user['id_pasien']);?>" class="btn btn-sm btn-secondary "style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger " onclick="confirmDelete('<?php echo base_url('delete/'.$user['id_pasien']); ?>')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script> 
    $(document).ready(function() {
      $('#users-list').DataTable();
        // Hide modal on close and cancel buttons
        $('#deleteModal .btn-secondary, #deleteModal .close').click(function() {
            $('#deleteModal').modal('hide');
        });
    });

    // Function to show the delete modal with the correct URL
    function confirmDelete(deleteUrl) {
        // Set the href attribute of the delete confirmation button
        $('#confirmDeleteBtn').attr('href', deleteUrl);
        // Show the delete confirmation modal
        $('#deleteModal').modal('show');
    }
</script>

</body>
<?= $this->endSection(); ?>
</html>
