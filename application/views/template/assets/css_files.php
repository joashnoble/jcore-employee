<link rel="icon" href="assets/img/favicon.png" type="image/gif" sizes="16x16">
<link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet">
<link type="text/css" href="assets/css/animate.css" rel="stylesheet">
<link type="text/css" href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<link type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
<link type="text/css" href="assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">              <!-- Themify Icons -->
<link type="text/css" href="assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles -->
<link type="text/css" href="assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
<link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
<link href="assets/plugins/notify/pnotify.core.css" rel="stylesheet"> <!-- notification -->
<link href="assets/css/pace.css" rel="stylesheet"> <!-- pace -->
<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet"> <!-- sweetalert -->
<link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">
<link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"> 
<link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              
<!-- iCheck -->
<link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">    
<link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">               
<!-- Custom Checkboxes / iCheck -->
<link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
<style>
	.demo-options{
		top:50px !important;
	}
	.datepicker{z-index:9999 !important}
	.panel-heading{
		background-color:#2c3e50 !important;

	}
	.panel-heading h2{
		color:white !important;
		border-radius:10px;
	}
	.panel-default{
		border-radius:5px;
		border-bottom:2px solid #2c3e50 !important;
	}
	.boldlabel{
		font-weight:bold;
	}
	.inputhighlight{
		border:1.5px solid #27ae60;
		opacity:0.9;
	}
	.black{
		color:black !important;
	}
	.green{
		color:#27ae60 !important;

	}
	.form-group{
		padding:2px !important;
	}
	.nomargin{
		margin:2px;
	}
	.dataTables_length{
		/*float:right;*/
		padding-left:10px;
		padding-top:5px;
	}
	.dataTables_filter {
   /*float:left;*/
   	padding-right:10px;
   	padding-top:5px;
	}

	.dataTables_filter input{
		width: 300px !important;
	}

	.ui-pnotify{
            top:50px;
        }

    .sorting{
        background-color:#2c3e50 !important;
        color:white;
    }
    .sorting_asc{
        background-color:#2c3e50 !important;
        color:white;
    }
    .sorting_desc{
        background-color:#2c3e50 !important;
        color:white;
    }
    .sorting_disabled{
        background-color:#2c3e50 !important;
        color:white;
    }
    .customth{
        background-color:#2c3e50 !important;
        color:white;

    }
    .customtable{

    }
    .table-responsive{
    	overflow-x:initial;
    }

    .no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(assets/img/preloader.gif) center no-repeat #fff;
	}
	.container-fluid{
		/**padding:0px;**/
	}
	.panel-body{
		padding:0px !important;
	}

	::-webkit-scrollbar {
    width: 8px;
    height:9px;
	}

	::-webkit-scrollbar-track {
	    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	    border-radius: 5px;
	}

	::-webkit-scrollbar-thumb {
		background: #7f8c8d;
	    border-radius: 5px;
	    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
	}
	.inlinecustomlabel{
            font-weight: bold;
            margin-top:5px;
            font-size: 14px;

        }
    .inlinecustomlabel-sm{
            font-weight: bold;
            margin-top:5px;
            font-size: 13px;

        }
        .inlinecustomlabel-sm2{
            font-weight: bold;
            font-size: 8pt;
            margin-top:5px;

        }
        .inputcustom{
        	height:30px;
        }
        .loadingimg {
          margin-top:4px;width:150px;height:150px;
          background: transparent url('assets/img/imgpreloader2.gif') center no-repeat;
        }
        .btnedit{
            background-color:#3498db !important;
            color:white;
        }
        .btndelete{
            background-color: #e74c3c !important;
            color:White;
        }
		#topnav .navbar-brand {
	    width: 120px;
		}
	    /*.modal-dialog{
		    height: 750px !important;
		    overflow-y:scroll;
		}*/
		/*.modal-backdrop{
			height:auto !important;
		}*/
/*		.modal-backdrop {
		  position: fixed;
		  top: 0;
		  right: 0;
		  bottom: 0;
		  left: 0;
		  z-index: @zindex-modal-background;
		  background-color: @modal-backdrop-bg;
		  // Fade for backdrop
		  &.fade { .opacity(0); }
		  &.in { .opacity(@modal-backdrop-opacity); }
		}*/
		html {
		  zoom: 90%;
		}
		.form-control {
      border:1px solid #95a5a6 !important;
    }
    .form-control:focus {
        border: 1px solid #455A64 !important;
    }
    /*select:focus {
			transition: all 0.5s ease;
			box-shadow: 1px 1px 15px black !important;
			border-radius: 10px;
			color:black;
        font-weight: bold;
    }*/
		textarea.form-control{

    }
    textarea:focus {
    	outline: none;
    }
/*    input[type="checkbox"]:focus {
			transition: all 0.5s ease;
      outline:5px solid #616161 !important;
    }*/

		.select2 {
			transition: all 0.5s ease;
      border:1px solid #95a5a6 !important;
    }
/*    .select2:focus {
				transition: all 0.5s ease;
        box-shadow: 1px 1px 15px black !important;
				border-radius: 5px;
				color:black;
        font-weight: bold;
        font-size:11pt;
    }*/

	.btn{
		transition: all 0.5s ease;
	}
	.btn:hover{
		box-shadow: 2px 2px 10px black;
	}
	.schedsetting{
		cursor:pointer;
		transition: all 0.5s ease;

	}
	.schedsetting:hover{
		transition: all 0.5s ease;
		color:black;
		box-shadow: 1px 1px 15px black !important;
	}
	.static-sidebar{
		-webkit-transition: width 0.5s, height 0.5s; /* For Safari 3.1 to 6.0 */
	transition: width 0.5s, height 0.5s;
	}
	.icon-bg{
		-webkit-transition: width 0.5s, height 0.5s; /* For Safari 3.1 to 6.0 */
	transition: width 0.5s, height 0.5s, transform 0.5s;
	}
	.icon-bg:hover{
		transform: rotate(360deg);
	}
	.sidebar nav.widget-body > ul.acc-menu li, .sidebar nav.widget-body > ul.acc-menu li a{
		transition: all 0.5s ease;
	}
	.username{
		transition: all 0.5s ease;
	}
	.useremail{
		transition: all 0.5s ease;
	}
	.odd{
		transition: all 0.3s ease-out;
	}
	.even{
		transition: all 0.3s ease-out;
	}.ui-pnotify-text{
		font-weight:bold;
		font-size:10pt !important;
	}
	.reports {
	  width: 95%;
	  height: 95%;
	  margin-top: 10px;
	  padding: 0;
	}

	.report-content {
	  height: auto;
	  min-height: 95%;
	  border-radius: 0;
	}
	.modal-header{
	cursor:move;
	}

	.delete{
		width:40px;background-color:#e74c3c;color:white;
	}
	.add{
		width:40px;background-color:#2ecc71 !important;color:white;"
	}
	.name{
		width:120;background-color:#3498db;color:white;
	}
      td.dataTables_empty{
        text-align: center !important;
      }
      .emp_homepage{
        background-color: #263238 !important;
      }
      .panel-default{
        border: 0px !important;
      }
      .content-employee{
        background: #F5F5F5;
      }
      td.pay_slip_show {
          background: url('assets/img/show.png') no-repeat center center !important;
          cursor: pointer;
      }
      td.details-control {
          background: url('assets/img/Folder_Closed.png') no-repeat center center;
          cursor: pointer;
      }
      tr.details td.details-control {
          background: url('assets/img/Folder_Opened.png') no-repeat center center;
      } 
      .img-emp{
        width: 300px;
        height: 300px;
        display: block;
        margin: 1em auto;
        border: 1px solid #B0BEC5;
/*        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;*/
        /*-webkit-border-radius: 99em;*/
        /*-moz-border-radius: 99em;*/
        /*border-radius: 99em;*/  
        /*border: 2px solid gray;*/ 
        /*box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);  */
        /*-webkit-box-shadow: inset 0 0 20px rgba(0,0,0,0.3); */
      }
        .vertical-menu {
            width: 100%; /* Set a width if you like */
        }

        .vertical-menu a {
            background-color: #455A64;  /*Grey background color */
            color: black; /* Black text color */
            display: inline; /* Make the links appear below each other */
            padding: 12px; /* Add some padding */
            text-decoration: none; /* Remove underline from links */
            /*border: 1px solid #F5F5F5;*/
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font: 15px sans-serif;
            -webkit-transition: background 2s; /* For Safari 3.0 to 6.0 */
            transition: background 1s; /* For modern browsers */
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
        }

        .vertical-menu a.active {
            background-color: #90A4AE;
            color: white;
        }

        .vertical-menu a:hover {
            background-color: #B0BEC5;
            color: white;
        }
        /* follow me template */

        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 8px;
        } 
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        } 
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        }

        .tbl{
          width:100%;
          table-layout: inherit;
          font-size: 20pt;
          border-collapse: collapse !important;
          border: 0px;
        }
        .tbl-header{
          background-color: rgba(255,255,255,0.3);
         }
        .tbl-content{
          height:500px;
          overflow-x:auto;
          margin-top: 0px;
          border: 1px solid rgba(255,255,255,0.3);
        }
        .row{
          padding-top: 5px;padding-bottom:  5px;
          font-size: 12pt;
        }
        .ttile{
          font-weight: 500;
        }
        .tbl-header{
          background-color: rgba(255,255,255,0.3);
         }
        .tbl-content{
          height:500px;
          overflow-x:hidden;
          margin-top: 0px;
          border: 1px solid rgba(255,255,255,0.3);
        }
        .tbl th{
          background: #ECEFF1 !important;
          border: 1px solid #CFD8DC;
          border-bottom: 2px solid #CFD8DC;
          padding-left: 5px;
          padding: 5px;
          color: black;
          text-align: left;
          font-weight: 600;
          font-size: 16px;
          text-transform: uppercase;
        }
        .tbl td{
          padding: 15px;
          text-align: left;
          vertical-align:middle;
          font-weight: 500;
          font-size: 14px;
          border-bottom: solid 1px #ECEFF1;
        }

        #tblpayslip td{
          padding: 15px;
          text-align: left;
          vertical-align:middle;
          font-weight: 500;
          font-size: 16px;
          border-bottom: solid 1px rgba(255,255,255,0.1);
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        ::-webkit-scrollbar {
            width: 6px;
        } 
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        } 
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        }
        .cf{
          margin:16px;margin-top:10;
        }
        .bopanel{
          border-top: 5px solid #455A64;
          border-radius: 1em;
        }
        .pcustom{
          height: auto; padding: 10px;width: 100%;
        }
        .empfname{
          font-size: 12pt; 
          background: #CFD8DC; 
          border: 1px solid #B0BEC5; 
          color: #455A64; 
          font-weight: bold;
          text-transform: uppercase;
          padding: 10px; 
          padding: 10px !important;
        }
        .tbl_emp_details{
          font-size: 12pt; 
          background: #F5F5F5;
          width: 100%; 
          border-bottom: 1px solid #B0BEC5;
          border-left: 1px solid #B0BEC5;
          border-right: 1px solid #B0BEC5;
        }
        .tbl_emp_dt1{
          padding-left: 10px;padding-top: 10px;
        }
        .tbl_emp_dt{
          padding-left: 10px;
        }
        .tbl_emp_dt2{
          padding-left: 10px;padding-bottom: 10px;
        }
        .tbl_emp_contact{
          font-size: 12pt; 
          background: #F5F5F5; 
          width: 100%; 
          border: 1px solid #B0BEC5;
          margin-top: 10px;
          margin-bottom: 10px;
        }
        .tbl_emp_title{
          padding-left: 10px; border-bottom: 1px solid #B0BEC5;
        }
        .tbl_emp_cntct_details{
          padding: 5px; border-bottom: 1px solid #B0BEC5;
        }
        .panel-body-navbar{
          width: 100%;
        }
        .mainpanel{
          border-top: 5px solid #90A4AE;
        }
        .emppanel{
          height: auto; padding: 20px;width: 100%;
        }
        .emppanel-title{
          font: 18px sans-serif; font-weight: 500;
        }
        .proflepanel-details{
          margin-bottom: 30px;
        }
        .btn-print-sched, #btn_add_leave{
          float: right;margin-top: -5px;
          background: #ECEFF1 !important;
        }
        .pid{
          float: right; 
          font-size: 12pt !important; 
          margin-top: -5px;
          width: 25%;
          margin-right: 10px;
        }
        .payperiod{
          width: 100%;
        }
        .timein{
          color: #1B5E20;
        }
        .timeout{
          color: #d50000;
        }


.topnav {
  overflow: hidden;
}

.topnav a {
  float: left;
  display: block;
  color: #fff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font: 15px sans-serif;
  background-color: #455A64; 
  -webkit-transition: background 2s; /* For Safari 3.0 to 6.0 */
  transition: background 1s; /* For modern browsers */
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  margin-right: 5px;
}

.topnav a:hover {
  background-color: #B0BEC5;
  color: white;
}

.topnav a.active  {
  background-color: #90A4AE;
  color: white;
}


.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
    background: #455A64 !important;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {
    position: relative;
    background: #455A64 !important;
  }
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    border: 0px !important;
  }

  }

  /*.modal2.in ~ .modal-backdrop.in { background-color: #fff !important; }*/
  /* Outer */
  .popup {
      width:100%;
      height:100%;
      display:none;
      position:fixed;
      top:0px;
      left:0px;
      z-index: 9999;
      background:rgba(0,0,0,0.75);
      background:rgba(0,0,0,0.2);
  }
   
  /* Inner */
  .popup-inner {
      max-width:500px;
      width:80%;
      min-width: 500px;
      /*padding:40px;*/
      position:absolute;
      top: 50%;
      left:50%;
      -webkit-transform:translate(-50%, -50%);
      transform:translate(-50%, -50%);
      box-shadow:0px 2px 6px rgba(0,0,0,0.3);
      border-radius:3px;
      background:#fff;
  }
   
  /* Close Button */
  .popup-close {
      width:30px;
      height:30px;
      padding-top:4px;
      display:inline-block;
      position:absolute;
      top:0px;
      right:0px;
      transition:ease 0.25s all;
      -webkit-transform:translate(50%, -50%);
      transform:translate(50%, -50%);
      border-radius:1000px;
      background:rgba(0,0,0,0.8);
      font-family:Arial, Sans-Serif;
      font-size:20px;
      text-align:center;
      line-height:100%;
      color:#fff;
  }
   
  .popup-close:hover {
      /*-webkit-transform:translate(50%, -50%) rotate(180deg);*/
      /*transform:translate(50%, -50%) rotate(180deg);*/
      background:rgba(0,0,0,1);
      text-decoration:none;
  }
  input[type=radio] {
    width: 20px;
    height: 20px;
  }
  #rlabelwd{
    position: absolute; margin-top: 2px; margin-left: 5px; font-size: 11pt;cursor: pointer;        
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
    -khtml-user-select: none; /* Konqueror HTML */
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* Internet Explorer/Edge */
    user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
  }       
  #rlabelhd{
     -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
    -khtml-user-select: none; /* Konqueror HTML */
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* Internet Explorer/Edge */
    user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
    position: absolute; margin-top: 2px; margin-left: 5px; font-size: 11pt;cursor: pointer;
  }
  #rdbtnwd{cursor: pointer;margin-left: -50px;}
  #rdbtnhd{margin-left: 100px;cursor: pointer;}
  .date-form{
    border: 1px solid #90A4AE;
    width: 100%;
    height: 30px;
  }
  input[type=text], select{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    padding: 3px 0px 3px 3px;
    margin: 5px 1px 3px 0px;
    border: 1px solid #ABB2B9;
    width: 100%;
    height: 40px;
  }
  textarea{
  padding: 3px 0px 3px 3px;
  width: 385px;
  height:80px;
  max-height: 80px;
  min-height: 80px;
  max-width: 385px;
  min-width: 385px;
  }
  input[type=text]:focus{
    padding: 3px 0px 3px 3px;
    margin: 5px 1px 3px 0px;
    border: 1px solid rgba(81, 203, 238, 1);
  }
  textarea:focus{
    border: 1px solid rgba(81, 203, 238, 1);
  }
  select:focus{
    border: 1px solid rgba(81, 203, 238, 1);
  }
  #alignth{
    padding-left: 25px !important;
  }
/*  body.modal-open {
      overflow: hidden;
  }*/
  .submit-btn{
      background-color: #fff; /* Green */
      border: 1px solid #4CAF50;
      color: black;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      width: 100%;
      border-radius: 4px;
      padding: 8px;
      -webkit-transition-duration: 0.5s; /* Safari */

      -webkit-box-sizing: content-box;
      -moz-box-sizing: content-box;
      box-sizing: content-box;
      -webkit-box-shadow: 1px 3px 2px 0 rgba(140,140,140,1) ;
      box-shadow: 1px 3px 2px 0 rgba(140,140,140,1) ;
      -webkit-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
      -moz-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
      -o-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
      transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
    }
  .cancel-btn{
      background-color: #fff; /* Green */
      border: 1px solid #f44336;
      color: black;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      width: 100%;
      border-radius: 4px;
      padding: 8px;
      -webkit-transition-duration: 0.5s; /* Safari */
      -webkit-box-sizing: content-box;
      -moz-box-sizing: content-box;
      box-sizing: content-box;
      -webkit-box-shadow: 1px 3px 2px 0 rgba(140,140,140,1) ;
      box-shadow: 1px 3px 2px 0 rgba(140,140,140,1) ;
      -webkit-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
      -moz-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
      -o-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
      transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
  }
  .submit-btn:hover  {
    background-color: #4CAF50;
    color: white;
    text-shadow: -1px -1px 0 rgba(15,73,168,0.66) ;
  }

  .cancel-btn:hover  {
    background-color: #f44336;
    color: white;
    text-shadow: -1px -1px 0 rgba(15,73,168,0.66) ;
  }
  .popup-header{
    padding: 20px;
    padding-left: 50px;
    border-top: .5px solid #fff;
    border-bottom: 5px solid #F4F6F6;
    background: #455A64; 
    color: #fff;
    font-size: 16pt;
  }
  .main-panel{
    padding-left: 40px;padding-right: 40px;margin-top: 20px;min-width: 500px;
  }
  .radio-panel{
    background: #F8F9F9; border: 1px solid #E5E8E8; padding: 10px;margin-bottom: 10px;
  }
  .details-panel{
    background: #F8F9F9; border: 1px solid #E5E8E8;padding-top: 20px;padding-bottom: 20px;margin-bottom: 20px;"
  }
  .details-title{
    font-weight: 500;
  }
  .btn-panel{
    margin-bottom: 20px;
  }
  input[type="text"]:disabled{background-color:#F5F5F5;cursor: not-allowed;}
  .errorpanel{padding: 10px; background: #e57373; border: 2px solid #d32f2f; color: #fff;border-radius: 4px; display: none;}
  .footer
  {
    background: #FFF;
    padding: 10px 10px; 
  }
		</style>
