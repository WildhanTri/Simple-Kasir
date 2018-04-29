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
    <div id="wrapper">
        <?php $this->load->view('adder/header') ?>
        <?php $this->load->view('adder/sidebar') ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>Barang</h1>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php foreach($barang as $b) : ?>
                        <form action="<?php echo base_url(" index.php/kasir/prosesUbahBarang/ ".$b['id_barang']); ?>" method="post">
                            <table class="table table-stripped">
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" placeholder="Masukan Nama Barang Disini..." autocomplete="off" name="namabarang" value="<?php echo $b['nama_barang'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td>Kategori Barang</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="kategoribarang" required>
                                    <option disabled>Pilih Kategori...</option>
                                    <?php foreach($kategori as $k) : ?>
                                        <option value="<?php echo $k['id_kategori'] ?>" <?php echo $b['kategori_barang'] == $k['id_kategori'] ? "selected" : ""  ?>> <?php echo $k['nama_kategori'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Barang</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" placeholder="Masukan Harga Barang Disini..." autocomplete="off" name="hargabarang" value="<?php echo $b['harga_barang'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td>Stok Barang</td>
                                    <td>:</td>
                                    <td><input type="number" class="form-control" placeholder="Masukan Stok Barang Disini..." autocomplete="off" name="stokbarang" value="<?php echo $b['stok_barang'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" class="btn btn-success" value="Tambah">
                                        <a href="<?php echo base_url('index.php/kasir/menuBarang') ?>"><input type="button" class="btn btn-danger" value="batal"></a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('js') ?>

</html>
