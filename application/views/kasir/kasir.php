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

    .table-praProduk tr td {
        padding: 5px;
        text-align: left;
    }

</style>

<body>
    <div id="wrapper" class="toggled">
        <?php $this->load->view('adder/header') ?>
        <?php $this->load->view('adder/sidebar') ?>
        <div class="main-panel">
            <div class="content" style="padding:0px; background-color:white">
                <div class="container-fluid" style="padding:0px">
                    <!--
                    <div class="row" style="padding:10px 30px">
                        <div class="col-md-10">
                            <h1>Kasir</h1>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    -->
                    <div class="panel-body text-center">
                        <div class="row">
                            <div class="col-md-6" style="">
                                <div class="col-md-5" style="position:fixed; width:41%; border-right:1px solid #eaeaea; box-shadow:1px 2px 2px 1px #eaeaea; height:100%; background:white; overflow:auto; max-height:100%";>
                                    <div class="col-md-12 well">

                                        <select class="form-control" id="camera-select" style="display:none"></select>
                                        <div class="form-group" style="padding-top:0px">
                                            <!--
                            <input id="image-url" type="text" class="form-control" placeholder="Image url">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><i class="fa fa-upload"></i></button>
                                    <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><i class="fa fa-save"></i></button>-->
                                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><i class="fa fa-play"></i></button>
                                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><i class="fa fa-pause"></i></button>
                                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><i class="fa fa-stop"></i></button>
                                        </div>
                                    </div>
                                    <div class="well" style="position: relative;display: inline-block;">
                                        <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                                    </div>
                                    <div class="well" style="padding-bottom:20px">
                                        <table class="table table-praProduk" id="praBarang" style="">
                                            <tr>
                                                <td>ID Produk</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control IDProduk" id="scanned-QR">
                                                </td>
                                                <td><button type="button" class="btn" onclick="identifikasiProduk()">Clear</button></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Produk</td>
                                                <td>:</td>
                                                <td id="praNamaProduk">none</td>
                                            </tr>
                                            <tr>
                                                <td>Harga Produk</td>
                                                <td>:</td>
                                                <td id="praHargaProduk">none</td>
                                            </tr>
                                            <tr>
                                                <td>Stok Produk</td>
                                                <td>:</td>
                                                <td id="praStokProduk">none</td>
                                            </tr>
                                            <tr>
                                                <td>Qty :</td>
                                                <td>:</td>
                                                <td><input type="number" class="form-control" id="praQtyProduk"></td>
                                                <td><button type="button" class="btn btn-success" onclick="sendToCart()">Send</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-right:60px">
                                <form action="<?php echo base_url('index.php/kasir/konfirmasiBelanja') ?>" method="post">
                                    <div style="overflow:auto; max-height:345px">
                                        <table class="table">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Quantity</th>
                                                <th>Total Harga</th>
                                            </tr>
                                            <tr id="totalbelanja">
                                            </tr>
                                            <tr>
                                                <td colspan="5"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!--
                            <div class="thumbnail" id="result">
                                <div class="well">
                                    <img width="320" height="240" id="scanned-img" src="">
                                </div>
                                <div class="caption">
                                    <h3>Scanned result</h3>
                                    <p id=""></p>
                                </div>
                            </div>
-->
                                    <div style="position:relative; width:100%">
                                        <div class="" style="position:fixed; max-width:inherit; width:37%; bottom:0px; padding:20px">
                                            <table class="table">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><input type="hidden" name="inputtotalharga" value="" id="inputtotalharga"></td>
                                                    <td>Total Harga :</td>
                                                    <td id="totalHarga"><b>Rp.0</b></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Jumlah Bayar :</td>
                                                    <td><input type="text" class="form-control" placeholder="Masukan Jumlah Uang..." autocomplete="off" id="inputjumlahbayar" name="inputjumlahbayar" value="0" onkeyup="hitungJumlahKembali()"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Jumlah Kembali :</td>
                                                    <td><input type="text" class="form-control" placeholder="Jumlah Kembalian..." autocomplete="off" id="inputjumlahkembali" name="inputjumlahkembali" readonly></td>
                                                </tr>
                                            </table>
                                            <input type="submit" class="btn btn-success" style="width:100%" value="Konfirmasi Belanja" />

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('js') ?>
<script src="<?php echo base_url();?>assets/webcodecamjs/js/filereader.js"></script>
<script src="<?php echo base_url();?>assets/webcodecamjs/js/qrcodelib.js"></script>
<script src="<?php echo base_url();?>assets/webcodecamjs/js/webcodecamjquery.js"></script>
<script src="<?php echo base_url();?>assets/webcodecamjs/js/mainjquery.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
        $(".IDProduk").keyup(function() {
            identifikasiProduk(); // Panggil function search
        });
        $(".IDProduk").on('keydown change', function() {
            identifikasiProduk(); // Panggil function search
        });
        if (identifikasiProduk() == "success") {
            alert('barang ditemukan!');
        }
    });

    function identifikasiProduk() {

        var idproduk = $(".IDProduk").val();
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url().'index.php/kasir/identifikasiProduk/' ?>" + idproduk,
            success: function(response) {
                $("#praNamaProduk").text(response.nama_barang);
                $("#praHargaProduk").text(response.harga_barang);
                $("#praStokProduk").text(response.stok_barang);
                if (response.status == "success") {
                    $("#praQtyProduk").val("1");
                } else {
                    $("#praQtyProduk").val("");
                }

            }
        });

    }

    function hitungTotalBelanja() {
        totalharga = 0;

        $(".totalHarga").each(function(index) {
            totalharga += parseInt($(this).text());
        });
        return totalharga;
    }

    function sendToCart() {
        var belanja = "<tr>" +
            "<td>" +
            $(".IDProduk").val() + "<input type='hidden' value='" + $(".IDProduk").val() + "' name='idproduk[]'>" +
            "</td>" +
            "<td>" +
            $("#praNamaProduk").text() +
            "</td>" +
            "<td>" +
            $("#praHargaProduk").text() +
            "</td>" +
            "<td>" +
            $("#praQtyProduk").val() + "<input type='hidden' value='" + $("#praQtyProduk").val() + "' name='qtyproduk[]'>" +
            "</td>" +
            "<td class='totalHarga'>" +
            $("#praHargaProduk").text() * $("#praQtyProduk").val() +
            "</td>";
        var txt1 = "<p>Text.</p>";
        $("#totalbelanja").before(belanja);
        var totalharga = hitungTotalBelanja();
        $("#inputtotalharga").val(totalharga);
        $("#totalHarga").html("<b>Rp." + totalharga + "</b>");
        hitungJumlahKembali();
    }

    function hitungJumlahKembali() {
        var jumlahbayar = $("#inputjumlahbayar").val();
        var totalharga = $("#inputtotalharga").val();
        $("#inputjumlahkembali").val(parseInt(jumlahbayar) - parseInt(totalharga));
        if ($("#inputjumlahkembali") == "NaN") {
            $("#inputjumlahkembali").val("0");
        }
    }

</script>

</html>
