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
