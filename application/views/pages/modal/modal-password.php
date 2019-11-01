<?php foreach($memberDetails->result() as $data): ?>

<form action="<?php echo base_url('Profile/updatePassword'); ?>" method="POST" class="needs-validation" novalidate>


<!-- HEADER -->
<div class="modal-header" style="background-color: #2dd6a7  ;padding: 0.01rem;">
  <p style="color: white;margin-top: 0.5em; margin-left: 8em; font-size: 20px; font-weight: bold;"><i class="fas fa-key"></i> Change Password</p>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  <!-- Edit Margin -->
<div class="modal-body" style="font-size: 14px;">

  <div class="row">
    <div class="col-lg-12">
      <label style="margin-left: 2em;">New Password</label>
    </div>
  </div>

  <div class="row" style=" margin-bottom: 1em;">
    <div class="col-lg-12">
      <input type="hidden" name="id" class="form-control" style="width: 90%; margin-left: 1.5em;" value="<?php echo $data->ID;?>">
      <input type="password" name="new_password" class="form-control" id="uPass" onfocus="resetValidation()" onblur="checkPassword()" style="width: 90%; margin-left: 2em;" required>
    </div>
    <div class="col-lg-12">
      <label style="margin-left: 2em; color: grey;">Your password must include a capital letter and a number. </label>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <label style="margin-left: 2em;">Confirm New Password</label>
    </div>
  </div>

  <div class="row" style=" margin-bottom: 1em;">
    <div class="col-lg-12">
      <input type="password" name="confirm_password" class="form-control" id="uPass2" onfocus="resetValidation()" onblur="matchPassword()" style="width: 90%; margin-left: 2em;" required>
    </div>
  </div>

  
</div>

<div class="modal-footer">
  <button type="submit" class="btn btn-default" style="background-color: #34ca9d;color: white;">Save</button>
  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
</div>

</form>
<?php endforeach; ?>

