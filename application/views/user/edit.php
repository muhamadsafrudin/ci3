<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit data Users</h4>
                    <a class="btn btn-primary btn-sm float-right" href="<?php echo base_url()?>user/"><i class="fa fa-undo"></i> Kembali</a><br>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <form action="" method="POST">
                                <input type="hidden" name="id"value="<?=$user->id?>">
                                <div class="form-group has-error">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" value="<?=$this->input->post('name') ?? $user->name?>" class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('name');?> </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="<?=$this->input->post('username') ?? $user->username?>"  class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('username');?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label><small> (Biarkan kosong jika tidak diganti)</small>
                                    <input type="password" name="password" value="<?=set_value('password')?>"  class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('password');?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Konfirmasi Password</label>
                                    <input type="password" name="konfir" value="<?=set_value('konfir')?>"  class="form-control">
                                    <span class="help-block text-danger"><?php echo form_error('konfir');?></span>
                                </div>
                               <div class="form-group">
                                   <label for="">Alamat</label>
                                   <!--input class="form-control" type="text" name="alamat" value="<?=$this->input->post('alamat') ?? $user->alamat?>"-->
                                   <textarea rows="4" name="alamat" class="form-control"><?=$this->input->post('alamat') ?? $user->alamat?></textarea>
                                </div>
                               <div class="form-group">
                                   <label for="">Level</label>
                                   <select class="form-control" name="level" id="">
                                       <?php $level = $this->input->post('level') ? $this->input->post('level') : $user->level ?>
                                        
                                        <option value="1" >Admin</option>
                                        <option value="2" <?=$level == 2 ? 'selected' : null ?>>Petugas</option>
                                   </select>
                                   <span class="help-block text-danger"><?php echo form_error('level');?></span>
                               </div>
                               <div class="form-group">
                                   <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                   <button class="btn btn-info btn-sm" type="reset">Reset</button>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>