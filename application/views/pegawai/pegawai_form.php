<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Bagian <?php echo form_error('bagian') ?></label>
            <input type="text" class="form-control" name="bagian" id="bagian" placeholder="Bagian" value="<?php echo $bagian; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Grade <?php echo form_error('grade') ?></label>
            <input type="text" class="form-control" name="grade" id="grade" placeholder="Grade" value="<?php echo $grade; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Cabang <?php echo form_error('cabang') ?></label>
            <input type="text" class="form-control" name="cabang" id="cabang" placeholder="Cabang" value="<?php echo $cabang; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Tanggal Masuk <?php echo form_error('tanggal_masuk') ?></label>
            <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk" value="<?php echo $tanggal_masuk; ?>" />
        </div>
        <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('pegawai') ?>" class="btn btn-default">Cancel</a>
    </form>