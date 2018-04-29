<!--
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">Kasir</a>
        </li>
        <li>
            <a href="<?php // echo base_url('index.php/kasir') ?>">Dashboard</a>
        </li>
        <li>
            <a href="<?php // echo base_url('index.php/kasir/menuKasir') ?>">Kasir</a>
        </li>
        <li>
            <a href="<?php // echo base_url('index.php/kasir/menuBarang') ?>">Barang</a>
        </li>
        <li>
            <a href="<?php // echo base_url('index.php/kasir/menuTransaksi') ?>">Transaksi</a>
        </li>
        <li>
            <a href="<?php // echo base_url('index.php/kasir/logout') ?>">Log Out</a>
        </li>
    </ul>
</div>
-->
<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="../assets/img/profile.jpg">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Hizrian
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item <?php echo $page == "Home" ? "active" : "" ?>" >
                <a href="<?php echo base_url('index.php/kasir') ?>">
                    <i class="la la-dashboard"></i>
                        <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>
            <li class="nav-item <?php echo $page == "MenuKasir" ? "active" : "" ?>" >
                <a href="<?php echo base_url('index.php/kasir/menuKasir') ?>">
                    <i class="la la-table"></i>
                        <p>Kasir</p>
                    <span class="badge badge-count">14</span>
                </a>
            </li>   
            <li class="nav-item <?php echo $page == "MenuBarang" ? "active" : "" ?>">
                <a href="<?php echo base_url('index.php/kasir/menuBarang') ?>">
                    <i class="la la-keyboard-o"></i>
                        <p>Barang</p>
                    <span class="badge badge-count">50</span>
                </a>
            </li>
            <li class="nav-item <?php echo $page == "MenuTransaksi" ? "active" : "" ?>">
                <a href="<?php echo base_url('index.php/kasir/menuTransaksi') ?>">
                    <i class="la la-th"></i>
                        <p>Transaksi</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('index.php/kasir/logout') ?>">
                    <i class="la la-bell"></i>
                        <p>Log Out</p>
                    <span class="badge badge-success">3</span>
                </a>
            </li>
        </ul>
    </div>
</div>
