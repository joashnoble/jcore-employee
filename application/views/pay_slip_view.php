<!DOCTYPE html>
<html>
 	<head>
		<title><?php echo $this->session->employee_fullname; ?> | Payslip</title>
		<meta charset=utf-8 >
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="HTML5 Template" > 
		<meta name="description" content="Haswell - Responsive HTML5 Template" > 
		<meta name="author" content="Vladimir Azarushkin">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $_def_css_files; ?>		
    <style type="text/css">

      .table-responsive{
        overflow: auto;
      }

      .dataTables_filter, .dataTables_paginate {
        text-align: right;
      }
      .dataTables_length{
        font-family: calibri!important;
        font-weight: normal!important;
      }
      .dataTables_filter{
        font-family: calibri!important;
      }
      td.details-control {
          background: url('assets/img/Folder_Closed.png') no-repeat center center;
          cursor: pointer;
      }
      tr.details td.details-control {
          background: url('assets/img/Folder_Opened.png') no-repeat center center;
      }
      .row_tbl_payslip{
        margin: 10px 3px 20px 3px;
      }

      #tbl_payslip_wrapper div.row{
          margin-bottom: 10px;
      }

      @media (max-width: 767px) {

        .dataTables_filter, .dataTables_paginate, .dataTables_length, .dataTables_info {
          width: 100%!important;
          text-align: center;
        }

        .dataTables_length{
          padding-top: 20px;
        }
        #tbl_payslip td, #tbl_payslip th{
          font-size: 9pt;
        }

      }

      @media (max-width: 1024px) {

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
                <h1 class="page-title depth"><i class="fa fa-file"></i> PAYSLIP</h1>
              </div>
              <div class="col-md-4">
                <div class="breadcrumbs">
                  <span class="breadcrumbs">PROFILE</span><span class="slash-divider">/</span><span class="bread-current">PAYSLIP</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="grey-light-bg plr-30 plr-0-767 clearfix">    
        <!-- COTENT CONTAINER -->
        <div class="white-bg pt-30" style="margin-bottom: 100px;">
          <div class="relative">

            <div class="row row_tbl_payslip">
              <div class="table-responsive">
              <div class="col-md-12">
                  <table id="tbl_payslip" class="table" style="margin-bottom: 20px;border: 1px solid lightgray; " width="100%"  cellpadding="2" cellspacing="2">
                    <thead>
                      <tr>
                        <th class="depth" width="4%"><center>View</center></th>
                        <th class="depth" width="32%" style="text-align: right;">Gross Pay</th>
                        <th class="depth" width="32%" style="text-align: right;">Deductions</th> 
                        <th class="depth" width="32%" style="text-align: right;">Net Pay</th>
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
        var dt; var _selectedID;

        var initializeControls=function(){


        var detailRows = [];

          dt=$('#tbl_payslip').DataTable({
            "bAutoWidth": true,
            "responsive": true,
            "order":[[4,'desc']],
            "ajax": {
            "url": "Payslip/transaction/list",
            "type": "POST",
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "pay_period_id": $('#pay_period_id').val()
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
                { targets:[1],data: "gross_pay", 
                    render: function (data, type, full, meta){
                      return '<span>  &#8369;'+accounting.formatNumber(data,2)+'</span>';
                    }
                },

                { targets:[2],data: "total_deductions", 
                    render: function (data, type, full, meta){
                      return '<span>  &#8369; '+accounting.formatNumber(data,2)+'</span>';
                    }
                },

                { targets:[3],data: "net_pay", 
                    render: function (data, type, full, meta){
                      return '<span>  &#8369; '+accounting.formatNumber(data,2)+'</span>';
                    }
                },
                { visible:false,targets:[4],data: "pay_slip_id" },
                { visible:false,targets:[5],data: null }

            ],
            "language": {
                searchPlaceholder: "Search Payslip"
            },
            "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

                        api.column(5, {page:'current'} ).data().each( function ( group, i ) {
                            if ( last !== group ) {
                                $(rows).eq( i ).before(
                                    '<tr class="group"><td colspan="3" style="background-color:#F8F8F8;color:black;vertical-align:middle;"><strong>'+'Payslip #: '+group.payslip_no+'</strong><br><small>'+group.pay_period+'</small></td><td style="background-color:#F8F8F8;color:black;text-align: right;vertical-align: middle;padding-right: 10px;"><a class="green download_payslip" data-toggle="tooltip" data-placement="top" title="Download PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a><input type="hidden" class="pay_slip_id" value="'+group.pay_slip_id+'"></td></tr>'
                                );

                                last = group;
                            }
                        } );
                    },

            "rowCallback":function( row, data, index ){

                $(row).find('td').eq(1).attr({
                    "align": "right"
                });

                $(row).find('td').eq(2).attr({
                    "align": "right"
                });                

                $(row).find('td').eq(3).attr({
                    "align": "right"
                });                

                $(row).find('td').eq(1).css({"vertical-align": "middle"});                
                $(row).find('td').eq(2).css({"vertical-align": "middle"});  
                $(row).find('td').eq(3).css({"vertical-align": "middle"});  

                $(row).find('td').addClass("black");
            }

        });

        _pay_period_id=$("#pay_period_id").select2({
            placeholder: "Select Pay Period",
            allowClear: false
        });

        $('#tbl_payslip tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
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
                    "url":"Payslip/layout/pay-slip/"+ d.pay_slip_id +"/0/fullview",
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
        });

        $('#tbl_payslip tbody').on('click', 'a.download_payslip', function(){

            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID = _selectRowObj.find('.pay_slip_id').val();

            window.location = "Payslip/layout/download_pdf_payslip/"+ _selectedID;

        });

    }();

        $('#pay_period_id').on('change', function(){
          $('#tbl_payslip').DataTable().ajax.reload();
        });  

      });
    </script>
	</body>
</html>		