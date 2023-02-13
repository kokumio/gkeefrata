<?php
include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";
?>

<?php

  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from dana_kas where jenis='Keluar'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar'];
  }

  $saldo= $keluar;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Keluar Dana Kas</title>
</head>
<body>
<center>
<h2>Laporan Pengeluaran Dana Kas GKE Efrata</h2>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>ID User</th>
            <th>Uraian</th>
            <th>Pengeluaran</th>
            <th>Waktu</th>
      </tr>
    </thead>
    <tbody>
        <?php

            $no=1;
            $sql_tampil = "select * from dana_kas order by tgl_kas asc";
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php  $tgl = $data['tgl_kas']; echo date("d/M/Y", strtotime($tgl))?></td> 
             <td><?php echo $data['id_user']; ?></td> 
            <td><?php echo $data['uraian_kas']; ?></td> 
            <td align="right"><?php echo rupiah($data['keluar']); ?></td>   
              <td><?php echo $data['waktu']; ?></td>
        <?php
            $no++;
            }
        ?>
    </tbody>
    <tr>
        <td colspan="3">Total Pengeluaran/td>
        <td colspan="2"><?php echo rupiah($keluar); ?></td>
    </tr>
    <tr>
        <td colspan="3">Saldo Kas GKE Efrata</td>
        <td colspan="2"><?php echo rupiah($saldo); ?></td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>