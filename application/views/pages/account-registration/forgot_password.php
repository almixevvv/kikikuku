<div class="content gutter">
 <div class="container" style="background-color: #dedede;">
   <div class="row" >
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <h3 style="text-align: center; padding-top: 1em; padding-bottom: 1em;">RESET PASSWORD</h3>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3" style="padding-bottom: 5em;">
       <h5 style="margin-bottom: 2em;">Please enter your registered email so we can send you how to reset your password</h5>
       <?php echo form_open('ResetPassword/sendPasswordReset'); ?>

       <div class="form-group">
         <input type="email" class="form-control" name="reset-email" placeholder="Email">

         <!-- IF THERE'S AN ERROR, SHOW THE ERROR -->
         <?php if($this->input->get('error') == '1'): ?>
         <div class="alert alert-warning alert-danger" role="alert" style="margin-top: 0.5em;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Error!</strong> Email is not registered, please try again.
         </div>
        <?php endif; ?>
       </div>

       <button class="form-control" id="custom-login-button" type="submit" class="btn btn-primary">Reset Password</button>

       <?php echo form_close(); ?>
     </div>
   </div>
 </div>
</div>

<script type="text/javascript">

function hide_button() {
   $("#validate-password").hide();
   $("#confirm-password").hide();
   $("#validate-email").hide();
   $("#confirm-email").hide();
}

</script>
