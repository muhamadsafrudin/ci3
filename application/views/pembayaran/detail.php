<div class="card">
    <div class="card-header">
        <h5 class="ml-10">Detail pembayaran</h5>
        <a class="btn btn-success btn-sm float-right" href="<?=base_url()?>pembayaran/"><i class=""></i> Kembali</a>
    </div>
    <div class="card-body row justify-content-center">
        <div class="col-md-8 ">
            <table class="table table-sm">
              <tr>
                <td>Status</td>
                <td><?=$pembayaran->status == 1 ? 'sudah di Bayar' : 'belum di Bayar' ?></td>
              </tr>
              <tr>
                <td>Nama Pembeli</td>
                <td><?=$pembayaran->nama?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?=$pembayaran->alamat?></td>
              </tr>
              <tr>
                <td>No. Telp</td>
                <td><?=$pembayaran->no_telp?></td>
              </tr>
              <tr>
                <td>Nama Product</td>
                <td><?=$pembayaran->namabarang?></td>
              </tr>
              <tr>
                <td>Harga/1</td>
                <td><?=$pembayaran->harga?></td>
              </tr>
              <tr>
                <td>Jumlah</td>
                <td><?=$pembayaran->jumlah?></td>
              </tr>
              <tr>
                <td>Total Harga</td>
                <td><?=$pembayaran->harga * $pembayaran->jumlah?></td>
              </tr>
              <tr>
                <td>Ketrangan</td>
                <td><?=$pembayaran->keterangan?></td>
              </tr>
              <tr>
                <td>Tanggal Transaksi</td>
                <td><?=$pembayaran->tanggal?></td>
              </tr>
              <tr>
                <td>Tanggal pembayaran</td>
                <td><?=$pembayaran->tanggal_bayar?></td>
              </tr>
            </table>
        </div>  
       
    </div>
</div>