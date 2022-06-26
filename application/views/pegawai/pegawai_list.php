<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pegawai/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pegawai/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pegawai'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>Nip</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Bagian</th>
        <th>Grade</th>
        <th>Cabang</th>
        <th>Tanggal Masuk</th>
        <th>Action</th>
            </tr><?php
            foreach ($pegawai_data as $pegawai)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $pegawai->nip ?></td>
            <td><?php echo $pegawai->nama ?></td>
            <td><?php echo $pegawai->jabatan ?></td>
            <td><?php echo $pegawai->bagian ?></td>
            <td><?php echo $pegawai->grade ?></td>
            <td><?php echo $pegawai->cabang ?></td>
            <td><?php echo $pegawai->tanggal_masuk ?></td>
            <td style="text-align:center" width="200px">
                <?php  
                echo anchor(site_url('pegawai/update/'.$pegawai->id_pegawai),'Update'); 
                echo ' | '; 
                echo anchor(site_url('pegawai/delete/'.$pegawai->id_pegawai),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>