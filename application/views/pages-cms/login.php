<style type="text/css" >
  
  body{
    background-image: linear-gradient(to top, #2db4d6 0%, #18b589 100%);
  }


</style>

<body style="background-color: linear-gradient(to bottom, #f17f05 0%,#ff910d 60%,#ff7c00 61%,#ffa73d 61%,#ffa73d 61%,#ff7c00 61%,#ff7f04 100%);">

  <div class="container">
    <div class="card card-login mx-auto mt-5" style="background-color: transparent;border:transparent;">
      <div class="card-body">
        <div class="d-flex justify-content-center">
          <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Kikikuku Logo" style="width: 100%;">
        </div>
        <?php echo form_open('cms/login_process'); ?>
          <div class="form-group" style="margin-top: 3em;">
            <div class="form-label-group">
              <input type="text" id="inputEmail" name="txt-username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label style="color: black;opacity: 0.3;" for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="txt-password" class="form-control" placeholder="Password" required="required">
              <label style="color: black;opacity: 0.3;" for="inputPassword">Password</label>
            </div>
            <?php if($this->input->get('error') == 1): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Login Failed!</strong> Wrong Username/Password.
            </div>
            <?php elseif($this->input->get('error') == 2): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Login Failed!</strong> Username Not Found.
            </div>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label style="color: white;">
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <center>
          <?php
            $dataSubmit = array(
              'type' => 'submit',
              'style' => 'border : 1px solid #d6d6d6',
              'class' => 'btn btn-info',
              'content' => 'LOGIN',
            );

            echo form_button($dataSubmit);
          ?>
        <?php echo form_close(); ?>
      </center>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="<?php echo base_url('assets/cms/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.compatibility.min.js"></script>

</body>
