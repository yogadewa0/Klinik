<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter 4 - Form Tambah User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
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
    <h4 class="text-center mb-4">Form Tambah User</h4>
    <form method="post" id="add_user_form" name="add_user_form" action="<?= site_url('/user-store') ?>">
        <!-- ID User -->
        <!-- <div class="form-group">
            <label for="id_user">ID User</label>
            <input type="text" name="id_user" id="id_user" class="form-control" placeholder="Masukkan ID User" required>
        </div> -->

        <!-- Role Dropdown -->
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">Pilih Role</option>
                <option value="Mantri">Mantri</option>
                <option value="Karyawan">Karyawan</option>
            </select>
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
        </div>

        <!-- Nama -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" required>
        </div>

        <!-- No Telp -->
        <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No Telepon" required>
            <span class="error" id="no_telp_error"></span>
        </div>

        <!-- Buttons -->
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
            <a href="<?= site_url('pengguna') ?>" class="btn btn-danger btn-block">Kembali</a>
        </div>
    </form>
</div>

<!-- jQuery & Validation Plugin -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

<script>
    // Validasi form menggunakan jQuery Validation
    $(document).ready(function () {
        $("#add_user_form").validate({
            rules: {
                id_user: {
                    required: true,
                },
                role: {
                    required: true,
                },
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                nama: {
                    required: true,
                },
                alamat: {
                    required: true,
                },
                no_telp: {
                    required: true,
                    digits: true, // Hanya angka yang diizinkan
                }
            },
            messages: {
                id_user: {
                    required: "ID User harus diisi.",
                },
                role: {
                    required: "Role harus dipilih.",
                },
                username: {
                    required: "Username harus diisi.",
                },
                password: {
                    required: "Password harus diisi.",
                },
                nama: {
                    required: "Nama harus diisi.",
                },
                alamat: {
                    required: "Alamat harus diisi.",
                },
                no_telp: {
                    required: "No Telepon harus diisi.",
                    digits: "No Telepon hanya boleh berisi angka.",
                }
            },
            errorElement: "span",
            errorClass: "error"
        });
    });
</script>
</body>
</html>