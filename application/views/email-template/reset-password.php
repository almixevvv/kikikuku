<body style="background-color: #e4e4e4;">
<div style="max-width:800px;margin:auto;padding:30px;">
  <div style="content: ''; clear: both; display: table;">
    <div style="float: left; padding-left: 70px;">
      <img src="<?php echo base_url('assets/img/logo.png'); ?>" style="width:100%; max-width:200px;"/>
    </div>
  </div>
  <div style="width: 80%; margin: auto;">
    <h4 style="padding-left: 45px;">Dear Customer,</h4>
    <h4 style="padding-left: 45px;">To complete your password reset process, please click the button below</h4>
    <div style="text-align: center;">
      <a href="<?php echo base_url('profile/reset?email='.$USER_EMAIL.'&key='.$RESET_ID); ?>" style="background-color:#f17f05; -moz-border-radius:19px; -webkit-border-radius:19px; border-radius:19px;
    	display:inline-block;
    	cursor:pointer;
    	color:#ffffff;
    	padding:16px 31px;
    	text-decoration:none;">RESET PASSWORD</a>
    </div>
    <h4 style="padding-left: 45px;">Start shopping from our selection or visit our help section for more info</h4>
    <h4 style="padding-left: 44px;">Cheers, Kikikuku Team</h4>
    <hr>
    <h4 style="padding-left: 45px;">If the button above doesn't appear, copy and paste this URL to your browser:</h4>
    <h4 style="padding-left: 45px; text-align: center;"><?php echo base_url('profile/reset?email='.$USER_EMAIL.'&key='.$RESET_ID); ?></h4>
  </div>
</div>

</body>
