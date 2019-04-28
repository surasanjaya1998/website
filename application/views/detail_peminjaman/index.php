<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Peminjaman
    <small>List Peminjaman</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Peminjaman</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <a href="<?php echo base_url('peminjaman'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke List Peminjaman</a>
  <!-- List Data -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">List Peminjaman</h3>
      <a href="<?php echo base_url(). 'peminjaman/detail_peminjaman/'.$kode_pinjam.'/create'; ?>" class="btn btn-success btn-linking">Tambah Data Buku</a>
      <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool"  data-toggle="tooltip" title="Collapse">
          <i class="fa fa-refresh" onclick="refreshTable('#tableData')"></i></button>
        <button type="button" class="btn btn-box-tool" id="btn-collapse" onclick="collapseBox(this)" title="Collapse">
          <i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table id="tableData" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode Pinjam</th>
              <th>Kode Register</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($dataDetailPeminjaman as $peminjaman){ ?>
              <tr>
                <td><?php echo $peminjaman->kode_pinjam; ?></td>
                <td><?php echo $peminjaman->kode_register; ?></td>
                <td><?php echo $peminjaman->tgl_pinjam; ?></td>
                <td><?php echo $peminjaman->tgl_kembali; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
  </div>
</section>
<!-- /.content -->
<script>
  $(function(){
    $('#tableData').DataTable();
  })
  function deleteData(kode_pinjam){
    if(confirm("Apakah anda yakin menghapus data ini ?")){
      $.ajax({
        method : 'POST',
        url : '<?php echo base_url("peminjaman/delete");?>',
        data : {kode_pinjam: kode_pinjam},
        success : function(data){
          location.reload(true);
        },
        error: function( json ){
          alert("Gagal menghapus data !");
        }
      })
    }
  }
</script>