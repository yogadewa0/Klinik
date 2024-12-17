<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter 4 - Edit User</title>
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
    <h4 class="text-center mb-4">Edit User</h4>
        <form method="post" id="update_user" name="update_user" action="<?= site_url('/user-update') ?>">
        <!-- Hidden ID -->
        <input type="hidden" name="id_user" id="id_user" value="<?= $user_obj['id_user']; ?>">

        <!-- Role Dropdown -->
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">Pilih Role</option>
                <option value="Mantri" <?= ($user_obj['role'] == 'Mantri') ? 'selected' : ''; ?>>Mantri</option>
                <option value="Karyawan" <?= ($user_obj['role'] == 'Karyawan') ? 'selected' : ''; ?>>Karyawan</option>
            </select>
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" 
                value="<?= $user_obj['username']; ?>" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <!-- Nama -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" 
                value="<?= $user_obj['nama']; ?>" required>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" 
                value="<?= $user_obj['alamat']; ?>" required>
        </div>

        <!-- No Telepon -->
        <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" 
                value="<?= $user_obj['no_telp']; ?>" required>
        </div>

        <!-- Submit Button -->
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
            <a href="<?= site_url('/user-list') ?>" class="btn btn-danger btn-block">Kembali</a>
        </div>
    </form>
</div>

<!-- jQuery & jQuery Validation -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

<script>
    // Validasi form menggunakan jQuery Validation
    $(document).ready(function () {
        $("#update_user").validate({
            rules: {
                role: {
                    required: true,
                },
                username: {
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
                    digits: true, // Hanya angka
                },
            },
            messages: {
                role: {
                    required: "Role harus dipilih.",
                },
                username: {
                    required: "Username harus diisi.",
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
                },
            },
            errorElement: "span",
            errorClass: "error"
        });

        // Validasi no_telp real-time: hanya angka
        $('#no_telp').on('input', function () {
            let noTelp = $(this).val();
            if (!/^\d*$/.test(noTelp)) {
                $('#no_telp_error').text("No Telepon hanya boleh berisi angka.");
                $(this).val(noTelp.replace(/\D/g, ''));
            } else {
                $('#no_telp_error').text("");
            }
        });
    });
</script>
</body>
</html>