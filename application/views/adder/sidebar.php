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
            <div class="info" style="color:black">
                    <?php echo $this->session->userdata('nama'); ?>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item <?php echo $page == " MenuKasir " ? "active " : " " ?>">
                <a href="<?php echo base_url('index.php/kasir/menuKasir') ?>">
                    <i class="fa fa-money-bill-alt "></i>
                        <p>Kasir</p>
                </a>
            </li>
            <li class="nav-item <?php echo $page == " MenuBarang " ? "active " : " " ?>">
                <a href="<?php echo base_url('index.php/kasir/menuBarang') ?>">
                    <i class="fa fa-briefcase"></i>
                        <p>Barang</p>
                </a>
            </li>
            <li class="nav-item <?php echo $page == " MenuTransaksi " ? "active " : " " ?>">
                <a href="<?php echo base_url('index.php/kasir/menuTransaksi') ?>">
                    <i class="fa fa-exchange-alt "></i>
                        <p>Transaksi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('index.php/kasir/logout') ?>">
                    <i class="fa fa-sign-out-alt"></i>
                        <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>
</div>
