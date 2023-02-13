<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM dana_sosial WHERE id_ds='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Pengeluaran</h3>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">

    <input type='hidden' class="form-control" name="id_ds" value="<?php echo $data_cek['id_ds']; ?>" readonly/>


    <div class="form-group row">
        <label class="col-sm-2 col-form-label">ID User</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $data_cek['id_user']; ?>"/>
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Uraian</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="uraian_ds" name="uraian_ds" value="<?php echo $data_cek['uraian_ds']; ?>"/>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pengeluaran</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="keluar" name="keluar" value="<?php echo $data_cek['keluar']; ?>"/>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_ds" name="tgl_ds" value="<?php echo $data_cek['tgl_ds']; ?>"/>
        </div>
      </div>

    </div>
    <div class="card-footer">
      <input type="submit" name="Ubah" value="Simpan" class="btn btn-success" >
      <a href="?page=o_data_ks" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>



<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE dana_sosial SET
        uraian_ds='".$_POST['uraian_ds']."',
        keluar='".$_POST['keluar']."',
        tgl_ds='".$_POST['tgl_ds']."'
        WHERE id_ds='".$_POST['id_ds']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=o_data_ks';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=o_data_ks';
        }
      })</script>";
    }}
?>
