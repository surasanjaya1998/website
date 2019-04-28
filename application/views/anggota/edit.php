<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Petugas
    <small>Edit Data Petugas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Petugas</li>
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
  <a href="<?php echo base_url('anggota'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke List Petugas</a>
  <form id="formInput" method="POST">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Anggota</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?php echo $dataAnggota['nama']; ?>" class="form-control" placeholder="Masukan nama..." required>
            </div>
            <div class="form-group">
              <label>Prodi</label>
              <input type="text" name="prodi" class="form-control" value="<?php echo $dataAnggota['prodi']; ?>" placeholder="Masukan Prodi..." required>
            </div>
            <div class="form-group">
              <label>Jenjang</label>
              <select name="jenjang" id="" class="form-control">
                <option value="D1" <?php echo $dataAnggota['jenjang'] == 'D1'? 'selected' : ''?>>D1</option>
                <option value="D3" <?php echo $dataAnggota['jenjang'] == 'D3'? 'selected' : ''?>>D3</option>
                <option value="D4" <?php echo $dataAnggota['jenjang'] == 'D4'? 'selected' : ''?>>D4</option>
                <option value="S1" <?php echo $dataAnggota['jenjang'] == 'S1'? 'selected' : ''?>>S1</option>
                <option value="S2" <?php echo $dataAnggota['jenjang'] == 'S2'? 'selected' : ''?>>S2</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat..." required value="<?php echo $dataAnggota['alamat']; ?>">
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
      url : '<?php echo base_url("anggota/".$dataAnggota['kode_anggota']."/update");?>',
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