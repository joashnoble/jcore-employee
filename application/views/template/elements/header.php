<div class="row">
  <div class="col-md-12">
    <center>
      <img src="<?php echo $this->config->item("base_urlmain").'/'.$this->session->employee_photo; ?>" style="width: 200px; height: 200px;border-radius: 50%;box-shadow: inset 0px 0px 10px rgba(0,0,0,0.5);" class="img-responsive">
      <span>
      	<br>      
        <?php echo $this->session->employee_ecode; ?> | <?php echo $this->session->employee_fname.' '.$this->session->employee_lname; ?>
      </span>
    </center>
  </div>
</div>