<link rel="shortcut icon" href="<?php echo $this->config->item("base_urlmain").'/'.$this->session->company_logo; ?>">
<link rel="apple-touch-icon" href="images/favicon/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-touch-icon-114x114.png">
<!-- FLEXSLIDER SLIDER CSS -->

<link rel="stylesheet" type="text/css" href="assets/haswell/css/flexslider.css"  >

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="assets/haswell/css/bootstrap.min.css"> 

<!-- GOOGLE FONT -->    
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700%7COpen+Sans:400,300,700' rel='stylesheet' type='text/css'>

<!-- ICONS ELEGANT FONT & FONT AWESOME & LINEA ICONS -->    
<link rel="stylesheet" href="assets/haswell/css/icons-fonts.css" >  

<!-- CSS THEME -->    
<link rel="stylesheet" href="assets/haswell/css/style.css" >


<link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

<!-- ANIMATE -->  
<link rel='stylesheet' href="assets/haswell/css/animate.min.css">

<link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

<style type="text/css">

.numeric{
  text-align: right;
}

    .noselect{
      -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
         -khtml-user-select: none; /* Konqueror HTML */
           -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
                user-select: none; /* Non-prefixed version, currently
                                      supported by Chrome and Opera */
    }


    img, a{
      user-drag: none; 
      user-select: none;
      -moz-user-select: none;
      -webkit-user-drag: none;
      -webkit-user-select: none;
      -ms-user-select: none;
    }

    .depth {
        color: black;
        position: relative;
    }
    .depth:before, .depth:after {
        content: attr(title);
        color: rgba(255,255,255,.1);
        position: absolute;
    }
    .depth:before { top: 1px; left: 1px }
    .depth:after  { top: 2px; left: 2px }  
    .thcolor{
      background-color: #4b4e53; 
      color: white;
      padding: 3px;
    }
    table.dataTable td.dataTables_empty {
        text-align: center;    
    }    

    .black{
        color: black;
    }
    
    .green{
        color: #228B22;
        font-weight: 600;
    }

    .notification {
      position: relative;
      display: inline-block;
    }

    .notification .badge {
      position: absolute;
      top: -8px;
      right: -10px;
      padding: 5px 6px;
      border-radius: 50%;
      background-color: red!important;
      color: white;
      font-size: 7pt; 
    }
    li.active{
        font-weight: bold;
    }

      .required_notif{
        float: right;
        color: red;
        font-size: 7pt;
        font-weight: bold;
      } 

    .md-title{
      font-size: 9pt;
    }    

    input.password::-webkit-input-placeholder { /* Edge */
      font-size: 8pt!important;
    }

    input.password:-ms-input-placeholder { /* Internet Explorer 10-11 */
      font-size: 8pt!important;
    }

    input.password::placeholder {
      font-size: 8pt!important;
    }

    .view_icon{
      cursor: pointer;
    }

    .view_icon:hover{
      color: #32CD32;
    }

</style>