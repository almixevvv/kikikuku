  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates-cms/frame_side'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#" style="color: #2db4d6">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
      </ol>
        <?php
          $Q=$this->db->query("SELECT 
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='NEW ORDER' ) as ALL_TIME_NEW,
                                   
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='CONFIRMED' ) as ALL_TIME_CONFIRMED,
                                    
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='PAID' ) as ALL_TIME_PAID,

                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='NEW ORDER' 
                                      GROUP BY MONTH(CURRENT_TIMESTAMP)) as MONTHLY_NEW,
                                   
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='CONFIRMED' 
                                      GROUP BY MONTH(CURRENT_TIMESTAMP)) as MONTHLY_CONFIRMED,
                                    
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='PAID' 
                                      GROUP BY MONTH(CURRENT_TIMESTAMP)) as MONTHLY_PAID,
                                    
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='UPDATED'
                                      GROUP BY MONTH(CURRENT_TIMESTAMP)) as MONTHLY_UPDATED,
                                    
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='DONE'
                                      GROUP BY MONTH(CURRENT_TIMESTAMP)) as MONTHLY_CLOSED,
                                    
                                    (SELECT COUNT(STATUS)
                                      FROM g_order_master
                                      WHERE STATUS ='CANCELED' 
                                      GROUP BY MONTH(CURRENT_TIMESTAMP)) as MONTHLY_CANCELED 

                                    ") ;

                    $CQ = $Q->num_rows();
                    if($CQ>0){ foreach ($Q->result() as $RSX); 
                        $ALL_TIME_NEW = $RSX->ALL_TIME_NEW; 
                        $ALL_TIME_CONFIRMED = $RSX->ALL_TIME_CONFIRMED; 
                        $ALL_TIME_PAID = $RSX->ALL_TIME_PAID; 
                        $MONTHLY_NEW = $RSX->MONTHLY_NEW; 
                        $MONTHLY_CONFIRMED = $RSX->MONTHLY_CONFIRMED; 
                        $MONTHLY_PAID = $RSX->MONTHLY_PAID; 
                        $MONTHLY_UPDATED = $RSX->MONTHLY_UPDATED; 
                        $MONTHLY_CLOSED = $RSX->MONTHLY_CLOSED; 
                        $MONTHLY_CANCELED = $RSX->MONTHLY_CANCELED;  
                                
                    }else { 
                        $ALL_TIME_NEW = 0;
                        $ALL_TIME_CONFIRMED = 0;
                        $ALL_TIME_PAID = 0;
                        $MONTHLY_NEW = 0;
                        $MONTHLY_CONFIRMED = 0; 
                        $MONTHLY_PAID = 0;
                        $MONTHLY_UPDATED = 0;
                        $MONTHLY_CLOSED = 0; 
                        $MONTHLY_CANCELED = 0;  
                    }            
        ?>

        <div class="card mb-4">
          <div class="card-header" >
            <i class="fas fa-history"></i>
            <b>All Time Order Status</b>
          </div>
        </div>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: #2dd6a7;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <div class="mr-5" style="font-weight: bold;">
                  <?php if($ALL_TIME_NEW > 1){
                    echo $ALL_TIME_NEW.' Orders';
                  }else{
                    echo $ALL_TIME_NEW.' Order';
                  }

                  ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=created'); ?>">
                <span class="float-left">New Order</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: #2db4d6;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-handshake"></i>
                </div>
                <div class="mr-5" style="font-weight: bold;">
                  <?php if($ALL_TIME_CONFIRMED > 1 ){
                    echo $ALL_TIME_CONFIRMED.' Orders';
                  }else{
                    echo $ALL_TIME_CONFIRMED.' Order';
                  }

                  ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=confirmed'); ?>">
                <span class="float-left">Confirmed Payment</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-donate"></i>
                </div>
                <div class="mr-5" style="font-weight: bold;">
                  <?php if($ALL_TIME_PAID > 1){
                    echo $ALL_TIME_PAID.' Orders';
                  }else{
                    echo $ALL_TIME_PAID.' Order';
                  }

                  ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=paid'); ?>">
                <span class="float-left">Paid Order</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-header" >
            <i class="fas fa-calendar-alt"></i>
            <b>Monthly Order Status</b>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: #2dd6a7;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-cart-plus"></i>
                </div>
                <div class="mr-5" style="font-weight: bold;">
                  <?php if($MONTHLY_NEW > 1){
                    echo $MONTHLY_NEW.' Orders';
                  }
                  elseif($MONTHLY_NEW = 'NULL'){
                    echo '0 Order';
                  }
                  else{
                    echo $MONTHLY_NEW.' Order';
                  }

                  ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=created'); ?>">
                <span class="float-left">New Order</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-edit"></i>
                </div>
                <div class="mr-5" style="font-weight: bold;">
                  <?php if($MONTHLY_UPDATED > 1){
                    echo $MONTHLY_UPDATED.' Orders';
                  }
                  elseif($MONTHLY_UPDATED = 'NULL'){
                    echo '0 Order';
                  }
                  else{
                    echo $MONTHLY_UPDATED.' Order';
                  }

                  ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=updated'); ?>">
                <span class="float-left">Updated Order</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: #2db4d6;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-handshake"></i>
                </div>
                <div class="mr-5" style="font-weight: bold;">
                  <?php if($MONTHLY_CONFIRMED > 1){
                    echo $MONTHLY_CONFIRMED.' Orders';
                  }
                  elseif($MONTHLY_CONFIRMED = 'NULL'){
                    echo '0 Order';
                  }
                  else{
                    echo $MONTHLY_CONFIRMED.' Order';
                  }

                  ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=confirmed'); ?>">
                <span class="float-left">Confirmed Payment</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-donate"></i>
              </div>
              <div class="mr-5" style="font-weight: bold;">
                <?php if($MONTHLY_PAID > 1){
                  echo $MONTHLY_PAID.' Orders';
                }
                elseif($MONTHLY_PAID = 'NULL'){
                    echo '0 Order';
                  }
                else{
                  echo $MONTHLY_PAID.' Order';
                }

                ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=paid'); ?>">
              <span class="float-left">Paid Order</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-window-close"></i>
              </div>
              <div class="mr-5" style="font-weight: bold;">
                <?php if($MONTHLY_CANCELED > 1){
                  echo $MONTHLY_CANCELED.' Orders';
                }
                elseif($MONTHLY_CANCELED = 'NULL'){
                    echo '0 Order';
                  }
                else{
                  echo $MONTHLY_CANCELED.' Order';
                }

                ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=canceled'); ?>">
              <span class="float-left">Canceled Order</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="mr-5" style="font-weight: bold;">
                  <?php if($MONTHLY_CLOSED > 1){
                    echo $MONTHLY_CLOSED.' Orders';
                  }
                  elseif($MONTHLY_CLOSED = 'NULL'){
                    echo '0 Order';
                  }
                  else{
                    echo $MONTHLY_CLOSED.' Order';
                  }

                  ?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('cms/orders/status?query=done'); ?>">
                <span class="float-left">Done Order</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>          
        </div>


        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            <b>Monthly Sales Order</b></div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Incube Solutions 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/cms/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-4/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/cms/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('assets/cms/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/cms/datatables/jquery.dataTables.js'); ?>"></script>
  <script src="<?php echo base_url('assets/cms/datatables/dataTables.bootstrap4.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/cms/js/sb-admin.min.js'); ?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('assets/cms/js/demo/datatables-demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/cms/js/demo/chart-area-demo.js'); ?>"></script>
