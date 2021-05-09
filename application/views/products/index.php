            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Produk</h3><br>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> Tambah Data</button>
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
                    <th>Nama Barang</th>
                    <th>Gambar</th>
                    <th>Harga/1</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach($products->result() as $key => $data) { $i++;?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$data->namabarang?></td>
                    <td>
                      <div style="margin: 2px; height: 100px;width: 100px;">
                        <img width="100%" height="100%" src="<?=base_url()?>/upload/products/<?=$data->gambar?>">
                      </div>
                    </td>
                    <td><?=$data->harga?></td>
                    <td><?=$data->stok?></td>
                    <td><?=$data->keterangan?></td>
                    <td><?=$data->nama?></td>
                    <td>
                        <form action="<?=site_url('products/del')?>" method="POST">
                            <input type="hidden" name="id_product" value="<?=$data->id_product?>">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?=$data->id_product;?>"><i class="fas fa-edit"></i> Edit</button>
                            <button type="submit" onclick="return confirm('apakah anda yakin akan menghapus data ini..!')" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Hapus</i></button>
                        </form>
                    </td>
                  </tr>
                  <!--modal edit-->
                  <div class="modal fade" id="modal-edit<?=$data->id_product;?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Product</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                              <div class="card card-default ">
                                <div class="card-header">
                                  <h3 class="card-title"><small></small></h3>
                                </div>
                                <form action="<?=site_url('products/edit')?>" method="POST" enctype="multipart/form-data">
                                  <div class="card-body">
                                    <input type="hidden" name="id_product" value="<?=$data->id_product?>">
                                    <div class="form-group">
                                      <label>Nama Barang *</label>
                                      <input type="text" name="namabarang" class="form-control" placeholder="Nama barang.." value="<?=$data->namabarang?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Harga *</label>
                                      <input type="number" name="harga" class="form-control" placeholder="Harga.." value="<?=$data->harga;?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Stok *</label>
                                      <input type="number" name="stok" class="form-control" placeholder="Stok.." value="<?=$data->stok;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan *</label>
                                        <textarea name="keterangan" class="form-control"  placeholder="Keterangan" required><?=$data->keterangan?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Gambar</label>
                                      <div style="margin: 5px; height: 100px;width: 100px;">
                                        <img width="100%" height="100%" src="<?=base_url()?>/upload/products/<?=$data->gambar?>">
                                      </div>
                                      <input type="hidden" name="cek_gambar" value="<?=$data->gambar?>">
                                      <input type="file" name="gambar" class="form-control">
                                      <small>( jika gambar tidak di ubah biarkan saja )</small>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Supplier *</label>
                                    <select class="form-control" name="supplier_id" >
                                      <?php $sup = $data->supplier_id?>
                                        <?php foreach($suppliers->result() as $key => $data) {;?>
                                        <option value="<?=$data->id?>"  <?=$sup == $data->id ? 'selected' : '' ?> ><?=$data->nama?></option>
                                        <?php };?>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end modal edit-->
                    <?php };?>
                  </tbody>
                </table>
              </div>
            </div>
<!-- Modal tambah -->
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Product</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card card-default ">
                            <div class="card-header">
                              <h3 class="card-title"><small></small></h3>
                            </div>
                            <form action="<?=site_url('products/add')?>" method="POST" role="form" enctype="multipart/form-data">
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Nama Barang *</label>
                                  <input type="text" name="namabarang" class="form-control" placeholder="Nama barang.." required>
                                </div>
                                <div class="form-group">
                                  <label>Harga *</label>
                                  <input type="number" name="harga" class="form-control" placeholder="Harga.." required>
                                </div>
                                <div class="form-group">
                                      <label>Stok *</label>
                                      <input type="number" name="stok" class="form-control" placeholder="Stok.." value="" required>
                                    </div>
                                <div class="form-group">
                                  <label>Keterangan *</label>
                                  <textarea name="keterangan" class="form-control"  placeholder="Keterangan" required></textarea>
                                </div>
                                <div class="form-group">
                                  <label>Gambar</label>
                                  <input type="file" name="gambar" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Supplier *</label>
                                  <select class="form-control" name="supplier_id" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach($suppliers->result() as $key => $data) {;?>
                                    <option value="<?=$data->id?>"><?=$data->nama?></option>
                                    <?php };?>
                                  </select>
                                </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
<!--end modal tambah-->

