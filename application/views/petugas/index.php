<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Petugas
    <small>List Petugas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Petugas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- List Data -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">List Petugas</h3>
      <a href="<?php echo base_url(); ?>petugas/create" class="btn btn-success btn-linking">Tambah Data Petugas</a>
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
              <th>Kode Petugas</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($dataPetugas as $petugas){ ?>
              <tr>
                <td><?php echo $petugas->kode_petugas; ?></td>
                <td><?php echo $petugas->nama; ?></td>
                <td><?php echo $petugas->alamat; ?></td>
                <td>
                  <a href="<?php echo base_url('petugas/'.$petugas->kode_petugas); ?>" class='btn btn-xs btn-warning'><i class='fa fa-pencil'></i> Edit</a>
                  <button class='btn btn-xs btn-danger' onclick="deleteData(<?php echo $petugas->kode_petugas; ?>)"><i class='fa fa-trash'></i> Delete</button>
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
  function deleteData(kode_petugas){
    if(confirm("Apakah anda yakin menghapus data ini ?")){
      $.ajax({
        method : 'POST',
        url : '<?php echo base_url("petugas/delete");?>',
        data : {kode_petugas: kode_petugas},
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