<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">Nama Pegawai <?php echo form_error('id_pegawai') ?></label>
            <!-- <input type="text" class="form-control" name="id_pegawai" id="id_pegawai" placeholder="Id Pegawai" value="<?php echo $id_pegawai; ?>" /> -->
            <select class="form-control" name="id_pegawai">
                <?php 
                $d = $this->db->query("SELECT * FROM pegawai where id_pegawai='$id_pegawai'");
                if ($d->num_rows() == null) {
                 ?>
                <option value="">--Pilih Pegawai--</option>
                <?php }else { 
                    $d = $d->row();
                    ?>
                <option value="<?php echo $d->id_pegawai; ?>"><?php echo $d->nip.'-'.$d->nama; ?></option>

                <?php 
                }
                $sql = $this->db->query("SELECT * FROM pegawai");
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->id_pegawai; ?>"><?php echo $row->nip.'-'.$row->nama; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Kriteria <?php echo form_error('id_kriteria') ?></label>
            <!-- <input type="text" class="form-control" name="id_kriteria" id="id_kriteria" placeholder="Id Kriteria" value="<?php echo $id_kriteria; ?>" /> -->
            <select class="form-control" name="id_kriteria">
                <?php 
                $d = $this->db->query("SELECT * FROM kriteria where id_kriteria='$id_kriteria'");
                if ($d->num_rows() == null) {
                 ?>
                <option value="">--Pilih Kriteria--</option>
                <?php }else { 
                    $d = $d->row();
                    ?>
                <option value="<?php echo $d->id_kriteria; ?>"><?php echo $d->kriteria; ?></option>
                <?php 
                }
                $sql = $this->db->query("SELECT * FROM kriteria");
                foreach ($sql->result() as $row) {
                 ?>
                <option value="<?php echo $row->id_kriteria; ?>"><?php echo $row->kriteria; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Nilai <?php echo form_error('nilai') ?></label>
            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
        </div>
        <input type="hidden" name="id_nilai" value="<?php echo $id_nilai; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('nilai') ?>" class="btn btn-default">Cancel</a>
    </form>