<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark static-top" style="background-color: #ebebeb;">
    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Kikikuku Logo" style="width: 10%;">

    <button class="btn btn-link btn-sm text order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #6c757d;">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
        <div class="input-group-append">
          <!-- <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button> -->
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <!-- <li class="nav-item dropdown no-arrow mx-1"> -->
        <!-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw" style="color: white;"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div> -->
      <!-- </li> -->
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- <?php
              foreach ($new_order->result() as $total_new_order);
            ?>
            <button type="button" class="btn btn" style="background-color: #2db4d6;color: #ebebeb;font-size: 14px;border: white;"><?php echo $total_new_order->new_order; ?>
            </button> 
            <label style="font-size: 12px;color: #6c757d;border: #6c757d; margin-right: 1em;">New Order</label> -->

            <?php
              foreach ($unview_order->result() as $total_unview_order);
            ?>
            <button type="button" class="btn btn" style="background-color: #2db4d6;color: #ebebeb;font-size: 14px;margin-left: 2em;border: white;"><?php echo $total_unview_order->unview_order; ?>
            </button>
            <label style="font-size: 12px;color: #6c757d;margin-right: 1em;">Incoming Order</label>
        </a>
        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div> -->
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#changePass" data-id="<?php echo $this->session->userdata('id'); ?>">
          <i class="fas fa-lock fa-lg fa-fw mr-2" style="color: orange;margin-top: 0.45em;"></i>
        </a>
      </li>

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="buttonLogOut" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sign-out-alt" style="color: #2db4d6;font-size: 20px;margin-top: 0.38em;" ></i>
        </a>
        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a id="buttonLogOut" class="dropdown-item" href="#" >Logout</a>
        </div> -->
      </li>
    </ul>
    
    <!-- Modal Change Password-->
        <div id="changePass" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-body" style="padding: 0!important;">
                <!-- LOAD THE CONTENT -->
              </div>
            </div>

          </div>
        </div>

  </nav>
