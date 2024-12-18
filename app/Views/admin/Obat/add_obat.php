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
/* 
    .rp-prefix {
      display: inline-block;
      position: absolute;
      left: 10px;
      top: 10px;
      z-index: 1;
      font-size: 18px;
      color: #333;
    }

    .input-rp {
      padding-left: 45px;
    } */
  </style>
</head>

<body>
  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" action="<?= site_url('/submit-obat-form') ?>">
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
      
      <!-- Harga Obat dengan prefix Rp -->
      <div class="form-group position-relative">
        <label>Harga Obat</label>
        <!-- <span class="rp-prefix">Rp</span> -->
        <input type="text" id="harga" name="harga" class="form-control input-rp" placeholder="Masukkan harga" autocomplete="off">
      </div>

      <!-- Input untuk Ukuran -->
      <div class="form-group">
        <label>Ukuran</label>
        <input type="text" name="ukuran" class="form-control">
      </div>
      
      <!-- Dropdown untuk Satuan -->
      <div class="form-group">
        <label>Satuan</label>
        <select name="satuan" class="form-control">
          <option value="strip">Strip</option>
          <option value="botol">Botol</option>
        </select>
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
    
    // Format angka dengan pemisah ribuan (.)
    function formatCurrency(input) {
      let value = input.value.replace(/[^\d]/g, ''); // Hapus karakter selain angka
      if (value) {
        value = parseInt(value, 10).toLocaleString('id-ID'); // Format angka dengan pemisah ribuan (.)
      }
      input.value = value;
    }

    // Tambahkan prefix Rp ketika field aktif
    const hargaInput = document.getElementById('hargaobat');
    hargaInput.addEventListener('focus', function () {
      if (!this.value.startsWith('Rp')) {
        this.value = 'Rp ' + this.value; // Tambahkan prefix Rp jika belum ada
      }
    });

    // Hapus prefix Rp saat field tidak aktif
    hargaInput.addEventListener('blur', function () {
      this.value = this.value.replace('Rp ', ''); // Hapus prefix Rp
    });

    // Format angka saat mengetik
    hargaInput.addEventListener('input', function () {
      const prefix = 'Rp ';
      const valueWithoutPrefix = this.value.replace(prefix, '').replace(/[^\d]/g, ''); // Hapus prefix Rp dan karakter selain angka
      const formattedValue = valueWithoutPrefix ? parseInt(valueWithoutPrefix, 10).toLocaleString('id-ID') : '';
      this.value = prefix + formattedValue; // Tambahkan prefix Rp dan format angka
    });

    // Validasi form
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
          harga: {
            required: true,
          },
          satuan: {
            required: true,
          },
          ukuran: {
            required: true,
            pattern: /^[0-9]+\s*(g|mg|ml)$/, // Validasi ukuran: angka diikuti g atau mg
          }
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
          satuan: {
            required: "Satuan is required.",
          },
          ukuran: {
            required: "Ukuran is required.",
            pattern: "Ukuran harus dalam format angka diikuti satuan 'g' atau 'mg' (misalnya 100 g atau 100 mg)."
          }
        },
      })
    }
  </script>
</body>

</html>
