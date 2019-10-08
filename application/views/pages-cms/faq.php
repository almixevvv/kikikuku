  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates-cms/frame_side'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- DataTables Example -->
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-clipboard-list"></i>
            <b>FAQ Info</b></div>
          <div class="card-body" ">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size:14px">
                <thead>
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 1em;" data-toggle="modal" data-target="#addFaq" ><i class="fas fa-plus-circle"></i> Add Faq</button>
                  <tr>
                    <th width="5px">No</th>
                    <th width="5px">Title FAQ</th>
                    <th width="5px">Content FAQ</th>
                    <th width="5px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
               $no = 1;
              foreach($faq->result() as $dt){
                $id = $dt->REC_ID;
                $titleFaq = $dt->CONTENT;
                $contentFaq = $dt->ISI_FAQ;
                
                
                echo "<tr>"; ?>

                <td>
                    <?php echo $no++;?>
                </td>

                <td>
                  <?php echo $titleFaq;?>
                </td>

                <td>
                  <?php echo $contentFaq;?>
                </td>

                <!-- Trigger the modal with a button -->
                <td>
                  <?php echo form_open('Faq_cms/deleteFaq'); ?>
                  <button type="button" style="width: 5em;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editFaq" data-id="<?php echo $id; ?>">EDIT</button>
                  <button type="submit" style="width: 5em;" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm" data-id="<?php echo $id; ?>">DELETE</button>
                  <input type="hidden" name="deleteFaq" value="<?php echo $id; ?>">
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
       <div id="editFaq" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
        <div id="addFaq" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
   $('#editFaq').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
         var id = button.data('id');

          // console.log('Button Position ' + orderno);
          var getEditFaq = '<?php echo base_url('Faq_cms/getEditFaq?id='); ?>';

          $('.modal-body').load(getEditFaq + id,function(){
            $('#editFaq').modal({show:true});
          });
    });
  </script>

  <script type="text/javascript">
   $('#addFaq').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
         // var id = button.data('id');

          // console.log('Button Position ' + orderno);
          var getAddFaq = '<?php echo base_url('Faq_cms/getAddFaq?id='); ?>';

          $('.modal-body').load(getAddFaq,function(){
            $('#addFaq').modal({show:true});
          });
    });
  </script>

<script src="<?php echo base_url('assets/js/tiny_mce/tiny_mce.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php'); ?>"></script>
<script src="<?php echo base_url('assets/js/tiny_mce/tiny_mce_setting.js'); ?>"></script>

<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
</body>