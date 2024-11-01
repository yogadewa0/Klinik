<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
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
    action="<?= site_url('/submit-form') ?>">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
      </div>
      <div class="form-group">
        <label>No Telpon</label>
        <input type="text" name="notelpon" class="form-control">
      </div>
      <div class="form-group">
        <label>Usia</label>
        <input type="text" name="usia" class="form-control">
      </div>
      <div class="form-group">
          <label>Jenis Kelamin</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jeniskelamin" id="laki-laki" value="Laki-laki">
            <label class="form-check-label" for="laki-laki">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="Perempuan">
            <label class="form-check-label" for="perempuan">Perempuan</label>
          </div>
        </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
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
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
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