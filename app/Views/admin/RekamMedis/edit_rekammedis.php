<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 CRUD - Edit Obat</title>
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
    <h3 class="text-center mb-4">Edit Data Obat</h3>
    <form method="post" id="update_obat" name="update_obat" action="<?= site_url('/update-obat') ?>">
      <input type="hidden" name="kodeobat" id="kodeobat" value="<?= $obat_obj['kodeobat']; ?>">

      <div class="form-group">
        <label for="namaobat">Nama Obat</label>
        <input type="text" id="namaobat" name="namaobat" class="form-control" 
               value="<?= $obat_obj['namaobat']; ?>" required>
      </div>

      <div class="form-group">
        <label for="tanggalkadaluarsa">Tanggal Kadaluarsa</label>
        <input type="date" id="tanggalkadaluarsa" name="tanggalkadaluarsa" class="form-control" 
               value="<?= $obat_obj['tanggalkadaluarsa']; ?>" required>
      </div>

      <div class="form-group">
        <label for="hargaobat">Harga Obat</label>
        <input type="text" id="hargaobat" name="hargaobat" class="form-control" 
               value="<?= $obat_obj['hargaobat']; ?>" required>
      </div>

      <div class="form-group d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Save Data</button>
        <a href="<?= site_url('obat-list') ?>" class="btn btn-danger">Kembali</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    $(document).ready(function () {
      if ($("#update_obat").length > 0) {
        $("#update_obat").validate({
          rules: {
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
            namaobat: {
              required: "Nama Obat wajib diisi.",
            },
            tanggalkadaluarsa: {
              required: "Tanggal Kadaluarsa wajib diisi.",
            },
            hargaobat: {
              required: "Harga Obat wajib diisi.",
            },
          },
          errorElement: "div",
          errorPlacement: function (error, element) {
            error.addClass("error");
            error.insertAfter(element);
          },
        });
      }
    });
  </script>
</body>

</html>
