<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 Add Rekam Medis With Validation Demo</title>
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
    action="<?= site_url('/submit-rekam_medis-form') ?>">
      <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" name="id_pasien" class="form-control">
      </div>
      <div class="form-group">
        <label>Nama Mantri</label>
        <input type="text" name="id_user" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Kunjungan</label>
        <input type="datetime-local" name="tgl_kunjungan" class="form-control">
      </div>
      <div class="form-group">
        <label>Diagnosa</label>
        <textarea name="diagnosa" class="form-control" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label>Penanganan</label>
        <textarea name="penanganan" class="form-control" rows="3"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
      </div>
      <div class="form-group">
        <a href="<?= site_url('rekammedis-list') ?>" class="btn btn-danger btn-block">Kembali</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          id_pasien: {
            required: true,
          },
          tgl_kunjungan: {
            required: true,
          },
          id_user: {
            required: true,
          },
        },
        messages: {
          id_pasien: {
            required: "ID Pasien wajib diisi.",
          },
          tgl_kunjungan: {
            required: "Tanggal kunjungan wajib diisi.",
          },
          id_user: {
            required: "ID User wajib diisi.",
          },
        },
      });
    }
  </script>
</body>

</html>
