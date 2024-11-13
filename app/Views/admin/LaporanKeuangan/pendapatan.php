<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?= $this->extend('admin/layout/template') ?>
    <?= $this->Section('content') ?>
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <!-- Date Filter -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text">From</span>
                            <input type="date" class="form-control" id="dateFrom" value="2024-03-15">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text">To</span>
                            <input type="date" class="form-control" id="dateTo" value="2024-03-17">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100" id="filterBtn">Filter</button>
                    </div>
                    <div class="col-md-2 ms-auto">
                        <button class="btn btn-secondary w-100">Cetak</button>
                    </div>
                </div>

                <h3 class="mb-4">Laporan Pendapatan</h3>
                
                <table id="incomeTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah Pasien</th>
                            <th>Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>17 Maret 2024</td>
                            <td>25</td>
                            <td>Rp 1.250.000</td>
                        </tr>
                        <tr>
                            <td>16 Maret 2024</td>
                            <td>30</td>
                            <td>Rp 1.500.000</td>
                        </tr>
                        <tr>
                            <td>15 Maret 2024</td>
                            <td>17</td>
                            <td>Rp 850.000</td>
                        </tr>
                    </tbody>
                </table>

                <!-- <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary">Selanjutnya</button>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#incomeTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                order: [[0, 'desc']], // Sort by date descending
                pageLength: 10,
                dom: 'rtip', // Remove default search box
                info: false // Remove "Showing X to Y of Z entries"
            });

            // Filter button click handler
            $('#filterBtn').click(function() {
                const dateFrom = $('#dateFrom').val();
                const dateTo = $('#dateTo').val();
                // Here you would typically make an AJAX call to fetch filtered data
                console.log('Filter dates:', dateFrom, 'to', dateTo);
            });
        });
    </script>
</body>
<?= $this->endSection(); ?>
</html>