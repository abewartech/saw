<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('administrator'); ?>">PENENTUAN KARYAWAN TERBAIK </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama'); ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        -->
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('LogoutController/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url('Pegawai') ?>"><i class="fa fa-table fa-fw"></i> Data Pegawai</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Kriteria') ?>"><i class="fa fa-edit fa-fw"></i> Data Kriteria</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('nilai') ?>"><i class="fa fa-edit fa-fw"></i>Input Nilai Pegawai</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('nilai/analisa') ?>"><i class="fa fa-edit fa-fw"></i>Analisa Pegawai</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url('User') ?>"><i class="fa fa-user fa-fw"></i> Manajemen User</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>