<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Data User</h4>
                    <a class="btn btn-success btn-sm" href="<?php echo base_url()?>user/add"><i class="fas fa-plus"></i> Tambah</a><br>
                </div>
                <div class="card-body">
                   
                    <table class="table table-hover tabel-responsive">
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        <?php foreach($users->result() as $key => $list ){; ?>
                            <?php
                            if($list->level==1){
                                $level = "Admin";
                            }else{
                                $level = "Petugas";
                            }
                            ?>
                        <tr>
                            <td><?=$list->name?></td>
                            <td><?=$list->username?></td>
                            <td><?=$list->alamat?></td>
                            <td><?=$level?></td>
                            <td>
                                <form action="<?=site_url('user/del')?>" method="post">
                                <?php if($list->username != "admin") {?>
                                    <a class="btn btn-primary btn-sm" href="<?=site_url('user/edit/').$list->id?>"><i class="fa fa-edit"></i> Edit</a>
                                    <input type="hidden" name="id" value="<?=$list->id?>">
                                    <button onclick="return confirm('apakah anda yakin..!')" class="btn btn-danger btn-sm" href=""><i class="fas fa-trash"></i> Hapus</button>
                                <?php } else { ?>
                                    Tidak ada Aksi
                                <?php }?>
                            </form>
                            </td>
                        </tr>
                        <?php };?>
                    </table>
                </div>
            </div>
      </div>
    </div>
</div>