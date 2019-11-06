<div class="content gutter">
 <div class="container" style="background-color: #dedede;">
   <div class="row" >
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <h3 style="text-align: center; padding-top: 1em; padding-bottom: 1em;">RESET PASSWORD</h3>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3" style="padding-bottom: 5em;">
       <h5 style="margin-bottom: 2em;">Please input your new password in the box below</h5>
       <?php echo form_open('ResetPassword/resetPasswordProcess'); ?>

       <div class="form-group">
         <input id="txt-password" type="password" class="form-control" name="reset-password">
       </div>

       <div class="form-group">
         <input id="txt-confirm-password" type="password" class="form-control" name="input-password-confirm" onfocusout="confirm_pass()">
         <div id="validate-password" class="alert alert-danger alert-dismissible" role="alert" style="display: none; margin-top: 1em;">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="hide_button()"><span aria-hidden="true">&times;</span></button>
           <strong>Password doesn't match!</strong> Please try again.
         </div>
         <div id="confirm-password" class="alert alert-success alert-dismissible" role="alert" style="display: none; margin-top: 1em;">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="hide_button()"><span aria-hidden="true">&times;</span></button>
           <strong>Password match!</strong>
         </div>
       </div>

       <!-- HIDDEN THE EMAIL FOR FORM PROCESSING -->
       <input type="hidden" name="input-email" value="<?php echo $RESET_EMAIL; ?>">

       <button disabled style="width: 25%;" class="form-control btn btn-primary" id="custom-login-button" type="submit" class="btn btn-primary">Reset Password</button>

       <?php echo form_close(); ?>
     </div>
   </div>
 </div>
</div>

<script type="text/javascript">

function hide_button() {
    $("#validate-password").hide();
    $("#confirm-password").hide();
}

function confirm_pass() {

  var pass1 = $('#txt-password').val();
  var pass2 = $('#txt-confirm-password').val();

  if(pass1 == pass2) {
    $("#confirm-password").show();
    $("#validate-password").hide();
    $("#custom-login-button").removeAttr("disabled");
  } else {
    $("#validate-password").show();
    $("#custom-login-button").attr("disabled", true);
  }

  // if(pass1 == pass2) {
  //   $("#confirm-password").show();
  //   $("#validate-password").hide();
  //   document.getElementById("btn-req").disabled = false;
  // } else {
  //   $("#validate-password").show();
  //   document.getElementById("btn-req").disabled = true;
  // }
}

</script>
