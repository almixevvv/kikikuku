  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates-cms/frame_side'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- DataTables Example -->
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-clipboard-list"></i>
            <b>Banner Info</b></div>
          <div class="card-body" ">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size:14px">
                <thead>
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 1em;" data-toggle="modal" data-target="#bannerAddModal" ><i class="fas fa-plus-circle"></i> Add Banner</button>
                  <tr>
                    <th width="5px">No</th>
                    <th width="5px">Type</th>
                    <th width="5px">Link Type</th>
                    <th width="5px">Link To</th>
                    <th width="5px">Banner Image</th>
                   <!--  <th width="auto">Order No</th>
                    <th width="auto">Flag</th> -->
                    <th width="5px">Description</th>
                    <th width="5px">Created</th>
                    <th width="5px">Updated</th>
                    <th width="5px">User ID</th>
                    <th width="5px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
               $no = 1;
              foreach($content->result() as $dt){
                $id = $dt->REC_ID;
                $type = $dt->TYPE;
                $link_type = $dt->LINK_TYPE;
                $linkto = $dt->LINKTO;
                $banner_img = $dt->BANNER_IMAGE;
                $order_no = $dt->ORDER_NO;
                $flag = $dt->FLAG;
                $description = $dt->DESCRIPTION;
                $created = $dt->CREATED;
                $updated = $dt->UPDATED;
                $user_id = $dt->USER_ID;
                
                echo "<tr>"; ?>

                <td>
                    <?php echo $no++;?>
                </td>

                <td>
                  <?php echo $type;?>
                </td>

                <td>
                  <a href='".$link_type."' target='_blank'><?php echo $link_type;?></a>
                </td>

                <td>
                  <a href='<?php echo $linkto ?>' target='_blank'><?php echo $linkto;?></a>
                </td>

                <td>
                  <?php echo "<img style='width: 100%;' src='".base_url().$banner_img."'></img>"; ?> 
                </td>

                <!-- <td>
                  <?php echo $order_no;?>
                </td>

                <td>
                  <?php echo $flag;?>
                </td> -->

                <td>
                  <?php echo $description;?>
                </td>

                <td>
                  <?php echo $created;?>
                </td>

                <td>
                  <?php echo $updated;?>
                </td>

                <td>
                  <?php echo $user_id;?>
                </td>

                <!-- Trigger the modal with a button -->
                <td>
                  <?php echo form_open('Banner_cms/deleteBanner'); ?>
                  <button type="button" style="width: 5em;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#bannerModal" data-id="<?php echo $id; ?>">EDIT</button>
                  <button type="submit" style="width: 5em;" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm" data-id="<?php echo $id; ?>">DELETE</button>
                  <input type="hidden" name="deleteBanner" value="<?php echo $id; ?>">
                  <?php echo form_close(); ?>
                </td>

                  <?php
                  echo "</tr>";
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>

        <!-- ORDER PART -->
        

        <!-- END ORDER PART -->

        <!-- Modal EDIT BANNER -->
       <div id="bannerModal" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-body" style="padding: 0!important;">
                <!-- LOAD THE CONTENT -->
              </div>
            </div>

          </div>
        </div>
        <!-- END EDIT BANNER -->


        <!-- Modal ADD BANNER -->
        <div id="bannerAddModal" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-body" style="padding: 0!important;">
                <!-- LOAD THE CONTENT -->
              </div>
            </div>

          </div>
        </div>
        <!-- END ADD BANNER -->


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

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/cms/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/cms/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/cms/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('assets/cms/vendor/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/cms/vendor/datatables/jquery.dataTables.js'); ?>"></script>
  <script src="<?php echo base_url('assets/cms/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/cms/js/sb-admin.min.js'); ?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('assets/cms/js/demo/datatables-demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/cms/js/demo/chart-area-demo.js'); ?>"></script>

  <script type="text/javascript">
   $('#bannerModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id = button.data('id');

          // console.log('Button Position ' + orderno);
          var getBanner = '<?php echo base_url('Banner_cms/getBanner?id='); ?>';

          $('.modal-body').load(getBanner + id,function(){
            $('#bannerModal').modal({show:true});
          });
    });
  </script>

  <script type="text/javascript">
   $('#bannerAddModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
         // var id = button.data('id');

          // console.log('Button Position ' + orderno);
          var getAddBanner = '<?php echo base_url('Banner_cms/getAddBanner?id='); ?>';

          $('.modal-body').load(getAddBanner,function(){
            $('#bannerAddModal').modal({show:true});
          });
    });
  </script>
</body>