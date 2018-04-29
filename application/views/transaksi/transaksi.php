<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tables - Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
</head>
<?php $this->load->view('css') ?>
<style>
    .logo {
        background-color: #2899ce;
        color: white;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .l {
        border: 1px solid black;
    }

</style>

<body>
    <div id="wrapper" class="toggled">
        <?php $this->load->view('adder/header') ?>
        <?php $this->load->view('adder/sidebar') ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>Transaksi</h1>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-stripped">
                            <tr>
                                <th>Kode Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Harga Belanja</th>
                                <th>Jumlah Bayar</th>
                                <th>Jumlah Kembali</th>
                                <th>Nama Kasir</th>
                            </tr>
                            <?php if($transaksi != null) : ?>
                            <?php foreach($transaksi as $t) : ?>
                            <tr>
                                <td>
                                    <?php echo $t['id_transaksi'] ?>
                                </td>
                                <td>
                                    <?php echo $t['created_on'] ?>
                                </td>
                                <td>
                                    <?php echo "Rp. ".$t['total_harga_belanja'] ?>
                                </td>
                                <td>
                                    <?php echo "Rp. ".$t['jumlah_bayar'] ?>
                                </td>
                                <td>
                                    <?php echo "Rp. ".  $t['jumlah_kembali'] ?>
                                </td>
                                <td>
                                    <?php echo $t['username'] ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php else : ?>
                            <tr>
                                <td colspan="4" style="text-align:center">Data Kosong.</td>
                            </tr>
                            <?php endif ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<?php $this->load->view('js') ?>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>

</html>
