<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Buku
    <small>Edit Data Buku</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Buku</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="callout callout-success" style="display: none">
    <h4>Selamat!</h4>
    <p>Berhasil Memperbaharui Data.</p>
  </div>
  <div class="callout callout-danger" style="display: none">
    <h4>Peringatan!</h4>
    <p></p>
  </div>
  <a href="<?php echo base_url('buku'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke List Buku</a>
  <form id="formInput" method="POST">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Buku</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" name="judul_buku" value="<?php echo $dataBuku['judul_buku']; ?>" class="form-control" placeholder="Masukan judul buku..." required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Pengarang</label>
              <input type="text" name="pengarang" value="<?php echo $dataBuku['pengarang']; ?>" class="form-control" placeholder="Masukan pengarang..." required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Penerbit</label>
              <input type="text" name="penerbit" value="<?php echo $dataBuku['penerbit']; ?>" class="form-control" placeholder="Masukan penerbit..." required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tahun Terbit</label>
              <input type="number" name="tahun_terbit" value="<?php echo $dataBuku['tahun_terbit']; ?>" class="form-control" placeholder="Masukan tahun terbit..." required>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix">
        <button type="submit" class="btn btn-success">Simpan Data Anggota</button>
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
<script>
$(function(){
  $("#formInput").submit(function(e){
    dataForm = $(this).serializeArray();
    $.ajax({
      method : 'POST',
      url : '<?php echo base_url("buku/".$dataBuku['kode_register']."/update");?>',
      data : dataForm,
      success : function(data){
        console.log(data);
        if(data){
          $('.callout-success').fadeIn();
          setTimeout(function(){ 
          $('.callout-success').fadeOut("slow");
          }, 3000);
        }else {
          $('.callout-danger').find('p').html("Gagal memperbaharui data");
          $('.callout-danger').fadeIn();
          setTimeout(function(){ 
          $('.callout-danger').fadeOut("slow");
          }, 3000); 
        }
      },
      error: function( json )
        {
          $('.callout-danger').find('p').html("Gagal memperbaharui data");
          $('.callout-danger').fadeIn();
          setTimeout(function(){ 
          $('.callout-danger').fadeOut("slow");
          }, 3000);          
        }
    })
    e.preventDefault();
  });
})
</script>