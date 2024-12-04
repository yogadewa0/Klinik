<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 CRUD App Example - Rekam Medis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?= $this->extend('admin/layout/template') ?>

    <?= $this->section('content') ?>
    <style>
        .content-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container-md mt-4 p-4 rounded">
    <div class="content-container">
        <div class="d-flex justify-content-end">
            <a href="<?= site_url('/rekam_medis-form') ?>" class="btn btn-success mb-2">Tambah Rekam Medis</a>
        </div>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
          }
        ?>
        <div class="mt-3">
            <table class="table table-striped table-hover" id="rekammedis-list">
                <thead>
                    <tr>
                        <th>ID Rekam Medis</th>
                        <th>Nama Pasien</th>
                        <th>Nama Mantri</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Diagnosa</th>
                        <th>Penanganan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($rekam_medis): ?>
                        <?php foreach ($rekam_medis as $item): ?>
                            <tr>
                                <td><?php echo $item['id_rekam_medis']; ?></td>
                                <td><?php echo $item['id_pasien']; ?></td>
                                <td><?php echo $item['tgl_kunjungan']; ?></td>
                                <td><?php echo $item['diagnosa']; ?></td>
                                <td><?php echo $item['penanganan']; ?></td>
                                <td><?php echo $item['id_user']; ?></td>
                                <td>
                                    <a href="<?= base_url('edit-rekam-medis-view/' . $item['id_rekam_medis']) ?>" class="btn btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="confirmDelete('<?= base_url('delete-rekam-medis/' . $item['id_rekam_medis']) ?>')" class="btn btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
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
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    
    $(document).ready(function () {
        $('#rekam-medis-list').DataTable();
        $('#deleteModal .btn-secondary, #deleteModal .close').click(function () {
            $('#deleteModal').modal('hide');
        });
    });

    function confirmDelete(deleteUrl) {
        $('#confirmDeleteBtn').attr('href', deleteUrl);
        $('#deleteModal').modal('show');
    }
</script>
</body>

    <?= $this->endSection(); ?>
</html>
