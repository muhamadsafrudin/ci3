<div class="card">
    <div class="card-header">
        <h5 class="ml-10">Tambah Transaksi</h5>
        <a class="btn btn-success btn-sm float-right" href="<?=base_url()?>transaksi/"><i class=""></i> Kembali</a>
    </div>
    <div class="card-body row justify-content-center">
        <div class="col-md-5 ">
            <form class="" action="<?=site_url()?>transaksi/add" method="POST" role="form" >
                  <div class="form-group">  
                      <label>Tanggal </label>
                      <input class="form-control" type="text" value="<?php echo date('d-M-Y')?>" disabled>
                      <input class="form-control" name="tanggal" type="hidden" value="<?php echo date('d-M-Y')?>">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Product *</label>
                      <select name="product_id" id="produc" class="form-control" required>
                        <option value=""></option>
                        <?php foreach($product as $pro) {;?>
                        <?php if($pro->stok > 0 ){; ?>
                          <option value="<?=$pro->id_product?>"><?=$pro->namabarang?></option>
                        <?php }};?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jumlah barang  *</label>
                        <input class="form-control" type="number" min="1" name="jumlah" value="" placeholder="jumlah.." required>
                    </div>
                  </div>         
                  <div class="form-group">
                    <label>Pembeli *</label>
                    <select name="pembeli_id" id="pembel" class="select   form-control" required> 
                      <option value=""></option> 
                      <?php foreach($pembeli as $pem) {;?>
                        <option value="<?=$pem->id_pembeli?>"><?=$pem->nama?></option>
                      <?php };?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="">Keterangan </label>
                      <textarea name="keterangan" class="form-control" id="" rows="3" required></textarea>
                    </div>  
                  <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Submit</button>
                        <button type="reset" class="btn btn-info btn-sm"><i class="fa fa-redo-alt"></i> Reset</button>
                  </div>
            </form>
        </div>  
       
    </div>
</div>