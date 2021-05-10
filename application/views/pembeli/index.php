            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Pembeli</h3><br>
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
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach($pembeli as $data) { $i++;?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$data->nama?></td>
                    <td><?=$data->jk?></td>
                    <td><?=$data->no_telp?></td>
                    <td><?=$data->alamat?></td>
                    <td>
                        <form action="<?=site_url('pembeli/del')?>" method="POST">
                            <input type="hidden" name="id_pembeli" value="<?=$data->id_pembeli?>">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?=$data->id_pembeli?>"><i class="fas fa-edit"></i> Edit</button>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Hapus</i></button>
                        </form>
                    </td>
                  </tr>
                  <!--modal edit-->
                  <div class="modal fade" id="modal-edit<?=$data->id_pembeli?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Supplier</h4>
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
                                <form action="<?=site_url('pembeli/edit')?>" method="POST" role="form">
                                <input type="hidden" name="id_pembeli" value="<?=$data->id_pembeli?>">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label>Nama *</label>
                                      <input type="text" name="nama" class="form-control" require value="<?=$data->nama?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Jenis Kelamin *</label>
                                      <select name="jk" id="" class="form-control" required>
                                        <option value="L" <?=$data->jk == 'L' ? 'selected' : ''?>>Laki-laki</option>
                                        <option value="P" <?=$data->jk == 'P' ? 'selected' : ''?>>Perempuan</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>No Telp *</label>
                                      <input type="number" name="no_telp" class="form-control" require value="<?=$data->no_telp;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat *</label>
                                        <textarea name="alamat" class="form-control"  require><?=$data->alamat?></textarea>
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
                      <h4 class="modal-title">Tambah Data Pembeli</h4>
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
                            <form action="<?=site_url('pembeli/add')?>" method="POST" role="form" >
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Nama *</label>
                                  <input type="text" name="nama" class="form-control" placeholder="Nama..." required>
                                </div>
                                <div class="form-group">
                                  <label>Jenis Kelamin *</label>
                                  <select name="jk" id="" class="form-control" required>
                                    <option value="">-pilih-</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>No Telp *</label>
                                  <input type="number" name="no_telp" class="form-control" placeholder="No telp.." required >
                                </div>
                                <div class="form-group">
                                    <label>Alamat *</label>
                                    <textarea name="alamat" class="form-control"  placeholder="Alamat.." required></textarea>
                                  </div>
                              </div>
                              <!-- /.card-body -->
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
<!--end modal tambah-->

