<!DOCTYPE html>
<html>
 	<head>
		<title><?php echo $this->session->employee_fullname; ?></title>
		<meta charset=utf-8 >
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="HTML5 Template" > 
		<meta name="description" content="Haswell - Responsive HTML5 Template" > 
		<meta name="author" content="Vladimir Azarushkin">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $_def_css_files; ?>
    <style type="text/css">
      @media (max-width: 1024px) {
        .page-title, div.breadcrumbs{
          text-align: center!important;
        }
        .title_header{
          text-align: center;
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
              <h1 class="page-title depth"><i class="fa fa-user"></i> PROFILE</h1>
            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>
      </div>
      <div class="grey-light-bg plr-30 plr-0-767 clearfix">    
        <!-- COTENT CONTAINER -->
        <div class="white-bg pt-30 col-sm-6 col-md-6 col-lg-6 pb-70" style="margin-bottom: 50px;">
          <div class="relative">  
            <div class="row" style="min-height: 380px!important;">
              <div class="col-md-12">
                <div style="margin: 10px;">

                  <div class="title_header">
                      <span class="depth"><i class="fa fa-user" aria-hidden="true"></i> PERSONAL INFORMATION</span>
                  </div>

                  <div class="divider divider-center"><i class="fa fa-square"></i></div>
                  <table width="100%">
                    <tr>
                      <td width="50%" style="min-width: 30%;" class="depth">
                          <i class="fa fa-user"></i> Firstname 
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td width="50%"><?php echo $this->session->employee_fname; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-user"></i> Middlename
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->employee_mname; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-user"></i> Lastname
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->employee_lname; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-phone"></i> Telephone
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->employee_telphone; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-mobile"></i> Contact #
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->employee_contact; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-envelope"></i> Email Address
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>   
                      <td><?php echo $this->session->employee_email; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-birthday-cake"></i> Birthday
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->employee_birthdate; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-home"></i> Address
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->employee_address; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="white-bg pt-30 col-sm-6 col-md-6 col-lg-6 pb-70" style="margin-bottom: 50px;">
          <div class="relative">  
            <div class="row" style="min-height: 380px!important;">
              <div class="col-md-12">
                <div style="margin: 10px;">
                  <span class="depth"><i class="fa fa-info-circle" aria-hidden="true"></i> EMPLOYEE INFORMATION</span>
                  <div class="divider divider-center"><i class="fa fa-square"></i></div>
                  <table width="100%">
                    <tr>
                      <td width="50%" class="depth">
                          <i class="fa fa-code"></i> Employee Type
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td width="50%"><?php echo $this->session->employment_type; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-calendar"></i> Employment
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo date("m/d/Y", strtotime($this->session->employee_empdate)); ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-building"></i> Branch
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->branch; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-user"></i> Position
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->position; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-code"></i> Group
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->group_desc; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-code"></i> Section
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>   
                      <td><?php echo $this->session->section; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-code"></i> Department
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->department; ?></td>
                    </tr>
                    <tr>
                      <td class="depth">
                          <i class="fa fa-code"></i> Pay Type
                          <span style="float: right!important;margin-right: 20px;">:</span>
                      </td>
                      <td><?php echo $this->session->payment_type; ?></td>
                    </tr>
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
	</body>
</html>		