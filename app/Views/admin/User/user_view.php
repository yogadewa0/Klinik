<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
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
<div class="container mt-5">
    <div class="content-container">
        <!-- Tombol Tambah Akun -->
        <div class="d-flex justify-content-end mb-2">
            <a href="<?= site_url('/user-add-form') ?>" class="btn btn-success">Tambah Akun</a>
        </div>
        
        <!-- Notifikasi Pesan -->
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>
        
        <!-- Tabel Data Pengguna -->
        <table class="table table-striped table-hover" id="user-list">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($user) && is_array($user)): ?>
                    <?php foreach ($user as $users): ?>
                        <tr>
                            <td><?= esc($users['id_user']) ?></td>
                            <td><?= esc($users['role']) ?></td>
                            <td><?= esc($users['username']) ?></td>
                            <td><?= esc($users['nama']) ?></td>
                            <td><?= esc($users['alamat']) ?></td>
                            <td><?= esc($users['no_telp']) ?></td>
                            <td>
                                <a href="<?= site_url('user-edit/' . $users['id_user']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button 
                                    class="btn btn-danger btn-sm delete-btn" 
                                    data-id="<?= $users['id_user'] ?>" 
                                    data-toggle="modal" 
                                    data-target="#deleteModal">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Data pengguna tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
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
                Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi DataTable
        $('#user-list').DataTable();

        // Event handler untuk tombol hapus
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const deleteUrl = `<?= site_url('user-delete/') ?>${userId}`;
                confirmDeleteBtn.setAttribute('href', deleteUrl);
            });
        });
    });
</script>
</body>
</html>
<?= $this->endSection() ?>
