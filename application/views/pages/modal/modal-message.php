<div class="message-holder" style="max-height:30em; height:30em; overflow:auto; margin-left:0em; border:1px solid lightgrey; margin-bottom: 1em; width: 100%;">
  <?php foreach($messages->result() as $data): ?>

    <!-- CONVERT THE TIMESTAMP -->
    <?php
      $phpdate = strtotime($data->MESSAGE_TIME);
      $mysqldate = date( 'd-m-Y', $phpdate );
      $mysqltime = date('H:m', $phpdate);
    ?>
    <!-- CONVERT THE TIMESTAMP -->
    <!-- IF THE SENDER IS ADMIN, USE ADMIN TEMPLATE CLASS -->
    <?php if($data->SENDER_ID == 'ADMIN'): ?>
    <div class="admin-message-window">
      <div style="text-align: right; color: #ff7518;"><b>KIKIKUKU <?php echo $mysqldate.' '.$mysqltime; ?></b></div>
      <div style="text-align: right;"><?php ?><?php echo $data->MESSAGE; ?></div>
    </div>

    <!-- ELSE IF THE SENDER IS CUSTOMER, USE CUSTOMER TEMPLATE CLASS -->
    <?php else: ?>
      <div class="user-message-window">
        <div style="text-align: left; color: #030142"><b>ME <?php echo $mysqldate.' '.$mysqltime; ?></b></div>
        <div style="text-align: left;"><?php echo $data->MESSAGE; ?></div>
      </div>

    <?php endif; ?>

  <?php endforeach; ?>
</div>
<div class="form-group">
  <label for="sender-messages">Enter Your Messages</label>
  <textarea name="sender-messages" class="form-control" id="sender-messages" rows="3"/>
  <label style="margin-top: 0.5em;"><i>Character Limit <span id="remaining">255</span> </i></label>
  <br>
  <label id="character-limit-error" style="color: red; font-style:italic;"><i>You've exceeded the characters limit</i></label>
  <input type="hidden" id="hidden-id" value="<?php echo $transID; ?>">
</div>

<script type="text/javascript">

$(document).ready(function () {

  $('#character-limit-error').fadeOut();

  $('#sender-messages').keypress(function(e) {
    var tval = $('#sender-messages').val(),
        tlength = tval.length,
        set = 255,
        remain = parseInt(set - tlength);
    $('#remaining').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        // $('#sender-messages').val((tval).substring(0, tlength - 1));
        $('#character-limit-error').fadeIn();
        return false;
    } else {
      $('#character-limit-error').fadeOut();
    }
  });

});

</script>
