<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Persembahan Syukur Bulanan</h5>

</div>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Pemasukan Persembahan Syukur Bulanan<h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=i_add_bul" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>ID User</th>
						<th>Uraian</th>
						<th>Jumlah</th>
						<th>Aksi</th>
						<th>Waktu</th>
					</tr>
				</thead>
				<tbody>

					<?php
          include 'inc/koneksi.php';
              $no = 1;
			   $sql = $koneksi->query("SELECT * FROM bulanan ORDER BY id_pb DESC");
            //    $query=mysql_query("SELECT * FROM bulanan ORDER BY id_pb DESC");
            //   while ($data = mysqli_fetch_assoc($query)) {
				while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php  $tgl = $data['tgl_pb']; echo date("d/M/Y", strtotime($tgl))?>
						</td>
						<td>
							<?php echo $data['id_user']; ?>
						</td>
						<td>
							<?php echo $data['uraian_pb']; ?>
						</td>
						<td align="right">
							<?php echo rupiah($data['masuk']); ?>
						</td>
						<td>
							<a href="?page=i_edit_bul&kode=<?php echo $data['id_pb']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=i_del_bul&kode=<?php echo $data['id_pb']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
							</td>

							<td>
							<?php echo $data['waktu_pb']; ?>
						</td>

						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->