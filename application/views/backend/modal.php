 <style>
 	@media print {
    /* on modal open bootstrap adds class "modal-open" to body, so you can handle that case and hide body */
    body.modal-open {
        visibility: hidden;
    }

    body.modal-open .modal .modal-header,
    body.modal-open .modal .modal-body {
        visibility: visible; /* make visible modal body and header */
    }
}

.modal-header,.modal-footer {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #F5F5F5;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
 </style>
 
 <script type="text/javascript">
	function showAjaxModal(url,header="")
	{
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>uploads/preloader.gif" /></div>');
		
		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax').modal('show', {backdrop: 'static',keyboard: false});
		
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('#modal_ajax .modal-body').html(response);
				if(header===""){
					jQuery('#modal_ajax .modal-title').html('<?=$system_name;?>');
				}else{
					jQuery('#modal_ajax .modal-title').html(header);
				}
				
			}
		});
		
		 $('.modal-dialog').draggable({
		    handle: ".modal-header"
		  });
	}
	</script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="height: auto;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                
                <div class="modal-body" id="pop_modal_body" style="height:500px; overflow:auto;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-default" onclick="js:window.print()">Print</button>-->
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <script type="text/javascript">
	function confirm_modal(delete_url)
	{
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
	
	function confirm_action(url)
	{
		jQuery('#modal-5').modal('show', {backdrop: 'static'});
		document.getElementById('perform_link').setAttribute('href' , url);
	}
	function confirm_dialog(url,reload=false){
			BootstrapDialog.confirm('<?php echo get_phrase("Are_you_sure_you_want_to_perform_this_action?");?>', function(result){
            if(!result) {
		                 BootstrapDialog.show({
		                 	title:'Information',
				            message: '<?php echo get_phrase('process_aborted');?>'
				        });
	            }else{				        
				        
					$.ajax(
						{
							url:url,
							beforeSend:function(request){
								BootstrapDialog.show({
				                 	title:'Information',
						            message: '<?php echo get_phrase('please_wait_until_you_receive_confirmation');?>'
						        });
							},
							success:function(response){
								
								 BootstrapDialog.show({
				                 	title:'Alert',
						            message: response
						        });
						        
						        if(reload===true){
						        	window.location.reload();
						        }
				        
							}
						}
					);
	         }   	
			
		});
	}
	</script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link"><?php echo get_phrase('delete');?></a>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo get_phrase('cancel');?></button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- (Confirm Modal)-->
    <div class="modal fade" style="position: absolute;top:0px;bottom:0px;;" id="modal-5"> 
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button id="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure you want to perform this action?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="perform_link"><?php echo get_phrase('Ok');?></a>
                    <button id="" type="button" class="btn btn-info" data-dismiss="modal"><?php echo get_phrase('cancel');?></button>
                </div>
            </div>
        </div>
    </div>
    
 
    