            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data pembayaran</h3><br>
                <!--button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> Tambah Data</button-->
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
                        <strong>Sukses..!</strong> <?=$pesan?>
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
                    <th>Total</th>
                    <th>Tanggal Transaksi</th>
                    <th>Tanggal Bayar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach($pembayaran as $data) { $i++;?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$data->nama?></td>
                    <td><?=$data->namabarang?></td>
                    <td><?=$data->harga?></td>
                    <td><?=$data->total_bayar?></td>
                    <td><?=$data->tanggal?></td>
                    <td><?=$data->tanggal_bayar?></td>
                    <td>
                        <form action="<?=site_url('pembayaran/del')?>" method="POST">
                            <a class="btn btn-sm btn-primary" href="<?=site_url('pembayaran/detail/').$data->id_pembayaran;?>"><i class="fa fa-eye"></i> Detail</a>
                            <input type="hidden" name="id_pembayaran" value="<?=$data->id_pembayaran?>">
                            <input type="hidden" name="id_transaksi" value="<?=$data->transaksi_id?>">
                            <button onclick="return confirm('Apakah anda yakin.!')" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Hapus</i></button>
                        </form>
                    </td>
                  </tr>

                  <?php };?>
                  </tbody>
                </table>
              </div>
            </div>



