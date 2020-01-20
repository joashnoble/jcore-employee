<!-- Haswell Jquery -->
<!-- jQuery  -->
<script type="text/javascript" src="assets/haswell/js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/haswell/js/bootstrap.min.js"></script>      

<!-- MAGNIFIC POPUP -->
<script src='assets/haswell/js/jquery.magnific-popup.min.js'></script>

<!-- PORTFOLIO SCRIPTS -->
<script type="text/javascript" src="assets/haswell/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="assets/haswell/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="assets/haswell/js/masonry.pkgd.min.js"></script>

<!-- COUNTER -->
<script type="text/javascript" src="assets/haswell/js/jquery.countTo.js"></script>

<!-- APPEAR -->    
<script type="text/javascript" src="assets/haswell/js/jquery.appear.js"></script>

<!-- OWL CAROUSEL -->    
<script type="text/javascript" src="assets/haswell/js/owl.carousel.min.js"></script>

<!-- MAIN SCRIPT -->
<script src="assets/haswell/js/main.js"></script>

<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript" src="assets/plugins/notify/pnotify.core.js"></script>
<script type="text/javascript" src="assets/plugins/notify/pnotify.buttons.js"></script>
<script type="text/javascript" src="assets/plugins/notify/pnotify.nonblock.js"></script>

<script src="assets/js/blockUI.js" type="text/javascript"></script>
<script src="assets/js/loadImg.js" type="text/javascript"></script>

<script type="text/javascript" src="assets/plugins/printThis.js"></script>

<script src="assets/plugins/select2/select2.full.min.js"></script>


<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>    

<script>
$( document ).ready(function() {


	$('.btn_change_password').on('click', function(){

        $('div.group-pass').removeClass('has-error');
        $('div.group-pass').find('.required_notif').html('');
        $('.success_notif_pass').addClass('hidden');
        $('.epassword').removeClass('has-error');
        $('.cpassword').removeClass('has-error');
        $('#current_password').val("");
        $('#new_password').val("");
        $('#confirm_password').val("");
        $('.password').attr('type', 'password');
        $('.view_icon').data('view-type', 0);
        $('.view_icon').find('.fa').removeClass('fa-eye');
        $('.view_icon').find('.fa').addClass('fa-eye-slash');

        $('#save_pass_title').html('Save Changes');
        $('.btn_pass').prop('disabled', false);

		    $('#modal_change_password').modal('toggle');

	});


	var validateRequiredFields_pass=function(f){
	    var stat=true;

		var new_password = $('#new_password').val();
		var confirm_password = $('#confirm_password').val();

	    $('div.form-group').removeClass('has-error');
	    $('div.form-group').find('.required_notif').html('');

	    $('input[required],textarea[required],select[required]',f).each(function(){


	            if($(this).val()==""){

	                $(this).closest('div.group-pass').find('.required_notif').html($(this).data('error-msg'));
	                $(this).closest('div.group-pass').addClass('has-error');
	                // $(this).focus();
	                stat=false;
	            }

              if(new_password!=confirm_password){


                $('.error_notif_pass').html('<div class="row" style="font-size: 9pt;"><div class="col-md-12"><div class="alert alert-danger"><span aria-hidden="true" class="alert-icon icon_error-triangle_alt"></span> Password do not match!</div></div></div>');
                $('.error_notif_pass').focus();

                setTimeout(function(){
                  $('.error_notif_pass').html("");
                },4000); 


                  $('.epassword').addClass('has-error');
                  $('.cpassword').addClass('has-error');
                  $('#confirm_password').focus();
                  stat=false;
                  return false;
              }
	    });

	    return stat;
	};


    var updatePassword=function(){
        var _data=$('#frm_password').serializeArray();
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Profile/transaction/update_password",
            "data" : _data,
            "beforeSend": function(){
            }
        });
    };

  $('.view_icon').on('click', function(){
      var view_type = $(this).data('view-type');
      var input_class = $(this).data('input-class');

      if (view_type == 0){

          $(this).find('.fa').removeClass('fa-eye-slash');
          $(this).find('.fa').addClass('fa-eye');
          $(this).data('view-type', 1);

          $('.'+input_class).attr('type', 'text');
          $('.'+input_class).focus();

      }else{

          $(this).find('.fa').addClass('fa-eye-slash');
          $(this).find('.fa').removeClass('fa-eye');
          $(this).data('view-type', 0);

          $('.'+input_class).attr('type', 'password');
          $('.'+input_class).focus();          
      }

  });

	$('#btn_save_password').on('click', function(){

            if (validateRequiredFields_pass($('#frm_password'))){

               updatePassword().done(function(response){


                    if (response.stat == "success"){

          $('#save_pass_title').html('Saving...');
          $('.btn_pass').prop('disabled', true);

                            $('.success_notif_pass').removeClass('hidden');
                            $('.success_notif_pass').focus();

                          setTimeout(function(){
  							               $('#modal_change_password').modal('toggle');
                          },2000);                            

                    }else if (response.stat == "error"){

                            $('.error_notif_pass').html('<div class="row" style="font-size: 9pt;"><div class="col-md-12"><div class="alert alert-danger"><span aria-hidden="true" class="alert-icon icon_error-triangle_alt"></span>'+response.msg+'</div></div></div>');
                            $('.error_notif_pass').focus();

                        setTimeout(function(){
                          $('.error_notif_pass').html("");
                        },4000); 

                    }

                });

            }
	});

              $('input.password').keypress(function(evt){
                  if(evt.keyCode==13){
                    evt.preventDefault();
                    $('#btn_save_password').click();
                  }
              });  

});
</script>