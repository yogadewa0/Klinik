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
    <form method="post" id="update_user" name="update_user" action="<?= site_url('/update') ?>">
        <input type="hidden" name="id_pasien" value="<?php echo $user_obj['id_pasien']; ?>">

        <!-- Nama -->
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $user_obj['nama']; ?>" required>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $user_obj['alamat']; ?>" required>
        </div>

        <!-- No Telpon -->
        <div class="form-group">
            <label>No Telpon</label>
            <input type="text" name="notelpon" class="form-control" value="<?php echo $user_obj['notelpon']; ?>" required>
        </div>

        <!-- Tanggal Lahir -->
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?= date('Y-m-d', strtotime($user_obj['tanggal_lahir'])); ?>" required>
        </div>


        <!-- Jenis Kelamin -->
        <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jeniskelamin" value="Laki-laki" <?php if($user_obj['jeniskelamin'] == 'Laki-laki') echo 'checked'; ?> required>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jeniskelamin" value="Perempuan" <?php if($user_obj['jeniskelamin'] == 'Perempuan') echo 'checked'; ?> required>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>

        <!-- Golongan Darah -->
        <div class="form-group">
            <label>Golongan Darah</label>
            <select class="form-control" name="golongan_darah" required>
                <option value="A" <?php echo $user_obj['golongan_darah'] == 'A' ? 'selected' : ''; ?>>A</option>
                <option value="B" <?php echo $user_obj['golongan_darah'] == 'B' ? 'selected' : ''; ?>>B</option>
                <option value="AB" <?php echo $user_obj['golongan_darah'] == 'AB' ? 'selected' : ''; ?>>AB</option>
                <option value="O" <?php echo $user_obj['golongan_darah'] == 'O' ? 'selected' : ''; ?>>O</option>
            </select>
        </div>

        <!-- Alergi -->
        <div class="form-group">
            <label>Alergi</label>
            <textarea name="alergi" class="form-control"><?php echo $user_obj['alergi']; ?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        <div class="form-group">
            <a href="<?= site_url('users-list') ?>" class="btn btn-danger btn-block">Kembali</a>
        </div>
    </form>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
</body>

</html>