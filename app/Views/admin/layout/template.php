<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="/asset-admin/css/styles.css">
    <title>Klinik</title>
    <style>
        
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <img src="/asset-admin/img/logoklinik.png" alt="" class="icon me-2">
            </div>
            <img src="/asset-admin/img/ikonmantri.png" alt="" class="iconmantri mt-3">
            <div class="list-group list-group-flush my-3">
                <div class="sidebar-item">
                    <a href="dashboard" class="sidebar-link" data-title="Dashboard">
                        <img src="/asset-admin/img/Home.png" alt="Dashboard Icon" class="iconmenu">
                        Dashboard
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="users-list" class="sidebar-link" data-title="Data Pasien">
                        <img src="/asset-admin/img/Pasien.png" alt="Projects Icon" class="iconmenu">
                        Data Pasien
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="obat-list" class="sidebar-link" data-title="Data Obat">
                        <img src="/asset-admin/img/obat.png" alt="Analytics Icon" class="iconmenu">
                        Data Obat
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="rekammedis-list" class="sidebar-link" data-title="Data Rekam Medis">
                        <img src="/asset-admin/img/Rekam Medis.png" alt="Reports Icon" class="iconmenu">
                        Data Rekam Medis
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="#" class="sidebar-link" data-title="Data Transaksi">
                        <img src="/asset-admin/img/transaksi.png" alt="Store Icon" class="iconmenu">
                        Data Transaksi
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#laporan-keuangan" aria-expanded="false" aria-controls="laporan-keuangan">
                        <img src="/asset-admin/img/Laporan.png" alt="Products Icon" class="iconmenu">
                        <span>Laporan Keuangan</span>
                    </a>
                    <ul id="laporan-keuangan" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="pendapatan" class="sidebar-link">Laporan Pemasukan</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="pengeluaran" class="sidebar-link">Laporan Pengeluaran</a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-item">
                    <a href="user-profile/1" class="sidebar-link" data-title="User">
                        <img src="/asset-admin/img/pengaturan.png" alt="Chat Icon" class="iconmenu">
                        User
                    </a>
                </div>

                <div class="sidebar-item">
                    <a href="/login" class="sidebar-link">
                        <img src="/asset-admin/img/keluar.png" alt="Logout Icon" class="iconmenu">
                        Keluar
                    </a>
                </div>
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
                                <img src="/asset-admin/img/ikonmantri.png" alt="" class="mantri mt-1">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuItems = document.querySelectorAll(".sidebar-link");
            const dropdownLinks = document.querySelectorAll(".sidebar-dropdown .sidebar-link");
            const pageTitle = document.getElementById("page-title");

            // Set page title from sessionStorage
            if (sessionStorage.getItem('page-title')) {
                pageTitle.textContent = sessionStorage.getItem('page-title');
            }

            // Add click event for main sidebar links
            menuItems.forEach(function (menuItem) {
                menuItem.addEventListener("click", function () {
                    // Remove 'active' class from all menu items
                    menuItems.forEach(function (item) {
                        item.classList.remove("active");
                    });
                    dropdownLinks.forEach(function (item) {
                        item.classList.remove("active");
                    });

                    // Add 'active' class to the clicked menu item
                    this.classList.add("active");

                    // Update page title
                    const newTitle = this.getAttribute("data-title");
                    if (pageTitle && newTitle) {
                        pageTitle.textContent = newTitle;
                        sessionStorage.setItem('page-title', newTitle);
                        sessionStorage.setItem('active-link', this.getAttribute('href'));
                    }
                });
            });

            // Add click event for dropdown links
            dropdownLinks.forEach(function (dropdownLink) {
                dropdownLink.addEventListener("click", function (event) {
                    // Prevent closing the dropdown
                    event.stopPropagation();

                    // Remove 'active' class from all menu items
                    menuItems.forEach(function (item) {
                        item.classList.remove("active");
                    });
                    dropdownLinks.forEach(function (item) {
                        item.classList.remove("active");
                    });

                    // Add 'active' class to the clicked dropdown link
                    this.classList.add("active");

                    // Update page title
                    const newTitle = this.textContent.trim();
                    if (pageTitle && newTitle) {
                        pageTitle.textContent = newTitle;
                        sessionStorage.setItem('page-title', newTitle);
                        sessionStorage.setItem('active-link', this.getAttribute('href'));
                        sessionStorage.setItem('dropdown-open', this.closest('.sidebar-dropdown').id);
                    }
                });
            });

            // Restore active state from sessionStorage
            const activeLink = sessionStorage.getItem('active-link');
            const dropdownOpen = sessionStorage.getItem('dropdown-open');
            if (activeLink) {
                menuItems.forEach(function (menuItem) {
                    if (menuItem.getAttribute('href') === activeLink) {
                        menuItem.classList.add("active");
                    }
                });
                dropdownLinks.forEach(function (dropdownLink) {
                    if (dropdownLink.getAttribute('href') === activeLink) {
                        dropdownLink.classList.add("active");
                        dropdownLink.closest('.sidebar-item').querySelector('.sidebar-link').classList.add("active");
                        if (dropdownOpen) {
                            const dropdownMenu = document.getElementById(dropdownOpen);
                            if (dropdownMenu) {
                                dropdownMenu.classList.add("show"); // Keep dropdown open
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>
