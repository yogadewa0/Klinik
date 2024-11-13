<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="/asset-admin/css/styles.css">
    <!-- <script src="/style.js"></script> -->
    <title>Klinik</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                    <img src="/asset-admin/img/logoklinik.png" alt="" class="icon me-2"></div>
                    <img src="/asset-admin/img/ikonmantri.png" alt="" class="iconmantri mt-3">
                    <div class="list-group list-group-flush my-3">
                        <a href="dashboard" class="list-group-item list-group-item-action d-flex align-items-center bg-transparent second-text active" data-title="Dashboard">
                            <img src="/asset-admin/img/Home.png" alt="Dashboard Icon" class="iconmenu me-2">Dashboard
                        </a>
                        <a href="users-list" class="list-group-item list-group-item-action d-flex align-items-center bg-transparent second-text active" data-title="Data Pasien">
                            <img src="/asset-admin/img/Pasien.png" alt="Projects Icon" class="iconmenu me-2">Data Pasien
                        </a>
                        <a href="obat-list" class="list-group-item list-group-item-action d-flex align-items-center bg-transparent second-text active" data-title="Data Obat">
                            <img src="/asset-admin/img/obat.png" alt="Analytics Icon" class="iconmenu me-2">Data Obat
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center bg-transparent second-text active" data-title="Data Rekam Medis">
                            <img src="/asset-admin/img/Rekam Medis.png" alt="Reports Icon" class="iconmenu me-2">Data Rekam Medis
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center bg-transparent second-text active" data-title="Data Transaksi">
                            <img src="/asset-admin/img/transaksi.png" alt="Store Icon" class="iconmenu me-2">Data Transaksi
                        </a>
                        <div class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                data-bs-target="#laporan-keuangan" aria-expanded="false" aria-controls="laporan-keuangan">
                                <img src="/asset-admin/img/Laporan.png" alt="Products Icon" class="iconmenu me-2">
                                <span>Laporan Keuangan</span>
                            </a>
                            <ul id="laporan-keuangan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item" data-title="Laporan Pemasukan">
                                    <a href="pendapatan" class="sidebar-link">Laporan Pemasukan</a>
                                </li>
                                <li class="sidebar-item" data-title="Laporan Pengeluaran">
                                    <a href="pengeluaran" class="sidebar-link">Laporan Pengeluaran</a>
                                </li>
                            </ul>
                        </div>                     

                        <a href="pengguna" class="list-group-item list-group-item-action d-flex align-items-center bg-transparent second-text active" data-title="User">
                            <img src="/asset-admin/img/pengaturan.png" alt="Chat Icon" class="iconmenu me-2">User
                        </a>
                        <a href="/login" class="list-group-item list-group-item-action d-flex align-items-center bg-transparent second-text active">
                            <img src="/asset-admin/img/keluar.png" alt="Logout Icon" class="iconmenu me-2">Keluar
                        </a>
                    </div>
                    
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0" id="page-title"></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                                
                                <img src="/asset-admin/img/ikonmantri.png" alt="" class="mantri mt-1 ">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="pengguna">Settings</a></li>
                                <li><a class="dropdown-item" href="/login">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            var el = document.getElementById("wrapper");
            var toggleButton = document.getElementById("menu-toggle");

            toggleButton.onclick = function () {
                el.classList.toggle("toggled");
            };

            
            var menuItems = document.querySelectorAll(".list-group-item");
            var pageTitle = document.getElementById("page-title");

            
            if (sessionStorage.getItem('page-title')) {
                pageTitle.textContent = sessionStorage.getItem('page-title');
            }

            menuItems.forEach(function (menuItem) {
                menuItem.addEventListener("click", function (event) {
                    var newTitle = this.getAttribute("data-title");
                    if (pageTitle && newTitle) {
                        pageTitle.textContent = newTitle;
                        sessionStorage.setItem('page-title', newTitle);
                    }
                });
            });
        });
    </script>

</body>

</html>