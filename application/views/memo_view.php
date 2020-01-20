<!DOCTYPE html>
<html>
 	<head>
		<title><?php echo $this->session->employee_fullname; ?> | Memo</title>
		<meta charset=utf-8 >
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="HTML5 Template" > 
		<meta name="description" content="Haswell - Responsive HTML5 Template" > 
		<meta name="author" content="Vladimir Azarushkin">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $_def_css_files; ?>		

    <style type="text/css">

      body, td, input, textarea, select{
            font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
      }
      .payperiod{
        width: 50%;
        margin-top: 5px;
      }

      .button.small{
        border-radius: 0px;
        padding: 10px 10px 10px 15px;
        line-height: 6px;        
      }

      #tbl_memos_filter{
          display: none;
      }      

      .medium{
        padding: 10px 10px 10px 10px!important;
      }

      .request_entry{
        margin: auto;
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

      #tbl_memos td{
        padding: 11px 10px 11px 10px;
        cursor: pointer;
        font-size: 10pt;

        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;  

      }

      .bold{
        /*color: #B20000!important;*/
        font-weight: 700;
      }

      #tbl_memos{

        border: 5px solid #F0F0F0;
      }

      #tbl_memos tbody > tr{
        border: 1px solid lightgray;
        background: #F0F0F0;
      }

      .is_new{
        background: #FFF!important;
      }

      .tr_hover:hover{

        opacity: .99;
        border: 1px solid lightgray!important;
        color: black!important;


        -webkit-box-shadow: 0 6px 8px -8px #222;
        -moz-box-shadow: 0 6px 8px -8px #222;
        box-shadow: 0 6px 8px -8px #222;
      }

      .memo_remarks{
        color: #808080;
        font-weight: normal!important;
      }

      .memo_list_panel{
        padding-bottom: 10px;
      }
  
      .date:hover{
        cursor: pointer;
      }      

      #tbl_memos_paginate{
        text-align: right;
      }

      .pagination {
          display: inline-block;
          padding-left: 0;
          margin: 0; 
          border-radius: 2px;
          font-size: 9pt;
      }

      .arrow-prev, #btn_download_pdf{
        margin-left: 20px;
        padding: 5px;
        cursor: pointer;
        font-size: 13pt;
        padding-left: 10px;
        padding-right: 10px;
      }

      .arrow-prev{
        float: left;
      }

      #btn_download_pdf{

        margin-right: 20px;
        float: right;
      }

      .arrow-prev:hover, #btn_download_pdf:hover{
        background: #F0F0F0;
        border-radius: 50%;     
        color: black;
      }

      #memo_title{
        overflow-wrap: break-word;
        font-size: 15pt;
      }

      #memo_disciplinary_action{
        font-size: 12pt;
        font-weight: bold;
      }      

      #memo_action_taken, #memo_date_granted{
        font-size: 10pt;
        font-weight: bold;
      }

      #memo_date_details{

        font-size: 9pt;
        float: right;
      }

      #memo_remarks{
        text-align: justify-all;
      }

      @media (max-width: 1024px) {
        .payperiod{
          width: auto;
        }
        .print_div{
          float: right;
        }
        #tbl_memos{
          font-size: 7pt;
        }
        .page-title, div.breadcrumbs{
          text-align: center!important;
        }

        #tbl_memos_paginate{
          text-align: center!important;
          margin-top: 10px;
        }

        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 0; 
            border-radius: 2px;
            font-size: 8pt;
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

        #tbl_memos td{
          font-size: 8pt;
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
                <h1 class="page-title depth"><i class="fa fa-newspaper-o"></i> <span class="tnx_title">MEMO</span></h1>
              </div>
              <div class="col-md-4">
                <div class="breadcrumbs">
                  <span class="breadcrumbs">PROFILE</span><span class="slash-divider">/</span><span class="bread-current">MEMO</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="grey-light-bg plr-30 plr-0-767 clearfix">    
        <!-- COTENT CONTAINER -->
        <div class="white-bg pt-30" style="margin-bottom: 100px;">
          <div class="memo_list_panel">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-2" >
                    <div class="form-group">
                      <span class="control-label depth" for="email">
                        From Date <span class="red">*</span>
                        <span class="required_notif"></span>
                      </span>
                      <div class="input-group date date-picker-1">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" id="from_date" placeholder="DD/MM/YYYY">
                      </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <span class="control-label depth" for="email">
                        To Date <span class="red">*</span>
                        <span class="required_notif"></span>
                      </span>
                      <div class="input-group date date-picker-1">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" id="to_date" placeholder="DD/MM/YYYY">
                      </div>
                    </div>                  
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <br>
                    <input type="text" id="txt_search" name="txt_search" class="form-control fa fa-search" style="width: 100%;font-family: arial;margin-top: 5px;" placeholder="Search">
                </div>
              </div>
            </div>
            <div class="row" style="margin: 20px 3px 20px 3px;">
              <div class="mb-40">
                <div class="col-md-12">

                  <div class="tbl_panel">
                    <table width="100%" class="table noselect" id="tbl_memos" cellpadding="5" cellspacing="5">
                      <col width="15%">
                      <col width="65%">
                      <col width="20%">
                      <col>
                    </table>
                  </div>
                </div>
              </div>
            </div>



          </div>

          <div class="memo_entry_panel hidden">
              
              <div class="row">


                <div class="col-md-12">
                        <span class="arrow-prev" data-toggle="tooltip" data-placement="bottom" title="Back to Memo List">
                          <i class="fa fa-arrow-left"></i>
                        </span>

                        <span id="btn_download_pdf" data-toggle="tooltip" data-placement="bottom" title="Download Memo">
                          <i class="fa fa-file-pdf-o green"></i>
                        </span>
                        <br>
                </div>

                <div class="col-md-12">
                  <div class="row" style="margin: 35px;">
                    <div id="" class="depth">
                      
                      <span id="memo_title"></span>
                      <span id="memo_date_details"></span>

                    </div><br>
                    <div id="" class="depth">
                      
                      <span id="memo_disciplinary_action"></span><br><br>
                      Action Taken : <span id="memo_action_taken"></span> <br>
                      Date Granted : <span id="memo_date_granted"></span>

                    </div><br>
                    <div id="memo_remarks" class="depth"></div><br>
                  </div>
                    

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
        var dt; var _ref_leave_type_id; var _selectedID;

        var initializeControls=function(){

         var memos=function(){

            dt=$('#tbl_memos').DataTable({
            "fnInitComplete": function (oSettings, json) {
                },
              "bDestroy": true,
              "bLengthChange": false,
              "bInfo" : false,  
              "order" : [[3, "desc"]],
              "bAutoWidth": true,
              "ajax": {
              "url": "Memo/transaction/listofmemo",
              "type": "POST",
              "data": function ( d ) {
                  return $.extend( {}, d, {
                      "from_date": $('#from_date').val(),
                      "to_date": $('#to_date').val()
                      });
                  }
              },
              "columns": [       
                  { targets:[0],data: "memo_number",
                    render: function (data, type, full, meta){
                      return '<span class="title">'+data+'</span>';
                    }
                  },
                  { targets:[1],data: null,
                    render: function (data, type, full, meta){
                      return '<span class="title">'+data.disciplinary_action_policy+'</span> <span class="memo_remarks"> - '+data.remarks+'</span>';
                    }
                  },

                  { targets:[2],data: null,
                    render: function (data, type, full, meta){
                      return '<span class="title">'+data.date_memo+'</span>';
                    }
                  },
                  { visible: false,targets:[3],data: "date_memo_temp" }

              ],
              "drawCallback": function( settings ) {
                   $("#tbl_memos thead").remove();
               },
              "rowCallback":function( row, data, index ){
                
                  if (data.is_read == 0){
                    $(row).addClass('is_new');
                    $(row).find('span.title').addClass('bold');
                  }

                  $(row).find('td').eq(2).attr({
                      "align": "right"
                  });

                  $(row).addClass('tr_hover');
                  $(row).find('td').addClass("black");
              }

          });

          $('#tbl_memos').bind("contextmenu", function(e) {
            e.preventDefault();
          });

        };

        memos();

        _ref_leave_type_id=$("#ref_leave_type_id").select2({
            placeholder: "Select a Leave",
            allowClear: false
        });

        _ref_leave_type_id.select2("val", null);


        $('#from_date').on('change', function(){
          memos();
        });  

        $('#to_date').on('change', function(){
          memos();
        });  

        $("#txt_search").keyup(function(){  
            dt.search(this.value)
              .draw();
        });

        $('#btn_save').click(function(){

            if (validateRequiredFields($('#frm_entry'))){
                // if(_txnMode=="create"){
                     requestNewLeave().done(function(response){

                          dt.row.add(response.row_added[0]).draw();
                          showList(true);
                      });
                // }
            }
        });

        $('#tbl_memos tbody').delegate('tr', 'click', function(){

            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID = data.emp_memo_id;

            $('#memo_title').html(data.memo_number);
            $('#memo_date_details').html(data.memo_date_details);
            $('#memo_disciplinary_action').html(data.disciplinary_action_policy);
            $('#memo_action_taken').html(data.action_taken);
            $('#memo_date_granted').html(data.date_granted);
            $('#memo_remarks').html(data.remarks);

            if(data.is_read == 0){

              _selectRowObj.removeClass('is_new');
              _selectRowObj.find('span.title').removeClass('bold');

              readMemo(_selectedID).done(function(response){

                  if (response.memo_count > 0){
                    $('.memo_count').html(response.memo_count);
                  }else{
                    $('.memo_count').hide();
                  }

              });

            }

            showList(false);



        });


        $('#btn_download_pdf').on('click',function(){
            window.location = "Memo/transaction/memo_report/"+_selectedID;
        });        

        $('.arrow-prev').on('click', function(){
          showList(true);
        });       


        }();

        var showList = function(trnsc){

          if (trnsc == true){
            $('.memo_list_panel').removeClass('hidden');
            $('.memo_entry_panel').addClass('hidden');
            $('.tnx_title').html('MEMO');
          }else{
            $('.memo_list_panel').addClass('hidden');
            $('.memo_entry_panel').removeClass('hidden');
            $('.tnx_title').html('MEMO');          }

        };

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

        var readMemo=function(emp_memo_id){
            var _data=$('#').serializeArray();
            _data.push({name : "emp_memo_id" ,value : emp_memo_id});
            
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Memo/transaction/read_memo",
                "data" : _data
            });
        };

        var clearFields=function(f){
            $('input,textarea,select',f).val('');
            $(f).find('input:first').focus();
            $('#ref_leave_type_id').val(null).trigger("change");
        };

        $('.date-picker-1').datepicker({
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