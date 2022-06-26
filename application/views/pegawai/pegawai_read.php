<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pegawai Read</h2>
        <table class="table">
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Bagian</td><td><?php echo $bagian; ?></td></tr>
	    <tr><td>Grade</td><td><?php echo $grade; ?></td></tr>
	    <tr><td>Cabang</td><td><?php echo $cabang; ?></td></tr>
	    <tr><td>Tanggal Masuk</td><td><?php echo $tanggal_masuk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pegawai') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>