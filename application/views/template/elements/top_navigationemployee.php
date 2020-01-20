<!-- HEADER 1 NO-TRANSPARENT -->
<header id="nav" class="header header-1 no-transparent mobile-no-transparent">
  <div class="header-wrapper">
    <div class="container-m-30 clearfix">
      <div class="logo-row">
        <!-- LOGO --> 
        <div class="logo-container-2">
          <div class="logo-2">
            <a href="Profile" class="clearfix">
              <img src="<?php echo $this->config->item("base_urlmain").'/'.$this->session->company_logo; ?>" class="logo-img" alt="Logo">
            </a>
          </div>
        </div>
        <!-- BUTTON --> 
        <div class="menu-btn-respons-container">
            <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target="#main-menu .navbar-collapse">
                <span aria-hidden="true" class="icon_menu hamb-mob-icon"></span>
            </button>
        </div>
     </div>
    </div>
    <!-- MAIN MENU CONTAINER -->
    <div class="main-menu-container">
          <div class="container-m-30 clearfix"> 
                <!-- MAIN MENU -->
                <div id="main-menu">
                  <div class="navbar navbar-default" role="navigation">
                    <!-- MAIN MENU LIST -->
                    <nav class="collapse collapsing navbar-collapse right-1024">
                      <ul class="nav navbar-nav">
                        <!-- MENU ITEM -->
                        <li class="<?php if($active == 1){ echo 'active'; } ?>"><a href="Schedules"><div class="main-menu-title"><i class="fa fa-calendar"></i> SCHEDULES</div></a></li>
                        <li class="<?php if($active == 2){ echo 'active'; } ?>"><a href="Payslip"><div class="main-menu-title"><i class="fa fa-file-o"></i> PAYSLIP</div></a></li>
                        <li class="<?php if($active == 3){ echo 'active'; } ?>"><a href="Leaves"><div class="main-menu-title"><i class="fa fa-calendar"></i> LEAVES</div></a></li>
                        <li class="<?php if($active == 4){ echo 'active'; } ?>"><a href="Memo"><div class="main-menu-title"><i class="fa fa-newspaper-o"></i> <span class="notification">MEMO

                        <?php if (count($memo) > 0){?>
                          <span class="badge memo_count"> <?php echo count($memo); ?></span>
                        <?php } ?>

                        </span> </div></a></li>
                        <li class="<?php if($active == 5){ echo 'active'; } ?>"><a href="Announcement"><div class="main-menu-title"><i class="fa fa-newspaper-o"></i> <span class="notification">ANNOUNCEMENT

                        <?php if (count($announcement) > 0){?>
                          <span class="badge announcement_count"> <?php echo count($announcement); ?></span>
                        <?php } ?>
                        
                        </span></div></a></li>
                        <li class="parent">
                          <a href="#">
                            <div class="main-menu-title">
                              <img src="<?php echo $this->config->item("base_urlmain").'/'.$this->session->employee_photo; ?>" style="width: 25px; height: 25px;border-radius: 50%;"> <span style="text-transform: uppercase;"><?php echo $this->session->employee_fname; ?></span>
                            </div>
                          </a>
                          <ul class="sub">
                          <li><a href="Profile"><i class="fa fa-user"></i> Profile</a></li>
                          <li><a href="#" class="btn_change_password"><i class="fa fa-cog"></i> Account Settings</a></li>
                          <li><a href="Login/transaction/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                          </ul>
                        </li>
                      </ul>
                    </nav> 
                  </div>
                </div>
                <!-- END main-menu -->
          </div>
          <!-- END container-m-30 -->
    </div>
    <!-- END main-menu-container -->
  </div>
  <!-- END header-wrapper -->
</header>

<!-- Modal -->
<div class="modal fade bootstrap-modal" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-body">
      <div class="modal-content">
        <div class="modal-header">
          <center><h5 class="modal-title" id="myModalLabel"><i class="fa fa-lock"></i> CHANGE PASSWORD</h5></center>
        </div>
        <div class="modal-body">
          
          <form id="frm_password">

              <div class="success_notif_pass hidden" tabindex='1'>
                 <div class="row" style="font-size: 9pt;"><div class="col-md-12"><div class="alert alert-success"><span aria-hidden="true" class="alert-icon icon_like"></span>You have successfully updated your password.</div></div></div>
               </div>

              <div class="error_notif_pass"></div>

              <div class="form-group group-pass">
                <span class="control-label depth" for="email">
                  <span class="md-title">Current Password</span> <span class="red">*</span>
                  <span class="required_notif"></span>
                </span>
                <div class="input-group">
                        <input type="password" class="form-control password c_pass" name="current_password" id="current_password" placeholder="Please enter your current password" required data-error-msg="This Field is required.">
                    <div class="input-group-addon view_icon" data-view-type="0" data-input-class="c_pass">
                      <i class="fa fa-eye-slash"></i>
                    </div>
                </div>
              </div>
              <div class="form-group group-pass epassword">
                <span class="control-label depth" for="email">
                  <span class="md-title">New Password</span> <span class="red">*</span>
                  <span class="required_notif"></span>
                </span>
                <div class="input-group">
                      <input type="password" class="form-control password n_pass" name="new_password" id="new_password" placeholder="Please enter your new password" required data-error-msg="This Field is required.">
                  <div class="input-group-addon view_icon" data-view-type="0" data-input-class="n_pass">
                    <i class="fa fa-eye-slash"></i>
                  </div>
                </div>
              </div>              
              <div class="form-group group-pass cpassword">
                <span class="control-label depth" for="email">
                  <span class="md-title">Confirm Password</span> <span class="red">*</span>
                  <span class="required_notif"></span>
                </span>
                <div class="input-group">
                      <input type="password" class="form-control password co_pass" name="confirm_password" id="confirm_password" placeholder="Please retype your password" required data-error-msg="This Field is required.">
                  <div class="input-group-addon view_icon" data-view-type="1" data-input-class="co_pass">
                    <i class="fa fa-eye-slash"></i>
                  </div>
                </div>
              </div>  

            </form>

        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-success btn_pass" id="btn_save_password"><i class="fa fa-save"></i> <span id="save_pass_title">Save changes</span></button>
           <button type="button" class="btn btn-default btn_pass" id="btn_close_password" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
</div>