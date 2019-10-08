<style type="text/css">
    #accordion label.col-sm-2.control-label {
    margin: 7px 0 0;
    padding: 0 15px 0 0;
    width: 25%;
    }
    #accordion .panel-title > a {
        color: inherit;
        display: inline-block;
        width: 100%;  
        text-align: left;
    }
    #accordion .panel-body {
        text-align: left;
    }
    #accordion .col-sm-10 {width: 75%;}
    #accordion .form-horizontal .control-label {text-align:left;}
    .account-address .table > tbody > tr > td {vertical-align: middle; border:none; padding:13px;}

    .checkout-cart #accordion .panel-title {  padding: 0;}
    #accordion .panel-title, .checkout-cart #accordion .panel-title > a { padding: 20px;}
    #accordion #collapse-shipping label.col-sm-2.control-label { padding: 0 15px;}
</style>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<div class="container">
  <div class="content gutter">
      <section class="product-push homepage" data-module="productpush, view360" style="padding: 0px;background: #fff;padding-top: 30px;">
          <div class="row" style="padding: 15px;">
              <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
              <h2 class="mb-xs-3 mb-md-4 mb-lg-5 h5-display"><span style="color: #ef7002;">FAQs</span></h2><br/>
                  <div class="panel-group" id="accordion">

                <?php
                  $connect = mysqli_connect("localhost", "kikikuku_userdb", "_k!-9j9t!5,X", "kikikuku_db");  
                  $query = "SELECT * FROM g_faq";  
                  $result = mysqli_query($connect, $query);  
                ?> 

                <div class="container" style="width:1700px; margin-left: 8em;">  
                  <div class="panel-group" id="posts">  
                    <?php
                    while($row = mysqli_fetch_array($result))
                    {  
                ?>  
                     <div class="panel panel-default">  
                          <div class="faq-bottom ">  
                               <h4 class="panel-title">  
                                    <a href="#<?php echo $row["REC_ID"]; ?>" data-toggle="collapse" data-parent="#posts"><?php echo $row["CONTENT"]; ?></a>  
                               </h4>  
                          </div>  
                          <div id="<?php echo $row["REC_ID"]; ?>" class="panel-collapse collapse">  
                               <div class="panel-body">  
                               <?php echo $row["ISI_FAQ"]; ?>  
                               </div>  
                          </div>  
                     </div>  
                      <?php  
                          }  
                      ?>  
                  </div>
                </div>  
                  </div>
              </div>
          </div>
      </section>
  </div>
</div>