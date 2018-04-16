
    	<?php 
			echo form_open(base_url() . 'index.php?coach/add_task/', array('id'=>'frm_add_task','class' => 'form-vertical validate','enctype' => 'multipart/form-data'));
			
		?>   
		
			<div class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('task_title');?></label>
				<div class="col-xs-12"><INPUT type="text" name="tasks_name" id="tasks_name" class="form-control" required="required"/></div>
			</div>
			
			<div  class="form-group">
				<div class="col-xs-12 text-nowrap">
					<div class="col-sm-4"><input type="radio" name="" value="single" checked="checked" /> <?=get_phrase('single');?></div>
					<div class="col-sm-4"></div>
				</div>
			</div>
			
			<input  type="hidden" name="goals_id" value="<?=$param2;?>"/>
			
			<div  class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('due_date');?></label>
				<div class="col-xs-12"> 
					<div class="input-group">
						<input type="text" name="tasks_due_date" id="tasks_due_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" 
							data-format="yyyy-mm-dd" data-start-date="" 
								data-end-date="" readonly="readonly">
												
							<div class="input-group-addon">
								<a href="#"><i class="entypo-calendar"></i></a>
							</div>
					</div>
				</div>
			</div>
			
			<div  class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('notes');?></label>
				<div class="col-xs-12">
						<textarea class="form-control" name="notes" id="notes" placeholder="<?=get_phrase('notes');?>"></textarea>

				</div>
			</div>
			
			
			
			<div class="form-group">
				<div class="col-xs-12">
					<button class="btn btn-default" id="add_task">
						<i class="fa fa-plus"></i>
						<span><?php echo get_phrase('add_task'); ?></span>
					</button>
				</div>
			</div>
			
			</form>
			

<script>
	$('#add_task').click(function(ev){
		var url = $('#frm_add_task').attr('action');
		var data = $('#frm_add_task').serializeArray();
		$.ajax({
			url:url,
			data:data,
			type:"POST",
			success:function(){
				
				showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$param2;?>');
					var goal_id = "<?=$param2;?>";
					
					//Update Goals list of tasks
					var url = "<?=base_url();?>index.php?coach/get_tasks_list/"+<?=$param2;?>;
					$.ajax({
						url:url,
						beforeSend:function(){
							$('#goal_tasks_display_'+goal_id).html('<div style="text-align:center;"><img style="width:60px;height:60px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
						},
						success:function(response){
							
							$('#goal_tasks_display_'+goal_id).html(response);
						}
					});
					
					//Update Progress
					var url2 = "<?=base_url();?>index.php?coach/mark_task_progress_on_add/"+goal_id;
					$.ajax({
						url:url2,
						success:function(response){
							//alert(response);
							$('#goal_progress_bar_'+goals_id).html(response);
						}
					});
			}
		});
		
		ev.preventDefault();
	});
</script>  