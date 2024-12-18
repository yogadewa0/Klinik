<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 CRUD App Example - Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <?= $this->extend('admin/layout/template') ?>

    <?= $this->section('content') ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            <a href="<?= site_url('/transaksi-form') ?>" class="btn btn-success mb-2">Tambah Transaksi</a>
        </div>
        <?php if (isset($_SESSION['msg'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['msg'] ?>
            </div>
        <?php endif; ?>
        <div class="mt-3">
            <table class="table table-striped table-hover" id="transaksi-list">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Pasien</th>
                        <th>Nama Mantri</th>
                        <th>Tanggal Transaksi</th>
                        <th>Biaya Periksa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($transaksi): ?>
                        <?php foreach ($transaksi as $item): ?>
                            <tr>
                                <td><?php echo $item['id_transaksi']; ?></td>
                                <td><?php echo $item['nama_pasien']; ?></td>
                                <td><?php echo $item['nama_user']; ?></td>
                                <td><?= date('Y-m-d H:i:s', strtotime($item['tgl_transaksi'])); ?></td>
                                <td><?= number_format($item['biaya_periksa'], 2, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#transaksi-list').DataTable();
    });
</script>
</body>

    <?= $this->endSection(); ?>
</html>