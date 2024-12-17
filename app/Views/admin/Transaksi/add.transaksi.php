<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 Add Transaksi With Validation Demo</title>
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
    action="<?= site_url('/submit-transaksi-form') ?>">
      <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" name="id_pasien" class="form-control">
      </div>
      <div class="form-group">
        <label>Nama Mantri</label>
        <input type="text" name="id_user" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Transaksi</label>
        <input type="datetime-local" name="tgl_transaksi" class="form-control">
      </div>
      <div class="form-group">
        <label>Biaya Periksa</label>
        <input type="text" name="biaya_periksa" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
      </div>
      <div class="form-group">
        <a href="<?= site_url('transaksi-list') ?>" class="btn btn-danger btn-block">Kembali</a>
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
          id_user: {
            required: true,
          },
          tgl_transaksi: {
            required: true,
          },
          biaya_periksa: {
            required: true,
            number: true
          },
          id_user: {
            required: true,
          },
        },
        messages: {
          id_pasien: {
            required: "ID Pasien wajib diisi.",
          },
          tgl_transaksi: {
            required: "Tanggal transaksi wajib diisi.",
          },
          biaya_periksa: {
            required: "Biaya periksa wajib diisi.",
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
