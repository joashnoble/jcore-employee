<!DOCTYPE html>
<html>
 	<head>
		<title><?php echo $this->session->employee_fullname; ?> | Leaves</title>
		<meta charset=utf-8 >
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="HTML5 Template" > 
		<meta name="description" content="Haswell - Responsive HTML5 Template" > 
		<meta name="author" content="Vladimir Azarushkin">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $_def_css_files; ?>		
    <style type="text/css">

      .payperiod{
        width: 50%;
        margin-top: 5px;
      }

      .button.small{
        border-radius: 0px;
        padding: 10px 10px 10px 15px;
        line-height: 6px;        
      }

      #tbl_leaves_filter{
          display: none;
      }      

      .medium{
        padding: 10px 10px 10px 10px!important;
      }

      .request_entry{
        margin: auto;
        background-color: #F5F5F5;
        width: 50%;
        padding: 10px;
      }

      .red{
        color: red;
        font-weight: bold;
      }

      textarea{
        resize: vertical;
        min-height: 100px;
        max-height: 200px;
      }

      .required_notif{
        float: right;
        color: red;
        font-size: 7pt;
        font-weight: bold;
      }      

      @media (max-width: 1024px) {
        .payperiod{
          width: auto;
        }
        .print_div{
          float: right;
        }
        #tbl_leaves{
          font-size: 9pt;
        }
        .page-title, div.breadcrumbs{
          text-align: center!important;
        }
      } 

      @media (max-width: 500px) {

        .button_request{
          width: 80%;
          text-align: center;
        }
        .button_pdf{
          width:19%;
          text-align: center;
        }

        .request_entry{
          background: #FFF;
          width: 100%!important;

        }

      }

      @media (max-width: 890px) {

        .request_entry{
          width: 100%;
        } 

      }


      @media (max-width: 990px) {
        .request_entry{
          width: 100%;
        } 

      }


      @media (max-width: 400px) {

        .button_request{
          width: 78%;
          text-align: center;
        }
        .button_pdf{
          width:20%;
          text-align: center;
        }


      }      

      @media (max-width: 234px) {

        .button{
          font-size: 8pt!important;
        }

        .button_request{
          width: 60%;
          text-align: center;
        }
        .button_pdf{
          width:35%;
          text-align: center;
        }

      }        


      @media (max-width: 346px) {

        .button{
          font-size: 10pt!important;
        }

        .button_request{
          width:68%;
          text-align: center;
        }
        .button_pdf{
          width:30%;
          text-align: center;
        }

      }


      @media (max-width: 266px) {
        .button{
          font-size: 8pt!important;
        }          
      }



    </style>
	</head>
	<body>
		<!-- LOADER -->	
		<div id="loader-overflow">
      <div id="loader3"></div>
    </div>	
		<div id="wrap" class="boxed ">
			<div class="grey-bg"> <!-- Grey BG  -->	
        <?php echo $_top_navigation; ?>
        <!-- PAGE TITLE SMALL -->
        <div class="page-title-cont page-title-small grey-light-bg">
          <div class="relative container align-left">
            <?php echo $_header; ?>
            <div class="row">
              <div class="col-md-8">
                <h1 class="page-title depth"><i class="fa fa-calendar"></i> <span class="tnx_title">LEAVES</span></h1>
              </div>
              <div class="col-md-4">
                <div class="breadcrumbs">
                  <span class="breadcrumbs">PROFILE</span><span class="slash-divider">/</span><span class="bread-current">LEAVES</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="grey-light-bg plr-30 plr-0-767 clearfix">    
        <!-- COTENT CONTAINER -->
        <div class="white-bg pt-30" style="margin-bottom: 100px;">
          <div class="leave_list_panel">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-4" >
                    <a class="button medium teal button_request" id="btn_request_leave" data-toggle="tooltip" data-placement="top" title="Request Leave"><span class="request_label"><span aria-hidden="true" class="button-icon-left fa fa-calendar"></span> REQUEST LEAVE</span></a>
                    <a class="button medium teal download_payslip button_pdf" id="btn_download_pdf" data-toggle="tooltip" data-placement="top" title="Download PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                    <br>
                </div>
                <div class="col-md-4">
                  <div style="margin-top: 8px;">
                    <select class="form-control" width="100%" id="leave_status_id" name="leave_status_id" style="width: 100%">
                      <option value="all">All</option>
                      <?php foreach($status as $row){ ?>
                        <option value="<?php echo $row->leave_status_id; ?>">
                          <?php echo $row->status_name; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                    <input type="text" id="txt_search" name="txt_search" class="form-control fa fa-search" style="width: 100%;font-family: arial;margin-top: 5px;" placeholder="Search Leave">
                </div>
              </div>
            </div>
            <div class="row" style="margin: 20px 3px 20px 3px;">
              <div class="table-responsive mb-40">
                <div class="col-md-12">
                  <table width="100%" id="tbl_leaves" class="table" style="margin-bottom: 20px;" cellpadding="5" cellspacing="5">
                    <thead>
                      <tr>
                        <th class="depth" width="10%"><center>Status</center></th>
                        <th class="depth" width="15%">Leave Type</th>
                        <th class="depth" width="15%">Date Filed</th>
                        <th class="depth" width="15%">Date Granted</th>
                        <th class="depth" width="15%">From</th>
                        <th class="depth" width="15%">To</th>
                        <th class="depth" width="20%">Purpose</th>
                        <th></th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>



          </div>

          <div class="leave_entry_panel hidden">
              
              <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;">
                  

                  <div class="request_entry">    

                    <form id="frm_entry">
                        
                     <div class="success_notif hidden" tabindex='1'>
                       <div class="row"><div class="col-md-12"><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span aria-hidden="true" class="alert-icon icon_like"></span><strong>Well done!</strong> You have successfully requested a leave. <br>If you have any concerns please cooperate with your HR Manager. Thank you!</div></div></div>
                     </div>

                     <div class="error_notif" tabindex='1'></div>                     

                      <div class="row">
                          
                        <div class="col-md-12">
                          

                          <div class="col-md-6">
                          
                                <div class="form-group">
                                  <span class="control-label depth" for="email">
                                    Type of Leave <span class="red">*</span>
                                    <span class="required_notif"></span>
                                  </span>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-list-ul"></i>
                                    </div>
                                    <availleavetype id="showavailableleave2select"></availleavetype>

                                  </div>
                                </div>

                          </div>

                          <div class="col-md-3">
                          
                                <div class="form-group">
                                  <span class="control-label depth" for="email">
                                    Balance
                                  </span>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-code"></i>
                                    </div>
                                        <input type="text" class="form-control numeric" id="current_balance1" placeholder="Balance" readonly>
                                  </div>
                                </div>

                          </div>    

                          <div class="col-md-3">
                          
                                <div class="form-group">
                                  <span class="control-label depth" for="email">
                                    Leave
                                  </span>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-code"></i>
                                    </div>
                                        <input type="text" class="form-control numeric" name="total_leave" id="total_leave" placeholder="Leave" readonly>
                                  </div>
                                </div>

                          </div>                                                    

                          <div class="col-md-6">
                            
                                <div class="form-group">
                                  <span class="control-label depth" for="email">
                                    From Date <span class="red">*</span>
                                    <span class="required_notif"></span>
                                  </span>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                        <input type="text" class="form-control date-picker1" name="from_date" id="from_date" placeholder="MM/DD/YYYY" required data-error-msg="Date From is required.">
                                  </div>
                                </div>

                          </div>
                          <div class="col-md-6">
                            
                                <div class="form-group">
                                  <span class="control-label depth" for="email">
                                    To Date <span class="red">*</span>
                                    <span class="required_notif"></span>
                                  </span>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                        <input type="text" class="form-control date-picker1" name="to_date" id="to_date" placeholder="MM/DD/YYYY" required data-error-msg="To Date is required.">
                                  </div>
                                </div> 



                          </div>

                          <div class="col-md-12">
                          
                                <div class="form-group">
                                  <span class="control-label depth" for="email">
                                    Reason of Leave <span class="red">*</span>
                                    <span class="required_notif"></span>
                                  </span>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                        <textarea class="form-control" rows="5" placeholder="Reason of Leave" name="reason" required data-error-msg="Reason of leave is required."></textarea>

                                  </div>
                                </div>

                          </div>


                        </div>
                        <div class="col-md-12">
                          
                          <div class="col-md-12">
                            <div style="margin-top: 10px;">
                              <button type="button" class="button medium blue" id="btn_save" data-toggle="tooltip" data-placement="top" style="width: 49%;">
                                <span class="request_label"><center> <i class="fa fa-save"></i> SAVE</center></span>
                              </button>
                              <button type="button" class="button medium deeporange" id="btn_cancel" data-toggle="tooltip" data-placement="top" style="width: 49%;">
                                <span class="request_label"> <center><i class="fa fa-times-circle"></i> CANCEL</center></span>
                              </button>
                            </div>
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>

                </div>
              </div>

          </div>




        </div>
      </div>
      <?php echo $_footer; ?>
			</div><!-- End BG -->	
		</div><!-- End wrap -->	
    <!-- JS begin -->
    <?php echo $_def_js_files; ?>
    <!-- JS end -->	
    <script type="text/javascript">
      $(document).ready(function(){
        var dt; var _ref_leave_type_id;

        var initializeControls=function(){

         var leaves=function(){

            dt=$('#tbl_leaves').DataTable({
            "fnInitComplete": function (oSettings, json) {
                  countTable();
                },
              "bDestroy": true,
              "bPaginate": false,
              "bInfo" : false,  
              "order":[[7,'asc']],
              "paging": false,
              "bAutoWidth": true,
              "ajax": {
              "url": "Leaves/transaction/listofleave",
              "type": "POST",
              "data": function ( d ) {
                  return $.extend( {}, d, {
                      "leave_status_id": $('#leave_status_id').val()
                      });
                  }
              },
              "columns": [
                  { targets:[0],data: null,
                    render: function (data, type, full, meta){
                      return '<center><span class="label label-'+data.status_label+'">'+data.status_name+'</span></center>';
                    }
                  },            
                  { targets:[1],data: "leave_type" },
                  { targets:[2],data: "date_filed" },
                  { targets:[3],data: "date_granted" },
                  { targets:[4],data: "date_time_from" },
                  { targets:[5],data: "date_time_to" },
                  { targets:[6],data: "purpose" },
                  { visible: false,targets:[7],data: "status" }
              ],
              "rowCallback":function( row, data, index ){

                  // $(row).find('td').eq(5).attr({
                  //     "align": "right"
                  // });

                  $(row).find('td').addClass("black");
              }

          });

        };

        leaves();

        var leave_apply_select2 = function(){

            _ref_leave_type_id=$("#ref_leave_type_id").select2({
                placeholder: "Select a Leave",
                allowClear: false
            });

            _ref_leave_type_id.select2("val", null);
        };

        var OnChangeLeave=function(){
            $('#ref_leave_type_id').change(function(){
                var i = $(this).val();
                get_leave_details(i).done(function(response){
                    var row = response.data[0];
                    $('#current_balance1').val(accounting.formatNumber(row.current_balance,2));
                }).always(function(){
                });
            });
        };

        $('#leave_status_id').on('change', function(){
          leaves();
        });  

        $("#txt_search").keyup(function(){  
            dt.search(this.value)
              .draw();
        });

        $('#btn_save').click(function(){

            if (validateRequiredFields($('#frm_entry'))){

               requestNewLeave().done(function(response){


                    if (response.stat == "success"){

                        dt.row.add(response.row_added[0]).draw();

                            $('.success_notif').removeClass('hidden');

                            $('.success_notif').focus();

                            $('#btn_save').attr("disabled", true);
                            $('#btn_cancel').attr("disabled", true);

                        setTimeout(function(){
                          showList(true);
                        },2000);                            

                    }else if (response.stat == "error"){

                            $('.error_notif').html('<div class="row"><div class="col-md-12"><div class="alert alert-danger"><button type="button" class="close error_close" data-dismiss="alert" aria-hidden="true">×</button><span aria-hidden="true" class="alert-icon icon_error-triangle_alt"></span><strong>Warning!</strong> Not Enough Leave Grant.</div></div></div>');
                            $('.error_notif').focus();

                        setTimeout(function(){
                          $('.error_notif').html("");
                        },4000); 

                    }

                });

            }
        });

        $('#btn_download_pdf').on('click',function(){
            leave_status_id = $('#leave_status_id').val();          
            window.location = "Leaves/transaction/leave_report/"+leave_status_id;
        });

        $('.error_close').on("click", function(){
          $('.error_notif').html('');
        });

        $('#btn_request_leave').on('click', function(){          
          clearFields($('#frm_entry'));


          $('.success_notif').addClass('hidden');
          $('.error_notif').html('');

          $('#btn_save').attr("disabled", false);
          $('#btn_cancel').attr("disabled", false);          
          $('div.form-group').removeClass('has-error');
          $('div.form-group').find('.required_notif').html('');

            getAvailLeave().done(function(response){
                var show1todiv="";

                var show2select="<select class='form-control' name='ref_leave_type_id' id='ref_leave_type_id' style='width: 100%;' required data-error-msg='Leave is required.'><option value=''>Select a Leave</option>";

                    if(response.available_leave.length==0||response.available_leave.length==null){
                        $('#showavailableleave2select').html('<input type="text" readonly placeholder="No Leave Available" style="text-align: center;" class="form-control" required data-error-msg="No Leave Available">');
                        return;
                    }

                var jsoncount=response.available_leave.length-1;

                 for(var i=0;parseInt(jsoncount)>=i;i++){
                    show2select+='<option value='+response.available_leave[i].emp_leaves_entitlement_id+'>'+response.available_leave[i].ref_leave_type_short_name+'</option>';
                 }

                 $('#showavailableleave2select').html(show2select+"</select>");

                 leave_apply_select2();
                 OnChangeLeave();
                 $('#current_balance1').val('');

            }).always(function(){

                showList(false);
            });


        });

        $('#btn_cancel').on('click', function(){
          showList(true);
        });       


        var dateonchange=function(){
          var date1 = $('#from_date').val();
          var date2 = $('#to_date').val();

          if (date1 != "" && date2 != ""){
            $('#total_leave').val(accounting.formatNumber(computeDate(date1,date2),2));
          }
        };

        $('#from_date').on("change", function(){
          dateonchange();
        });


        $('#to_date').on("change", function(){
          dateonchange();
        });


        }();

        var showList = function(trnsc){

          if (trnsc == true){
            $('.leave_list_panel').removeClass('hidden');
            $('.leave_entry_panel').addClass('hidden');
            $('.tnx_title').html('LEAVES');
          }else{
            $('.leave_list_panel').addClass('hidden');
            $('.leave_entry_panel').removeClass('hidden');
            $('.tnx_title').html('FILE NEW LEAVE');
          }

        };

        var formatDate=function(date){
          var formattedDate = new Date(date);
          var d = formattedDate.getDate();
          var m =  formattedDate.getMonth();
          m += 1;  // JavaScript months are 0-11
          var y = formattedDate.getFullYear();

          return y+'-'+m+'-'+d;
        }

        var computeDate=function(date1, date2){

          var date1 = formatDate(date1);
          var date2 = formatDate(date2);

          // First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
          date1 = date1.split('-');
          date2 = date2.split('-');

          // Now we convert the array to a Date object, which has several helpful methods
          date1 = new Date(date1[0], date1[1], date1[2]);
          date2 = new Date(date2[0], date2[1], date2[2]);

          // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
          date1_unixtime = parseInt(date1.getTime() / 1000);
          date2_unixtime = parseInt(date2.getTime() / 1000);

          // This is the calculated difference in seconds
          var timeDifference = date2_unixtime - date1_unixtime;

          // in Hours
          var timeDifferenceInHours = timeDifference / 60 / 60;

          // and finaly, in days :)
          var timeDifferenceInDays = timeDifferenceInHours  / 24;

          return timeDifferenceInDays+1;
        }

        var validateRequiredFields=function(f){
            var stat=true;

            $('div.form-group').removeClass('has-error');
            $('div.form-group').find('.required_notif').html('');

            $('input[required],textarea[required],select[required]',f).each(function(){


                    if($(this).val()==""){

                        $(this).closest('div.form-group').find('.required_notif').html($(this).data('error-msg'));
                        $(this).closest('div.form-group').addClass('has-error');
                        // $(this).focus();
                        stat=false;
                    }

            });

            return stat;
        };


        var countTable = function(){
            var table = $('#tbl_leaves').dataTable();
            rowcount = table.fnGetData().length; 

            if (rowcount == 0){
                $('#btn_download_pdf').hide();
            }else{
                $('#btn_download_pdf').show();
            }
        };        

        var requestNewLeave=function(){
            var _data=$('#frm_entry').serializeArray();
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Leaves/transaction/createleave",
                "data" : _data,
                "beforeSend": function(){
                }
            });
        };

        var getAvailLeave=function(){

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Leaves/transaction/getavailableleave"
            });
        };

      var get_leave_details=function(emp_leaves_entitlement_id){
          var _data=$('#').serializeArray();
          _data.push({name : "emp_leaves_entitlement_id" ,value : emp_leaves_entitlement_id});

          return $.ajax({
              "dataType":"json",
              "type":"POST",
              "url":"Leaves/transaction/leave_details",
              "data":_data,
          });
      };        

        var clearFields=function(f){
            $('input,textarea,select',f).val('');
            $(f).find('input:first').focus();
            $('#current_balance1').val('');
            $('#ref_leave_type_id').val(null).trigger("change");
        };

      $('.date-picker1').datepicker({
          todayBtn: "linked",
          keyboardNavigation: false,
          forceParse: false,
          calendarWeeks: true,
          autoclose: true
      });

      });
    </script>
	</body>
</html>		