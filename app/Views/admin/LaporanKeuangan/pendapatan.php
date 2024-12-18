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
                
                <!-- Table -->
                <table id="incomeTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah Pasien</th>
                            <th>Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#incomeTable').DataTable({
                language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
                order: [[0, 'desc']],
                pageLength: 10,
                dom: 'rtip',
                info: false
            });

            // Function to load data via AJAX
            function loadData(from, to) {
                $.ajax({
                    url: '<?= site_url('/laporan-pemasukan/fetch') ?>',
                    method: 'POST',
                    data: { from: from, to: to },
                    dataType: 'json',
                    success: function(response) {
                        table.clear();
                        $.each(response, function(index, row) {
                            table.row.add([
                                row.tanggal,
                                row.jumlah_pasien,
                                'Rp ' + parseInt(row.total_pemasukan).toLocaleString('id-ID')
                            ]);
                        });
                        table.draw();
                    },
                    error: function(xhr) {
                        console.error('Error fetching data:', xhr.responseText);
                    }
                });
            }

            // Load initial data
            loadData($('#dateFrom').val(), $('#dateTo').val());

            // Filter button click
            $('#filterBtn').click(function() {
                const from = $('#dateFrom').val();
                const to = $('#dateTo').val();
                loadData(from, to);
            });
        });
    </script>
</body>
<?= $this->endSection(); ?>
</html>
