<script>
    var controller				=	'{{ $controller }}';
	var action					=	'{{ $action }}';
	var csrfTkn					=	'{{ csrf_token() }}';
	var baseUrl					=	'{{ URL::to('/') }}';
	var onChangeFunction		=	'';
	var listingUrl				=	'';
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
    @if($action == 'userList')
        function approveUser(record_id){
            $('.error-message').remove();
            $('#loddingImage').show();
            $('.frmbtngroup').prop('disabled',true);
            $.ajaxSetup({
                headers: {
                        'X-CSRF-Token': csrfTkn
                }
            });
            $.ajax({
                url:baseUrl+'/usersetting/approveuser',
                type: 'post',
                cache: false,					
                data:{
                        "record_id": record_id,
                },
                success: function(res){					
                    var resp		=   res.split('****');
                    $('#loddingImage').hide();
                    $('.frmbtngroup').prop('disabled',false);
                    if(resp[1] == 'ERROR'){											
                        $('#failMsgDiv').removeClass('text-none');
                        $('.failmsgdiv').html(resp[2]);
                        $('#failMsgDiv').show('slow');
                        setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                    }else if(resp[1] == 'FAILURE'){
                        showJsonErrors(resp[2]);
                    }else if(resp[1] == 'SUCCESS'){
                        $('#sucMsgDiv').removeClass('text-none');
                        $('.sucmsgdiv').html(resp[2]);
                        $('#sucMsgDiv').show('slow');	
                        setTimeout(function(){ $('#sucMsgDiv').fadeOut('slow'); }, 5000);
                        window.location.replace(baseUrl+"/usersetting/user-list"); 
                    }		
                },
                error: function(xhr, textStatus, thrownError) {
                    $('.failmsgdiv').html('Something went to wrong.Please Try again later...');
                    $('#failMsgDiv').show('slow');
                    setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                }
            });
    	}
    	function pendingeUser(record_id){
            if(confirm('Are you sure to Pending this User ?')){
                $('.error-message').remove();
                $('#loddingImage').show();
                $('.frmbtngroup').prop('disabled',true);
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-Token': csrfTkn
                    }
                });
                $.ajax({
                    url:baseUrl+'/usersetting/pendinguser',
                    type: 'post',
                    cache: false,					
                    data:{
                        "record_id": record_id,
                    },
                    success: function(res){					
                        var resp		=   res.split('****');
                        $('#loddingImage').hide();
                        $('.frmbtngroup').prop('disabled',false);
                        if(resp[1] == 'ERROR'){											
                            $('#failMsgDiv').removeClass('text-none');
                            $('.failmsgdiv').html(resp[2]);
                            $('#failMsgDiv').show('slow');
                            setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                        }else if(resp[1] == 'FAILURE'){
                            showJsonErrors(resp[2]);
                        }else if(resp[1] == 'SUCCESS'){
                            $('#sucMsgDiv').removeClass('text-none');
                            $('.sucmsgdiv').html(resp[2]);
                            $('#sucMsgDiv').show('slow');	
                            setTimeout(function(){ $('#sucMsgDiv').fadeOut('slow'); }, 5000);
                            window.location.replace(baseUrl+"/usersetting/user-list"); 
                        }		
                    },
                    error: function(xhr, textStatus, thrownError) {
                        $('.failmsgdiv').html('Something went to wrong.Please Try again later...');
                        $('#failMsgDiv').show('slow');
                        setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                    }
                });
            }
    	}
    	function discardUser(record_id){
            if(confirm('Are you sure to Discard this user ?')){
                $('.error-message').remove();
                $('#loddingImage').show();
                $('.frmbtngroup').prop('disabled',true);
                $.ajaxSetup({
                        headers: {
                                'X-CSRF-Token': csrfTkn
                        }
                });
                $.ajax({
                    url:baseUrl+'/usersetting/discarduser',
                    type: 'post',
                    cache: false,					
                    data:{
                        "record_id": record_id,
                    },
                    success: function(res){					
                        var resp		=   res.split('****');
                        $('#loddingImage').hide();
                        $('.frmbtngroup').prop('disabled',false);
                        if(resp[1] == 'ERROR'){											
                            $('#failMsgDiv').removeClass('text-none');
                            $('.failmsgdiv').html(resp[2]);
                            $('#failMsgDiv').show('slow');
                            setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                        }else if(resp[1] == 'FAILURE'){
                            showJsonErrors(resp[2]);
                        }else if(resp[1] == 'SUCCESS'){
                            $('#sucMsgDiv').removeClass('text-none');
                            $('.sucmsgdiv').html(resp[2]);
                            $('#sucMsgDiv').show('slow');	
                            setTimeout(function(){ $('#sucMsgDiv').fadeOut('slow'); }, 5000);
                            window.location.replace(baseUrl+"/usersetting/user-list"); 
                        }		
                    },
                    error: function(xhr, textStatus, thrownError) {
                        $('.failmsgdiv').html('Something went to wrong.Please Try again later...');
                        $('#failMsgDiv').show('slow');
                        setTimeout(function(){ $('#failMsgDiv').fadeOut('slow'); }, 5000);
                    }
                });
            }
    	}
        function changeUrl(){
            window.location.replace(baseUrl+"/usersetting/user-list"); 
    	}
        
    @endif
    @if($action == 'editUser')
        function updateUser(){ //alert(1);
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
                url:baseUrl+'/usersetting/updateuser',
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
                        //resetFormVal('entryFrm',0);
                        $('#sucMsgDiv').removeClass('text-none');
                        $('.sucmsgdiv').html(resp[2]);
                        $('#sucMsgDiv').show('slow');	
                        setTimeout(function(){ $('#sucMsgDiv').fadeOut('slow'); }, 5000);
                        window.location.replace(baseUrl+"/usersetting/user-list"); 
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
    /*
     * Displaying maste data result
     * based on action name
     */	
    
</script>
@if(isset($layoutArr['viewDataObj']) && is_object($layoutArr['viewDataObj']))
    @foreach($layoutArr['viewDataObj'] as $modelKey=>$modelVal)
        <script>
            var elementId		=	"{{ $modelKey }}"; //alert(elementId);
            var elementVal		=	"{{ $modelVal }}"; //alert(elementVal);
            if($('#'+elementId).length > 0){
                if($('.radioCls').length > 0 && (elementVal == 'Y' || elementVal == 'N')){
                    $('input[type=radio][value='+elementVal+']').prop('checked',true)
                }else{
                    $('#'+elementId).val(elementVal);
                }	
            }
        </script>
    @endforeach
@endif