<div class="card">
    <div class="card-header">
        <h5 class="ml-10">Edit Transaksi</h5>
        <a class="btn btn-success btn-sm float-right" href="<?=base_url()?>transaksi/"><i class=""></i> Kembali</a>
    </div>
    <div class="card-body row justify-content-center">
        <div class="col-md-5 ">
            <form class="" action="<?=site_url('transaksi/update')?>" method="POST" role="form" >
              <input type="hidden" name="id_transaksi" value="<?=$transaksi->id_transaksi?>">
                  <div class="form-group">  
                      <label>Tanggal Transaksi</label>
                      <input class="form-control" type="text" value="<?=$transaksi->tanggal?>" disabled>
                      <input class="form-control" name="tanggal" type="hidden" value="<?=$transaksi->tanggal?>">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Product *</label>
                      <input type="hidden" name="product_id" value="<?=$transaksi->product_id?>">
                        <?php foreach($product as $pro) {;?>
                          <?php if($pro->id_product == $transaksi->product_id ){;  ?>
                          <input class="form-control" value="<?=$pro->namabarang?>" disabled>
                        <?php }};?>
                      </select disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jumlah barang  *</label>
                        <input class="form-control" type="number" min="" name="jumlah" value="<?=$transaksi->jumlah?>" placeholder="jumlah..">
                    </div>
                  </div>         
                  <div class="form-group">
                    <label>Pembeli *</label>
                    <select name="pembeli_id" id="pembel" class="select   form-control"> 
                      <?php foreach($pembeli as $pem) {;?>
                        <option value="<?=$pem->id_pembeli?>" <?=$transaksi->pembeli_id == $pem->id_pembeli ? 'selected' : '' ?> ><?=$pem->nama?></option>
                      <?php };?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="">Keterangan </label>
                      <textarea name="keterangan" class="form-control" id="" rows="3"><?=$transaksi->ket?></textarea>
                    </div>  
                  <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Submit</button>
                        <button type="reset" class="btn btn-info btn-sm"><i class="fa fa-redo-alt"></i> Reset</button>
                  </div>
            </form>
        </div>  
       
    </div>
</div>