    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tabel Data Transaksi</h3><br>
        <a class="btn btn-success btn-sm" href="<?=base_url()?>transaksi/create"><i class="fas fa-plus"></i>Tambah</a>
      </div>
      <?php  
      $pesan = $this->session->flashdata('message');
      $cek = $this->session->flashdata('check');
      if($cek == 1 ) {
          $cek = "alert-success";
      }else if($cek == 2 ) {
            $cek = "alert-primary";
      }else {
          $cek = "alert-danger";
      }
      if($pesan){ ;?>
            <div id="hilang" class="alert <?=$cek;?>  alert-dismissible fade show" role="alert">
                <strong></strong> <?=$pesan?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <?php } ?>
    
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Nama Pembeli</th>
            <th>Nama barang</th>
            <th>Harga/1</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tanggal Transaksi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach($transaksi as $data) { $i++ ;?>
              <?php
              if($data->ket == '' ){
                $k = '<i>tidak ada</i>';
              }else{
                $k = $data->ket;
              }
              ?>
              <?php if($data->hapus != 1 ) {; ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$data->nama?></td>
            <td><?=$data->namabarang?></td>
            <td><?=$data->harga?></td>
            <td><?=$data->jumlah?></td>
            <td><?=$data->status == 1 ? 'sudah di Bayar' : 'Belum di Bayar' ?></td>
            <td><?=$data->tanggal?></td>
            <td><?=$k?></td>
            <td>
              <div>
                <form action="<?=site_url('transaksi/del')?>" method="POST">
                  <input type="hidden" name="id_transaksi" value="<?=$data->id_transaksi?>">
                  <input type="hidden" name="hapus" value="1">
                  <a href="<?=base_url()?>transaksi/acc/<?=$data->id_transaksi?>" class="btn <?=$data->status == 1 ? 'btn-success' : 'btn-warning'?> btn-sm" ><i class="fa fa-check-circle"></i></a>
                  <a href="<?=base_url()?>transaksi/detail/<?=$data->id_transaksi?>" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i></a>
                  <?php if($data->status != 1 ){;  ?>
                  <a href="<?=base_url()?>transaksi/edit/<?=$data->id_transaksi?>" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></a>
                  <?php } else {;?>
                  <button onclick="return confirm('Apakah anda yakin.!')" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> </i></button>
                  <?php }; ?>
                </form>
              </div>
            </td>
          </tr>
        <?php }};?>
        </tbody>
      </table>
    </div>
  </div>



