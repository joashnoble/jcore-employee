<!DOCTYPE html>
<html>
 	<head>
		<title><?php echo $this->session->employee_fullname; ?> | Schedules</title>
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

      #tbl_schedule_filter{
          display: none;
      }      

      .day_off{
        color: red;
      }

      @media (max-width: 1024px) {
        .payperiod{
          width: auto;
        }
        .print_div{
          float: right;
        }
        #tbl_schedule{
          font-size: 9pt;
        }
        .page-title, div.breadcrumbs{
          text-align: center!important;
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
                <h1 class="page-title depth"><i class="fa fa-calendar"></i> SCHEDULES</h1>
              </div>
              <div class="col-md-4">
                <div class="breadcrumbs">
                  <span class="breadcrumbs">PROFILE</span><span class="slash-divider">/</span><span class="bread-current">SCHEDULES</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="grey-light-bg plr-30 plr-0-767 clearfix">    
        <!-- COTENT CONTAINER -->
        <div class="white-bg pt-30" style="margin-bottom: 100px;">
          <div class="relative">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                    <select name="pay_period_id" class="payperiod" id="pay_period_id">
                        <option value="">Select Pay Period</option>
                        <?php foreach($pay_period as $rows){?>
                          <option value="<?php echo $rows->pay_period_id; ?>">
                            <?php echo $rows->period; ?>
                          </option>
                        <?php }?>
                    </select>

                      <span class="print_div">
                            <a class="green download_payslip" id="btn_download_pdf" data-toggle="tooltip" data-placement="top" title="Download PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
                      </span>   
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <input type="text" id="txt_search" name="txt_search" class="form-control fa fa-search" style="width: 100%;font-family: arial;margin-top: 5px;" placeholder="Search Schedule">
                </div>
              </div>
            </div>
            <div class="row" style="margin: 20px 3px 20px 3px;">
              <div class="table-responsive mb-40">
                <div class="col-md-12">
                  <table width="100%" id="tbl_schedule" class="table" style="margin-bottom: 20px;" cellpadding="5" cellspacing="5">
                    <thead>
                      <tr>

                        <th class="depth" width="5%"><center>Is in</center></th>
                        <th class="depth" width="5%"><center>Is out</center></th>
                        <th class="depth" width="10%">Day</th>
                        <th class="depth" width="20%">Date</th>
                        <th class="depth" width="20%">Shift</th>
                        <th class="depth" width="10%"><i class="fa fa-clock-o blue"></i> Time In</th>
                        <th class="depth" width="10%"><i class="fa fa-clock-o red"></i> Time Out</th>
                        <th class="depth" width="20%">Schedule Type</th>
                      </tr>
                    </thead>
                  </table>
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
        var dt;

        var initializeControls=function(){

         var scheduling=function(){

            dt=$('#tbl_schedule').DataTable({
            "fnInitComplete": function (oSettings, json) {
                  countTable();
                },
              "bDestroy": true,
              "bPaginate": false,
              "bInfo" : false,  
              "order":[[0,'desc']],
              "paging": false,
              "bAutoWidth": true,
              "ajax": {
              "url": "Schedules/transaction/list",
              "type": "POST",
              "data": function ( d ) {
                  return $.extend( {}, d, {
                      "pay_period_id": $('#pay_period_id').val()
                      });
                  }
              },
              "columns": [

                  { targets:[0], data: 'is_in',
                    render: function (data, type, full, meta){
                        if(data == 1){
                            return "<center><span style='font-size:12pt;' class='fa fa-check-circle-o isinclass green' data-isin='1'></span></center>";
                        }
                        else{
                            return "<center><span style='font-size:12pt;color:#DCDCDC;' class='fa fa-check-circle-o isinclass' data-isin='0'></span></center>";
                        }
                    }
                  },
                  { targets:[1], data: 'is_out',
                    render: function (data, type, full, meta){
                        if(data == 1){
                            return "<center><span style='font-size:12pt;' class='fa fa-check-circle-o green'></span></center>";
                        }
                        else{
                            return "<center><span style='font-size:12pt;color: #DCDCDC;' class='fa fa-check-circle-o'></span></center>";
                        }
                    }
                  },
                  { targets:[2],data: "day" },
                  { targets:[3],data: "date", 
                      render: function (data, type, full, meta){
                              return "<span class='dataday'>"+data+"</span>";
                      }
                  },
                  { targets:[4],data: "shift" },
                  { targets:[5],data: "time_in" },
                  { targets:[6],data: "time_out" },
                  { targets:[7],data: null,
                      render: function (data, type, full, meta){
                            return "<span class='daytype' data-daytype='"+data.daytype+"' data-dayoff='"+data.is_day_off+"'>"+data.daytype+"</span>";
                      }
                  }                  

              ],
              "rowCallback":function( row, data, index ){


                  if (data.is_day_off == 1){
                    $(row).addClass("day_off");
                  }else{

                  $(row).find('td').addClass("black");
                  }


              }

          });

        };

        scheduling();

        _pay_period_id=$("#pay_period_id").select2({
            placeholder: "Select Pay Period",
            allowClear: false
        });


        $('#pay_period_id').on('change', function(){
          scheduling();
        });  

        $("#txt_search").keyup(function(){  
            dt
                .search(this.value)
                .draw();
        });

        $('#btn_download_pdf').on('click',function(){

            pay_period_id = _pay_period_id.select2('val');            
            window.location = "PayrollReports/payrollreports/emp_sched_report/"+pay_period_id;

        });

        }();

        var countTable = function(){
            var table = $('#tbl_schedule').dataTable();
            rowcount = table.fnGetData().length; 

            if (rowcount == 0){
                $('#btn_download_pdf').hide();
            }else{
                $('#btn_download_pdf').show();
            }
        };        

      });
    </script>
	</body>
</html>		