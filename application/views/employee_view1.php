<!DOCTYPE html>
<html lang="en">
<?php echo $loader; ?>
<head>
    <meta charset="utf-8">
    <title>JCORE : <?php echo $this->session->employee_fullname; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">
    <?php echo $_def_css_files; ?>
    <?php echo $_def_js_files; ?>
    <?php echo $loaderscript; ?>
</head>
<body class="animated-content emp_homepage">
<div id="wrapper">
    <div id="layout-static">
        <div class="static-content-wrapper content-employee">
            <div class="static-content">
                    <div class="page-content">
                        <div class="container-fluid cf">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="col-md-3">
                                  <div class="panel panel-default" >
                                    <div class="panel-body body-online bopanel">
                                      <div class="pcustom">
                                        <center>
                                        <img class="img-responsive img-emp" src="<?php echo $this->config->item('base_urlmain').'/'.$this->session->employee_photo; ?>">
                                        </center>
                                      <div>
                                        <center>
                                          <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $this->session->employee_id;?>">
                                          <div class="empfname">
                                            <strong><?php echo $this->session->employee_fullname;?></strong>
                                          </div>
                                          <table class="tbl_emp_details">
                                            <tr>
                                              <td class="tbl_emp_dt1"><span class="fa fa-barcode"></span> 
                                                <?php echo $this->session->employee_ecode;?></td>
                                            </tr>
                                            <tr>
                                              <td class="tbl_emp_dt"><span class="fa fa-envelope"></span> 
                                                <?php echo $this->session->employee_email;?></td>
                                            </tr>
                                            <tr>
                                              <td class="tbl_emp_dt2"><span class="fa fa-mobile"></span> 
                                                <?php echo $this->session->employee_contact;?></td>
                                            </tr>
                                          </table>
                                        </center>
                                        <table class="tbl_emp_contact">
                                          <tr>
                                            <td class="tbl_emp_title" width="50%">Status</td>
                                            <td class="tbl_emp_cntct_details">
                                              <?php
                                                $is_retired = $this->session->is_retired;
                                                if ($is_retired == 1){
                                                  echo '<div style="padding: 5px 2px; border-radius: 5px; background: #d32f2f; color: #fff; width: 50%;"><center>Inactive</center></div>';
                                                }else{
                                                  echo '<div style="padding: 5px 2px; border-radius: 5px; background: #81C784; color: #fff; width: 50%;"><center>Active</center></div>';
                                                }
                                              ?>
                                              </td>
                                          </tr>
                                          <tr>
                                            <td class="tbl_emp_title">Member Since</td>
                                            <td class="tbl_emp_cntct_details">
                                              <?php echo date('M j, Y', strtotime($this->session->employee_empdate));?>
                                            </td>
                                          </tr>
                                          <tr>
                                          </tr>
                                        </table>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-9">
                                  <div class="panel-body-navbar">
                                   <div class="topnav" id="myTopnav">
                                      <a href="#" class="active" id="pview"> Profile</a>
                                      <a href="#" id="sview"> Schedules</a>
                                      <a href="#" id="psview"> Payslip <span></a>
                                      <a href="#" id="lview"> Leaves</a>
                                      <a href="#" id="mview"> Memo </a>
                                      <a href="#" id="aview"> Announcement</a>
                                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                                  </div>
                                </div>
                              </div>
                                <div class="col-md-9">
                                  <div class="panel panel-default">
                                    <div class="panel-body body-online mainpanel">

                                      <!-- Profile Panel -->
                                      <div class="emppanel" id="proflepanel">
                                          <div class="emppanel-title">
                                            <span class="fa fa-user" aria-hidden="true"></span> About
                                          </div>
                                          <hr>
                                          <div class="col-md-12 proflepanel-details">
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    First Name :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->employee_fname;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="ttile">
                                                    Middle Name :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <?php echo $this->session->employee_mname;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="ttile">
                                                    <div class="ttile">
                                                      Latname :
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->employee_lname;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="ttile">
                                                    Birthday :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <?php echo date('M j, Y', strtotime($this->session->employee_birthdate));?>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="ttile">
                                                    Email :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <?php echo $this->session->employee_email;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="ttile">
                                                    Contact :
                                                </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <?php echo $this->session->employee_contact;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="ttile">
                                                    Telephone :
                                                </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <?php echo $this->session->employee_telphone;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="ttile">
                                                    Address :
                                                </div>
                                                </div>
                                                <div class="col-md-8">
                                                  <?php echo $this->session->employee_address;?>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="emppanel-title">
                                            <span class="fa fa-info-circle" aria-hidden="true"></span> Employee Information
                                          </div>
                                          <hr>
                                          <div class="col-md-12 proflepanel-details">
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    Employee Type :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->employment_type;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile" style="font-size: 15px;">
                                                    Employment Date :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->employee_empdate;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    Branch :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->branch;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    Department :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->department;?>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-6">      
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    Section :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->section;?>
                                                </div>
                                              </div>                                    
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    Group :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->group_desc;?>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    Position :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->position;?>
                                                </div>
                                              </div>    
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="ttile">
                                                    Pay Type :
                                                  </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $this->session->payment_type;?>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>

                                      <!-- Schedule Panel -->
                                        <div class="emppanel" id="schedulespanel">
                                          <div class="emppanel-title">
                                            <span class="fa fa-calendar" aria-hidden="true"></span> SCHEDULES
                                              <button type="button" class="btn btn-default btn-print-sched" id="btn_print_schedule"><span class="fa fa-print"></span> Print</button>
                                            <span class="pid">
                                              <select name="pay_period_id" class="payperiod" id="pay_period_id">
                                                <center>
                                                  <option value="">[ Select Pay Period ]</option>
                                                 <?php
                                                    foreach($pay_period as $row)
                                                    {
                                                        echo '<option value="'.$row->pay_period_id  .'">'.$row->pay_period_start.'&nbsp - &nbsp'.$row->pay_period_end.'</option>';
                                                    }
                                                  ?>
                                                </center>
                                              </select>
                                            </span>
                                          </div>
                                          <div>
                                          </div>
                                          <hr>
                                          <div class="col-md-12" style="margin-bottom: 30px;min-height: 450px;height: 100%;width: 100%;">
                                              <table cellspacing="0" width="100%" class="tblschedule tbl" id="tbl_schedule">
                                                <thead>
                                                  <tr>
                                                    <th width="20%">Day</th>
                                                    <th width="20%">Date</th>
                                                    <th width="20%">Shift</th>
                                                    <th width="20%"><span class="fa fa-clock-o timein"></span> Time In</th>
                                                    <th width="20%"><span class="fa fa-clock-o timeout"></span> Time Out</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                              </table>
                                          </div>
                                        </div>

                                        <div id="p_preview_print_schedule" style="display: none;"></div>

                                      <!-- Payslip Panel -->
                                        <div class="emppanel" id="payslippanel">
                                          <div class="emppanel-title">
                                            <span class="fa fa-list-ul" aria-hidden="true"></span> PAYSLIP
                                          </div>
                                          <div>
                                          </div>
                                          <hr>
                                          <div class="col-md-12" style="margin-bottom: 30px;">
                                            <table cellpadding="0" cellspacing="0" class="tbl" border="0" id="tblpayslip">
                                              <thead>
                                                <tr>
                                                  <th width="10%"><center>View</center></th>
                                                  <th width="40%">Pay Period</th>
                                                  <th>Net</th>
                                                  <th width="50%"><center>Action</center></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>

                                        <div id="p_preview_print" style="display: none;"></div>

                                      <!-- Leaves Panel -->
                                        <div class="emppanel" id="leavespanel">
                                          <div class="emppanel-title">
                                            <span class="fa fa-list-ul" aria-hidden="true"></span> LEAVES
                                            <a class="btn btn-default" data-popup-open="popup-1" href="#" id="btn_add_leave"><span class="fa fa-plus" data-popup-open="popup-1"></span> Add New Leave</a>
                                          </div>
                                          <div>
                                          </div>
                                          <hr>
                                          <div class="col-md-12" style="margin-bottom: 30px;">
                                            <div class="tbl-content">
                                              <table cellpadding="0" class="tbl" cellspacing="0" border="0" id="tblleaves">
                                                <thead>
                                                  <tr>
                                                    <th width="20%">Leave Type</th>
                                                    <th width="20%">Date Filed</th>
                                                    <th id="alignth" width="20%">From</th>
                                                    <th id="alignth" width="20%">To</th>
                                                    <th width="30%">Purpose</th>
                                                    <th width="20%">Status</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>

                                      <!-- Memos Panel -->
                                        <div class="emppanel" id="memopanel">
                                          <div class="emppanel-title">
                                            <span class="fa fa-list-ul" aria-hidden="true"></span> MEMOS
                                          </div>
                                          <hr>
                                          <div class="col-md-12" style="margin-bottom: 30px;">
                                            <div class="tbl-content">
                                              <table cellpadding="0" class="tbl" cellspacing="0" border="0" id="tblmemo" width="100%">
                                                <thead>
                                                  <tr>
                                                    <th width="25%"><center>View</center></th>
                                                    <th width="25%">Date</th>
                                                    <th width="25%">Memo #</th>
                                                    <th width="25%">Date Granted</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>

                                      <!-- Announcement Panel -->
                                        <div class="emppanel" id="announcementpanel">
                                          <div class="emppanel-title">
                                            <i class="fa fa-newspaper-o" aria-hidden="true"></i> ANNOUNCEMENT
                                          </div>
                                          <div>
                                          </div>
                                          <hr>
                                          <div class="col-md-12" style="margin-bottom: 30px;">
                                            <div class="tbl-content">
                                              <table cellpadding="0" class="tbl" cellspacing="0" border="0" width="100%" id="tbl_announcement">
                                                <thead>
                                                  <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Date / Time Announced</th>
                                                    <th>Announcement Title</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                        </div> <!-- .container-fluid -->
                    </div> <!-- #page-content -->
                </div>
                <?php echo $_footer; ?>
        </div>
    </div><!--static layout -->
</div> <!--wrapper -->

<!--New Leave Modal -->
<div class="popup" data-popup="popup-1" id="popup-1">
    <div class="popup-inner">
        <div class="popup-header">
          <i class="fa fa-file-text" aria-hidden="true"></i> File New Leave
        </div>
        <form id="frm_leave">
          <div class="main-panel">
          <div class="col-md-12 radio-panel">
            <center>
                <input type="radio" name="day" value="1" id="rdbtnwd"> <span id="rlabelwd">Whole Day</span>
                <input type="radio" name="day" value="2" id="rdbtnhd"> <span id="rlabelhd">Half Day</span>
            </center>
          </div>
          <div class="col-md-12 details-panel">
              <div class="errorpanel"></div>
              <div class="rows">
                <span class="details-title">From Date</span> 
              </div>
              <div class="rows">
                <input type="text" class="date-picker date-form" name="fromdate" id="fromdate" data-error-msg="From Date is required." required>
              </div>
              <div class="rows">
                <span class="details-title">To Date</span>
              </div>
              <div class="rows">
                <input type="text" class="date-picker date-form" name="todate" id="todate" data-error-msg="To Date is required." required>
                <input type="hidden" name="todatehidden" id="todatehidden">
                <input type="hidden" name="numberofdates" id="numberofdates">
              </div> 
              <div class="rows">
                <span class="details-title">Reason</span>
              </div>
              <div class="rows">
                <textarea name="reason" id="reason" data-error-msg="Reason / Purpose is required." required></textarea>
              </div>
              <div class="rows">
                <span class="details-title">Type of Leave</span>
              </div>
              <div class="rows">
                <select name="typeofleave" id="typeofleave" data-error-msg="Type of Leave is required." required>
                  <option value="" selected disabled>Select Type of Leave</option>
                  <?php
                    foreach($type_leave as $type_leave)
                    {
                      echo '<option value="'.$type_leave->ref_leave_type_id  .'">'.$type_leave->leave_type.'</option>';
                    }
                  ?>
                </select>
              </div>       
          </div>
          <div class="col-md-12 btn-panel">
            <div class="col-md-6">
              <button type="button" class="submit-btn" id="btn-create-leave">Submit</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="cancel-btn" data-popup-close="popup-1">Cancel</button>
            </div>
          </div>
        </form>
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    </div>
</div>

<!--New Leave Modal -->
<div class="popup" data-popup="popup-account" id="popup-account">
    <div class="popup-inner">
        <div class="popup-header">
          <i class="fa fa-file-text" aria-hidden="true"></i> File New Leave
        </div>
        <form id="frm_leave">
          <div class="main-panel">
          <div class="col-md-12 radio-panel">
            <center>
                <input type="radio" name="day" value="1" id="rdbtnwd"> <span id="rlabelwd">Whole Day</span>
                <input type="radio" name="day" value="2" id="rdbtnhd"> <span id="rlabelhd">Half Day</span>
            </center>
          </div>
          <div class="col-md-12 details-panel">
              <div class="errorpanel"></div>
              <div class="rows">
                <span class="details-title">From Date</span> 
              </div>
              <div class="rows">
                <input type="text" class="date-picker date-form" name="fromdate" id="fromdate" data-error-msg="From Date is required." required>
              </div>
              <div class="rows">
                <span class="details-title">To Date</span>
              </div>
              <div class="rows">
                <input type="text" class="date-picker date-form" name="todate" id="todate" data-error-msg="To Date is required." required>
                <input type="hidden" name="todatehidden" id="todatehidden">
                <input type="hidden" name="numberofdates" id="numberofdates">
              </div> 
              <div class="rows">
                <span class="details-title">Reason</span>
              </div>
              <div class="rows">
                <textarea name="reason" id="reason" data-error-msg="Reason / Purpose is required." required></textarea>
              </div>
              <div class="rows">
                <span class="details-title">Type of Leave</span>
              </div>
              <div class="rows">
                <select name="typeofleave" id="typeofleave" data-error-msg="Type of Leave is required." required>
                  <option value="" selected disabled>Select Type of Leave</option>
                  <?php
                    foreach($type_leave as $type_leave)
                    {
                      echo '<option value="'.$type_leave->ref_leave_type_id  .'">'.$type_leave->leave_type.'</option>';
                    }
                  ?>
                </select>
              </div>       
          </div>
          <div class="col-md-12 btn-panel">
            <div class="col-md-6">
              <button type="button" class="submit-btn" id="btn-create-leave">Submit</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="cancel-btn" data-popup-close="popup-1">Cancel</button>
            </div>
          </div>
        </form>
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    </div>
</div>
<link href="assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">
<script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
<?php echo $_rights; ?>
<script>
$(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);        
        $("body").addClass("modal-open");
        clearFields($('#myForm'));

        $('#fromdate').prop('disabled', true);        
        $('#todate').prop('disabled', true);

        $('#fromdate').datepicker('setDate', null);        
        $('#todate').datepicker('setDate', null);
        e.preventDefault();

    });


    $('[data-popup-account]').on('click', function(e) {

        var targeted_popup_account = jQuery(this).attr('data-popup-account');
        $('[data-popup="' + targeted_popup_account + '"]').fadeIn(350);  

        alert();

        $("body").addClass("modal-open");
        e.preventDefault();

    });
 
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        $("body").removeClass("modal-open")
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });

    var clearFields=function(f){
        $('input,textarea,select',f).val('');
        $(f).find('input:first').focus();
        $('#reason').val('');
        $('#rdbtnwd').prop('checked', false);
        $('#rdbtnhd').prop('checked', false);
        $('#typeofleave').val("");
        $('#todatehidden').val("");
    };    

});

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
$(document).ready(function(){

  var dept_id = 0;var _payperiod;var _payperiodpayslip;

  var checked = "";
  $('#rlabelwd').click(function(){
    rdbtnwd();
  });

  $('#rdbtnwd').click(function(){
    rdbtnwd();
  });

  $('#rlabelhd').click(function(){
    rdbtnhd();
  });

  $('#rdbtnhd').click(function(){
    rdbtnhd();
  });

  var rdbtnhd = function(){
      checked = 'hd';
      $('#rdbtnhd').prop('checked', true);
      $('#rdbtnwd').prop('checked', false);
      $('#fromdate').prop('disabled', false);
      $('#todate').prop('disabled', true);
      $('#numberofdates').val('');
      $('#fromdate').val('');
      $('#todate').val('');
      $('#todatehidden').val('');
  };


  var rdbtnwd = function(){
      checked = 'wd';
      $('#rdbtnwd').prop('checked', true);
      $('#rdbtnhd').prop('checked', false);
      $('#fromdate').prop('disabled', false);
      $('#todate').prop('disabled', false);

        $('#numberofdates').val('');
        $('#fromdate').val('');
        $('#todate').val('');
        $('#todatehidden').val('');
  };

  $("#fromdate").on("change", function(){

    if (checked == 'hd'){
     var date = new Date($("#fromdate").val()),
         days = 1;
      
      if(!isNaN(date.getTime())){
          date.setDate(date.getDate() + days);

          $("#todate").val(date.toInputFormat());
          $("#todatehidden").val(date.toInputFormat());
      }
    }

    var startdate = $("#fromdate").val();
      var enddate = $('#todate').val();
      var start = new Date(startdate);
      var end = new Date(enddate);
      var days = ((end - start) / 1000 / 60 / 60 / 24) + 1;


      if (Date.parse(startdate) > Date.parse(enddate)){
        $('.errorpanel').show();
        $('.errorpanel').html('The End date is lower than the Start date!');

          setTimeout(function(){
             $('.errorpanel').fadeOut(400);
          }, 2000);

        $('#fromdate').val('');
        $('#errorpanel').show();
      }else{
        if (checked == 'wd'){
          if (isNaN(days)){
            $('#numberofdates').val('0');
          }else{
            $('#numberofdates').val(days);
          }
        }

        if(checked == 'hd'){
          if (isNaN(days)){
            $('#numberofdates').val('0');
          }else{
            $('#numberofdates').val('0.5');
          }
        }
      }
  });

  $('#todate').on('change', function(){

    var startdate = $("#fromdate").val();
    var enddate = $('#todate').val();
    var start = new Date(startdate);
    var end = new Date(enddate);
    var days = ((end - start) / 1000 / 60 / 60 / 24) + 1;

    if (Date.parse(startdate) > Date.parse(enddate)){
      $('.errorpanel').show();
      $('.errorpanel').html('The End date is lower than the Start date!');

        setTimeout(function(){
           $('.errorpanel').fadeOut(400);
        }, 2000);

      $('#todate').val('');
      $("#todatehidden").val('');
      $('#errorpanel').show();
    }else{

      if (checked == 'wd'){
        if (isNaN(days)){
          $('#numberofdates').val('0');
        }else{
          $('#numberofdates').val(days);
          $("#todatehidden").val(enddate);
        }
      }

      if(checked == 'hd'){
        if (isNaN(days)){
          $('#numberofdates').val('0');
        }else{
          $('#numberofdates').val('0.5');
          $("#todatehidden").val(enddate);
        }
      }

  }

  });

      Date.prototype.toInputFormat = function() {
       var yyyy = this.getFullYear().toString();
       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       // return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
       return (mm[1]?mm:"0"+mm[0]) + "/" + (dd[1]?dd:"0"+dd[0]) +"/" + yyyy;
    };

    $('#btn-create-leave').click(function(){
            if(validateRequiredFields($('#frm_leave'))){
                createnewleave().done(function(response){
                    showNotification(response);
                    dt_leaves.row.add(response.row_added[0]).draw();
                    clearFields($('#frm_leave'))
                }).always(function(){
                  $('#popup-1').hide();
                    $.unblockUI();
                });
            }
        });

    var createnewleave=function(){
        var _data=$('#frm_leave').serializeArray();

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee1/transaction/createleave",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn-create-leave'))
        });

    };

      //Select2
      _payperiod=$("#pay_period_id").select2({
          placeholder: "Select pay period",
          allowClear: true
      });
      _payperiod.select2('val', null);

      _payperiodpayslip=$("#pay_period_id_payslip").select2({
          placeholder: "Select pay period",
          allowClear: true
      });
      _payperiodpayslip.select2('val', null);
      //select 2

      $('#schedulespanel').hide();
      $('#payslippanel').hide();
      $('#leavespanel').hide();
      $('#announcementpanel').hide();
      $('#memopanel').hide();
      $('#btn_print_schedule').hide();

      $('#sview').click(function(){
        setTimeout(function(){
          $('#tbl_schedule').DataTable().destroy();
          scheduling();
        }, 200);
        animatePanel('sview');
      });

      $('#pview').click(function(){
        animatePanel('pview');
      });

      $('#psview').click(function(){
        animatePanel('psview');
        gpayslip();
      });

      $('#lview').click(function(){
        animatePanel('lview');
        gleaves();
      });

      $('#mview').click(function(){
        animatePanel('mview');
        gmemo();
      });

      $('#aview').click(function(){
        animatePanel('aview');
        getDepartment();
      });
      

       var scheduling=function(){

        var _empid = $('#emp_id').val();
        var _pperiodid = $('#pay_period_id').val();        

        dt=$('#tbl_schedule').DataTable({
          "fnInitComplete": function (oSettings, json) {
                $.unblockUI();
                },
            "sScrollY":'80vh',
            "bPaginate": false,
            "bInfo" : false,  
            "bFilter": false,
            "order":[[0,'desc']],
            "paging": false,
            "bAutoWidth": true,
            "ajax": {
            "url": "SchedEmployee/transaction/list",
            "type": "POST",
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _empid,
                    "pay_period_id": _pperiodid
                    });
                }
            },
            "columns": [
                { targets:[0],data: "day" },
                { targets:[1],data: "date", 
                    render: function (data, type, full, meta){
                            return "<span class='dataday'>"+data+"</span>";
                    }
                },
                { targets:[2],data: "shift" },
                { targets:[3],data: "time_in",
                    render: function (data, type, full, meta){
                      var d = data;
                      d = d.split(' ')[1];
                            return d;
                    }
                },
                { targets:[4],data: "time_out",
                    render: function (data, type, full, meta){
                      var d = data;
                      d = d.split(' ')[1];
                            return d;
                    }
                }

            ],
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "right"
                });

                $(row).find('td').css('border-bottom','1px solid #CFD8DC');
            }

        });


        setTimeout(function(){
            countTable();
        }, 320);
    };

    var countTable = function(){
        var table = $('#tbl_schedule').dataTable();
        rowcount = table.fnGetData().length;    
        if (rowcount == 0){
            $('#btn_print_schedule').hide();
        }else{
            $('#btn_print_schedule').show();
        }
    };

    // scheduling();

        var getschedule=function(){
        $('#tbl_schedule').dataTable().fnDestroy();
        _empid = $('#emp_id').val();
        _pperiodid = $('#pay_period_id').val();
        showSpinningProgress();
        scheduling();

          $.ajax({
              "dataType":"html",
              "type":"POST",
              "url":"PayrollReports/payrollreports/emp_sched_report/"+_empid+"/"+_pperiodid+"",
              beforeSend : function(){
              $('#pay_slip_preview').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
          },
          }).done(function(response){
              $('#p_preview_print_schedule').html(response);
              $.unblockUI();
          });
        };


    $('#pay_period_id').on('change', function(){
      getschedule();

    });

      var animatePanel = function(prm){
        if (prm == 'pview'){
          $('#payslippanel').hide();
          $('#leavespanel').hide();
          $('#schedulespanel').hide();
          $('#proflepanel').fadeIn(600);
          $('#memopanel').hide();
          $('#announcementpanel').hide();

          $('#pview').attr('class','active');
          $('#sview').attr('class','');
          $('#psview').attr('class','');
          $('#lview').attr('class','');
          $('#mview').attr('class','');
          $('#aview').attr('class','');
        }
        else if (prm == 'sview'){
          $('#proflepanel').hide();
          $('#payslippanel').hide();
          $('#leavespanel').hide();
          $('#schedulespanel').fadeIn(600);
          $('#memopanel').hide();
          $('#announcementpanel').hide();

          $('#pview').attr('class','');
          $('#sview').attr('class','active');
          $('#psview').attr('class','');
          $('#lview').attr('class','');
          $('#mview').attr('class','');
          $('#aview').attr('class','');
        }
        else if (prm == 'psview'){
          $('#proflepanel').hide();
          $('#leavespanel').hide();
          $('#schedulespanel').hide();
          $('#payslippanel').fadeIn(600);
          $('#memopanel').hide();
          $('#announcementpanel').hide();

          $('#pview').attr('class','');
          $('#sview').attr('class','');
          $('#psview').attr('class','active');
          $('#lview').attr('class','');
          $('#mview').attr('class','');
          $('#aview').attr('class','');
        } 
        else if (prm == 'lview'){
          $('#proflepanel').hide();
          $('#payslippanel').hide();
          $('#schedulespanel').hide();
          $('#leavespanel').fadeIn(600);
          $('#memopanel').hide();
          $('#announcementpanel').hide();

          $('#pview').attr('class','');
          $('#sview').attr('class','');
          $('#psview').attr('class','');
          $('#lview').attr('class','active');
          $('#mview').attr('class','');
          $('#aview').attr('class','');
        }
        else if (prm == 'mview'){
          $('#proflepanel').hide();
          $('#payslippanel').hide();
          $('#schedulespanel').hide();
          $('#leavespanel').hide();
          $('#memopanel').fadeIn(600);
          $('#announcementpanel').hide();

          $('#pview').attr('class','');
          $('#sview').attr('class','');
          $('#psview').attr('class','');
          $('#lview').attr('class','');
          $('#mview').attr('class','active');
          $('#aview').attr('class','');
        }
        else if (prm == 'aview'){
          $('#proflepanel').hide();
          $('#payslippanel').hide();
          $('#schedulespanel').hide();
          $('#leavespanel').hide();
          $('#memopanel').hide();
          $('#announcementpanel').fadeIn(600);

          $('#pview').attr('class','');
          $('#sview').attr('class','');
          $('#psview').attr('class','');
          $('#lview').attr('class','');
          $('#mview').attr('class','');
          $('#aview').attr('class','active');
        }
        
      };


       var getpayslip=function(){
          var _empid = $('#emp_id').val();   
          dt_payslip=$('#tblpayslip').DataTable({
            // "sScrollY":'80vh',
            "bAutoWidth": true,
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
            "url": "PaySlip/transaction/list",
            "type": "POST",
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _empid
                    });
                }
            },
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "pay_period" },
                { targets:[2],data: "net_pay", 
                  render: $.fn.dataTable.render.number( ',', '.', 2 )},
                { targets:[3],
                    render: function (data, type, full, meta){
                        var printpayslip='<button class="btn btn-default" name="print_payslip" data-toggle="tooltip" data-placement="top" title="Print PaySlip"><i class="fa fa-print"></i> Print</button>';
                        var downloadpdf='<button class="btn btn-default" name="download_payslip" data-toggle="tooltip" data-placement="top" title="Download PDF"><i class="fa fa-download" aria-hidden="true"></i> Download PDF </button>';
                        return '<center>'+ printpayslip +' '+ downloadpdf +'</center>';
                    }
                }
            ],
            language: {
                         searchPlaceholder: "Search Payslip"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "right"
                });

                $(row).find('td').css('border-bottom','1px solid #CFD8DC');
            }

        });

    };

        var gpayslip = function(){
          $('#tblpayslip').dataTable().fnDestroy();
          getpayslip();
        };

      
       var getleaves=function(){
          var _empid = $('#emp_id').val();   
        dt_leaves=$('#tblleaves').DataTable({
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
            "url": "Employee1/transaction/listofleave",
            "type": "POST",
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _empid
                    });
                }
            },
            "columns": [
                { targets:[0],data: "leave_type" },
                { targets:[1],data: "date_filed", 
                    render: function (data, type, full, meta){
                            return "<span class='dataday'>"+data+"</span>";
                    }
                },
                { targets:[2],data: "date_time_from", 
                    render: function (data, type, full, meta){
                            return "<span class='dataday'>"+data+"</span>";
                    }
                },
                { targets:[3],data: "date_time_to", 
                    render: function (data, type, full, meta){
                            return "<span class='dataday'>"+data+"</span>";
                    }
                },
                { targets:[4],data: "purpose" },
                { targets:[5],data: "status" }

            ],
            language: {
                         searchPlaceholder: "Search Leaves"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "right"
                });

                $(row).find('td').css('border-bottom','1px solid #CFD8DC');
            }

        });

    };

       var getmemo=function(){
          var _empid = $('#emp_id').val();   
        dt_memo=$('#tblmemo').DataTable({
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
            "url": "Employee1/transaction/listofmemo",
            "type": "POST",
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "employee_id": _empid
                    });
                }
            },
            "columns": [
                {
                    "targets": [0],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[1],data: "date_memo" },
                { targets:[2],data: "memo_number" },
                { targets:[3],data: "date_granted" },

            ],
            language: {
                         searchPlaceholder: "Search Memo"
                     },
            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(5).attr({
                    "align": "right"
                });

                $(row).find('td').css('border-bottom','1px solid #CFD8DC');
            }

        });

    };

    var getDepartment = function(){
        getemployeedept().done(function(response){
          if (response.info.length > 0){
            dept_id = response.info[0].ref_department_id;
            branch_id = response.info[0].ref_branch_id;
            group_id = response.info[0].group_id;
            gannouncement(dept_id,branch_id,group_id);
          }
        });
    };

    var getemployeedept = function(){
      var _data=$('#').serializeArray();
        _data.push({name : "emp_id" ,value : $('#emp_id').val()});
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Employee1/transaction/get_info",
            "data":_data
        });
    };

       var getannouncement =function(dept_parm,branch_parm,group_parm){
        dt_announcement=$('#tbl_announcement').DataTable({
            "order":[[0,'desc']],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
            "url": "Employee1/transaction/listofannouncement",
            "type": "POST",
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "dept_id": dept_parm,
                    "branch_id": branch_parm,
                    "group_id": group_parm
                    });
                }
            },
            "columns": [
                { visible: false, targets:[0],data: "announcement_post_id" },
                {
                    "targets": [1],
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { targets:[2],data: "date_created" },
                { targets:[3],data: "announcement_title" }
            ],
            language: {
                         searchPlaceholder: "Search Announcement"
                     },
            "rowCallback":function( row, data, index ){
                $(row).find('td').css('border-bottom','1px solid #CFD8DC');


                // $(row).css('background-color','#F5F5F5');
                // $(row).css('font-weight','normal');
            }

        });

    };    

        var gleaves = function(){
          $('#tblleaves').dataTable().fnDestroy();
          getleaves();
        };

        var gmemo = function(){
          $('#tblmemo').dataTable().fnDestroy();
          getmemo();
        };

        var gannouncement = function(dept_parm,branch_parm,group_parm){
          $('#tbl_announcement').dataTable().fnDestroy();
          getannouncement(dept_parm,branch_parm,group_parm);
        };

        var detailRows = [];

        $('#tblpayslip tbody').on('click', 'button[name="download_payslip"]', function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt_payslip.row(_selectRowObj).data();
            _selectedID=data.pay_slip_id;
            showSpinningProgress();
            $.ajax({
                "dataType":"html",
                "type":"POST",
                "url":"PaySlip/layout/download_pdf_payslip/"+ _selectedID,
                beforeSend : function(){
                $('#pay_slip_preview').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
            },
            }).done(function(response){
                $.unblockUI();
            });

        });

        $('#tbl_announcement tbody > tr td').css('background-color','#FFF');
        $('#tbl_announcement tbody > tr td').css('font-weight','500');



        // $('#tbl_announcement tbody').on('click', 'tr', function () {
        //     row=$(this).closest('tr');
        //     row.css('background-color','#F5F5F5');
        //     row.css('font-weight','normal');
        // });

        $('#tblpayslip tbody').on('click', 'button[name="print_payslip"]', function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt_payslip.row(_selectRowObj).data();
            _selectedID=data.pay_slip_id;
            showSpinningProgressLoading();
            $.ajax({
                "dataType":"html",
                "type":"POST",
                "url":"PaySlip/layout/print_payslip/"+ _selectedID +"/0/print",
                beforeSend : function(){
                $('#p_preview_print').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
            },
            }).done(function(response){
                $('#p_preview_print').html(response);

            var currentURL = window.location.href;
            var output = currentURL.match(/^(.*)\/[^/]*$/)[1];
            output = output+"/assets/css/css_special_files.css";
            $("#p_preview_print").printThis({
                debug: false,
                importCSS: true,
                importStyle: false,
                printContainer: false,
                printDelay: 1000,
                loadCSS: output,
                formValues:true
            });
            setTimeout(function() {
                 $.unblockUI();
            }, 1000);
            });

        });

        $('#btn_print_schedule').click(function(){
            showSpinningProgressLoading();
            var currentURL = window.location.href;
            var output = currentURL.match(/^(.*)\/[^/]*$/)[1];
            output = output+"/assets/css/css_special_files.css";
            $("#p_preview_print_schedule").printThis({
                debug: false,
                importCSS: true,
                importStyle: false,
                printContainer: false,
                printDelay: 1000,
                loadCSS: output,
                formValues:true
            });
            setTimeout(function() {
                 $.unblockUI();
            }, 1000);

        });

        $('#tblpayslip tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt_payslip.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                var d=row.data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"PaySlip/layout/pay-slip/"+ d.pay_slip_id +"/0/fullview",
                    beforeSend : function(){
                    $('#pay_slip_preview').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
                },
                }).done(function(response){
                    row.child( response ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                    $.unblockUI();
                });
            }
        } );

        $('#tblmemo tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt_memo.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                var d=row.data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Employee1/transaction/memolayout/"+ d.emp_memo_id,
                    beforeSend : function(){
                    $('#pay_slip_preview').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
                },
                }).done(function(response){
                    row.child( response ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                    $.unblockUI();
                });
            }
        } );


        $('#tblmemo tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt_memo.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                var d=row.data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Employee1/transaction/memolayout/"+ d.emp_memo_id,
                    beforeSend : function(){
                    $('#pay_slip_preview').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
                },
                }).done(function(response){
                    row.child( response ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                    $.unblockUI();
                });
            }
        } );


    $('#tbl_announcement tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt_announcement.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();
                }
                else {
                    tr.addClass( 'details' );
                    //console.log(row.data());
                    var d=row.data();

                    $.ajax({
                        "dataType":"html",
                        "type":"POST",
                        "url":"Employee1/transaction/announcement_detail/"+ d.announcement_post_id,
                        beforeSend : function(){
                        $('#pay_slip_preview').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
                    },
                    }).done(function(response){
                        row.child( response ).show();
                        // Add to the 'open' array
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }
                        $.unblockUI();
                    });
                }
            } );
        

  var showSpinningProgress=function(e){
      $.blockUI({ message: '<img src="assets/img/gears.svg"/><br><h4 style="color:#ecf0f1;">Gathering Data...</h4>',
          css: {
          border: 'none',
          padding: '15px',
          backgroundColor: 'none',
          opacity: 1,
          zIndex: 20000,
      } });
      $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
  };

  var showSpinningProgressLoading=function(e){
      $.blockUI({ message: '<img src="assets/img/gears.svg"/><br><h4 style="color:#ecf0f1;">Initialize Printing...</h4>',
          css: {
          border: 'none',
          padding: '15px',
          backgroundColor: 'none',
          opacity: 1,
          zIndex: 20000,
      } });
      $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
  };

  var validateRequiredFields=function(f){
  var stat=true;
  var pword=$('#user_pword').val();
  var cpword=$('#user_confirm_pword').val();
  $('div.form-group').removeClass('has-error');
    $('div.form-group').removeClass('has-error');
    $('input[required],textarea[required],select[required]',f).each(function(){

            if($(this).is('select')){
            if($(this).val()==0 || $(this).val()==null){
                showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                $(this).closest('.input-group').addClass('has-error');
                $(this).focus();
                stat=false;
                return false;
            }

            }else{
            if($(this).val()==""){
                showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                $(this).closest('.input-group').addClass('has-error');
                $(this).focus();
                stat=false;
                return false;
            }
            if(pword!=cpword){
                showNotification({title:"Error!",stat:"error",msg:"Pasword Doesnt Match"});
                $('#password').addClass('has-error');
                $('#confpassword').addClass('has-error');
                $('#user_confirm_pword').focus();
                stat=false;
                return false;
            }
        }

    });

    return stat;
    };

    $('#pview').mouseover(function(){
      $('#parrow').show();
    });

    $('#pview').mouseout(function(){
      $('#parrow').hide();
    });
    $('#sview').mouseover(function(){
      $('#sarrow').show();
    });
    $('#sview').mouseout(function(){
      $('#sarrow').hide();
    });
    $('#lview').mouseover(function(){
      $('#larrow').show();
    });
    $('#lview').mouseout(function(){
      $('#larrow').hide();
    });

    var clearFields=function(f){
        $('input,textarea,select',f).val('');
        $(f).find('input:first').focus();
        $('#rdbtnwd').prop('checked', false);
        $('#rdbtnhd').prop('checked', false);
        $('#typeofleave').val("");
        $('#todatehidden').val("");
    };   

    $('#print_pay_slip').click(function(event){
            showinitializeprint();
            var currentURL = window.location.href;
            var output = currentURL.match(/^(.*)\/[^/]*$/)[1];
            output = output+"/assets/css/css_special_files.css";
            $("#pay_slip_preview").printThis({
                debug: false,
                importCSS: true,
                importStyle: false,
                printContainer: false,
                formValues:false,
                printDelay: 1000,
            });
            setTimeout(function() {
                 $.unblockUI();
            }, 1000);

    });

    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

                if($(this).is('select')){
                if($(this).val()==0 || $(this).val()==null){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }

                }else{
                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }




        });

        return stat;
    };

    $('.date-picker').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true

    });


  var showNotification=function(obj){
        PNotify.removeAll();
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

});

</script>
</body>

</html>
