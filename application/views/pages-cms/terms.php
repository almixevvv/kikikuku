<script>
function module_action(action, id){
  document.form_action.target='_self';
  document.form_action.id.value=id;
  var path='<?php echo base_url('form_terms_cms?id=');?>';
  var path2='<?php echo base_url('form_terms_cms/delete/');?>';
  
  switch (action) {
  case 'EDIT':
    
    // tb_show('', 'blank.php?keepThis=true&TB_iframe=true&height=500&width=600&modal=true');
    //document.form_action.target='TB_iframeContent';   
    document.form_action.action=path+document.form_action.id.value;
    break;  
  // case 'EDIT_TERM':
    
  //   tb_show('', 'blank.php?keepThis=true&TB_iframe=true&height=500&width=600&modal=true');
  //   document.form_action.target='TB_iframeContent';   
  //   document.form_action.action=path3+document.form_action.id.value;
  //   break;  
  // case 'DELETE':
  //   if (confirm('Please confirm deleting data')==false){ return false;} 
  //   document.form_action.action=path2+'/'+document.form_action.id.value;
  //   break;
              
  }
  document.form_action.submit();
}
</script> 

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates-cms/frame_side'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- BANNER PART -->

       <!-- start: Content -->
    <div class="main" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif">
    
    <form name="form_action" method="post">
          <input type="hidden" name="id" value=""  />
        </form>        
                                       


  <div class="row">
        <div class="col-lg-12" id="tabel">
          <div class="panel panel-default">
            <div class="panel-heading" data-original-title>
              <h2><span class="break"></span>Terms & Cndition</h2>
            
            </div>
            <div class="panel-body">
              <table id="subscription_table" name="subscription_table" class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>   
                <tbody>
                
                <?php 
                foreach($terms->result() as $dt){
                 
                 // <?php echo $userloop->CONTENT;
                
                $term = $dt->CONTENT;
                }
                 ?>
                 <td>
                   <?php echo $term; ?>
                 </td>
                <td>
                 <!--  <button class="btn btn-info"  data-toggle="lightbox"  onclick="module_action('EDIT','<?php echo $userloop->REC_ID;?>');" style="width: 80px;" type="button">EDIT
                 </button> -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                  data-terms='<?php echo $term; ?>'>EDIT</button>
               </td>
                 
                </tbody>
              </table> 

   
            </div>
          </div>
        </div><!--/col-->
        
                    <br/>
        
      </div><!--/row-->

</div>
<!-- end content -->


        <!-- END BANNER PART -->
        <!-- Modal -->
        <div id="exampleModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <?php echo form_open('Form_terms_cms/update'); ?>
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-body">
                <b>
                  Terms & Condition : 
                </b>
                <textarea name="text-terms" id="form10" class="md-textarea form-control modal-terms" rows="10"><?php echo $term; ?></textarea>
                <button type="submit" class="btn btn-default btn-danger" style="margin: 10px;" >Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
          <?php echo form_close(); ?>
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
    
    $('#exampleModal').on('show.bs.modal', function (event) {
      // Button that triggered the modal
      var button = $(event.relatedTarget); 

      // Extract info from data-* attributes
      var term = button.data('terms');
      
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);

      modal.find('.modal-terms').val(term);
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
