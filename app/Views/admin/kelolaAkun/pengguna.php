<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola Akun</title>
        <!-- css bootstrao -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font google -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- icon bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <?= $this->extend('admin/layout/template') ?>
    
    <?= $this->Section('content') ?>
    <style>
        /* body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        } */
        .mantri-label {
            font-weight: bold;
            margin-right: 10px;
        }
        .mantri-icon {
            width: 30px;
            height: 30px;
        }
        .btn-custom {
            background-color: #0E7C87;
            border-color: #0E7C87;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0B646C;
            border-color: #0B646C;
            color: white;
        }
        .table {
            background-color: #ffffff;
        }
        .table th {
            border-top: none;
        }
        .action-icon {
            color: #6c757d;
            cursor: pointer;
        }
        .content-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .search-label {
            margin-right: 10px;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="content-container">
            <div class="header-container">
                <h2 class="mb-0">Kelola Akun</h2>
                <button class="btn btn-custom">Daftar Akun</button>
            </div>

            <div class="row mb-4">
                <div class="col"></div>
                <div class="col-auto search-container">
                    <label for="search-input" class="search-label">Search:</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input id="search-input" type="text" class="form-control border-start-0" placeholder="Search with Username" style="border-left: none;">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Username</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mantri</td>
                                <td>Mikael_25</td>
                                <td class="text-end">
                                    <i class="bi bi-trash action-icon"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>Karyawan</td>
                                <td>Claudia_07</td>
                                <td class="text-end">
                                    <i class="bi bi-trash action-icon"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-custom mt-4">Ganti Akun</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional)
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
<?= $this->endSection(); ?>

</html>
