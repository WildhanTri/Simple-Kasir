<tr>
    <td>ID Produk</td>
    <td>:</td>
    <td><input type="text" class="form-control" id="idproduk"></td>
    <td><button type="button" class="btn" onclick="identifikasiProduk()">Go</button></td>
</tr>
<tr>
    <td>Nama Produk</td>
    <td>:</td>
    <td id="praNamaProduk"><?php echo $barang->nama_barang ?></td>
</tr>
<tr>
    <td>Harga Produk</td>
    <td>:</td>
    <td id="praHargaProduk"><?php echo $barang->harga_barang ?></td>
</tr>
<tr>
    <td>Stok Produk</td>
    <td>:</td>
    <td id="praStokProduk"><?php echo $barang->stok_barang ?></td>
</tr>
<tr>
    <td>Qty :</td>
    <td>:</td>
    <td><input type="number" class="form-control"></td>
</tr>