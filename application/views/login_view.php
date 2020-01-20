<!DOCTYPE html>
<html lang="en" class="coming-soon">

<head>

    <meta charset="utf-8">
    <title>JCORE Employee Portal | Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <link rel="shortcut icon" href="<?php echo $this->config->item("base_urlmain").'/'.$company_setup[0]->image_name; ?>">
    <meta name="author" content="">

    <link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/css/animate.css" rel="stylesheet">


    <link href="assets/css/ample-login/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/ample-login/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="assets/css/ample-login/colors/default.css" id="theme"  rel="stylesheet">


    <link type="text/css" href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">              <!-- Themify Icons -->

    <link type="text/css" href="assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->


    <link href="assets/plugins/notify/pnotify.core.css" rel="stylesheet"> <!-- notification -->
    <!-- <link href="assets/css/pace.css" rel="stylesheet"> pace -->

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
    <style>
      .ui-pnotify-title {
        color: white !important;
      }
      body {
        font-family: arial;
        overflow: auto!important;
      }
      .new-login-register .lg-info-panel .lg-content {
        margin-top: 35%;
      }
      .new-login-register .lg-info-panel .inner-panel {
          background: rgba(0, 0, 0, 0.7);
      }
      .new-login-register .lg-info-panel {
        background: url('assets/img/payroll-bg.jpg') no-repeat center center / cover !important;
        width: 450px;
      }
      hr {
        border-top: 1px solid #eaeaea;
      }
      /* enable absolute positioning */
      .inner-addon { 
          position: relative; 
          margin-bottom: 20px;
      }

      /* style icon */
      .inner-addon .glyphicon {
        position: absolute;
        padding: 10px;
        pointer-events: none;
      }

      /* align icon */
      .left-addon .glyphicon  { left:  0px;}
      .right-addon .glyphicon { right: 0px;}

      /* add padding  */
      .left-addon input  { padding-left:  30px; }
      .right-addon input { padding-right: 30px; }  
      .logo-img{
          display: none;
      }
      @media (max-width: 1023px) {
        .logo-img{
          display: block;
          position: relative;
          top: 3%;
        }
      }
    </style>
    </head>
<body class="focused-form animated-content login-background">
<section id="wrapper" class="new-login-register">

      <div class="lg-info-panel">
          <div class="inner-panel" style="width: 450px;">
              <div class="lg-content">
                  <img style="min-height: 100px; min-width: 100px;max-height: 100px;" src="<?php echo $this->config->item('base_urlmain').'/'.$company_setup[0]->image_name; ?>">
                  <hr><h1 style="font-family: sans-serif!important; color: white;"><b>JCORE</b> EMPLOYEE</h1><hr>
                  <h3 style="color: #03a9f4;"><?php echo $company_setup[0]->company_name; ?></h3>
                  <span style="position: absolute; bottom: -3%; right: 1%;"><p style="color: #FFF;">powered by 
                  <img src="<?php echo $this->config->item('base_urlmain'); ?>/assets/img/company/jdev-logo.png" height="30" width="60"></p></span>
              </div>
          </div>
      </div>
      <div class="logo-img">
        <center>
          <img style="min-height: 100px; min-width: 100px;max-height: 100px;" src="<?php echo $this->config->item('base_urlmain').'/'.$company_setup[0]->image_name; ?>">
        </center>
      </div>
      <div class="new-login-box" style="-webkit-box-shadow: 0px 0px 100px 1px rgba(212,212,212,1);
-moz-box-shadow: 0px 0px 100px 1px rgba(212,212,212,1);
box-shadow: 0px 0px 100px 1px rgba(212,212,212,1);border: 1px solid #CFD8DC;margin-top: 11%;">
        <div class="white-box">

            <div class="login_entry">
                <center>
                  <h3 class="box-title m-b-0"><i class="fa fa-user"></i> Employee Portal <small>Sign In</small></h3>
                  <small>Please Enter your details below</small>
                </center>
                <form action="#" class="form-horizontal" id="validate-form" style="margin-top: 5%;">
                  <div class="inner-addon left-addon" id="userdiv">
                      <i class="glyphicon glyphicon-user"></i>
                      <input name="employee_ecode" id="user" type="text" class="form-control login" style="border-radius: 0;" placeholder="Ecode" data-parsley-minlength="20" placeholder="At least 6 characters" required autocomplete="off">
                  </div>
                  <div class="inner-addon left-addon" id="passdiv">
                      <i class="glyphicon glyphicon-lock"></i>
                      <input name="employee_pwd" id="pass" type="password" class="form-control login" style="border-radius: 0;" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 hidden " style="margin-bottom: 10px;">
                      <button id="btn_register" class="btn btn-info btn-block">Register</button>
                    </div>             
                    <div class="col-xs-12 col-sm-12">                
                      <button id="btn_login" class="btn btn-primary btn-block btn-custom-jk" data-style="expand-left" data-spinner-color="white" data-size="s" style="margin-bottom: 0px;background: #01579B;padding: 5px;">
                      <span class=""></span> Login
                      </button>

                      <a href="#" id="forgot_password" style="float: right;margin-top: 10px;">Forgot Password?</a>
                    </div>
                  </div>
                </form>              
            </div>
            <div class="login_change_password hidden">
                <center>
                  <h3 class="box-title m-b-0"><i class="fa fa-lock"></i> Change Password</h3>
                  <small>Please setup your password below</small>
                </center>
                <form action="#" class="form-horizontal" id="frm_change_password" style="margin-top: 5%;">
                  <div class="inner-addon left-addon" id="epassword">
                      <i class="glyphicon glyphicon-lock"></i>
                      <input name="employee_new_pwd" id="new_pass" type="password" class="form-control change" style="border-radius: 0;" id="exampleInputPassword1" placeholder="New Password" required data-error-msg="Password is required." autocomplete="off">
                  </div>
                  <div class="inner-addon left-addon" id="cpassword">
                      <i class="glyphicon glyphicon-lock"></i>
                      <input name="employee_c_pwd" id="c_pass" type="password" class="form-control change" style="border-radius: 0;" id="exampleInputPassword1" placeholder="Confirm Password" autocomplete="off">
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12">
                      <button id="btn_change_password" type="button" class="btn btn-warning btn-block btn-custom-jk" data-style="expand-left" data-spinner-color="white" data-size="s" style="margin-bottom: 0px;padding: 5px;">
                      <span class=""></span> Change Password
                      </button>
                    </div>                    
                    </div>   
                </form>                  
            </div>

            <div class="forgot_password_panel hidden">
                <center>
                  <h3 class="box-title m-b-0"><i class="fa fa-lock"></i> Forgot Password</h3>
                  <small>Please enter your email below</small>
                </center>
                <form action="#" class="form-horizontal" id="frm_forgot_password" style="margin-top: 5%;">
                  <div class="inner-addon left-addon">
                      <i class="glyphicon glyphicon-envelope"></i>
                      <input name="email_address" id="email_address" type="email" class="form-control forgot" style="border-radius: 0;" id="exampleInputPassword1" placeholder="Your E-mail Address" required data-error-msg="Email Address is required." autocomplete="off">
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12">
                      <button id="btn_forgot_password" type="button" class="btn btn-info btn-block btn-custom-jk" data-style="expand-left" data-spinner-color="white" data-size="s" style="margin-bottom: 0px;padding: 5px;">
                      <span class=""></span> Reset My Password
                      </button>


                      <a href="#" id="back_to_login" style="float: right;margin-top: 10px;color: black;"><i class="fa fa-arrow-left"></i> Back to Login</a>

                    </div>                    
                    </div>   
                </form>                  
            </div>            

        </div>

      </div>            

</section>
<?php echo $_def_js_files; ?>
<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#user').focus();

            var employee_id; var employee_account_id;

            var bindEventHandlers=(function(){
              
              var showPanel = function(i){

                if (i == 1){ // Login

                    $('.login_entry').removeClass('hidden');
                    $('.login_change_password').addClass('hidden');
                    $('.forgot_password_panel').addClass('hidden');

                }else if(i == 2){ // Change Password

                    $('.login_change_password').removeClass('hidden');
                    $('.login_entry').addClass('hidden');
                    $('.forgot_password_panel').addClass('hidden');

                    $('#new_pass').focus();

                }else if(i == 3){ // Forgot Password

                    $('.login_entry').addClass('hidden');
                    $('.login_change_password').addClass('hidden');
                    $('.forgot_password_panel').removeClass('hidden');

                    $('#email_address').focus();

                }

              };


                $('#btn_login').click(function(){
                    var l = Ladda.create(this);
                    l.start();
                    validateUser().done(function(response){
                        
                        if (response.is_new == 1){

                          showPanel(2);
                          employee_id = response.employee_id;
                          employee_account_id = response.employee_account_id;

                        }else{
                          showNotification(response);
                          if(response.stat=="success"){
                              setTimeout(function(){
                                  window.location.href = "Profile";
                              },600);
                          }

                        }

                    }).always(function(){
                        l.stop();
                    });
                });

                $('input.login').keypress(function(evt){
                    if(evt.keyCode==13){
                      evt.preventDefault();
                      $('#btn_login').click();
                    }
                });

                $('input.change').keypress(function(evt){
                    if(evt.keyCode==13){
                      evt.preventDefault();
                      $('#btn_change_password').click();
                    }
                });           

                $('input.forgot').keypress(function(evt){
                    if(evt.keyCode==13){
                      evt.preventDefault();
                      $('#btn_forgot_password').click();
                    }
                });                                

                $('#pass, #user').click(function(){
                  $(this).focus();
                });

                $('#btn_change_password').on('click', function(){

                    if (validateRequiredFields($('#frm_change_password'))){

                        var l = Ladda.create(this);
                        l.start();
                        ChangePassword().done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                setTimeout(function(){
                                    window.location.href = "Profile";
                                },600);
                            }
                        }).always(function(){
                            l.stop();
                        });

                    }

                });

                $('#btn_forgot_password').on('click', function(){

                    if (validateRequiredFields($('#frm_forgot_password'))){

                        var l = Ladda.create(this);
                        l.start();
                        ForgotPassword().done(function(response){
                            showNotification(response);
                            if(response.stat=="success"){
                                setTimeout(function(){
                                    window.location.href = "Login";
                                },600);
                            }else{
                                $('#email_address').focus();
                            }
                        }).always(function(){
                            l.stop();
                        });

                    }

                });                

              $('#forgot_password').on('click', function(){

                showPanel(3);

              });

              $('#back_to_login').on('click', function(){

                showPanel(1);

              });                 

            })();

            var validateRequiredFields=function(f){
                  var stat=true;

                  var pword = $('#new_pass').val();
                  var cpword = $('#c_pass').val();

                  $('div.form-group').removeClass('has-error');
                  $('input[required],textarea[required],select[required]',f).each(function(){

                          if($(this).val()==""){
                              showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                              $(this).closest('div.form-group').addClass('has-error');
                              $(this).focus();
                              stat=false;
                              return false;
                          }
                          if(pword!=cpword){
                              showNotification({title:"Error!",stat:"error",msg:"Pasword Doesn't Match"});
                              $('#epassword').addClass('has-error');
                              $('#cpassword').addClass('has-error');
                              $('#c_pass').focus();
                              stat=false;
                              return false;
                          }

                  });

                  return stat;
            };

            var validateUser=function(){
                var _data={user_ecode : $('input[name="employee_ecode"]').val() , user_pword : $('input[name="employee_pwd"]').val()};
                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/validateemployee",
                    "data" : _data,
                    "beforeSend": function(){
                    }
                });
            };

            var ChangePassword=function(){
                  
                var _data=$('#frm_change_password').serializeArray();
                _data.push({name : "employee_id" ,value : employee_id});
                _data.push({name : "employee_account_id" ,value : employee_account_id});

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/change_password",
                    "data" : _data,
                    "beforeSend": function(){
                    }
                });
            };

            var ForgotPassword=function(){
                  
                var _data=$('#frm_forgot_password').serializeArray();

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/forgot_password",
                    "data" : _data,
                    "beforeSend": function(){
                    }
                });
            };            

            var showNotification=function(obj){
                PNotify.removeAll(); //remove all notifications
                new PNotify({
                    title:  obj.title,
                    text:  obj.msg,
                    type:  obj.stat
                });
            };
        });
    </script>

</body>

<?php echo $loaderscript; ?>
<!-- Mirrored from avenxo.kaijuthemes.com/extras-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:14:53 GMT -->
</html>
