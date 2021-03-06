<nav class="navbar navbar-expand navbar-dark bg-info static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>">IW Monitoring</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="post" action="">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Search for device" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-light" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i> <?php echo $this->session->userdata('nama');?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('Setting'); ?>">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('Login/logout'); ?>">Logout</a>
            </div>
        </li>
    </ul>

</nav>
<div class="row">