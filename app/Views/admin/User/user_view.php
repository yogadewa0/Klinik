<pre>
    <?php print_r($user); ?>
</pre>
<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"
    />
    <style>
      body {
        background-color: #f8f9fa;
      }
      .profile-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }
      .profile-header {
        text-align: center;
        margin-bottom: 30px;
      }
      .profile-header img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
      }
      .btn-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
      }
      .btn-custom {
        background-color: #00796b;
        color: #fff;
        padding: 8px 20px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        transition: background-color 0.3s ease;
      }
      .btn-custom:hover {
        background-color: #005f56;
      }
    </style>
  </head>
  <body>
  <div class="container mt-5">
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <img
                src="https://cdn-icons-png.flaticon.com/512/4825/4825038.png"
                alt="Profile Image"
                class="rounded-circle"
                width="100"
                height="100"
            />
            <h4>Profile Pengguna</h4>
        </div>

        <!-- Profile Form -->
        <form>
          <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input
                  type="text"
                  class="form-control"
                  id="name"
                  value="<?= isset($user['nama']) ? esc($user['nama']) : '' ?>"
                  readonly
              />
          </div>

          <div class="mb-3">
              <label for="email" class="form-label">Username</label>
              <input
                  type="text"
                  class="form-control"
                  id="email"
                  value="<?= isset($user['username']) ? esc($user['username']) : '' ?>"
                  readonly
              />
          </div>

          <div class="mb-3">
              <label for="address" class="form-label">Alamat</label>
              <input
                  type="text"
                  class="form-control"
                  id="address"
                  value="<?= isset($user['alamat']) ? esc($user['alamat']) : '' ?>"
                  readonly
              />
          </div>

          <div class="mb-3">
              <label for="phone" class="form-label">No Handphone</label>
              <input
                  type="text"
                  class="form-control"
                  id="phone"
                  value="<?= isset($user['no_telp']) ? esc($user['no_telp']) : '' ?>"
                  readonly
              />
          </div>
      </form>

            <!-- Buttons -->
            <div class="btn-container">
                <?php if (isset($user['id_user'])): ?>
                    <a href="<?= site_url('/user-edit/' . $user['id_user']) ?>" class="btn btn-custom">Edit Profile</a>
                <?php else: ?>
                    <p class="text-danger">Data pengguna tidak ditemukan.</p>
                <?php endif; ?>
                <a href="<?= site_url('/user-add-form') ?>" class="btn btn-custom">Tambah Akun</a>
            </div>
        </form>
    </div>
</div>



    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#akun-list').DataTable();
      });
    </script>
  </body>
</html>

<?= $this->endSection(); ?>