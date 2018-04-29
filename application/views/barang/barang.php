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
    
    .sort tr th{
        cursor: pointer;
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
                            <a href="<?php echo base_url('index.php/kasir/tambahBarang') ?>"><button class="btn btn-info">Tambah Barang</button></a>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding:0px; background-color:white" style="">
                        <form action="<?php base_url(" index.php/kasir/prosesSearchBarang ") ?>" method="post">
                            <table class="table">
                                <tr>

                                    <td>Search :</td>
                                    <td><input type="text" class="form-control" placeholder="Masukan Kata Kunci..." autocomplete="off" /></td>
                                    <td><input type="submit" class="btn btn-success" autocomplete="off" value="Search" /></td>

                                    <td><button type="button" class="btn btn-info" style="width:100%">Filter</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <table class="table table-stripped" style="background:white" id="databarang">
                        <thead class="thead-dark sort">
                            <tr>
                                <th onclick="prosesSortBarang('id_barang', 'DESC', this)" id="sortByID">ID</th>
                                <th onclick="prosesSortBarang('nama_barang', 'DESC', this)" id="sortByNama">Nama Barang</th>
                                <th onclick="prosesSortBarang('stok_barang', 'DESC', this)" id="sortByStok">Stok</th>
                                <th onclick="prosesSortBarang('harga_barang', 'DESC', this)" id="sortByHarga">Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php if($barang != null) : ?>
                        <?php foreach($barang as $b) : ?>
                        <tr class="rowdata">
                            <td>
                                <?php echo $b['id_barang'] ?>
                            </td>
                            <td>
                                <?php echo $b['nama_barang'] ?>
                            </td>
                            <td>
                                <?php echo $b['stok_barang'] ?>
                            </td>
                            <td>
                                <?php echo $b['harga_barang'] ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('index.php/kasir/editBarang/'.$b['id_barang']) ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                <a href="<?php echo base_url('index.php/kasir/prosesHapusBarang/'.$b['id_barang']) ?>"><button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></a>
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
</body>
<?php $this->load->view('js') ?>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    function prosesSearchBarang() {
        $.ajax({
            type: 'GET',
            data: "",
            url: "<?php echo base_url().'index.php/kasir/prosesSearchBarang/' ?>",
            success: function(response) {

            }
        });

    }

    function prosesSortBarang(sortBy, sortType, column) {
        $.ajax({
            type: 'POST',
            data: {
                "sortBy": sortBy,
                "sortType": sortType
            },
            
            url: "<?php echo base_url().'index.php/kasir/prosesSortBarang/' ?>",
            success: function(response) {
                $(".rowdata").remove();
                $("#databarang").append(response);
            }
        });
        if(sortType == "ASC"){
            $(column).attr("onclick","prosesSortBarang('"+sortBy+"', 'DESC', this)");
        }else{
            $(column).attr("onclick","prosesSortBarang('"+sortBy+"', 'ASC', this)");
        }

    }

</script>
</html>
