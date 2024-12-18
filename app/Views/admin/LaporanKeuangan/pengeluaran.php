<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>
    
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
                </div>

                <h3 class="mb-4">Laporan Pengeluaran</h3>
                
                <!-- Table -->
                <table id="expenseTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jumlah Pembelian Obat</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimuat secara dinamis -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#expenseTable').DataTable({
                language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
                order: [[0, 'desc']],
                pageLength: 10,
                dom: 'rtip',
                info: false
            });

            // Function untuk memuat data
            function loadData(from, to) {
                $.ajax({
                    url: '<?= site_url('/laporan-pengeluaran/fetch') ?>',
                    method: 'POST',
                    data: { from: from, to: to },
                    dataType: 'json',
                    success: function(response) {
                        table.clear();
                        $.each(response, function(index, row) {
                            table.row.add([
                                row.tanggal,
                                row.jumlah_pembelian_obat,
                                'Rp ' + parseInt(row.total_pengeluaran).toLocaleString('id-ID')
                            ]);
                        });
                        table.draw();
                    },
                    error: function(xhr) {
                        console.error('Error fetching data:', xhr.responseText);
                    }
                });
            }

            // Load data awal
            loadData($('#dateFrom').val(), $('#dateTo').val());

            // Filter button handler
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
