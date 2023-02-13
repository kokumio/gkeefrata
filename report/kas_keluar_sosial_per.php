<?php
    include "../inc/koneksi.php";
    //FUNGSI RUPIAH
    include "../inc/rupiah.php";

    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php

  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from dana_sosial where jenis='Keluar' and tgl_ds BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar'];
  }

  $saldo= $keluar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Pengeluaran Dana Kas Sosial</title>
</head>
<body>
<center>
<h2>Laporan Rekapitulasi Kas sosial</h2>
<h3>GKE Efrata Kuala Kapuas</h3>
<p>Periode : <?php $a=$dt1; echo date("d-M-Y", strtotime($a))?> s/d <?php $b=$dt2; echo date("d-M-Y", strtotime($b))?>
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

        if(isset($_POST["btnCetak"])){
           
            $sql_tampil = "select * from dana_sosial where tgl_ds BETWEEN '$dt1' AND '$dt2' order by tgl_ds asc";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php  $tgl = $data['tgl_ds']; echo date("d/M/Y", strtotime($tgl))?></td> 
            <td><?php echo $data['id_user']; ?></td> 
            <td><?php echo $data['uraian_ds']; ?></td> 
            <td align="right"><?php echo rupiah($data['keluar']); ?></td>   
             <td><?php echo $data['waktu']; ?></td>
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
    <tr>
        <td colspan="3">Total Pengeluaran</td>
        <td colspan="2"><?php echo rupiah($keluar); ?></td>
    </tr>
    <tr>
        <td colspan="3">Saldo Kas sosial</td>
        <td colspan="2"><?php echo rupiah($saldo); ?></td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>