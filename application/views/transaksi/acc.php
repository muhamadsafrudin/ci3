<div class="card">
    <div class="card-header">
        <h5 class="ml-10">Detail Transaksi</h5>
        <a class="btn btn-success btn-sm float-right" href="<?=base_url()?>transaksi/"><i class=""></i> Kembali</a>
    </div>
    <div class="card-body row justify-content-center">
        <div class="col-md-8 ">
            <table class="table table-sm">
              <tr>
                <td>Status</td>
                <td><?=$transaksi->status == 1 ? 'sudah di Bayar' : 'belum di Bayar' ?></td>
              </tr>
              <tr>
                <td>Nama Pembeli</td>
                <td><?=$transaksi->nama?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?=$transaksi->alamat?></td>
              </tr>
              <tr>
                <td>No. Telp</td>
                <td><?=$transaksi->no_telp?></td>
              </tr>
              <tr>
                <td>Nama Product</td>
                <td><?=$transaksi->namabarang?></td>
              </tr>
              <tr>
                <td>Harga/1</td>
                <td><?=$transaksi->harga?></td>
              </tr>
              <tr>
                <td>Jumlah</td>
                <td><?=$transaksi->jumlah?></td>
              </tr>
              <tr>
                <td>Total Harga</td>
                <td><?=$transaksi->harga * $transaksi->jumlah?></td>
              </tr>
              <tr>
                <td>Ketrangan</td>
                <td><?=$transaksi->keterangan?></td>
              </tr>
              <tr>
                <td>Tanggal Transaksi</td>
                <td><?=$transaksi->tanggal?></td>
              </tr>
            </table>
            <div class="form-group">
              <form action="<?=site_url()?>transaksi/accept" method="POST">
                <input type="hidden" name="id_transaksi" value="<?=$transaksi->id_transaksi?>">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="tanggal_pembayaran" value="<?=date('d-M-Y')?>">
                <input type="hidden" name="total" value="<?=$transaksi->harga * $transaksi->jumlah?>">
                <input type="hidden" name="product_id" value="<?=$transaksi->product_id?>">
                <input type="hidden" name="pembeli_id" value="<?=$transaksi->pembeli_id?>">
                <?php if($transaksi->status != 1) {; ?>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> Accept</button>
                <?php }; ?>
              </form>
            </div>
        </div>  
    </div>
</div>