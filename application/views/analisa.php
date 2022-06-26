<?php error_reporting(0); ?>
<div class="panel panel-info">
  <div class="panel-heading">Tabel Nilai Kriteria</div>
  <div class="panel-body">
  	<table class="table table-bordered">
  		<thead>
  			<tr>
  				<th>Nama Pegawai</th>
  				<?php 
  				$kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM nilai,kriteria WHERE nilai.id_kriteria=kriteria.id_kriteria");
  				foreach ($kr2->result() as $a) {
  				 ?>
  				<th><?php echo $a->kriteria; ?></th>
  				<?php } ?>

  			</tr>
  		</thead>
  		<tbody>
  		<?php 
  		$kr1 = $this->db->query("SELECT * FROM pegawai ");
  		foreach ($kr1->result() as $a) {
  		 ?>
  			<tr>
  				<td><?php echo $a->nama; ?></td>
  				<?php 
  				$id = $a->id_pegawai;
  				$kr2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,nilai.nilai FROM nilai,kriteria WHERE nilai.id_kriteria=kriteria.id_kriteria AND nilai.id_pegawai='$id'");
  				foreach ($kr2->result() as $a) {
  				 ?>
  				<td><?php echo $a->nilai; ?></td>
  				<?php } ?>
  			</tr>
  		<?php } ?>
  		</tbody>
  	</table>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">Tabel Nilai Normalisasi</div>
  <div class="panel-body">
  	<p>
  		<a href="<?php echo base_url('nilai/normalisasi') ?>" class="btn btn-primary">Lakukan Proses Normalisasi</a> <a href="<?php echo base_url('nilai/hapus_normalisasi') ?>" class="btn btn-primary">Bersihkan Normalisasi</a>
  	</p>
  	<table class="table table-bordered">
  		<thead>
  			<tr>
  				<th>Nama Pegawai</th>
  				<?php 
  				$kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria");
  				foreach ($kr2->result() as $a) {
  				 ?>
  				<th><?php echo $a->kriteria; ?></th>
  				<?php } ?>

  			</tr>
  		</thead>
  		<tbody>
  		<?php 
  		$kr1 = $this->db->query("SELECT * FROM pegawai ");
  		foreach ($kr1->result() as $a) {
  		 ?>
  			<tr>
  				<td><?php echo $a->nama; ?></td>
  				<?php 
  				$id = $a->id_pegawai;
  				$kr2 = $this->db->query("SELECT DISTINCT kriteria.kriteria,normalisasi.nilai_normalisasi FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria AND normalisasi.id_pegawai='$id'");
  				foreach ($kr2->result() as $a) {
  				 ?>
  				<td><?php echo $a->nilai_normalisasi; ?></td>
  				<?php } ?>
  			</tr>
  		<?php } ?>
  		</tbody>
  	</table>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">Tabel Hasil Analisa</div>
  <div class="panel-body">
  	<p>
  		<a href="<?php echo base_url('nilai/proses_analisa') ?>" class="btn btn-primary">Lakukan Proses Analisa</a> <a href="<?php echo base_url('nilai/hapus_analisa') ?>" class="btn btn-primary">Bersihkan Analisa</a>
  	</p>
  	<table class="table table-bordered">
  		<thead>
  			<tr>
  				<th>No.</th>
  				<th>Nama Pegawai</th>
  				<?php 
  				$kr2 = $this->db->query("SELECT  DISTINCT kriteria.kriteria FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria");
  				foreach ($kr2->result() as $a) {
  				 ?>
  				<th><?php echo $a->kriteria; ?></th>
  				<?php } ?>
  				<th>Total </th>

  			</tr>
  		</thead>
  		<tbody>
  		<?php 
  		$no = 1;
  		$kr1 = $this->db->query("SELECT * FROM pegawai order by nilai_analisa desc");
  		foreach ($kr1->result() as $a) {
  		 ?>
  			<tr>
  				<td><?php echo $no++; ?></td>
  				<td><?php echo $a->nama; ?></td>
  				<?php 
  				$id = $a->id_pegawai;
  				$n_a = $a->nilai_analisa;
  				$kr2 = $this->db->query("SELECT DISTINCT kriteria.kriteria, analisa.nilai FROM analisa,kriteria WHERE analisa.id_kriteria=kriteria.id_kriteria AND analisa.id_pegawai='$id'");
  				foreach ($kr2->result() as $a) {
  				 ?>
  				<td><?php echo $a->nilai; ?></td>
  				<?php } ?>
  				<td><?php 
  					// $sum = 0;
  					// $kr3 = $this->db->query("SELECT id_kriteria FROM kriteria");
  					// foreach ($kr3->result() as $row) {
  					// 	$id_kriteria = $row->id_kriteria;
  					// 	$kr4 = $this->db->query("SELECT nilai FROM analisa WHERE id_pegawai='$id' and id_kriteria='$id_kriteria'")->row();
  					// 	// echo $kr4->nilai.'<br>';
  					// 	$sum = $sum + $kr4->nilai;

  					// }
  					// $data = array(
  					// 	'nilai_analisa' => $sum
  					// 	);
  					// $this->db->where('id_pegawai', $id);
  					// $this->db->update('pegawai', $data);
  					echo $n_a;
  				 ?></td>
  			</tr>
  		<?php } ?>
  		</tbody>
  	</table>
  </div>
</div>