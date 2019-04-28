<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Anggota
    <small>List Anggota</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Anggota</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- List Data -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">List Anggota</h3>
      <a href="<?php echo base_url(); ?>anggota/create" class="btn btn-success btn-linking">Tambah Data Anggota</a>
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
              <th>Kode Anggota</th>
              <th>Nama</th>
              <th>Prodi</th>
              <th>Jenjang</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($dataAnggota as $anggota){ ?>
              <tr>
                <td><?php echo $anggota->kode_anggota; ?></td>
                <td><?php echo $anggota->nama; ?></td>
                <td><?php echo $anggota->prodi; ?></td>
                <td><?php echo $anggota->jenjang; ?></td>
                <td><?php echo $anggota->alamat; ?></td>
                <td>
                  <a href="<?php echo base_url('anggota/'.$anggota->kode_anggota); ?>" class='btn btn-xs btn-warning'><i class='fa fa-pencil'></i> Edit</a>
                  <button class='btn btn-xs btn-danger' onclick="deleteData(<?php echo $anggota->kode_anggota; ?>)"><i class='fa fa-trash'></i> Delete</button>
                </td>
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
  function deleteData(kode_anggota){
    if(confirm("Apakah anda yakin menghapus data ini ?")){
      $.ajax({
        method : 'POST',
        url : '<?php echo base_url("anggota/delete");?>',
        data : {kode_anggota: kode_anggota},
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