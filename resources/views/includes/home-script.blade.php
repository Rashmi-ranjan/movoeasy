<script>
    var controller				=	'{{ $controller }}';
	var action					=	'{{ $action }}';
	var csrfTkn					=	'{{ csrf_token() }}';
	var baseUrl					=	'{{ URL::to('/') }}';
	var onChangeFunction		=	'';
	var listingUrl				=	'';

	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
    @if($action == 'landing')
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
        });
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                pager:false,
                nav: true,
                speed: 1000,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
        $("document").ready(function() {
            $("#video").simplePlayer();
        });
        jQuery(document).ready(function( $ ) {
            $('.counter').counterUp({
                delay: 100,
                time: 1000
            });
        });
        $(function(){
            // SyntaxHighlighter.all();
                });
                $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
            });
        });
    @endif
    $(document).ready(function(){
        $('.datepkr').datetimepicker({                
            format: 'DD-MM-YYYY'
        }); 
        $('.datepkr1').datepicker({                
            format: 'dd-mm-yyyy',
            autoclose:true,
            minDate  :0,
            endDate:new Date()
        });
        $(".datepkrNoRestrict").datetimepicker({
            format: 'DD-MM-YYYY',
        });
        $(".datepkrNoRestrict1").datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true,
            startDate:new Date()
        });
        //Datemask dd/mm/yyyy
        $(".datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
        $(".mobilemask").inputmask("999-999-9999");
        //$(".phoneNoMask").inputmask("9999999999");
        $(".landMask").inputmask("(99999)-(9999999)");
    });
	function showJsonErrors(errors){	
        if(errors != ''){
            resp = $.parseJSON(errors);
            var totErrorLen = resp.length;	
            for(var errCnt =0;errCnt <totErrorLen;errCnt++){
                var modelField         =   resp[errCnt]['modelField'];
                var modelErrorMsg      =   resp[errCnt]['modelErrorMsg'];
                $('[id="'+modelField+'"]').after('<div class="error-message">'+modelErrorMsg+'</div>'); 
            }
        }
	}
    function resetFormVal(frmId,hidVal){
        if(hidVal == 1){
            $('#'+frmId).find('input:hidden').val('');
        }else{
            $('#id').val('');
        }		
        $('#'+frmId).find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
        $('.'+frmId).find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
        $('#'+frmId).find('input:password,input:text, input:file, select, textarea').val('');	
        $('.'+frmId).find('input:password,input:text, input:file, select, textarea').val('');
        $('.error-message').remove();
    }

    function postOrder(){
        $('.error-message').remove();
            $('#loddingImage').show();
            $('.frmbtngroup').prop('disabled',true);
            $('.form-control').prop('readonly',true);
            $.ajaxSetup({
                headers: {
                        'X-CSRF-Token': csrfTkn
                }
            });
            $.ajax({
                url:baseUrl+'/home/saveorder',
                type: 'post',
                cache: false,					
                data:{
                    "formdata": $('#entryFrm').serialize(),
                },
                success: function(res){					
                    var resp		=   res.split('****');
                    $('#loddingImage').hide();
                    $('.form-control').prop('readonly',false);
                    $('.frmbtngroup').prop('disabled',false);
                    if(resp[1] == 'ERROR'){											
                        $('#failMsgDiv').removeClass('text-none');
                        $('.failmsgdiv').html(resp[2]);
                        $('#failMsgDiv').show('slow');
                        setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                    }else if(resp[1] == 'FAILURE'){
                        showJsonErrors(resp[2]);
                    }else if(resp[1] == 'SUCCESS'){
                        resetFormVal('entryFrm',0);
                        $('#sucMsgDiv').removeClass('text-none');
                        $('.sucmsgdiv').html(resp[2]);
                        $('#sucMsgDiv').show('slow');	
                        setTimeout(function(){ $('#sucMsgDiv').fadeOut('slow'); }, 5000);
                        
                    }		
                },
                error: function(xhr, textStatus, thrownError) {
                    $('.failmsgdiv').html('Something went to wrong.Please Try again later...');
                    $('#failMsgDiv').show('slow');
                    setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                }
            });
    }
   
    @if($action == 'userRegister')
        function saveCreateUser(){ 
            $('.error-message').remove();
            $('#loddingImage').show();
            $('.frmbtngroup').prop('disabled',true);
            $('.form-control').prop('readonly',true);
            $.ajaxSetup({
                headers: {
                        'X-CSRF-Token': csrfTkn
                }
            });
            $.ajax({
                url:baseUrl+'/users/savecreateuser',
                type: 'post',
                cache: false,					
                data:{
                    "formdata": $('#form-signup').serialize(),
                },
                success: function(res){					
                    var resp		=   res.split('****');
                    $('#loddingImage').hide();
                    $('.form-control').prop('readonly',false);
                    $('.frmbtngroup').prop('disabled',false);
                    if(resp[1] == 'ERROR'){											
                        $('#failMsgDiv').removeClass('text-none');
                        $('.failmsgdiv').html(resp[2]);
                        $('#failMsgDiv').show('slow');
                        setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                    }else if(resp[1] == 'FAILURE'){
                        showJsonErrors(resp[2]);
                    }else if(resp[1] == 'SUCCESS'){
                        resetFormVal('entryFrm',0);
                        $('#sucMsgDiv').removeClass('text-none');
                        $('.sucmsgdiv').html(resp[2]);
                        $('#sucMsgDiv').show('slow');	
                        setTimeout(function(){ $('#sucMsgDiv').fadeOut('slow'); }, 5000);
                        hideAddUserDiv();
                        showData();
                    }		
                },
                error: function(xhr, textStatus, thrownError) {
                    $('.failmsgdiv').html('Something went to wrong.Please Try again later...');
                    $('#failMsgDiv').show('slow');
                    setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                }
            });
        }
    @endif
</script>