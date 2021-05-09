<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add data Users</h4>
                    <a class="btn btn-primary btn-sm float-right" href="<?php echo base_url()?>user/"><i class="fa fa-undo"></i> Kembali</a><br>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <form action="" method="POST">
                                <div class="form-group has-error">
                                    <label for="">Nama *</label>
                                    <input type="text" name="name" value="<?=set_value('name')?>" class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('name');?> </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Username *</label>
                                    <input type="text" name="username" value="<?=set_value('username')?>"  class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('username');?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Password *</label>
                                    <input type="password" name="password" value="<?=set_value('password')?>"  class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('password');?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Konfirmasi Password *</label>
                                    <input type="password" name="konfir" value="<?=set_value('konfir')?>"  class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('konfir');?></span>
                                </div>
                               <div class="form-group">
                                   <label for="">Alamat</label>
                                   <textarea name="alamat" row="4" class="form-control"><?=set_value('alamat')?></textarea>
                                </div>
                               <?php
                               if(set_value('level') == 1){
                                   $a = "selected='selected'";
                                   $b = "null";
                               }else if(set_value('level') == 2){
                                $a = "";
                                $b = "selected='selected'";
                               }else{
                                $a = "null";
                                $b = "null";
                               }
                               ?>
                               <div class="form-group">
                                   <label for="">Level *</label>
                                   <select class="form-control" name="level" id="">
                                        <option value="">-pilih-</option>
                                        <option value="1" <?=$a;?>>Admin</option>
                                        <option value="2" <?=$b;?>>Petugas</option>
                                   </select>
                                   <span class="help-block text-danger"><?php echo form_error('level');?></span>
                               </div>
                               <div class="form-group">
                                   <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                   <a class="btn btn-info btn-sm" href="<?=site_url('user/add');?>">Reset</a>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>