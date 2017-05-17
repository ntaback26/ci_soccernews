<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().$module.'/dashboard'; ?>">Admin Control Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; <?php echo $this->session->userdata('username'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url().'auth/auth/logout'; ?>"><i class="fa fa-fw fa-power-off"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if (strcmp($this->uri->segment(2), 'dashboard') == 0) echo "class='active'"; ?>>
                        <a href="<?php echo base_url().$module; ?>/dashboard"><i class="fa fa-fw fa-futbol-o"></i> Dashboard</a>
                    </li>
                    <li <?php if (strcmp($this->uri->segment(2), 'user') == 0) echo "class='active'"; ?>>
                        <a href="<?php echo base_url().$module; ?>/user"><i class="fa fa-fw fa-users"></i> Thành Viên</a>
                    </li>
                    <li <?php if (strcmp($this->uri->segment(2), 'category') == 0) echo "class='active'"; ?>>
                        <a href="<?php echo base_url().$module; ?>/category"><i class="fa fa-fw fa-list"></i> Chuyên Mục</a>
                    </li>
                    <li <?php if (strcmp($this->uri->segment(2), 'news') == 0) echo "class='active'"; ?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-newspaper-o"></i> Tin Tức <i class="fa fa-fw fa-caret-down"></i></a>
                        <?php
                            navigation(); 
                        ?>
                    </li>
                    <li <?php if (strcmp($this->uri->segment(2), 'page') == 0) echo "class='active'"; ?>>
                        <a href="#"><i class="fa fa-fw fa-file"></i> Pages</a>
                    </li>
                    <li <?php if (strcmp($this->uri->segment(2), 'setting') == 0) echo "class='active'"; ?>>
                        <a href="#"><i class="fa fa-fw fa-cog"></i> Cài Đặt</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>