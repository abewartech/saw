<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kriteria <?php echo form_error('kriteria') ?></label>
            <input type="text" class="form-control" name="kriteria" id="kriteria" placeholder="Kriteria" value="<?php echo $kriteria; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Bobot <?php echo form_error('bobot') ?></label>
            <input type="text" class="form-control" name="bobot" id="bobot" placeholder="Bobot" value="<?php echo $bobot; ?>" />
        </div>
        <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('kriteria') ?>" class="btn btn-default">Cancel</a>
    </form>