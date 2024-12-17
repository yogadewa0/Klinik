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
        <input type="text" name="nama_pasien" class="form-control">
        <input type="hidden" name="id_pasien" class="form-control">
      </div>
      <div class="form-group">
        <label>Nama Mantri</label>
        <input type="text" name="nama_user" class="form-control">
        <input type="hidden" name="id_user" class="form-control">
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
      <!-- Daftar Obat dengan Ikon Pensil -->
      <div class="form-group">
        <label>Daftar Obat 
          <span class="edit-icon" onclick="openModal()" title="Tambah Obat">✏️</span>
        </label>
        <table class="table table-bordered" id="obatTable">
          <thead>
            <tr>
              <th>Nama Obat</th>
              <th>Anjuran</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
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
              <option value="Antibiotik">Antibiotik</option>
            </select>
          </div>
          <div class="form-group">
            <label for="modalAnjuran">Anjuran</label>
            <input type="text" id="modalAnjuran" class="form-control" placeholder="Contoh: 3x1 sehari">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" onclick="saveObat()">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Script Section -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script>
    function openModal() {
      // Reset input dalam modal saat dibuka
      document.getElementById("modalNamaObat").value = "";
      document.getElementById("modalAnjuran").value = "";
      $('#modalDialog').modal('show'); // Tampilkan modal
    }

    function saveObat() {
      const namaObat = document.getElementById("modalNamaObat").value;
      const anjuran = document.getElementById("modalAnjuran").value;

      if (namaObat && anjuran) {
        const table = document.getElementById("obatTable").getElementsByTagName("tbody")[0];

        // Tambahkan baris baru ke tabel
        const newRow = table.insertRow();
        newRow.insertCell(0).innerText = namaObat;
        newRow.insertCell(1).innerText = anjuran;

        // Tutup modal setelah menyimpan
        $('#modalDialog').modal('hide');
      } else {
        alert("Harap isi Nama Obat dan Anjuran terlebih dahulu.");
      }
    }
  </script>
</body>

</html>
