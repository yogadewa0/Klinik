<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 Add Obat With Validation Demo</title>
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
    action="<?= site_url('/submit-obat-form') ?>">
      <div class="form-group">
        <label>Kode Obat</label>
        <input type="text" name="kodeobat" class="form-control">
      </div>
      <div class="form-group">
        <label>Nama Obat</label>
        <input type="text" name="namaobat" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Kadaluarsa</label>
        <input type="date" name="tanggalkadaluarsa" class="form-control">
      </div>
      <div class="form-group">
        <label>Harga Obat</label>
        <input type="text" name="hargaobat" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
      </div>
      <div class="form-group">
        <a href="<?= site_url('obat-list') ?>" class="btn btn-danger btn-block">Kembali</a>
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
          kodeobat: {
            required: true,
          },
          namaobat: {
            required: true,
          },
          tanggalkadaluarsa: {
            required: true,
          },
          hargaobat: {
            required: true,
          },
        },
        messages: {
          kodeobat: {
            required: "Kode Obat is required.",
          },
          namaobat: {
            required: "Nama Obat is required.",
          },
          tanggalkadaluarsa: {
            required: "Tanggal Kadaluarsa is required.",
          },
          hargaobat: {
            required: "Harga Obat is required.",
          },
        },
      })
    }
  </script>
</body>

</html>
