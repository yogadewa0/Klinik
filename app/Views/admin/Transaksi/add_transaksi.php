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
        <input type="text" name="nama_pasien" class="form-control">
        <input type="hidden" name="id_pasien" class="form-control">
      </div>
      <div class="form-group">
        <label>Nama Mantri</label>
        <input type="text" name="nama_user" class="form-control">
        <input type="hidden" name="id_user" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Transaksi</label>
        <input type="datetime-local" name="tgl_transaksi" class="form-control">
      </div>
      <div class="form-group">
        <label>Biaya Periksa</label>
        <input type="text" name="biaya_periksa" class="form-control">
      </div>

      <!-- Daftar Obat dengan Ikon Pensil -->
      <div class="form-group">
        <label>Daftar Obat 
          <span class="edit-icon" onclick="openModal()" title="Tambah Obat" style="cursor: pointer;">✏️</span>
        </label>
        <table class="table table-bordered" id="obatTable">
          <thead>
            <tr>
              <th>Nama Obat</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
      </div>
      <div class="form-group">
        <a href="<?= site_url('transaksi-list') ?>" class="btn btn-danger btn-block">Kembali</a>
      </div>
    </form>
  </div>

<!-- Modal Pop-Up -->
<div id="modalDialog" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="modalNamaObat">Nama Obat</label>
          <select id="modalNamaObat" class="form-control">
            <option value="Paracetamol">Paracetamol</option>
            <option value="Amoxicillin">Amoxicillin</option>
            <option value="Ibuprofen">Ibuprofen</option>
            <option value="Omeprazole">Omeprazole</option>
            <option value="Amlodipine">Amlodipine</option>
            <option value="Haloperidol">Haloperidol</option>
            <option value="Insulin">Insulin</option>
            <option value="Metformin">Metformin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="modalJumlahObat">Jumlah Obat</label>
          <input type="number" id="modalJumlahObat" class="form-control" placeholder="Masukkan jumlah" min="1" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="saveObat()">Simpan</button>
      </div>
    </div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
    function openModal() {
      // Reset input dalam modal saat dibuka
      document.getElementById("modalNamaObat").value = "";
      document.getElementById("modalJumlahObat").value = ""; // Reset jumlah obat
      $('#modalDialog').modal('show'); // Tampilkan modal
    }

    function saveObat() {
      const namaObat = document.getElementById("modalNamaObat").value;
      const jumlahObat = document.getElementById("modalJumlahObat").value; // Ambil jumlah obat

      if (namaObat && jumlahObat) {
        const table = document.getElementById("obatTable").getElementsByTagName("tbody")[0];

        // Tambahkan baris baru ke tabel
        const newRow = table.insertRow();
        newRow.insertCell(0).innerText = namaObat;
        newRow.insertCell(1).innerText = jumlahObat; // Tampilkan jumlah obat

        // Tutup modal setelah menyimpan
        $('#modalDialog').modal('hide');
      } else {
        alert("Harap isi Nama Obat dan Jumlah Obat terlebih dahulu.");
      }
    }
  </script>
</body>

</html>