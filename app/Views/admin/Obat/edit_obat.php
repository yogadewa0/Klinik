<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 CRUD - Edit Obat Demo</title>
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
    <form method="post" id="update_obat" name="update_obat" action="<?= site_url('/update-obat') ?>">
      <input type="hidden" name="kodeobat" id="kodeobat" value="<?php echo $obat_obj['kodeobat']; ?>">

      <div class="form-group">
        <label>Nama Obat</label>
        <input type="text" name="namaobat" class="form-control" value="<?php echo $obat_obj['namaobat']; ?>">
      </div>

      <div class="form-group">
        <label>Tanggal Kadaluarsa</label>
        <input type="date" name="tanggalkadaluarsa" class="form-control" value="<?php echo $obat_obj['tanggalkadaluarsa']; ?>">
      </div>

      <div class="form-group">
        <label>Harga Obat</label>
        <input type="text" name="hargaobat" class="form-control" value="<?php echo $obat_obj['harga']; ?>">
      </div>

      
      <div class="form-group">
        <label>Ukuran</label>
        <input type="text" name="ukuran" class="form-control" value="<?php echo $obat_obj['ukuran']; ?>">
      </div>
      <div class="form-group">
        <label>Satuan</label>
        <select name="satuan" class="form-control">
          <option value="strip" <?php echo ($obat_obj['satuan'] == 'strip') ? 'selected' : ''; ?>>Strip</option>
          <option value="botol" <?php echo ($obat_obj['satuan'] == 'botol') ? 'selected' : ''; ?>>Botol</option>
        </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
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
    if ($("#update_obat").length > 0) {
      $("#update_obat").validate({
        rules: {
          namaobat: {
            required: true,
          },
          tanggalkadaluarsa: {
            required: true,
          },
          harga: {
            required: true,
          },
          satuan: {
            required: true,
          },
          ukuran: {
            required: true,
          }
        },
        messages: {
          namaobat: {
            required: "Nama Obat is required.",
          },
          tanggalkadaluarsa: {
            required: "Tanggal Kadaluarsa is required.",
          },
          harga: {
            required: "Harga Obat is required.",
          },
          satuan: {
            required: "Satuan is required.",
          },
          ukuran: {
            required: "Ukuran is required.",
          }
        },
      })
    }
  </script>
</body>

</html>
