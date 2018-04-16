<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading" style="">
                        <div class="panel-title">
                            <i class="entypo-plus-squared"></i>
                            <?php echo get_phrase('add_theme');?>
                        </div>
                    </div>
                    <div class="panel-body">
                    	<div id="progress"></div>
                    	<?php 
							 echo form_open(base_url() . 'index.php?coach/add_theme/', array('id'=>'frm_add_theme','class' => 'form-horizontal validate','enctype' => 'multipart/form-data'));
						?> 
							<div class="form-group">
								<label class="control-label col-sm-4"><?=get_phrase('title');?></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="theme_name" name="theme_name" required="required" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-4"><?=get_phrase('color_code');?></label>
								<div class="col-sm-8 ">
									
										<div class="radio">
											  <label><input type="radio" name="theme_color" value="label label-success"><div class="label label-success"><?=get_phrase('color_1');?></div></label>
										</div>
										
										<div class="radio">
											 <label><input type="radio" name="theme_color" value="label label-info"><div class="label label-info"><?=get_phrase('color_2');?></div></label>
										</div>
										
										<div class="radio">
											 <label><input type="radio" name="theme_color" value="label label-danger"><div class="label label-danger"><?=get_phrase('color_3');?></div></label>
										</div>
										
										<div class="radio">
											 <label><input type="radio" name="theme_color" value="label label-warning"><div class="label label-warning"><?=get_phrase('color_4');?></div></label>
										</div>
										
										<div class="radio">
											 <label><input type="radio" name="theme_color" value="label label-primary"><div class="label label-primary"><?=get_phrase('color_5');?></div></label>
										</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-4"><?=get_phrase('description');?></label>
								<div class="col-sm-8">
									<textarea class="form-control" name="theme_description" id="theme_description" required="required"></textarea>
								</div>
							</div>
							
							<input type="hidden" name="theme_status" id="theme_status"  value="1"/>
							
							<div class="form-group">
								<div class="col-sm-12"><button id="save_theme" class="btn btn-default"><i class="fa fa-save"></i> <?=get_phrase("save");?></button></div>
							</div>
							
						</form>  
					</div>
				</div>
			</div>
		</div>	
		
<script>
	$('#save_theme').click(function(ev){
		var url = $("#frm_add_theme").attr("action");
		var data = $("#frm_add_theme").serializeArray();
		
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			beforeSend:function(){
				$('#progress').html('<div style="text-align:center;"><img style="width:60px;height:60px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
			},
			success:function(){
				
				
				var url = "<?=base_url();?>index.php?coach/get_themes_chart";
					$.ajax({
						url:url,
						success:function(resp){
							jQuery('#modal_ajax').modal('hide');
							$('#progress').html("");
							$('#theme_chart_container').html(resp);
						}
					});
			}
		});
		
		ev.preventDefault();
	});
</script>