<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Buku
    <small>Tambah Data Buku</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Detail Peminjaman</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="callout callout-success" style="display: none">
    <h4>Selamat!</h4>
    <p>Berhasil Tambah Data.</p>
  </div>
  <div class="callout callout-danger" style="display: none">
    <h4>Peringatan!</h4>
    <p></p>
  </div>
  <a href="<?php echo base_url('peminjaman/detail_peminjaman/'.$kode_pinjam); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke List Detail Peminjaman</a>
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
              <select name="kode_register" id="" class="form-control">
                <?php foreach($dataBuku as $buku){ ?>
                  <option value="<?php echo $buku->kode_register; ?>"><?php echo $buku->judul_buku ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Peminjaman</label>
              <input type="date" name="tgl_pinjam" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Pengembalian ( Diisi ketika buku dikembalikan )</label>
              <input type="date" name="tgl_kembali" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix">
        <button type="submit" class="btn btn-success">Tambah Data Peminjaman Buku</button>
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
      url : '<?php echo base_url("peminjaman/detail_peminjaman/".$kode_pinjam."/store");?>',
      data : dataForm,
      success : function(data){
        if(data){
          $('.callout-success').fadeIn();
          setTimeout(function(){ 
          $('.callout-success').fadeOut("slow");
          }, 3000);
          $('#formInput')[0].reset();
        }else {
          $('.callout-danger').find('p').html("Gagal menambah data");
          $('.callout-danger').fadeIn();
          setTimeout(function(){ 
          $('.callout-danger').fadeOut("slow");
          }, 3000); 
        }
      },
      error: function( json )
        {
          $('.callout-danger').find('p').html("Gagal menambah data");
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